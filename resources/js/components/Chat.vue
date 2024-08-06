<template>
  <div>
    <beautiful-chat
      v-if="thread!=null||participantsList.length>0"
      :thread="thread?thread:{}"
      :onLoadSubmit="index"
      :isLoading="isLoading"
      :showLoadButton="pagination!=null&&pagination.url!=null?true:false"
      :pagination="pagination"
      :agentProfile="agentProfile"
      :onMessageWasSent="onMessageSend"
      :messageList="messageList"
      :newMessagesCount="newMessagesCount"
      :isOpen="isChatOpen"
      :close="closeChat"
      :open="openChat"
      :alwaysScrollToBottom="alwaysScrollToBottom"
      :messageStyling="messageStyling"
      :showEmoji="true"
      :showFile="true"
      :participants="participantsList"
      :lang="lang"
    />
  </div>
</template>
<script>
export default {
  props: ["__auth", "__thread_id"],
  data() {
    return {
      lang:window['translations'].chat,
      alwaysScrollToBottom: true,
      messageStyling: true,
      agentProfile: {
        teamName: "Fiesta",
        imageUrl: null
      },
      thread: null, //thread received and stored
      auth: JSON.parse(this.__auth),
      messageList: [],
      isLoading: false,
      newMessagesCount: 0,
      isChatOpen: false, //
      participantsList: [],
      pagination: null,
      audio_s: new Audio('/storage/sd/sound_1.mp3'),
    };
  },
  methods: {
    reorderMessagesRequest(messages) {
      for (let index = 0; index < messages.length; index++) {
        this.messageList.unshift(messages[index]);
      }
    },
    index(thread_id, overlap = false, openChat=true) {
      this.isLoading = true;
      this.overlap = overlap;
      this.isChatOpen = openChat;
      axios.post(
          this.pagination != null && this.pagination.url != null
            ? this.pagination.url
            : "/messages/" + thread_id
        )
        .then(response => {
          if (this.overlap) {
            this.participantsList = [response.data.thread.participant];
            this.thread = response.data.thread;
          }
          this.reorderMessagesRequest(response.data.messages);
          this.pagination = response.data.pagination;
          this.isLoading = false;
        })
        .catch(err => {
          //(err);
          this.isLoading = false;
        });
    },
    onMessageSend(msg) {
      if(this.thread && this.thread.accepted =="0" && this.thread.user_id == this.auth.id)
        return false;
      if (msg.data.text.length > 0 && this.participantsList.length>0) {
            this.isLoading = true;
            axios.post('/messages/create', {
                "type":msg.type,
                "text":msg.data.text,
                "file":msg.data.file?msg.data.file:null,
                "thread_id":this.thread&&this.thread.id?this.thread.id:null,
                "post_id":this.thread&&this.thread.post?this.thread.post.id:null,
                "participant_id":this.thread&&this.thread.participant?this.thread.participant.id:this.participantsList[0]
            })
                .then(response => {
                    if(this.thread==null&&this.thread.id != response.data.thread.id || !this.thread.accepted){
                        this.thread = response.data.thread
                        this.participantsList =  [response.data.thread.participant];
                    }
                    this.messageList.push(response.data.thread.lastMessage);
                    this.isLoading = false;
                    this.playSound();
                }).catch(err => {
                //(err)
                this.isLoading = false;
            });
      }
    },
    openChat() {
      this.isChatOpen = true;
      this.newMessagesCount = 0;
    },
    closeChat() {
      this.isChatOpen = false;
    },
    loadThreadByParticipant(participant_id = 0,options={}) {
      this.isLoading = true;
      axios.post("/threads/user/" + participant_id,options)
        .then(response => {
              this.clear();
              this.thread = response.data.thread;
              this.pagination = response.data.pagination;
              this.index(this.thread.id,true);
              this.participantsList = [response.data.thread.participant];
             this.isLoading = false;
        })
        .catch(err => {
          this.isLoading = false;
          //(err);
        });
    },
    broadcaste(event) {
      //(event);
      if (this.thread == null && this.participants == null) {
        this.thread = event;
        this.messageList = [event.lastMessage];
        return true;
      } else if (this.thread.id == event.id) {
        this.messageList.push(event.lastMessage);
        return false;
      }
    },
    changeThread(thread_id) {
      if(this.thread&&this.thread.id == thread_id)
        return false;
      this.clear();
      this.index(thread_id,true);
    },
    clear() {
      this.pagination = null;
      this.messageList = [];
      this.thread = null;
      this.participantsList = [];
    },
    playSound(){
                var playPromise = this.audio_s.play();
                    playPromise.catch(() => {
                        this.audio_s.play();
                    });
            },
  },
  created() {
    if (this.__thread_id) {
      this.index(this.__thread_id,true,false);
    }
    window.broadcastedChat = this.broadcaste;
    window.loadThreadChat = this.changeThread;
    window.loadThreadByParticipantChat = this.loadThreadByParticipant;
  }
};
</script>
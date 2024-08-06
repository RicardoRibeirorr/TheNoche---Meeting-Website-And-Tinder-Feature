<template>
    <div class="sc-message-background"
        :style="participants.length==1&&participants[0].imageUrl!=null?{'background-image': 'url(' + participants[0].imageUrl + ')'}:null">
        <div class="sc-message-list" ref="scrollList" @scroll="handleScroll">

            

            
            <div v-if="thread.post != null && thread.post.content!=null && thread.post.title!= null" class="sc-message sc-message-system-diagnostic mb-3">
                <div class="sc-message--content system text-muted">
                    <div class="sc-message--system ">
                      <div class="media px-1 text-left">
                            <img class="align-self-start img-50 img-circle" :src="participants[0].imageUrl" alt="">
                            <div class="media-body ml-2">
                                <p class="mb-0 font-weight-bold">{{thread.post.title}}</p>
                                {{thread.post.content.length>40?thread.post.content.slice(0,40) + "...":thread.post.content}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else-if="messages.length>0 && showLoadButton==false && thread && (thread.accepted=='0'||thread.accepted==null)" class="sc-message sc-message-system-diagnostic px-2 mb-3">
                <div class="sc-message--content system text-muted">
                    <div class="sc-message--system">
                        {{ lang.wait_answer }}
                    </div>
                </div>
            </div>
            <div v-if="showLoadButton==true && isLoading==false" class="sc-message mb-4">
                <div class="sc-message--content system">
                    <div class="sc-message--system">
                        <button type="submit" class="btn btn-sm btn-rounded bg-dark text-light"
                            @click.prevent="onLoadSubmit">{{ lang.load_more }}</button>
                    </div>
                </div>
            </div>
            
            <div v-else-if="(messages.length>0||showLoadButton==false) && thread.accepted!='0' " class="sc-message mt-0">
                <div class="sc-message--content system text-muted">
                    <div  v-if="messages.length>0 && showLoadButton==false" class="sc-message--system">{{ lang.started }} {{thread.timestamp}}</div>
                    <div  v-else-if="showLoadButton==false" class="sc-message--system">{{ lang.start_new }}</div>
                </div>
            </div>
            <div v-if="isLoading==true" class="text-center w-100 py-2">
                <div class="spinner-border" role="status">
                    <span class="sr-only">{{ lang.loading }}</span>
                </div>
            </div>
            

            <Message v-for="(message, idx) in messages" :message="message" :user="profile(message.author)" :key="idx"
                :colors="colors" :messageStyling="messageStyling" @remove="$emit('remove', message)">
                <template v-slot:user-avatar="scopedProps">
                    <slot name="user-avatar" :user="scopedProps.user" :message="scopedProps.message">
                    </slot>
                </template>
                <template v-slot:text-message-body="scopedProps">
                    <slot name="text-message-body" :message="scopedProps.message" :messageText="scopedProps.messageText"
                        :messageColors="scopedProps.messageColors" :me="scopedProps.me">
                    </slot>
                </template>
                <template v-slot:text-message-toolbox="scopedProps">
                    <slot name="text-message-toolbox" :message="scopedProps.message" :me="scopedProps.me">
                    </slot>
                </template>
            </Message>
            <Message v-show="showTypingIndicator !== ''" :message="{author: showTypingIndicator, type: 'typing'}"
                :user="{}" :colors="colors" :messageStyling="messageStyling" />
            <div v-if="thread && thread.state==3" class="sc-message px-2 mt-3 py-3 bg-danger rounded">
                <div class="sc-message--content system text-white">
                    <div class="sc-message--system text-center">
                        {{ lang.account_close.description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Message from './Message.vue'
    import chatIcon from './assets/chat-icon.svg'

    export default {
        components: {
            Message
        },
        props: {
            thread: {
                type: Object,
                required: true
            },
            lang:{
                type:Object,
                required:true
            },
            participants: {
                type: Array,
                required: true
            },
            isLoading: {
                type: Boolean,
                required: true
            },
            messages: {
                type: Array,
                required: true
            },
            showTypingIndicator: {
                type: String,
                required: true
            },
            colors: {
                type: Object,
                required: true
            },
            showLoadButton: {
                type: Boolean,
                required: true
            },
            alwaysScrollToBottom: {
                type: Boolean,
                required: true
            },
            messageStyling: {
                type: Boolean,
                required: true
            },
            onLoadSubmit: {
                type: Function,
                required: true
            },
        },
        methods: {
            _scrollDown() {
                this.$refs.scrollList.scrollTop = this.$refs.scrollList.scrollHeight
            },
            handleScroll(e) {
                if (e.target.scrollTop === 0) {
                    this.$emit('scrollToTop')
                }
            },
            shouldScrollToBottom() {
                return this.alwaysScrollToBottom || (this.$refs.scrollList.scrollTop > this.$refs.scrollList
                    .scrollHeight - 600)
            },
            profile(author) {
                const profile = this.participants.find(profile => profile.id === author.id)

                // A profile may not be found for system messages or messages by 'me'
                return profile || {
                    imageUrl: '',
                    name: ''
                }
            }
        },
        computed: {
            defaultChatIcon() {
                return chatIcon
            }
        },
        mounted() {
            this.$nextTick(this._scrollDown())
        },
        updated() {
            if (this.shouldScrollToBottom())
                this.$nextTick(this._scrollDown())
        }
    }

</script>

<style scoped>
    .sc-message-list {
        overflow-y: auto;
        background-size: 100%;
        padding: 40px 0px;
        height: 100%;
        width: 100%;
        background-color: rgba(255, 255, 255, 0.62);
    }

    .sc-message-background {
        height: 80%;
        overflow-y: auto;
        background-size: 100%;
        background-color: #fffffffa;
        height: 80%;
        background-size: 100%;
        background-position: center;
        background-size: cover;
    }

    .sc-message-system-diagnostic{
          width: 100%;
        margin: 0;
        padding: 1rem 0;
        margin-top: -40px;
            background: #ffffff96;
    }

</style>

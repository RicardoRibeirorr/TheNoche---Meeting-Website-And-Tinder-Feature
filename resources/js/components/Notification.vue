<template>
    <div>
        <a id="notificationsDropdown" @click="index(false)" class="nav-link" href="#" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ lang.conversation }} <span v-if="notify" class="badge badge-danger badge-point"><b></b></span></a>
        <div class="dropdown-menu " aria-labelledby="notificationsDropdown">
            <div v-if="isLoading==true" class="text-center w-100 py-2">
                <div class="spinner-border" role="status">
                    <span class="sr-only">{{ lang.loading }}</span>
                </div>
            </div>
            <span v-if="isLoading==false&&threads&&threads.length<=0" class="dropdown-item disable-center py-2">{{ lang.no_notifications }}</span>

            <NotificationItem :lang="lang" v-for="(thread,i) in threads" :key="i" :auth_id="__auth_id" :data="thread.lastMessage"
                :author="thread.participant" :post_title="thread.post!=null?thread.post.title:null" :state="thread.state" :onSubmit="openChatForThread"></NotificationItem>

            <button v-if="pagination&&pagination.url!=null" @click="index(true)" class="btn w-100 pt-2">{{ lang.load_more }}</button>
        </div>
    </div>
</template>

<script>
    import NotificationItem from './components/notifications/NotificationItem'
    export default {
        components: {
            NotificationItem
        },
        props: ["__auth_id", "__numberUnread"],
        mounted() {},
        data: function () {
            return {
                lang : window['translations'].nav.conversation,
                auth_id: null,
                threads: [],
                pagination: null,
                isLoading: false,
                notify: false,
                audio_s: new Audio('/storage/sd/sound_1.mp3'),
            }
        },
        methods: {
            // get threads list paginated
            index(loadPaginate = false) {
                this.notify = false;
                if (this.pagination == null || loadPaginate == true) {
                    this.isLoading = true;
                    axios.post(loadPaginate ? this.pagination.url : '/threads')
                        .then(response => {
                            if (this.pagination)
                                this.threads = this.threads.concat(response.data.threads);
                            else
                                this.threads = response.data.threads;
                            this.pagination = response.data.pagination;
                            this.isLoading = false;
                        }).catch(err => {
                            this.isLoading = false;
                        })
                }
            },
            openChatForThread(thread_id) {
                var id = this.findByThread(thread_id);
                if (id > -1) {
                    window.loadThreadChat(thread_id);
                }
            },
            broadcast() {
                window.Echo.join("message.for." + this.__auth_id).listen('MessageNotification', (event) => {
                    //(event);
                    this.isLoading = true;
                    this.notify = window.broadcastedChat(event.event);
                    this.createOrUpdate(event.event, true);
                    this.isLoading = false;
                });
            },
            playSound() {
                var playPromise = this.audio_s.play();
                playPromise.catch(() => {
                    this.audio_s.play();
                });
            },
            createOrUpdate(thread) {
                var id = this.findByThread(thread.id);
                var th = null;
                if (id > -1)
                    th = this.threads[id] = thread;
                else
                    th = this.threads.unshift(thread);
                return th;
            },
            findByThread(id) {
                var __thread = -1;
                for (let index = 0; index < this.threads.length; index++) {
                    if (this.threads[index].id == id) {
                        __thread = index;
                        break;
                    }
                }
                return __thread;
            },
        },
        created() {
            this.broadcast();
        }
    }

</script>

<template>

    <div  class="card chat-room small-chat wide collapse active show" id="chat">
        <div class="card-header white d-flex justify-content-between p-2">
            <div class="heading d-flex justify-content-start">
                <div v-if="m_u_t!=null" class="profile-photo" :style="{'background-image': 'url(' + m_u_t.image + ')'}">
                </div>
                <div v-if="m_u_t!=null" class="data">
                    <p class="name ml-2 mb-0"><strong>{{m_u_t.name}}</strong></p>
                </div>
                <div v-if="m_u_t==null" class="spinner-border loading-spiners" style="" role="status">
            <span class="sr-only">Loading...</span>
            </div>
            </div>
            <div class="icons grey-text">
                <a v-on:click="s_c" class="feature"><i class="fas fa-arrow-left mx-4"></i></a>
                <a data-toggle="collapse" href="#chat" class="opener"><i class="fas fa-chevron-up mr-2"></i></a>
                <a data-toggle="collapse" href="#chat" class="closer"><i class="fas fa-times mr-2"></i></a>
            </div>
        </div>
        <div v-if="m_u_t==null" class="my-custom-scrollbar">
            <div class="spinner-border loading-spiners" style="" role="status">
            <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div v-if="m_u_t!=null" class="my-custom-scrollbar" id="message" :style="{'background-image': 'url(' + m_u_t.image + ')'}">
            <div class="card-body content">
                <div class="image-filter"></div>
                <div id="c_m_s" class="messages position-absolute align-top">
                    <ul class="list-unstyled">
                        <li v-if="m_l.length<=0">
                            <div class="media w-100 my-3">
                                <div class="media-body text-light font-weight-bold text-center">
                                    <p class="mb-0 ">Começe já uma conversa com {{m_u_t.name}}</p>
                                </div>
                            </div>
                        </li>
                        <li v-if="c_sys.next_page_url==null&&cv!=null">
                            <div class="media w-100 my-3">
                                <div class="media-body text-light font-weight-bold text-center">
                                    <p class="my-0">
                                        {{cv.m_u_f==u_auth_id?"Voce começou uma conversa":m_u_t.name + " começou uma conversa consigo"}}
                                    </p>
                                    <TimeFormat :timestamp="cv.timestamp"></TimeFormat>
                                </div>
                            </div>
                        </li>
                        <li v-bind:class="{ sent: m.m_u_f == u_auth_id, replies:m.m_u_f != u_auth_id}"
                            v-for="(m,index) in m_l" :key="index">
                            <p>{{m.ms}}</p>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="card-footer content">
            <div class="message-input">
                <form id="f_m_s" class="wrap" v-on:submit="f_m_s"><input type="text" placeholder="Write your message..."
                        v-model="i_m_t">
                    <div><button class="submit float-none bg-light-1 text-muted"><i aria-hidden="true"
                                class="fa fa-paperclip "></i></button> <button class="submit"><i aria-hidden="true"
                                class="fa fa-paper-plane"></i></button></div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import TimeFormat from '../TimeFormat'
    export default {
        props: ["u_auth_id", "m_u_t_contact","r_from_chat"],
        components: {
            TimeFormat
        },
        data() {
            return {
                m_l: [],
                i_m_t: '',
                m_u_t: null,
                c_sys: {},
                cv: null,
                audio_s: new Audio('/storage/sd/sound_1.mp3')
            }
        },
        created() {
            if (this.m_u_t_contact) {
                this.change_u_contact(this.m_u_t_contact);
            }
        },
        methods: {
            f_m_s(e) {
                e.preventDefault();
                axios.post("ms", {
                    _m_t: this.i_m_t,
                    _u_t: this.m_u_t.id,
                });
                this.i_m_t = "";
                var myDiv = document.getElementById("c_m_s");
                myDiv.scrollTop = myDiv.scrollHeight;
            },
            mf() {
                axios.post("mf", {
                    _u_t: this.m_u_t.id
                }).then(response => {
                    var payload = response.data;
                    if (payload.cv == null || payload.ms == null)
                        return false;
                    this.cv = payload.cv;
                    for (let index = payload.ms.data.length - 1; index >= 0; index--) {
                        this.m_l.push(payload.ms.data[index]);
                    }
                    this.c_sys = payload.ms;
                    delete this.c_sys.data;
                }).finally(function () {
                    var myDiv = document.getElementById("c_m_s");
                    myDiv.scrollTop = myDiv.scrollHeight;
                });
            },
            foc_scroll_b: function () {
                var myDiv = document.getElementById("c_m_s");
                myDiv.scrollTop = myDiv.scrollHeight;
            },
            s_c: function () {
                this.r_from_chat();
                // var m = $('#chat');
                // m.collapse("hide");
                // m.removeClass("active");
                // var c = $('#chat-contacts')
                // c.collapse("show");
                // c.addClass("active");
            },
            change_u_contact: function (c) {
                axios.get("/contact/profile/" + c)
                    .then(response => {
                        this.m_u_t = response.data
                        this.mf();
                    });
                Echo.join("chat").listen('MessageSent', (event) => {
                    //(event);
                    this.m_l.push(event.message)
                    var playPromise = this.audio_s.play();
                    playPromise.catch(() => {
                        this.audio_s.play();
                    })
                    this.foc_scroll_b();
                });
            }

        }
    }

</script>

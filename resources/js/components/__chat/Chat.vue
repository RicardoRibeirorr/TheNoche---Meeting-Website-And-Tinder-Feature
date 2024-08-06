<template>
    <div>
        <div v-if="u_i_sel==null" class="card chat-room small-chat wide collapse active show" id="chat-contacts">
            <div class="card-header white d-flex justify-content-between p-2">
                <div class="heading d-flex justify-content-start">
                    <div class="data">
                        <p class="name mb-0"><strong>Contactos</strong></p>
                    </div>
                </div>
                <div class="icons grey-text">
                    <a data-toggle="collapse" href="#chat-contacts" class="opener"><i
                            class="fas fa-chevron-up mr-2"></i></a>
                    <a data-toggle="collapse" href="#chat-contacts" class="closer"><i class="fas fa-times mr-2"></i></a>
                </div>
            </div>
            <div class="my-custom-scrollbar">
                <div class="card-body content" id="sidepanel">
                    <div id="contacts">
                        <ul class="list-unstyled">
                            <li v-if="loading_c==true" class="contact text-center">
                                <div class="spinner-border" style="" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </li>
                            <li v-if="u_l_requested==true&&u_l.length<=0" class="contact text-center">
                               <p>Ainda não tem conversas. <br> <a href="/explore">clique aqui</a> ou vá a explorar e começe uma conversa.</p>
                            </li>
                            <li class="contact" v-for="(u,index) in u_l" :key="index">
                                <a v-on:click="c_s_contact(index)">
                                    <div class="wrap"><img :src="u.u.profile.image" alt="">
                                        <div class="meta">
                                            <p class="name">{{u.u.name}}<span v-if="u.note>=0 && u.note!=null"
                                                    class="badge badge-danger">{{u.note}}</span> <br><b
                                                    class="text-muted">{{u_auth_id==parseInt(u.lm.m_u_f)?"Voçe: ":u.u.name+": "}}</b>{{u.lm.ms.length>30?u.lm.ms.slice(0,30) + "...":u.lm.ms}}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div id="bottom-bar"><button id="addcontact"><i aria-hidden="true" class="fas fa-user"></i>
                            <span>People</span></button> <button id="settings"><i aria-hidden="true"
                                class="fas fa-users"></i> <span>Groups</span></button></div>
                </div>
            </div>
        </div>
        <Message v-if="u_i_sel!=null" :u_auth_id="u_auth_id" :m_u_t_contact="u_i_sel!=null?u_l[u_i_sel].u.id:null"
            :r_from_chat="r_from_chat"></Message>
    </div>
</template>


<script>
    import Message from './chat/Message'
    export default {
        props: ["u_auth_id"],
        created() {
            this.f_contasts();
        },
        data() {
            return {
                u_l: [],
                u_i_sel: null,
                loading_c: false,
                u_l_requested:false
            }
        },
        methods: {
            f_contasts: function () {
                this.loading_c = true;
                this.u_l_requested=false
                axios.post("/cf")
                    .then(response => {
                        //(response);
                        var list = [];
                        response.data.s.forEach(el => {
                            var _temp = {
                                u: el.from,
                                lm: {
                                    ms: el.message,
                                    m_u_f: el.from_id,
                                },
                                note: null
                            }
                            list.push(_temp);
                        });
                        response.data.r.forEach(el => {
                            var _temp = {
                                u: el.to,
                                lm: {
                                    ms: el.message,
                                    m_u_f: el.to_id,
                                },
                                note: null
                            }
                            //(_temp)
                            list.push(_temp);
                        });
                        this.u_l = list;
                        this.loading_c = false;
                        this.u_l_requested = true;
                    }).catch(error =>{
                        this.loading_c = false;
                    });
            },
            c_s_contact: function (i) {
                this.u_i_sel = i;
                //(this.u_l.length)
                //(this.u_i_sel)
            },
            sm_f: function (u) {
                //(u);
                this.s_m();
            },
            s_m: function () {
                var c = $('#chat-contacts')
                c.collapse("hide");
                c.removeClass("active");
                var m = $('#chat');
                m.collapse("show");
                m.addClass("active");
            },
            r_from_chat: function () {
                this.u_i_sel = null;
                this.f_contasts();
            }
        },
        components: {
            Message
        },
    }

</script>

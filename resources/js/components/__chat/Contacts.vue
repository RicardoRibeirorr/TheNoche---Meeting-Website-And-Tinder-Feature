<template>
    <div class="card chat-room small-chat wide collapse active" id="chat-contacts">
        <div class="card-header white d-flex justify-content-between p-2">
            <div class="heading d-flex justify-content-start">
                <div class="data">
                    <p class="name mb-0"><strong>Contactos</strong></p>
                </div>
            </div>
            <div class="icons grey-text">
                <a data-toggle="collapse" href="#chat-contacts" class="opener"><i class="fas fa-chevron-up mr-2"></i></a>
                <a data-toggle="collapse" href="#chat-contacts" class="closer"><i class="fas fa-times mr-2"></i></a>
            </div>
        </div>
        <div class="my-custom-scrollbar">
            <div class="card-body content" id="sidepanel">
                <div id="contacts">
                    <ul class="list-unstyled">
                        <li class="contact">
                            <a v-on:click="sm_f(1)">
                                <div class="wrap"><img src="http://emilcarlsson.se/assets/louislitt.png" alt="">
                                    <div class="meta">
                                        <p class="name">Louis Litt <span class="badge badge-danger">+9</span></p>
                                        <p class="preview">You just got LITT up, Mike.</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="contact">
                            <div class="wrap"><img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="">
                                <div class="meta">
                                    <p class="name">Harvey Specter</p>
                                    <p class="preview">Wrong. You take the gun, or you pull out a bigger one. Or,
                                        you call their
                                        bluff. Or, you do any one of a hundred and forty six other things.</p>
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="wrap"><img src="http://emilcarlsson.se/assets/rachelzane.png" alt="">
                                <div class="meta">
                                    <p class="name">Rachel Zane</p>
                                    <p class="preview">I was thinking that we could have chicken tonight, sounds
                                        good?</p>
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="wrap"><img src="http://emilcarlsson.se/assets/donnapaulsen.png" alt="">
                                <div class="meta">
                                    <p class="name">Donna Paulsen</p>
                                    <p class="preview">Mike, I know everything! I'm Donna..</p>
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="wrap"><img src="http://emilcarlsson.se/assets/jessicapearson.png" alt="">
                                <div class="meta">
                                    <p class="name">Jessica Pearson</p>
                                    <p class="preview">Have you finished the draft on the Hinsenburg deal?</p>
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="wrap"><img src="http://emilcarlsson.se/assets/haroldgunderson.png" alt="">
                                <div class="meta">
                                    <p class="name">Harold Gunderson</p>
                                    <p class="preview">Thanks Mike! :)</p>
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="wrap"><img src="http://emilcarlsson.se/assets/danielhardman.png" alt="">
                                <div class="meta">
                                    <p class="name">Daniel Hardman</p>
                                    <p class="preview">We'll meet again, Mike. Tell Jessica I said 'Hi'.</p>
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="wrap"><img src="http://emilcarlsson.se/assets/katrinabennett.png" alt="">
                                <div class="meta">
                                    <p class="name">Katrina Bennett</p>
                                    <p class="preview">I've sent you the files for the Garrett trial.</p>
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="wrap"><img src="http://emilcarlsson.se/assets/charlesforstman.png" alt="">
                                <div class="meta">
                                    <p class="name">Charles Forstman</p>
                                    <p class="preview">Mike, this isn't over.</p>
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="wrap"><img src="http://emilcarlsson.se/assets/jonathansidwell.png" alt="">
                                <div class="meta">
                                    <p class="name">Jonathan Sidwell</p>
                                    <p class="preview"><span>You:</span> That's bullshit. This deal is solid.</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="bottom-bar"><button id="addcontact"><i aria-hidden="true" class="fas fa-user"></i>
                        <span>People</span></button> <button id="settings"><i aria-hidden="true"
                            class="fas fa-users"></i> <span>Groups</span></button></div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        mounted() {
            //('Component mounted.')
        },
        methods:{
            sm_f: function(u){
                //(u);
                this.s_m();
            },
            s_m:function(){
                r_from_chat();
                var c = $('#chat-contacts')
                c.collapse("hide");
                c.removeClass("active");
                var m = $('#chat');
                m.collapse("show");
                m.addClass("active");
                },
        }
    }
</script>

<template>
    <div>
        <div id="lne-m" class="modal modal-dark autentification-modal fade" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header pb-0">
                        <h5 class="modal-title font-family-pacific text-red text-center w-100 font-25px">Iniciar Conta
                        </h5>
                        <button class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pt-0">
                        <div class="row">
                            <div class="col-10 offset-1 mb-3 ">
                                <p class="text-center text-light-1">Introduza o seu email, se ainda não tiver
                                    conta, o sistema direcionará para a pagina de registo.</p>
                            </div>
                            <div class="col-10 offset-1 d-none" v-bind:class="{ 'd-block': status==false}">
                                <p class="text-center text-light"><b class="text-red">* </b><span
                                        v-text="msg"></span></p>
                            </div>
                            <div class="col-8 offset-2 ">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Email</span>
                                    </div>
                                    <input class="form-control" type="email" name="ln" id="id-ln"
                                        placeholder="exemplo@email.com" aria-label="Email">
                                </div>
                            </div>
                            <div class="col-8 offset-2 text-left mt-2">
                                <a href="#" class="text-muted">Ainda não tem conta?</a>
                            </div>
                            <div class="col-12 text-right mt-2">
                                <button class="btn btn-sm btn-red btn-rounded border-red font-14px"
                                    @click="lnf()">Seguinte</button>
                            </div>
                        </div>
                    </div>
                    <div class="loading " v-bind:class="{ 'show': waiting==true}">
                        <div class="loader"></div>
                    </div>
                </div>
            </div>
        </div>


        <div id="lns-m" class="modal modal-dark autentification-modal fade" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header pb-0">
                        <h5 class="modal-title font-family-pacific text-red text-center w-100 font-25px">Iniciar Conta
                        </h5>
                        <button class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pt-0">
                        <div class="row">
                            <div class="col-8 offset-2 my-31">
                                <button @click="toggleToLogin()" type="button" class="btn btn-link text-left text-light-1"><i
                                        class="fas fa-arrow-left pr-2"></i>
                                    <u v-text="email"></u></button>
                            </div>
                        </div>
                        <slot/>
                        
                    </div>
                    <div class="loading">
                        <div class="loader"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["lang"],
        mounted() {
            //('Component mounted.')
        },
        data: function () {
            return {
                status: null,
                email: "",
                msg:"",
                waiting: false,

            }
        },
        render() {
        return this.$slots.default
        },
        methods: {
            lnf() {
                //(this.lang);
                if(this.checkEmail()==false) return false;
                var self = this;
                axios.post("/lnc", {
                        'lne': this.email
                    })
                    .then(response => {
                        if (response.data.st == true) {
                            document.getElementById("lne-i").value = response.data.em;
                            self.toggleToRegist();
                            self.empty();
                        } else {
                            self.setMessage(false,"Email não existe");
                        }
                            self.setWaiting(false);
                    })
                    .catch(errors => {
                        this.waiting = false;
                        //(errors);
                    })

            },
            setMessage(){

            },
            toggleToRegist() {
                $('#lne-m').modal('toggle');
                $('#lns-m').modal('toggle');
            },
            toggleToLogin() {
                this.email = "";
                $('#lne-m').modal('toggle');
                $('#lns-m').modal('toggle');
            },
            checkEmail(){
                var email = document.getElementById("id-ln").value;
                if (email == "" || this.email == email ||
                    email.indexOf("@") < 0 || email.indexOf(".") < 0) {
                    this.setMessage(false,this.lang);
                    return false;
                }
                this.setWaiting(true);
                this.setEmail(email);
                return true;
            },
            setEmail(email){
                this.email = email;
            },
            setWaiting(waiting){
                this.waiting = waiting;
            },
            setStatus(state){
                this.status = state;
            },
            setMessage(state,message){
                this.status = state;
                this.msg = message;
            },
            empty(){
                this.status = null;
                this.waiting = false;
                this.msg = "";

            }
        },
    }

</script>

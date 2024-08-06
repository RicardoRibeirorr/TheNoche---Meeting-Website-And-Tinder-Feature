<template>
    <div class="col-sm-12 profile-item zoom">
        <div class="img-container">
            <img v-if="profile" :src="profile.image" class="img-200">
            <div class="options-container text-center mt-3 mb-2">
                <button @click="load(false)" class="btn btn-lg btn-circle btn-dark animation-hover-shake mr-5"><i
                        class="fas fa-heart-broken"></i></button>
                <button @click="load(true)" class="btn btn-lg btn-circle btn-danger animation-hover-shake"><i
                        class="fas fa-heart"></i></button>
            </div>
        </div>
        <div class="info-container">
            asdsad
            <h2 v-if="profile">{{profile.name}}</h2>
            <h4 v-if="profile">{{profile.description}}</h4>
        </div>
    </div>
</template>

<script>
export default {
    props:[
        "auth_id"
    ],
    data: function () {
            return {
            profile:null,
            pagination:null
        };
    },
    methods:{
        onSubmit (event){
            axios.post("/shuffle/answer",{
                user_id:this.profile.id,
                aw:event})
                        .then(response => {
                            // this.profile = response.data.profile;
                        }).catch(err => {
                            this.load();
                    })
            this.load();
        },
        load(){
            axios.post(this.pagination?this.pagination:"/shuffle")
                        .then(response => {
                            this.profile = response.data.data[0];
                            this.pagination = response.data.next_page_url;
                            //(this.profile);
                        }).catch(err => {
                            //(err);
                            this.load();
                    })
        }
    },
    created() {
            this.load();
    }
}
</script>

<template>
    <a class="dropdown-item" href="#" @click="onSubmit(data.thread_id)">
       <div class="media nt--item">
            <!-- Message type -->
           <div class="nt--img--wrapper">
                <img :src="author.imageUrl" alt="" >
           </div>
           <div class="media-body">
                <p v-if="state!=3">{{titleName()}}</p>
                <p v-else class="text-muted text-line-through">{{lang.account_close.title}}</p>
                <small>{{this.data.data.text.length>30?this.data.data.text.slice(0,30) + "...":this.data.data.text}}</small>
           </div>
       </div>
    </a>
</template>

<script>
    export default {
        props: ["auth_id","data","onSubmit","author","lang","post_title","state"],
        methods:{
            titleName(){
                console.log(this.post_title);
                if(this.post_title !=null)
                    return this.post_title.length>30?this.post_title.slice(0,30) + "..." : this.post_title;
                else
                    return this.author.name
            }
        }
    }


</script>

<style>
.media.nt--item .nt--img--wrapper{
    width: 35px;
    height: 35px;
    border-style: none;
    margin-right: .5rem;
}
.media.nt--item .nt--img--wrapper img{
    height:100%;
    width:auto;
    object-fit: cover;
    vertical-align: middle;
    box-shadow: 0px 0px 8px 1px rgba(0, 0, 0, 0.27);

    border-radius: 50%;
}
.media.nt--item .media-body p{
    line-height: 1;
    margin:0;
    font-weight:600;
}
.media.nt--item .media-body small{
    color: #6c757d !important;
}
</style>
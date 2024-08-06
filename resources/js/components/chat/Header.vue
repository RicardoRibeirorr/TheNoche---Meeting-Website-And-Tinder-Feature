<template>
  <div class="sc-header" :style="{background: colors.header.bg, color: colors.header.text}">
    <slot>
      <div class="sc-header--wrapper--img">
        <img class="sc-header--img" :src="participants[0].imageUrl" alt="" v-if="participants[0].imageUrl && participants.length<=1" />
        <svg class="sc-header--img" v-if="participants.length>1">
              <circle cx="125" cy="125" r="100" fill="#aeaeae" />
              <text data-v-969cbbd6="" x="50%" y="50%" text-anchor="middle" fill="red" font-size="" font-family="Arial" dy=".3em" font-weight="bold">{{participants.length>9?"+9":participants.length}}</text>
        </svg>
      </div>
      <div v-if="!disableUserListToggle" class="sc-header--title enabled" @click="toggleUserList"> {{title}} </div>
      <div v-else class="sc-header--title"> {{title}} </div>
    </slot>
      <div class="sc-header--close-button" @click="onClose">
        <img :src="icons.close.img" :alt="icons.close.name" />
      </div>
  </div>
</template>
<script>

import CloseIcon from './assets/close-icon-big.png'

export default {
  props: {
    participants: {
      type: Array,
      required: true
    },
    icons:{
      type: Object,
      default: function () {
        return {
          close:{
            img: CloseIcon,
            name: 'default',
          },
        }
      }
    },
    lang:{
      type:Object,
      required:true
    },
    imageUrl: {
      type: String,
      required: true
    },
    title: {
      type: String
    },
    onClose: {
      type: Function,
      required: true
    },
    colors: {
      type: Object,
      required: true
    },
    disableUserListToggle: {
      type: Boolean,
      default: false
    }
  },
  methods: {
    toggleUserList() {
      this.inUserList = !this.inUserList
      this.$emit("userList", this.inUserList)
    },
  },
  data() {
    return {
      inUserList: false
    }
  },
  mounted(){
    // //(this.participants)
  }
}
</script>
<style scoped>
.sc-header {
  min-height: 75px;
  border-top-left-radius: 9px;
  border-top-right-radius: 9px;
  padding: 10px;
  box-shadow: 0 1px 4px rgba(0,0,0,.2);
  position: relative;
  box-sizing: border-box;
  display: flex;
}

.sc-header--wrapper--img {
  border-radius: 50%;
  align-self: center;
  height:40px;
  width:40px;
  text-align:center;
  overflow:hidden;
  position:relative;
  box-shadow: 0px 0px 8px 1px rgba(0, 0, 0, 0.27);
}
.sc-header--img {
  height:100%;
  position:absolute;
  max-height:40px;
    vertical-align: middle;
    border-style: none;
    
    left:0;
    top:0;
}
svg.sc-header--img {
    width: 100%;
    background-color: whitesmoke;
    position:relative;
}

.sc-header--title {
  align-self: center;
  padding: 10px;
  flex: 1;
  user-select: none;
  font-size: 20px;
}

.sc-header--title.enabled {
  cursor: pointer;
  border-radius: 5px;
}

.sc-header--title.enabled:hover {
  box-shadow: 0px 2px 5px rgba(0.2, 0.2, 0.5, .1);
}

.sc-header--close-button {
  width: 40px;
  align-self: center;
  height: 40px;
  margin-right: 10px;
  box-sizing: border-box;
  cursor: pointer;
  border-radius: 5px;
  margin-left: auto;
}

.sc-header--close-button:hover {
  box-shadow: 0px 2px 5px rgba(0.2, 0.2, 0.5, .1);
}

.sc-header--close-button img {
  width: 100%;
  height: 100%;
  padding: 13px;
  box-sizing: border-box;
}

@media (max-width: 450px) {
  .sc-header {
    border-radius: 0px;
  }
}
</style>

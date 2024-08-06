/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');
require('./bootstrap');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('chat_message', require('./components/chat/Message.vue').default);
// Vue.component('chat_contacts', require('./components/chat/Contacts.vue').default);
Vue.component('chat', require('./components/Chat.vue').default);
Vue.component('notification', require('./components/Notification.vue').default);
Vue.component('time_format', require('./components/TimeFormat.vue').default);
Vue.component('shuffle-profile', require('./components/Shuffle.vue').default);
Vue.component('beautiful-chat', require('./components/chat/Launcher.vue').default);
Vue.component('Ads', require('./components/ads.vue').default);

// window.a111 = document.documentElement.lang;
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

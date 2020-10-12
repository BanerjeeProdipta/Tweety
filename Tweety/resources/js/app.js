const { method } = require('lodash');

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue';
import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-default.css';
Vue.use(VueToast);
let instance = Vue.$toast.open('You did it!');
instance.close();
Vue.$toast.clear();

Vue.component('tweet-component', require('./components/TweetComponent.vue').default);

const app = new Vue({
    el: '#app',
    data: {
        isVisible: false
    }
});
require('./bootstrap');

import Vue from 'vue'

//Components
Vue.component('test', () => import('./test.vue'));

const app = new Vue({
    el: '#app'
});

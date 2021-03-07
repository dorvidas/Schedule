require('./bootstrap');

import 'es6-promise/auto';
import Vue from 'vue';
import store from './store';

//Components
Vue.component('scheduler', () => import('./components/scheduler/scheduler'));

const app = new Vue({
    el: '#app',
    store
});

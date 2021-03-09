require('./bootstrap');

import 'es6-promise/auto';
import Vue from 'vue';
import store from './store';

//Components
Vue.component('scheduler', () => import('./components/scheduler/scheduler'));
Vue.component('modal', () => import('./components/utilities/modal'));
Vue.component('schedule-creation-form', () => import('./components/schedule-creation-form/schedule-creation-form'));

const app = new Vue({
    el: '#app',
    store
});

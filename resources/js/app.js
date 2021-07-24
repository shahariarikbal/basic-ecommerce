
require('./bootstrap');

window.Vue = require('vue');

import Home from './components/Header'
//vue-router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

//support vuex
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from "./store/index"

const store = new Vuex.Store(
    storeData
)

// Vue.component('top-bar', require('./components/Header.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));


import {routes} from './routes';
const router = new VueRouter({
    routes,
    mode: 'history',
});

const app = new Vue({
    el: '#app',
    router,
    store,
    render: h => h(Home),
});

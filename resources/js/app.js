/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import Vuex from 'vuex';
import Vuetify from 'vuetify';

Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(Vuetify,{
    theme: {
        primary: '#ff0000',
        success: '#00ff00'
    }
});


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('navbar-component',require('./components/NavbarComponent.vue').default);
Vue.component('sidebar-component',require('./components/SidebarComponent.vue').default);
Vue.component('open-turn-component',require('./components/OpenTurnComponent.vue').default);
Vue.component('sales-component',require("./components/SalesComponent.vue").default);
Vue.component('to-declare-component',require('./components/ToDeclareComponent.vue').default);
Vue.component('close-turn-component',require('./components/CloseTurnComponent.vue'))

import StoreData from './store';
import OpenTurn from './components/OpenTurnComponent';
import Example from './components/ExampleComponent';
import Sales from './components/SalesComponent';
import ToDeclare from './components/ToDeclareComponent';
import CloseTurn from './components/CloseTurnComponent';
import Axios from 'axios';

//Routes for router-view
const routes = [
    {path: '/abrirTurno', name: 'openTurn', component: OpenTurn},
    {path: '/venta', name: 'sales', component: Sales},
    {path: '/a_declarar', name: 'to_declare', component: ToDeclare},
    {path: '/cerrarTurno', name: 'closeTurn', component: CloseTurn}
]

const router = new VueRouter({
    routes
}); 

const store = new Vuex.Store(StoreData);


Axios.defaults.timeout = 3000
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    el: '#app',
    router,
    store
});

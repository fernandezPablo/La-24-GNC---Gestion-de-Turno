/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';

Vue.use(VueRouter);

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
Vue.component('to-declare-component',require("./components/ToDeclareComponent.vue").default);

import OpenTurn from './components/OpenTurnComponent';
import Example from './components/ExampleComponent';
import Sales from './components/SalesComponent';
import ToDeclare from './components/ToDeclareComponent';

const routes = [
    {path: '/abrirTurno', name: 'openTurn', component: OpenTurn},
    {path: '/venta', name: 'venta', component: Sales},
    {path: '/a_declarar', name: 'a_declarar', component: ToDeclare},
]

const router = new VueRouter({
    routes
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    el: '#app',
    router
});

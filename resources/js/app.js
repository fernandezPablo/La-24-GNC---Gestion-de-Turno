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
        dark: true
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
Vue.component('close-turn-component',require('./components/CloseTurnComponent.vue').default);
Vue.component('result-turn-component',require("./components/ResultTurnComponent.vue").default);
Vue.component('gnc-table-component',require('./components/GncTableComponent.vue').default);
Vue.component('oil-table-component',require('./components/OilTableComponent.vue').default);
Vue.component('various-table-component',require('./components/VariousTableComponent.vue').default);
Vue.component('totals-table-component',require('./components/TotalsTableComponent.vue').default);
Vue.component('to-declare-table-component',require('./components/ToDeclareTableComponent.vue').default);
Vue.component('abm-products',require('./components/ABMProductsComponent.vue').default);

import StoreData from './store';
import OpenTurn from './components/OpenTurnComponent';
import Example from './components/ExampleComponent';
import Sales from './components/SalesComponent';
import ToDeclare from './components/ToDeclareComponent';
import CloseTurn from './components/CloseTurnComponent';
import ResultTurn from './components/ResultTurnComponent';
import GncTable from './components/GncTableComponent';
import OilTable from './components/OilTableComponent';
import VariousTable from './components/VariousTableComponent';
import TotalsTable from './components/TotalsTableComponent';
import ToDeclareTable from './components/ToDeclareTableComponent';
import AbmProducts from './components/ABMProductsComponent';
import Axios from 'axios';

//Routes for router-view
const routes = [
    {path: '/abrirTurno', name: 'openTurn', component: OpenTurn, props: true},
    {path: '/venta', name: 'sales', component: Sales, props: true},
    {path: '/a_declarar', name: 'to_declare', component: ToDeclare, props: true},
    {path: '/cerrarTurno', name: 'closeTurn', component: CloseTurn, props: true},
    {path: '/abmProductos', name: 'abmProducts', component: AbmProducts, props: true},
    {path: '/consultarTurno', name: 'checkTurn', component: Example, props: true},
    {path: '/resultTurn', name: 'resultTurn', component: ResultTurn, props: true},
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

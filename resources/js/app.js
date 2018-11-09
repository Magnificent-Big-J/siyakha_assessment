
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import swal from 'sweetalert2'
window.swal =swal
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const toast= swal.mixin({
    toast:true,
    position:'top-end',
    showConfirmButton:false,
    timer:3000
})

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('app-management', require('./components/CurrencyManagent.vue'));
Vue.component('app-currency-list', require('./components/CurrencyList.vue'));
Vue.component('app-manage-orders', require('./components/ManageOrders.vue'));

const app = new Vue({
    el: '#app'
});


require('./bootstrap');

window.Vue = require('vue');

Vue.component('v-articulos', require('./components/articulos.vue').default);
Vue.component('v-agrupar', require('./components/agrupar.vue').default);

import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)

 
const app = new Vue({
    el: '#app',
});

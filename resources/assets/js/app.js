require('./bootstrap');
window.Vue = require('vue');
import BootstrapVue from 'bootstrap-vue';

Vue.component('despesas', require('./components/Despesas.vue'));

Vue.use(BootstrapVue);

const app = new Vue({
    el: '#app'
});

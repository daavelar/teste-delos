require('./bootstrap');
window.Vue = require('vue');

Vue.component('despesas', require('./components/Despesas.vue'));

const app = new Vue({
    el: '#app'
});

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import VueSocketio from 'vue-socket.io';
import socketio from 'socket.io-client';
window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
 window.Vue.prototype.$socket = socketio.connect('https://peekvideochat.com:22000');
 // window.Vue.use(VueSocketio,socketio('https://peekvideochat.com:22000'));
 Vue.use(new VueSocketio({
     debug: true,
     connection: 'https://peekvideochat.com:22000',
 }))
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('history-component', require('./components/HistoryComponent.vue').default);
Vue.component('demo-component', require('./components/DemoComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

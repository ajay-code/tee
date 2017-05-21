
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/* Vuejs Configration */
// Vue.config.debug = false;
// Vue.config.silent = true;

Vue.component('chat', require('./components/messanger/chat.vue'));
Vue.component('message-left', require('./components/messanger/messageLeft.vue'));
Vue.component('message-right', require('./components/messanger/messageRight.vue'));
Vue.component('message-form', require('./components/messanger/form.vue'));

const app = new Vue({
    el: '#app'
});

require('cropperjs');
require('./app/uploadImage');
require('./app/acceptterms');
require('./app/maps/init');

$(()=>{
	setInterval(()=>{
		axios.get('/settings/updatelastactivity');
	},10000)
})


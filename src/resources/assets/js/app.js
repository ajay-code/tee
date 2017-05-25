
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
Vue.component('message-form', require('./components/messanger/form.vue'));
Vue.component('posts', require('./components/posts/Posts.vue'));
Vue.component('posts-url', require('./components/posts/PostsUrl.vue'));
Vue.component('post-form', require('./components/posts/Form.vue'));
Vue.component('post', require('./components/posts/Post.vue'));
Vue.component('comments', require('./components/comments/Comments.vue'));
Vue.component('comment', require('./components/comments/Comment.vue'));
Vue.component('comment-form', require('./components/comments/Form.vue'));


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


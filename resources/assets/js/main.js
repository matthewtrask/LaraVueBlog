var Vue = require('vue');
var VueRouter = require('vue-router');

Vue.use(VueRouter);


var router = new VueRouter();
router.map({
    '/posts': {
        component: require('./components/Posts.vue')
    },
    '/posts/:postId': {
        component: require('./components/Post.vue')
    }
});


var App = Vue.extend({});


router.start(App, '#app');

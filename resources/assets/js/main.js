
var Vue = require('vue');
var VueRouter = require('vue-router');

Vue.use(VueRouter);

import PostList from './components/Posts.vue';
import BlogPost from './components/Post.vue';


var Blog = Vue.extend({
    route: {
        data: function (transition) {
            this.$children[0].fetchPosts();
            transition.next()
        }
    },
    components: {PostList: PostList},
    template: '<post-list></post-list>'
});
var Post = Vue.extend({
    route: {
        data: function (transition) {
            this.$children[0].fetchPost();
            transition.next()
        }
    },
    components: {BlogPost: BlogPost},
    template: '<blog-post ></blog-post>'
});

var router = new VueRouter();
router.map({
    '/posts': {
        component: Blog
    },
    '/posts/:postId': {
        name: 'post',
        component: Post
    }
});


var App = Vue.extend({});


router.start(App, '#app');

import PostList from './components/Posts.vue';
import BlogPost from './components/Post.vue';

var Vue = require('vue');
var VueRouter = require('vue-router');

Vue.use(VueRouter);

var Foo = Vue.extend({
    template: '<p>This is foo!</p>'
});

var Bar = Vue.extend({
    template: '<p>This is bar!</p>'
});


var Blog = Vue.extend({
    components: {PostList: PostList},
    template: '<post-list></post-list>'
});
var Post = Vue.extend({
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
    },
    '/bar': {
        component: Bar
    }
});


var App = Vue.extend({});


router.start(App, '#app');

<template>
    <div class="post-list">
        <article class="post"
                 v-for="post in posts"
        >
            <h1 class="title"><a v-link="{  path:'/posts/'  + post.id  }">{{ post.title }}</a></h1>
            <div class="entry-content">
                <p>{{ post.content }}</p>
            </div>
            <div class="meta">
                <span class="date">发布时间：<time>{{ (new Date(post.published_at.date)).toDateString() }}</time></span>
                <span class="comment">评论：<a href="#">20</a></span>
            </div>
            <p><a v-link="{  path:'/posts/'  + post.id  }" class="more-link" aria-label="Next page">继续阅读</a></p>
        </article>
        <ul class="pagination text-center" role="navigation" aria-label="Pagination" v-show="posts">
            <li class="pagination-previous" v-show="prev_page_id">
                <a v-link="{path:'/posts?pn=' + prev_page_id}" aria-label="Previous page">Previous</a>
            </li>
            <li class="pagination-next" v-show="next_page_id">
                <a v-link="{path:'/posts?pn=' + next_page_id}" aria-label="Next page">Next</a>
            </li>
        </ul>
    </div>
</template>

<style>

</style>

<script>
    export default{
        route: {
            data: function (transition) {
                this.fetchPosts();
                transition.next()
            }
        },
        data: function () {
            return {
                posts: [],
                paginator: []
            }
        },
        computed: {
            prev_page_id: function () {
                if (this.paginator.current_page > 1) {
                    return this.paginator.current_page - 1;
                } else {
                    return null;
                }
            },
            next_page_id: function () {
                if (this.paginator.current_page < this.paginator.total_pages) {
                    return this.paginator.current_page + 1;
                } else {
                    return null;
                }
            }
        },
        methods: {
            fetchPosts: function () {
                var vm = this;
                $.getJSON('api/posts?limit=3&page=' + vm.$route.query.pn, function (respond) {
                    vm.posts = respond['data'];
                    vm.paginator = respond['paginator'];
                });
            }
        }
    }
</script>
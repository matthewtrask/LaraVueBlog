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
                <span class="date">发布时间：<time>{{ post.published_at }}</time></span>
                <span class="comment">评论：<a href="#">20</a></span>
            </div>
            <p><a v-link="{  path:'/posts/'  + post.id  }" class="more-link">继续阅读 »</a></p>
        </article>
        <ul class="pagination text-center" role="navigation" aria-label="Pagination">
            <li class="pagination-previous disabled">Previous</li>
            <li class="current"><span class="show-for-sr">You're on page</span> 1</li>
            <li><a href="#" aria-label="Page 2">2</a></li>
            <li><a href="#" aria-label="Page 3">3</a></li>
            <li class="ellipsis"></li>
            <li><a href="#" aria-label="Page 6">6</a></li>
            <li><a href="#" aria-label="Page 7">7</a></li>
            <li class="pagination-next"><a href="#" aria-label="Next page">Next</a></li>
        </ul>
    </div>
</template>

<style>

</style>

<script>
    export default{
        data: function () {
            return {
                posts: []
            }
        },
        created: function () {
            var vm = this;
            $.getJSON('api/posts', function (data) {
                vm.posts = data;
            });
        }

    }
</script>
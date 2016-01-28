<template>
    <article class="post">
        <h1 class="title">{{ post.title }}</h1>

        <div class="entry-content">
            <p>{{ post.content }}</p>
        </div>
        <div class="meta">
            <span class="date">发布于<time>{{ }}</time>，最后修改于<time>{{(new Date(post.updated_at.date)).toDateString()}}
            </time></span>
        </div>
    </article>
    <section class="comments">
        <!--To Do, comment section-->
    </section>
</template>

<style>

</style>

<script>
    export default{

        data: function () {
            return {
                post: ''
            }
        },
        methods: {
            fetchPost: function () {
                var vm = this;
                $.getJSON('api/posts/' + vm.$route.params.postId, function (respond) {
                    vm.post = respond['data'];
                });
            }
        }

    }
</script>
<template>
    <article class="post">
        <h1 class="title">{{ post.title }}</h1>
        <div class="meta">
            <span class="date">发布时间：<time>{{ post.published_at }}</time></span>
        </div>
        <div class="entry-content">
            <p>{{ post.content }}</p>
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
        created: function () {
            var vm = this;
            $.getJSON('api/posts/' + vm.$route.params.postId, function (data) {
                vm.post = data;
                console.log(vm.$route.params);
            });
        }

    }
</script>
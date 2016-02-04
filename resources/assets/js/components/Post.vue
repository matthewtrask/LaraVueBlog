<template>
    <article class="post">
        <h1 class="title">{{ post.title }}</h1>

        <div class="entry-content">
            <p>{{ post.content }}</p>
        </div>
        <div class="meta">
            <span class="date">发布于<time>{{(new Date(post.published_at.date)).toDateString()}}</time>，
                最后修改于<time>{{(new Date(post.updated_at.date)).toDateString()}}
                </time></span>
        </div>
    </article>
    <div>
        <li class="pagination-previous">
            <a v-link="{path:'/posts/' + (post.id - 1)}" aria-label="Previous page">Previous</a>
        </li>
        <li class="pagination-next">
            <a v-link="{path:'/posts/' + (post.id+1)}" aria-label="Next page">Next</a>
        </li>
    </div>
    <section class="comments">
        <div id="disqus_thread"></div>
    </section>
</template>

<style lang="sass">

</style>

<script>
    export default{
        route: {
            active: function () {
            },
            data: function (transition) {
                this.fetchPost();
                this.prepare_disqus();
                this.reset_disqus(this.post.id, this.post.title);
                transition.next()
            }
        },
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
            },
            prepare_disqus: function () {
                /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                var disqus_shortname = 'lyz1990';
                var disqus_identifier = this.post.id;
                var disqus_url = 'http://lyz1990.com/#!/posts/' + disqus_identifier;
                var disqus_config = function () {
                    this.language = "en";
                };
                /* * * DON'T EDIT BELOW THIS LINE * * */
                (function () {
                    var dsq = document.createElement('script');
                    dsq.type = 'text/javascript';
                    dsq.async = true;
                    dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
                    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                })();
            },
            reset_disqus: function (post_id, post_title) {
                if (typeof DISQUS != "undefined") {
                    DISQUS.reset({
                        reload: true,
                        config: function () {
                            this.page.identifier = post_id;
                            this.page.url = 'http://www.lyz1990.com/#!/posts/' + post_id;
                            this.page.title = post_title;
                            this.language = 'en';
                        }
                    });
                }
            }
        }

    }
</script>
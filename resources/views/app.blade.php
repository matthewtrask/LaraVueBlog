<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>LaraVueblog</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/icons/foundation-icons.css">
</head>
<body id="app">

<div class="off-canvas-wrapper">
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
       @include('partials.sidebar')
        <div class="off-canvas-content" data-off-canvas-content>
            <div class="title-bar hide-for-large">
                <div class="title-bar-left">
                    <button class="menu-icon" type="button" data-open="my-info"></button>
                    <span class="title-bar-title">远走正飞</span>
                </div>
            </div>

            <div class="row small-up-2 medium-up-3 large-up-4 main-page">

                <router-view>

                </router-view>

                <footer>
                    <div class="copy-right">
                    </div>
                </footer>
            </div>


        </div>
    </div>
</div>

<script src="/js/all.js"></script>
<script src="/js/main.js"></script>
</body>
</html>

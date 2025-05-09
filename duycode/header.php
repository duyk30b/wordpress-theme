<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css?ver=<?php echo filemtime(get_stylesheet_directory() . '/style.css'); ?>" />
    <link rel="icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico">

    <meta property="fb:app_id" content="1830203077209016" />
    <meta property="fb:admins" content="100002746880234" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-javascript.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-typescript.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-css.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-html.min.js"></script>
<style>
  pre[class*=language-] {
    padding: 0 1em 1em 1em;
    margin: 0;
    overflow: auto;
  }
</style>
</head>

<body>
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7&appId=1830203077209016";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <header id="header">
        <div class="header-banner">
            <img src="<?php bloginfo('template_directory'); ?>/images/banner.jpg" alt="<?php bloginfo('name'); ?>">
        </div>

        <div class="header-menu">
            <div class="container">
                <ul>
                    <li>
                        <a href="<?php bloginfo('siteurl'); ?>">Home</a>
                        <ul class="children">
                            <li class="cat-item">
                                <a class="topleft" href="<?php bloginfo('siteurl'); ?>/wp-admin" target="_blank" title="Admin"> Login </a>
                            </li>
                            <li class="cat-item">
                                <a href="<?php bloginfo('template_directory'); ?>/tools/monaco-html.html" target="_blank" title="Monaco HTML"> Monaco HTML </a>
                            </li>
                            <li class="cat-item">
                                <a href="<?php bloginfo('template_directory'); ?>/tools/monaco-javascript.html" target="_blank" title="Monaco Javascript"> Monaco Javascript </a>
                            </li>
                            <li class="cat-item">
                                <a href="<?php bloginfo('template_directory'); ?>/tools/monaco-typescript.html" target="_blank" title="Monaco Typescript"> Monaco Typescript </a>
                            </li>
                            <li class="cat-item">
                                <a href="<?php bloginfo('template_directory'); ?>/tools/WYSIWYGeditor1.0.html" target="_blank" title="WYSIWYGeditor1.0"> WYSIWYGeditor </a>
                            </li>
                        </ul>
                    </li>
                    <?php wp_list_categories('title_li=&depth=4&orderby=title&hide_empty=0'); ?>
                    <form id="searchform" method="get" action="<?php bloginfo('home'); ?>">
                        <input class="search-input" name="s" id="s" type="text" placeholder="Type to search..." />
                        <input class="search-submit" type="submit" value="Search" />
                    </form>
                </ul>
            </div>
        </div>
        <div class="breakcrumb">
            <div class="container">
                <p class="breakcrumb-content">
                    <a href="<?php bloginfo('siteurl'); ?>" rel="bookmark"> HOME </a>
                    <?php
                    $cat_id = get_queried_object_id();
                    if ($cat_id == 0) { // nếu bằng 0 thì nó là trang chủ
                        echo "";
                    } elseif (!empty(get_cat_name(get_queried_object_id()))) { // nếu có tên thì nó là category
                        echo get_category_parents($cat_id, true, '');
                    } else { // còn lại thì nó là bài viết
                        echo get_category_parents(get_the_category()[0]->cat_ID, true, '');
                    }
                    ?>
                </p>
            </div>
        </div>

    </header>
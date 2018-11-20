<?php
if(isset($_GET['category']) AND !empty($_GET['category'])) {
    $categories = \App\App::getInstance()->getTable('category')->all();
    $latestPost = \App\App::getInstance()->getTable('post')->latest(4);
    $posts = \App\App::getInstance()->getTable('post')->getByCategory($_GET['category'], 2);
//    var_dump($posts);die();
} else {
    header('location:index.php?p=blog');
}

?>
        <!--================Banner Area =================-->
        <section class="banner_area">
            <div class="container">
                <div class="banner_text_inner">
                    <h4>BLOG SEARCH RESULT CATEGORY</h4>
                    <ul>
                        <li><a href="?p=welcome"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                        <li><a href="?p=blog"><i class="fa fa-angle-right" aria-hidden="true"></i>Blog</a></li>
                        <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>Result</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Banner Area =================-->

        <!--================Static Area =================-->
        <section class="static_area">
            <div class="container">
                <div class="static_inner">
                    <div class="row">
                        <div class="col-lg-9">
                            <?php foreach ($posts as $post): ?>
                                <div class="static_main_content">
                                <div class="static_social">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-thumb-tack" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                                <div class="static_img">
                                    <img class="img-fluid" src="<?= '../uploads/'.$post->image ?>" alt="">
                                </div>
                                <div class="static_text2">
                                    <h3><?= $post->title ?></h3>
                                    <p><?= $post->body ?></p>
                                    <?php if (isset($_SESSION['auth']) AND !empty($_SESSION['auth'])): ?>
                                        <a href="<?= 'index.php?p=store_like&post='.$post->id ?>" style="float: right;"><i class="fa fa-thumbs-o-up"></i>
                                            <?php
                                            $l = \App\App::getInstance()->getTable('like')->getCountOfLikesFor($post->id, \App\Entity\PostEntity::class);
                                            echo $l->nbr;
                                            ?>
                                        </a>
                                    <?php endif; ?>
                                    <a class="more_btn" href="<?= 'index.php?p=single_blog&post='.$post->id ?>" style="float: right;">Learn More</a>
                                </div>
                            </div>   <br><br><br/>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-lg-3">
                            <div class="right_sidebar_area">
                                <aside class="right_widget r_news_widget">
                                    <div class="r_w_title">
                                        <h3>Recent News</h3>
                                    </div>
                                    <div class="news_inner">
                                        <?php foreach ($latestPost as $latest): ?>
                                            <div class="news_item">
                                            <a href="<?= 'index.php?p=single_blog&post='.$latest->id ?>"><h4><?= substr($latest->body, 0, 55) ?></h4></a>
<!--                                            <a href="#"><h6>October 7, 2017</h6></a>-->
                                            <a href="<?= 'index.php?p=single_blog&post='.$latest->id ?>"><h6><?= date('F j, Y', strtotime($latest->created_at)) ?></h6></a>
                                        </div>
                                        <?php endforeach; ?>

<!--                                        <div class="news_item">-->
<!--                                            <a href="#"><h4>The way to get started is to quit talking and begin doing.</h4></a>-->
<!--                                            <a href="#"><h6>October 7, 2017</h6></a>-->
<!--                                        </div>-->
<!--                                        <div class="news_item">-->
<!--                                            <a href="#"><h4>In order to succeed, we must first believe that we can.</h4></a>-->
<!--                                            <a href="#"><h6>October 7, 2017</h6></a>-->
<!--                                        </div>-->
<!--                                        <div class="news_item">-->
<!--                                            <a href="#"><h4>The way to get started is to quit talking and begin doing.</h4></a>-->
<!--                                            <a href="#"><h6>October 7, 2017</h6></a>-->
<!--                                        </div>-->
                                    </div>
                                </aside>
                                <aside class="right_widget r_cat_widget">
                                    <div class="r_w_title">
                                        <h3>Categories</h3>
                                    </div>
                                    <ul>
                                        <?php foreach ($categories as $category): ?>
                                            <li>
                                                <a href="<?= 'index.php?p=blog_search&category='.$category->id ?>">
                                                    <?= $category->name ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
<!--                                        <li><a href="#">Design</a></li>-->
<!--                                        <li><a href="#">Illustration</a></li>-->
<!--                                        <li><a href="#">News</a></li>-->
<!--                                        <li><a href="#">Programming</a></li>-->
<!--                                        <li><a href="#">Trending</a></li>-->
                                    </ul>
                                </aside>
<!--                                <aside class="right_widget r_tag_widget">-->
<!--                                    <div class="r_w_title">-->
<!--                                        <h3>Popular Tags</h3>-->
<!--                                    </div>-->
<!--                                    <ul>-->
<!--                                        <li><a href="#">Creative</a></li>-->
<!--                                        <li><a href="#">Unique</a></li>-->
<!--                                        <li><a href="#">Photography</a></li>-->
<!--                                        <li><a href="#">Music</a></li>-->
<!--                                        <li><a href="#">Wordpress Template</a></li>-->
<!--                                        <li><a href="#">Ideas</a></li>-->
<!--                                    </ul>-->
<!--                                </aside>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Static Area =================-->
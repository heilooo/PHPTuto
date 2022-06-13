<?php
require_once(realpath(dirname(__FILE__) . "/../app/layouts/head-tag.php"));
?>

    <section class="content">
        <section class="intro intro-h-600px">
            <section class="intro-row intro-h-2-3 mb-10x">

                <section class="intro-2-3-col intro-h-100 position-relative h-md-300px">
                    <a href="http://localhost/PHPTuto/0.tutorial/show-article/1">
                        <section class="intro-2-3-item img-bg intro-h-100" style="background: url(http://localhost/PHPTuto/0.tutorial) no-repeat center; background-size: cover;"></section>
                        <section class="intro-item-caption">
                            <h3 class="caption-title">
                                <span>Lorem ipsum dolor sit amet.</span>
                            </h3>
                            <ul class="caption-info-bar">
                                <li class="">by <b class="text-yellow">Kamren,</b> feb 19 2019</li>
                                <li><i class="fas fa-bolt text-yellow"></i> 21</li>
                                <li><i class="fas fa-comments text-yellow"></i> 19</li>
                            </ul>
                        </section>
                    </a>
                </section>
                <section class="intro-1-3-col intro-h-100">

                    <section class="intro-1-3-item intro-h-50 position-relative h-md-300px">
                        <a href="http://localhost/PHPTuto/0.tutorial/show-article/2">
                            <section class="img-bg intro-h-100" style="background: url(http://localhost/PHPTuto/0.tutorial) no-repeat center; background-size: cover;"></section>
                            <section class="intro-item-caption">
                                <h3 class="caption-title">
                                    <b>Lorem ipsum dolor sit amet, consectetur.</b>
                                </h3>
                                <ul class="caption-info-bar">
                                    <li>feb 19 2019</li>
                                    <li><i class="fas fa-bolt text-yellow"></i> 81</li>
                                    <li><i class="fas fa-comments text-yellow"></i> 32</li>
                                </ul>
                            </section>
                        </a>

                    </section>

                    <section class="intro-1-3-item intro-h-50 position-relative h-md-300px">
                        <a href="http://localhost/PHPTuto/0.tutorial/show-article/3">
                            <section class="img-bg intro-h-100" style="background: url(http://localhost/PHPTuto/0.tutorial) no-repeat center; background-size: cover;"></section>
                            <section class="intro-item-caption">
                                <h3 class="caption-title">
                                    <b>Lorem ipsum dolor.</b>
                                </h3>
                                <ul class="caption-info-bar">
                                    <li>feb 19 2019</li>
                                    <li><i class="fas fa-bolt text-yellow"></i> 7</li>
                                    <li><i class="fas fa-comments text-yellow"></i> 3</li>
                                </ul>
                            </section>
                        </a>
                    </section>

                </section>
                <section class="clear-fix"></section>
            </section>

            <section class="intro-row intro-h-1-3">
                <section class="intro-1-3-col-item intro-h-100 position-relative h-md-300px">
                    <a href="http://localhost/PHPTuto/0.tutorial/show-article/4">
                        <section class="img-bg intro-h-100" style="background: url(http://localhost/PHPTuto/0.tutorial) no-repeat center; background-size: cover;"></section>
                        <section class="intro-item-caption">
                            <h3 class="caption-title">
                                <b>Lorem ipsum dolor sit amet.</b>
                            </h3>
                            <ul class="caption-info-bar">
                                <li>feb 19 2019</li>
                                <li><i class="fas fa-bolt text-yellow"></i> 43</li>
                                <li><i class="fas fa-comments text-yellow"></i> 8</li>
                            </ul>
                        </section>
                    </a>
                </section>
                <section class="intro-1-3-col-item intro-h-100 position-relative h-md-300px">
                    <a href="http://localhost/PHPTuto/0.tutorial/show-article/1">
                        <section class="img-bg intro-h-100" style="background: url(http://localhost/PHPTuto/0.tutorial) no-repeat center; background-size: cover;"></section>
                        <section class="intro-item-caption">
                            <h3 class="caption-title">
                                <b>Lorem ipsum dolor sit.</b>
                            </h3>
                            <ul class="caption-info-bar">
                                <li>feb 19 2019</li>
                                <li><i class="fas fa-bolt text-yellow"></i> 32</li>
                                <li><i class="fas fa-comments text-yellow"></i> 12</li>
                            </ul>
                        </section>
                    </a>
                </section>

                <section class="intro-1-3-col-item intro-h-100 position-relative h-md-300px">
                    <a href="http://localhost/PHPTuto/0.tutorial/show-article/5">
                        <section class="img-bg intro-h-100" style="background: url(http://localhost/PHPTuto/0.tutorial) no-repeat center; background-size: cover;"></section>
                        <section class="intro-item-caption">
                            <h3 class="caption-title">
                                <b>Lorem ipsum dolor sit amet, consectetur.</b>
                            </h3>
                            <ul class="caption-info-bar">
                                <li>feb 19 2019</li>
                                <li><i class="fas fa-bolt text-yellow"></i> 94</li>
                                <li><i class="fas fa-comments text-yellow"></i> 43</li>
                            </ul>
                        </section>
                    </a>
                </section>
                <section class="clear-fix"></section>
            </section>
        </section><!--end of intro-->
        <section class="container">
            <main class="main">

                <section class="main-crypto-mining-news">
                    <h2 class="title">POPULAR POSTS</h2>
                    <?PHP
                    foreach ($popularArticles as $popularArticle) {

                    ?>
                        <section class="main-news-w-50">
                            <article>
                                <img class="main-news-img" src="http://localhost/PHPTuto/0.tutorial/<?php echo $popularArticle['image'] ?>" alt="">
                                <h3 class="article-title">
                                    <a href="http://localhost/PHPTuto/0.tutorial/show-article/<?php echo $popularArticle['id'] ?>"><?php echo $popularArticle['title'] ?></a>
                                </h3>
                                <ul class="info-bar">
                                    <li class=""><span class="text-muted">by</span> <a href="#" class="color-black"><b><?php echo $popularArticle['username'] ?></b></a>
                                        <span class="text-muted"><?php echo date("M d,Y",strtotime($popularArticle['created_at'])) ?></span></li>
                                    <li><i class="fas fa-bolt text-yellow"></i> 54</li>
                                    <li><i class="fas fa-comments text-yellow"></i> 5</li>
                                </ul>
                            </article>
                        </section>

                        <?php
                    }
                        ?>
                    <section class="clear-fix"></section>
                </section><!--end of main crypto mining news-->
            </main><!--end of main-->

            <?php require_once 'layouts/sidebar.php' ?>

            <section class="clear-fix"></section>
        </section><!--end of container-->
    </section><!--end of content-->
    </section><!--end of first app section-->





    <?php
require_once(realpath(dirname(__FILE__) . "/../app/layouts/footer.php"));
?>
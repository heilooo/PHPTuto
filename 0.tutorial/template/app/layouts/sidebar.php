<aside class="sidebar">
    <section class="sidebar-item">

        <ul class="sidebar-list">
            <?php foreach ($categories as $category) { ?>
                <li>
                    <a href="http://localhost/PHPTuto/0.tutorial/show-category/<?php echo $category['id'] ?>"><b><?php echo $category['name'] ?></b></a>
                </li>
                <?php
            }
            ?>
        </ul>
    </section>
    <section class="sidebar-item">
        <h2 class="title">POPULAR POSTS</h2>
        <?php
        foreach ($sidebarPopularArticles as $sidebarPopularArticle) {

            ?>
            <section class="popular-post">
                <img class="popular-post-img" src="http://localhost/PHPTuto/0.tutorial/4" alt="">
                <section class="popular-post-title">
                    <h3>
                        <a href="http://localhost/PHPTuto/0.tutorial/show-article/5"><b>Lorem ipsum dolor.</b></a>
                    </h3>
                    <ul class="info-bar">
                        <li class=""><span class="text-muted">by</span> <a href="#"
                                                                           class="color-black"><b>Kamran,</b></a>
                            <span class="text-muted">feb 4 2019</span></li>
                    </ul>
                </section>
                <section class="clear-fix"></section>
            </section>
            <?php
        }
        ?>
    </section>


</aside><!--end of sidebar-->
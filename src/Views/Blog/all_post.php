<?php
ob_start();

?>

<section class="dashboard">
    <div class="topDashBoard">
        <h1><i class="fas fa-list-alt"></i> Blog :</h1>
        <a href="/dashboard/nouveau">
            <i class="fas fa-plus-circle"></i>
        </a>
    </div>

    <div class="blockAllList" id="masonry">

        <?php
        foreach ($posts as $post) {
            ?>
            <div class="post post_multiple">
                <!-- delete post -->
                <h2 class="title">
                    <?= $post->getTitle(); ?>
                </h2>

                <p class="label">
                    <?= $post->getLabel(); ?>
                </p>

                <img src="/img/<?= $post->getImg() ?>" alt="img">

                <div class="container">
                    <div>
                        <?php
                        //if connect and same id as post 
                        //display modif and delete
                        if (isset($_SESSION["user"]["id"]) && $post->getUser_id() == $_SESSION["user"]["id"]) {
                            ?>

                            <a class="delete" href="/dashboard/<?= $post->getid(); ?>/delete"><i
                                    class="fa-solid fa-trash"></i></a>
                            <a class="update" href="/dashboard/<?= $post->getid(); ?>/update"><i
                                    class="fa-solid fa-pen"></i></a>

                            <?php
                        } else {
                            ?>

                            <p class="delete not_own_post"><i class="fa-solid fa-trash"></i></p>
                            <p class="update not_own_post"><i class="fa-solid fa-pen"></i></p>

                            <?php
                        }
                        ?>

                    </div>

                    <time datetime="<?= $post->getDate() ?>">
                        <?=
                            date("d/m/Y", strtotime($post->getDate()));
                        ?>
                    </time>
                </div>
            </div>
            <?php
        }
        ?>

    </div>


</section>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';

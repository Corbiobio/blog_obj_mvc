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
                        <a class="delete" href="/dashboard/<?= $post->getid(); ?>/delete"><i
                                class="fa-solid fa-trash"></i></a>
                        <a href="/dashboard/<?= $post->getid(); ?>/update"><i class="fa-solid fa-pen"></i></a>
                    </div>

                    <time datetime="<?= $post->getDate() ?>">
                        <?= $post->getDate() ?>
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

<?php
ob_start();
?>

<section class="create">
    <h1><i class="fas fa-list-alt"></i> Modifier votre post :</h1>

    <div>
        <form action="/dashboard/<?= $post->getId(); ?>/update" method="post" class="post  post_update"
            enctype=multipart/form-data>

            <input value="<?= $post->getTitle(); ?>" name="title" required class="title" type="text" name="name"
                placeholder="Post Title">

            <div class="edit_file_container">
                <input type="file" name="img" accept=".jpg,.png,.gif">
                <p>Previous img :</p>
                <img src="/img/<?= $post->getImg(); ?>" alt="img">
            </div>

            <textarea class="label" name="label" required
                placeholder="Post Description"><?= $post->getLabel(); ?></textarea>

            <input type="submit" class="btn">
        </form>
    </div>

</section>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';

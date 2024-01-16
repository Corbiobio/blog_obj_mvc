<?php
ob_start();
?>

<section class="create">
    <h1><i class="fas fa-list-alt"></i> Création d'un post :</h1>

    <div>
        <form action="/dashboard/nouveau" method="post" class="post" enctype=multipart/form-data>

            <input name="title" required class="title" type="text" name="name" value="<?php echo old("name"); ?>"
                placeholder="Post Title">

            <input type="file" required name="img" accept=".jpg,.png,.gif">

            <textarea class="label" name="label" required placeholder="Post Description"></textarea>

            <input type="submit" class="btn">
        </form>


    </div>

</section>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';

<?php
ob_start();
?>

<section class="homepage">
    <h1>Blog</h1>
    <p>Un magnifique blog</p>
    <p>avec de beau post</p>
</section>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';

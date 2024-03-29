<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="super blog">
    <meta name="author" content="Corbio">
    <title>— Blog —</title>
    <script src="https://kit.fontawesome.com/23eae9f3ec.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <header>
        <nav>
            <a href="/" class="logo">LOGO</a>
            <div class="hoverLink">
                <a href="/" class="icon"><i class="fas fa-home"></i></a>
                <p class="hidden">Accueil</p>
            </div>

            <div class="hoverLink">
                <a href="/dashboard" class="icon"><i class="fas fa-list-alt"></i></a>
                <p class="hidden">All post</p>
            </div>


            <?php
            if (!isset($_SESSION["user"]["name"])) {
                //display login in nav if user connect
                ?>

                <div class="hoverLink">
                    <a href="/login" class="icon"><i class="fas fa-user-tie"></i></a>
                    <p class="hidden">Login</p>
                </div>
                <?php
            } else {
                ?>

                <div class="hoverLink">
                    <a href="/dashboard/nouveau" class="icon"><i class="fas fa-plus"></i></a>
                    <p class="hidden">New</p>
                </div>

                <div class="hoverLink">
                    <p class="icon"><i class="fas fa-user"></i></p>
                    <p class="hidden">
                        <?php echo $_SESSION["user"]["name"]; ?>
                    </p>
                </div>

                <div class="hoverLink">
                    <a href="/logout" class="icon"><i class="fas fa-power-off"></i></a>
                    <p class="hidden">Logout</p>
                </div>
                <?php
            }
            ?>
        </nav>
    </header>

    <main>
        <?php echo $content; ?>
    </main>
</body>

</html>
<?php
unset($_SESSION['error']);
unset($_SESSION['old']);

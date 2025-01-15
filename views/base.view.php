<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: controller.classe.php?action=loginSignUp");
}
if (in_array($_SESSION['statut'], $st)|| $_SESSION['statut']=='ADMIN')
{
if (isset($_SESSION['last_activity']) && isset($_SESSION['expire_time'])) {
    $inactive_time = time() - $_SESSION['last_activity'];

    if ($inactive_time > $_SESSION['expire_time']) {
        session_unset();
        session_destroy();
        header("Location: controller.classe.php?action=loginSignUp");
    } else {
        $_SESSION['last_activity'] = time();
    }
}
}
else
{
    header("Location: controller.classe.php?action=loginSignUp");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>UnivManager</title>

        <!--Se connecter au fishiers css-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
        <link rel="stylesheet" href="../CSS/base.style.css?<?php echo time()?>">
        <?php
                if (isset($styles))
                {
                    foreach($styles as $style)
                    {
                        echo '<link rel="stylesheet" href="../CSS/' .$style .'?'.time() .'">';
                    }
                }
            ?>

    </head>
    <body>
    <nav class="nav_bar">
            <a href="controller.classe.php">
                <div class="logo-container"></div>
               <img class="logo" src="../Imgs/UM6P.jpg">
            </a>
            <div class="nav-tools">
            <ul style="list-style: none;">
                <?php 
                if ($_SESSION['statut'] == 'ADMIN')
                {
                    echo '<li>
                    <a href="controller.classe.php?action=createAcount">
                        <button>Créer compte</button>
                    </a>
                </li>';
                }
                ?>
                <li>
                    <a href="controller.classe.php?action=logout">
                        <button>Logout</button>
                    </a>
                </li>
                <li>
                    <a href="controller.classe.php?action=resetPasswordForm">
                        <button>Reset Password</button>
                    </a>
                </li>
            </ul>
            </div>
        </nav>
        <div class="content-container">
            <?php
                if (isset($content))
                {
                    include $content;
                }
            ?>
        </div>

        <footer>
            <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
            <?php
                if (isset($scripts))
                            {
                                foreach($scripts as $script)
                                {
                                    echo '<script src="../Js/' .$script .'?'.time() .'"></script>';
                                }
                            }
            ?>
            
        </footer>
    </body>
</html>

<?php


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
            <a>
                <div class="logo-container"></div>
               <img class="logo" src="../Imgs/UM6P.jpg">
            </a>
            <div class="nav-tools">
            <ul style="list-style: none;">
                <li>
                    <a href="controller.classe.php?action=createAcount">
                        <button>Créer compte</button>
                    </a>
                </li>
                <li>
                    <a href="controller.classe.php?action=loginSignUp">
                        <button>Sign in</button>
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

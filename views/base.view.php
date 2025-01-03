
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>UnivManager</title>

        <!--Se connecter au fishiers css-->
        <link rel="stylesheet" href="../CSS/base.style.css?<?php echo time()?>">
    </head>
    <body>
    <nav class="nav_bar">
            <a>
                <div class="logo-container">LOGO</div>
                <!--<img class="logo" src="{%static 'images/ASW-LOGO.png'%}">-->
            </a>
            <div class="nav-tools">
            <ul style="list-style: none;">
                <li>
                    <a>
                        <button>Logout</button>
                    </a>
                </li>
                <li>
                    <a>
                        <button>Login</button>
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
    </body>
    <footer>
        
    </footer>
</html>

<?php


<div class="container">
    <div class="grid-wrapper">
        <div class="grid-container">
        <?php
            foreach($users as $etudiant)
            {
                echo '<div class="card">';
                if ($etudiant['type'] == 'ADMIN') echo '<a href="controller.classe.php?action=showAdminInfos&log=' .$etudiant["login"] .'" class="card-link">';
                else if ($etudiant['type'] == 'STUD') echo '<a href="controller.classe.php?action=StudentInfos&log=' .$etudiant["login"] .'" class="card-link">';
                else if ($etudiant['type'] == 'PROF') echo '<a href="controller.classe.php?action=showProfInfos&log=' .$etudiant["login"] .'" class="card-link">';
                echo '<div class="image-content">
                    <div class="card-image">
                        <div class="image-wrapper">';

                        if (isset($etudiant["photo_profile"]))
                        {
                            echo '<img src="../Imgs/' .$etudiant["photo_profile"] .'" class="card-img">';
                        }
                        else
                        {
                            echo '<img src="../Imgs/profiel_image.png" class="card-img">';
                        }
                
                echo   '</div>
                    </div>
                </div>  

                <div class="card-content">
                    <h3 class="nom-full">' .$etudiant['prenom'] .'<span class="nom">' .$etudiant['nom'] .'</span></h3>
                </div>
            </a>
        </div>';
            }
        ?>
        </div>
    </div>
</div>

<div class="container">
    <div class="grid-wrapper">
        <div class="grid-container">
        <?php
            foreach($etudiants as $etudiant)
            {
                echo '<div class="card">';

                echo '<a href="controller.classe.php?action=initialiser&etudiant=' .$etudiant["login"] ."&prof=" .$log ."&cours_id=" .$cours_id ."&cours_titre=" .$cours_titre .'" class="card-link">';
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
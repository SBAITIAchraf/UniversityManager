<div class="container">
    <div class="section">
        <div class="long">
            <h2>Etudiants</h2>
            <a href=<?php echo "controller.classe.php?action=ShowAllStudents&cours_id=" . $cour_id ."&prof=" .$log. '&course_titre=' . urlencode($cour)?> ><button>Ajouter Etudiant</button></a>
        </div>
        <div class="slide-container swiper">
            <div class="card-wrapper">
                <ul class="swiper-wrapper card-list">
                    <?php
                        foreach ($etudiants as $etudiant) {
                            echo '<li class="card swiper-slide">
                                <a href="controller.classe.php?action=InsertMarks&student_log=' . urlencode($etudiant["login"]) . '&course_titre=' . urlencode($cour) . '&prof_log=' . urlencode($log) . '" class="card-link">
                                    <div class="image-content">
                                        <div class="card-image">
                                            <div class="image-wrapper">';
                                            
                                            if (isset($etudiant["photo_profile"])) {
                                                echo '<img src="../Imgs/' . $etudiant["photo_profile"] . '" class="card-img">';
                                            } else {
                                                echo '<img src="../Imgs/profiel_image.png" class="card-img">';
                                            }
                                            
                            echo '</div>
                                        </div>
                                    </div>  
                                    <div class="card-content">
                                        <h3 class="nom-full">' . $etudiant['prenom'] . '<span class="nom"> ' . $etudiant['nom'] . '</span></h3>
                                    </div>
                                </a>
                            </li>';
                        }
                    ?>
                    <li class="card swiper-slide">
                        <a>
                            <button>Voir plus</button>
                        </a>
                    </li>
                </ul>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="left-bar"></div>
            <div class="right-bar"></div>
        </div>
    </div>
</div>

<div class="container">
    <div class="section">
        <h2>Etudiants</h2>
        <div class="slide-container swiper">
                <div class="card-wrapper">
                    <ul class="swiper-wrapper card-list ">
                        <?php
                            foreach($etudiants as $etudiant)
                            {
                                echo '<li class="card swiper-slide">
                            <a href="" class="card-link">
                                <div class="image-content">
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
    <div class="section">
        <h2>Professeurs</h2>
        <div class="slide-container swiper">
                <div class="card-wrapper">
                    <ul class="swiper-wrapper card-list ">
                        <?php
                            foreach($professeurs as $professeur)
                            {
                                echo '<li class="card swiper-slide">
                            <a href="" class="card-link">
                                <div class="image-content">
                                    <div class="card-image">
                                        <div class="image-wrapper">';

                                        if (isset($professeur["photo_profile"]))
                                        {
                                            echo '<img src="../Imgs/' .$professeur["photo_profile"] .'" class="card-img">';
                                        }
                                        else
                                        {
                                            echo '<img src="../Imgs/profiel_image.png" class="card-img">';
                                        }
                                
                                echo   '</div>
                                    </div>
                                </div>

                                <div class="card-content">
                                    <h3 class="nom-full">' .$professeur['prenom'] .'<span class="nom">' .$professeur['nom'] .'</span></h3>
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
    <div class="section">
        <h2>Administrateurs</h2>
        <div class="slide-container swiper">
                <div class="card-wrapper">
                    <ul class="swiper-wrapper card-list ">
                        <?php
                            foreach($admins as $admin)
                            {
                                echo '<li class="card swiper-slide">
                            <a href="" class="card-link">
                                <div class="image-content">
                                    <div class="card-image">
                                        <div class="image-wrapper">';

                                        if (isset($admin["photo_profile"]))
                                        {
                                            echo '<img src="../Imgs/' .$admin["photo_profile"] .'" class="card-img">';
                                        }
                                        else
                                        {
                                            echo '<img src="../Imgs/profiel_image.png" class="card-img">';
                                        }
                                
                                echo   '</div>
                                    </div>
                                </div>

                                <div class="card-content">
                                    <h3 class="nom-full">' .$admin['prenom'] .'<span class="nom">' .$admin['nom'] .'</span></h3>
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
<div class="container">
    <div class="section">
        <h2>Courses</h2>
        <div class="slide-container swiper">
            <div class="card-wrapper">
                <ul class="swiper-wrapper card-list">
                    <?php
                        foreach ($courses as $course) {
                            echo '<li class="card swiper-slide">
                                <a href="controller.classe.php?action=AllStudent&course_titre=' . urlencode($course["titre"]) . '&prof_log=' . urlencode($log) . '"" class="card-link">
                                    <div class="image-content">
                                        <div class="card-image">
                                            <div class="image-wrapper">';
                                            
                                                echo '<img src="../Imgs/crs.jpg" class="card-img">';
                                            
                                            
                            echo '</div>
                                        </div>
                                    </div>  
                                    <div class="card-content">
                                        <h3 class="nom-full">'. '<span class="nom"> ' . $course['titre'] . '</span></h3>
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

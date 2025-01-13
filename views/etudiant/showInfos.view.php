<?php
  if ($result) {
    $nom = $result['nom'];
    $prenom = $result['prenom'];
    $departement = $result['departement'];
    $filiere = $result['filiere'];
    $classe = $result['classe'];
    if ($result['photo_profile'])
    {
        $im="../Imgs/" .$result['photo_profile'];
    }
    else
    {
        $im="../Imgs/profiel_image.png";
    }
}
?>
    <section>
        <div class="Profil">
            <div class="card">
                <div class="left-container">
                    <img class="profile-pic" src="<?= htmlspecialchars($im); ?>" alt="Profile pic">
                    <h2 class="gradienttext"><?= htmlspecialchars($nom); ?></h2>
                    <p>Student</p>
                </div>
                <div class="right-container">
                    <h3 class="gradienttext">My Profile</h3>
                    <table>
                        <tr>
                            <td>Nom :</td>
                            <td><?= htmlspecialchars($nom); ?></td>
                        </tr>
                        <tr>
                            <td>Prénom :</td>
                            <td><?= htmlspecialchars($prenom); ?></td>
                        </tr>
                        <tr>
                            <td>Contact :</td>
                            <td><?= htmlspecialchars($log); ?></td>
                        </tr>
                        <tr>
                            <td>Département :</td>
                            <td><?= htmlspecialchars($departement); ?></td>
                        </tr>
                        <tr>
                            <td>Filière :</td>
                            <td><?= htmlspecialchars($filiere); ?></td>
                        </tr>
                        <tr>
                            <td>Classe :</td>
                            <td><?= htmlspecialchars($classe); ?></td>
                        </tr>
                    </table>
                    <div class="social-icons">
                    <a href="controller.classe.php?action=GradesStudent&var1=<?= urlencode($log); ?>">Grades</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


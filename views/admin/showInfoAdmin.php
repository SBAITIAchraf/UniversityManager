<?php
  if ($result) {
    $nom = $result['nom'];
    $prenom = $result['prenom'];
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
                    <p>Administrateur</p>
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
                    </table>
                </div>
            </div>
        </div>
    </section>


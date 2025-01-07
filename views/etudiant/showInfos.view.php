<!--Show informations of student-->
<!DOCTYPE html>
<html lang="en">
    
<?php
  if ($result) {
    $nom = $result['nom'];
    $prenom = $result['prenom'];
    $departement = $result['departement'];
    $filiere = $result['filiere'];
    $classe = $result['classe'];
    $im="../Imgs/" . $nom . "_" . $prenom . ".png";
}
?>

<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="StyleInfo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <section>
        <div class="Profil">
            <div class="card">
                <div class="left-container">
                    <img src="<?= htmlspecialchars($im); ?>" alt="Profile pic">
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
                        <a href="#"><i class="fa fa-github"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

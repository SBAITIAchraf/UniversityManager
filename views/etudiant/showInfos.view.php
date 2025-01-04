<!--Show informations of student-->
<!DOCTYPE html>
<html lang="en">
    
<?php
foreach($result as $ligne){
    $nom=$ligne['nom'];
    $prenom=$studentInfo['prenom'];
    $departement=$studentInfo['departement'];
    $filiere=$studentInfo['filiere'];
    $classe=$studentInfo['classe'] ;
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
                 <?php $im =$nom . "_" . $prenom . ".png";?>;
                 <img src="<?= htmlspecialchars($im); ?>" alt="Profile pic">
                  <h2 class="gradienttext"><?php htmlspecialchars($name)?></h2>
                  <p>Student</p>
                </div>
                <div class="right-container">
                  <h3 class="gradienttext">My Profile </h3>
                  <table>
                      <tr>
                          <td>Nom :</td>
                          <td><?php htmlspecialchars($name)?></td>
                        </tr>
                    <tr>
                      <td>Prenom :</td>
                      <td><?php htmlspecialchars($prenom)?></td>
                    </tr>
                    <tr>
                      <td>Contact :</td>
                      <td><?php htmlspecialchars($log)?></td>
                    </tr>
                    <tr>
                      <td>Departement :</td>
                      <td><?php htmlspecialchars($departement)?></td>
                    </tr>
                    <tr>
                      <td>Filiere :</td>
                      <td><?php htmlspecialchars($filiere)?></td>
                    </tr>
                    <tr>
                      <td>Classe :</td>
                      <td><?php htmlspecialchars($classe)?></td>
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

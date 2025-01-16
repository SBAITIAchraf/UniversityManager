<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: controller.classe.php?action=loginSignUp");
}
if (in_array($_SESSION['statut'], $st))
{
if (isset($_SESSION['last_activity']) && isset($_SESSION['expire_time'])) {
    $inactive_time = time() - $_SESSION['last_activity'];

    if ($inactive_time > $_SESSION['expire_time']) {
        session_unset();
        session_destroy();
        header("Location: controller.classe.php?action=loginSignUp");
    } else {
        $_SESSION['last_activity'] = time();
    }
}
}
else
{
    header("Location: controller.classe.php?action=loginSignUp");
}
?>
<!DOCTYPE html>
<html>
<head>

       <meta charset="utf-8">
       <title>UnivManager</title>
       <link rel="stylesheet" type="text/css" href="../CSS/style1.css?<?php echo time()?>">
       <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
       <style>
           .extra-fields {
               display: none; 
               margin-top: 10px;
           }
       </style>
   </head>
   
   <body>
       <div class="main">
           <input type="checkbox" id="chk" aria-hidden="true">

           <div class="signup">
                <form id="signupForm" action="controller.classe.php?action=AddUser"  method="POST" enctype="multipart/form-data">
                   <label for="chk" aria-hidden="true"><a href="controller.classe.php?action=home">Créer compte</a></label>
                   <div><?php if (isset($warning)) echo $warning;?></div>
                   <input type="text" name="nom" placeholder="Nom">
                   <input type="text" name="prenom" placeholder="Prénom" >
                   <input type="email" name="email" placeholder="Email" required="" >
                   <input type="password" name="pswd" placeholder="Password" required="" >
                   <input type="file" name="photo" placeholder="Photo de profil">

             
                   <select id="status" name="statut" required="">
                       <option value="" placeholder="statut" disabled selected> Choisir le statut </option>
                       <option value="ADMIN">Administrateur</option>
                       <option value="PROF">Professeur</option>
                       <option value="STUD">Étudiant</option>
                   </select>

             
                   <div id="studentFields" class="extra-fields">
                       <input type="text" name="filiere" placeholder="Filière">
                       <input type="text" name="classe" placeholder="Classe">
                   </div>

                   <div id="professorFields" class="extra-fields">
                       <input type="text" name="departement" placeholder="Département">
                   </div>

                   <button>Créer</button>
               </form>
           </div>
           

       <script>
      
      document.getElementById('status').addEventListener('change', function () {
          const selectedStatus = this.value;
          const studentFields = document.getElementById('studentFields');
          const professorFields = document.getElementById('professorFields');

          studentFields.style.display = 'none';
          professorFields.style.display = 'none';

          if (selectedStatus === 'STUD') {
              studentFields.style.display = 'block';
          } else if (selectedStatus === 'PROF') {
              professorFields.style.display = 'block';
          }
      });
  </script>
</body>
</html>
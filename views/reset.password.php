
<!DOCTYPE html>
<html>
<head>

       <meta charset="utf-8">
       <title>UnivManager</title>
       <link rel="stylesheet" type="text/css" href="../CSS/style1.css">
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
               <form   action="controller.classe.php?action=resetPassword"  method="POST" >
                   <label for="chk" aria-hidden="true">Reset Password</label>
                   <div><?php if (isset($warning)) echo $warning;?></div>
                   <input type="password" name="pswd1" placeholder="New password" required="">
                   <input type="password" name="pswd2" placeholder="Retype new password" required="">
                   <button>Reset</button>
               </form>
           </div>
       </div>

   </body>
</html>


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
               <form   action="controller.classe.php?action=show"  method="POST" >
                   <label for="chk" aria-hidden="true">Login</label>
                   <div><?php if (isset($warning)) echo $warning;?></div>
                   <input type="email" name="email" placeholder="Email" required="">
                   <input type="password" name="pswd" placeholder="Password" required="">
                   <button>Login</button>
               </form>
           </div>
       </div>

   </body>
</html>

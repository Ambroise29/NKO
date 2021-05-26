<!DOCTYPE html>
<html>
    <head>
    <title>ALTER PWD</title>
     <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/monstyle.css">
    <script type="text/javascript" src="../jquery/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../jquery/ambroisce.js"></script>
    <style>
        .input-container{
    position:reltive;
}
 </style>
    </head>
    <body>
    <?php
      include("menup.php");
     ?>
    <form method="POST">
    <div class="container>
       <input minlength=4
       class="form-control oldpwd"
       type="text"
       name="oldpwd"
       autocomplete="false"
       placeholder="taper votre ancien mot de passe"
       <i class="fa fa-eye fa-2x anab"></i>
    
       <input minlength=4
       class="form-control oldpwd"
       type="text"
       name="oldpwd"
       autocomplete="false"
       placeholder="taper votre nouveau mot de passe"
       <i class="fa fa-eye fa-2x newab"></i>

       </div>
        </form>
    </body>
   
</html>


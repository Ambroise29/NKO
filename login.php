
<?php
session_start();
if(isset($_SESSION['erreurLogin'])){
    $erreurlogin = $_SESSION['erreurLogin'];
   
}else{
    $erreurlogin="";
}


?>
<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8">
    <title>gestion des filieres</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/monstyle.css">
    </head>
    <body>
    <?php
    
     ?>
     <div class="container col-lg-4 col-lg-offset-4">
     <div class="panel panel-primary  magetop">
     <div class="panel-heading">LOGIN </div>
     <div class="panel-body">
    <form method="POST" action="seconnecter.php">
    <?php if(!empty($erreurlogin)){?>
        <div class="alert alert-danger">
         <?php echo $erreurlogin ?>
        </div>
   <?php }?>
   
    <div class="form-grup">
     <label>Login:</label>
      <input type="text" name="login" class="form-control">
     </div>

     <div class="form-grup">
     <label>Mot de passe:</label>
      <input type="password" name="pass" class="form-control" id="pam">    <input type="checkbox" id="affs">
  
     </div>
     <button class="btn btn-success log" name="vbnl">
         <span class="glyphicon glyphicon-save" id="log"></span>Connecter
     </button>
     <a href="reinitialiser.php">mot de passe oublié?</a>
      <a href="ajouteruser.php">Creer un compte</a>
    </form>

     </div>
     </div>

     <div class="panel panel-primary" magetop>
     <div class="panel-heading"></div>
     <div class="panel-body">
     </div>
     </div>

     </div>
     <script type="text/javascript" src="../jquery/jquery-3.5.1.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
            var pass=$('#pam');
            var ch=$('#affs');

         ch.click(function() {
            if(ch.prop('checked')){
               pass.attr('type',"text");
            }else{
                pass.attr('type',"password");
            }
             
         });

      });
    </script>
    </body>
</HTML>
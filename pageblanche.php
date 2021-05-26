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
      include("menup.php");

     ?>
     <div class="container">
     <div class="panel panel-primary  magetop">
     <div class="panel-heading"></div>
     <div class="panel-body">
      le contenue
     </div>
     </div>

     <div class="panel panel-primary" magetop>
     <div class="panel-heading"></div>
     <div class="panel-body">
      le tableau
     </div>
     </div>

     </div>
    </body>
</HTML>


<?php
require_once('identifier.php');
require_once('connexiondb.php');
$md="";

$p1=isset($_POST['pwd1'])?$_POST['pwd1']:"";
$p2=isset($_POST['pwd2'])?$_POST['pwd2']:"";
$requser="SELECT * FROM UTILISATEURS WHERE pwd=$p1";
$stm=$pdo->query($requser);
if($stm->fetch()){
  $updat="UPDATE UTILISATEURS SET pwd=$p2";
  $stm=$pdo->query($updat);

}else{
   $md="VOTRE ANCIEN MOT DE PASSE EST INCORRECTE";
}
?>
 <form method="POST">
       <label class="lp">Nova senha:</label>
       <input type="password" name="pwd1" id="pwd" placeholder="Digite sua nova senha" class="pwd"></>
       <label class="lp">confirma sua senha:</label>
       <input type="password" name="pwd2" id="pwd" placeholder="Repetir a senha" class="pwd"></>
       <button type="submit" value="btn" class="btn btn-primary">
         <span class="glyphicon glyphicon-move"></span>Alterar
       </button>
       </form>
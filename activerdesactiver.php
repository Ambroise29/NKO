<?php
require_once('identifier.php');
echo "bien";
$id=$_GET['id'];
include( 'connexiondb.php');
$tou="SELECT * FROM UTILISATEURS WHERE iduser=$id";
$nt=$pdo->query($tou);
$n=$nt->fetch();
$ro=$n['etats'];
$eta=isset($_POST['civilite'])?$_POST['civilite']:0;
$up="UPDATE UTILISATEURS SET etats=? WHERE iduser=?";
$param=array($eta,$id);
$stm=$pdo->prepare($up);
$stm->execute($param);
if(isset($_POST['vb'])){
  header('Location:login.php');
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
      include("menup.php");
     ?>
     <div class="container">
     <div class="panel panel-primary  magetop">
     <div class="panel-heading"></div>
     <div class="panel-body">
  

     <form method ="post" >
      <div class="form-grup">
     <label for="civilite">Etat de compte</label><br>
      <label><input type="radio"  name="civilite" value="1"
      <?php if($ro==1) echo "checked" ?>/>ACTIVER</label><br>
      <label><input type="radio"  name="civilite" value="0"
      <?php if($ro==0) echo "checked" ?>/>DESACTVAR</label>
      </div>
     
        <button type="submit" class="btn btn-success" name="vb">
          <span class="glyphicon glyphicon-save"></span>
          Salvar
      </button>

    </form>
     </div>
     </div>


     </div>
    </body>
</HTML>
















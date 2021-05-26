
<?php
require_once('identifier.php');
if($_SESSION['user']['iduser']){
  $id=  $_SESSION['user']['iduser'];
}
$mg="";
$po1=MD5($_POST['pwd1']);
$po2=MD5($_POST['pwd2']);
require_once('connexiondb.php');
$qselect="SELECT * FROM UTILISATEURS WHERE pwd=? AND  iduser=?" ;
$params=array($po1,$id);
$resultat=$pdo->prepare($qselect);
$resultat->execute($params);
if($resultat->fetch()){
    $req="UPDATE UTILISATEURS SET pwd=? WHERE iduser=?";
    $param=array($po2,$id);
    $ambroise=$pdo->prepare($req);
    $ambroise->execute($param);
   $mg="<div class='alert alert-success'>
         <strong>FELICITATION</strong>votre mot de passe a ete modifie avec succe
        </div>";
        header("refresh:3,url=login.php");

}else{
    $mg="<div class='alert alert-danger'>
    <strong>Erreur</strong>votre ancien mot de passe est incorrect
    </div>";
   header("refresh:3,url=changerpwd.php");

}
?>
<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8">
    <title>Changer mot de passe</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/monstyle.css">
    </head>
    <body>
        <div class="container">
            <?php
            echo $mg;
            ?>
        </div>
    </body>
    </html>


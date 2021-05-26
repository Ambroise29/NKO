<?php
session_start();
include('connexiondb.php');
$logins=isset($_POST['login'])?$_POST['login']:"";
$modpass=isset($_POST['pass'])?$_POST['pass']:"";
$pd=MD5($modpass);
$lo="SELECT * FROM UTILISATEURS WHERE logins=? AND pwd=?";
$param=array($logins,$pd);
$stm=$pdo->prepare($lo);
$stm->execute($param);
if($user=$stm->fetch()){

if($user['etats']==1){

  $_SESSION['user']=$user;
  header('Location:ambroise.php');
}else{

  $_SESSION['erreurLogin']="<strong>Erreur!!!!!!!!!!!</strong> Votre compte est desactivé.<br>Veillez contacter l'administrateur";
  header('Location:login.php');
}


}else{

  $_SESSION['erreurLogin']="<strong>Erreur!!!!!!!!!!!!</strong> sua senha estga incorrete!!!t";
  header('Location:login.php');

}

?>
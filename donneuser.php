

<?php
/*
require_once('identifier.php');
include('connexiondb.php');
$login=isset($_POST['login'])?$_POST['login']:"";
$email=isset($_POST['emails'])?$_POST['emails']:"";
$civilite=isset($_POST['civilite'])?$_POST['civilite']:"F";
$pwd=isset($_POST['pass'])?$_POST['pass']:"";
$pwd1=isset($_POST['pass1'])?$_POST['pass1']:"";
$npass=MD5($pwd);
$nomphoto=isset($_FILES['photos']['name'])? $_FILES['photos']['name']:"";
$imatemp=$_FILES['photos']['tmp_name'];
move_uploaded_file($imatemp,"../images/".$nomphoto);

$valid=array();

if(empty($login)){
    $valid[]='veillez remplir le champ login';
}

if(strlen($login)<=5){
    $valid[]='Votre login doit atteindre 6 caracteres';
}

if(empty($pwd)){
    $valid[]='veillez taper votre mot de passe';
}


if(empty($pwd1)){
    $valid[]='veillez confirmer votre mot de passe';
}


if($pwd!==$pwd1){
    $valid[]='Les mots de passe ne correspondent pas';
}

$requser="INSERT INTO UTILISATEURS(logins,emails,pwd,photos)VALUES(?,?,?,?)";
$param=array($login,$email,$npass,$nomphoto);
$stm=$pdo->prepare($requser);
$stm->execute($param);
*/
?>

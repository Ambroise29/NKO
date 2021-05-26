<?php
require_once('identifier.php');
include('connexiondb.php');

$iduser=isset($_POST['iddd'])?$_POST['iddd'] :1;
$login=isset($_POST['login'])?$_POST['login'] :"";
$email=isset($_POST['emails'])?$_POST['emails'] :"";
$role=isset($_POST['roles'])?$_POST['roles'] :"";
$pass=isset($_POST['pass'])?$_POST['pass'] :"";
$npass=MD5($pass);
$nomphoto=isset($_FILES['photo']['name'])? $_FILES['photo']['name']:"";
$imatemp=$_FILES['photo']['tmp_name'];
move_uploaded_file($imatemp,"../images/".$nomphoto);
/*echo 'photo'.$nomphoto.'<br>';
echo 'nom'.$nom.'<br>';
echo 'prenom'.$prenom.'<br>';
echo 'civilite'.$civilite.'<br>';
echo 'idstag'.$idstag.'<br>';
echo 'idfiliere'.$idfiliere.'<br>';*/


if(!empty($nomphoto)){
          
    $requete="UPDATE UTILISATEURS SET logins=?,emails=?,role=?,pwd=?,photos=? WHERE iduser=?";  
    $para1=array($login,$email,$role,$npass,$nomphoto,$iduser);

 
  
}else{

    $requete="UPDATE UTILISATEURS SET logins=?,emails=?,role=?,pwd=? WHERE iduser=?";  
    $para1=array($login,$email,$role,$npass,$iduser);
   

}
$stm=$pdo->prepare($requete);
$stm->execute($para1);
header("refresh:1,url=tableuser.php");
echo "oui";


?>
<?php
require_once('identifier.php');
include('connexiondb.php');
$date1=isset($_POST['date1'])? $_POST['date1']:"";
$date2=isset($_POST['date2'])? $_POST['date2']:"";
$idstag=isset($_POST['idstag'])?$_POST['idstag'] :0;
$idfiliere=isset($_POST['nomF'])?$_POST['nomF'] :1;
$nom=isset($_POST['nom'])?$_POST['nom'] :"";
$prenom=isset($_POST['prenom'])?$_POST['prenom'] :"";
$civilite=isset($_POST['civilite'])?$_POST['civilite'] :"F";
$nom=isset($_POST['nom'])?$_POST['nom'] :"";
$nomphoto=isset($_FILES['photo']['name'])? $_FILES['photo']['name']:"";
$imatemp=$_FILES['photo']['tmp_name'];
move_uploaded_file($imatemp,"../images/".$nomphoto);
echo 'photo'.$nomphoto.'<br>';
echo 'nom'.$nom.'<br>';
echo 'prenom'.$prenom.'<br>';
echo 'civilite'.$civilite.'<br>';
echo 'idstag'.$idstag.'<br>';
echo 'idfiliere'.$idfiliere.'<br>';


if(!empty($nomphoto)){
          
    $requete="UPDATE STAGIAIRES SET nom=?,prenom=?,civilite=?,photos=?,idfiliere=?,dateentrer=?,datesortir=? WHERE idstag=?";  
    $para1=array($nom,$prenom,$civilite,$nomphoto,$idfiliere,$date1,$date2,$idstag);
 
  
}else{

    $requete="UPDATE STAGIAIRES SET nom=?,prenom=?,civilite=?,idfiliere=?,dateentrer=?,datesortir=? WHERE idstag=?";  
    $para1=array($nom,$prenom,$civilite,$idfiliere,$date1,$date2,$idstag);

}
$stm=$pdo->prepare($requete);
$stm->execute($para1);
echo "oui";
header('Location:tablestagiaire.php');

?>
<?php
session_start();
require_once('connexiondb.php');

    $nomss=isset($_POST['nom'])?$_POST['nom']:'';
    $prenom=isset($_POST['prenom'])?$_POST['prenom']:'';
    $civilite=isset($_POST['civilite'])?$_POST['civilite']:'';
    $telephone=isset($_POST['telephone'])?$_POST['telephone']:'';
    $adresse=isset($_POST['adresse'])?$_POST['adresse']:'';
    $nicki=array();
    if (empty($nomss)) {
        $nicki[]="Veillez entrer votre nom";
    } elseif (empty($prenom)) {
        $nicki[]="Veillez entrer votre prenom";
    } elseif (empty($civilite)) {
        $nicki[]="Veillez cocher votre sexe";
    } elseif (empty($telephone)) {
        $nicki[]="Veillez entrer votre telephone";
    } elseif (empty($adresse)) {
        $nicki[]="Veillez entrer votre adresse";
    } else {
        $reqclient="INSERT INTO CLIENTS(nom,prenom,civilite)VALUES(?,?,?)";
        $stm=$pdo->prepare($reqclient);
        $stm->execute(array($nomss,$prenom,$civilite));
       
     
    }
   
    
    $cm="SELECT * FROM CLIENTS ORDER BY idclient DESC";
    $aclient=$pdo->query($cm);
    $ac=$aclient->fetch();
    $idd=$ac['idclient'];
    $_SESSION['client']=$ac;
  header('Location:nicki.php');

?>
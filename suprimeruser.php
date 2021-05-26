<?php
require_once('identifier.php');
include('connexiondb.php');
$iduser=$_GET['iduser'];
$sb="DELETE FROM UTILISATEURS WHERE iduser=?";
$n=array($iduser);
$stm=$pdo->prepare($sb);
$stm->execute($n);
header('Location:tableuser.php');
?>
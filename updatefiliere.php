<?php
require_once('identifier.php');
include('connexiondb.php');
$iddf=isset($_POST['idf'])?$_POST['idf']:0;
$codef=isset($_POST['code'])?$_POST['code']:"";
$nomfs=isset($_POST['nom'])?$_POST['nom']:"";
$nf=isset($_POST['niveau'])?$_POST['niveau']:"";
$upF="UPDATE FILIERES SET code=?,nomfiliere=?,niveau=? WHERE idfiliere=?";
$param=array($codef,$nomfs,$nf,$iddf);
$stm=$pdo->prepare($upF);
$stm->execute($param);
header('Location:tablefiliere.php');

?>
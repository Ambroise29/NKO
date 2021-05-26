<?php
require_once('identifier.php');
include('connexiondb.php');
$idstage=$_GET['idstag'];
$stagiaire="DELETE FROM STAGIAIRES WHERE idstag=$idstage";
$stn=$pdo->query($stagiaire);
header('Location:tablestagiaire.php');


?>
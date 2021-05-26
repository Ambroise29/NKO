<?php
require_once('identifier.php');
include('connexiondb.php');
$idf=isset($_GET['id'])?$_GET['id']:0;
$reqf="DELETE FROM FILIERES WHERE idfiliere=$idf";
$stm=$pdo->query($reqf);
header('Location:tablefiliere.php');
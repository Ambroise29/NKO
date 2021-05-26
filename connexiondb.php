<?php

try{

    $pdo=new PDO('mysql:host=localhost;dbname=DIEUESTGRAND','root','');
}catch(Exception $e){
    $e->getMessage();
}
?>

<?php

require_once('identifier.php');
include('connexiondb.php');


if(isset($_POST['vb'])){
$code=isset($_POST['code']) ? $_POST['code'] :"";
$nom=isset($_POST['nom']) ? $_POST['nom']:"";
$niveau=isset($_POST['niveau'])?$_POST['niveau']:"";
echo $code;
if(empty($code) || empty($nom) || empty($niveau)){
$msg="vous devez remplir tous les champs";
}else if($niveau==="all"){
    $msg2="veillez selectionner un niveau";
}else{
$requetefiliere="INSERT INTO FILIERES(code,nomfiliere,niveau)VALUES(?,?,?)";
$para=array($code,$nom,$niveau);
}
$inseref=$pdo->prepare($requetefiliere);
$inseref->execute($para);
header("Location:tablefiliere.php");

}


?>
<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8">
    <title>gestion des filieres</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/monstyle.css">
    </head>
    <body>
    <?php
      include("menup.php");
     ?>
     <div class="container">
     <div class="panel panel-primary  magetop">
     <div class="panel-heading"></div>
     <div class="panel-body">
      <span class="alert-danger">kk</span>
     </div>
     </div>

     <div class="panel panel-primary" magetop>
     <div class="panel-heading"></div>
     <div class="panel-body">
      <form method="post">
      <div class="form-group">
      <label for="Code">CODE:</label>
      <input type="text" name="code" id="code" class="form-control"/>
      </div>
      <label for="nom">Nom-Filiere:</label>
      <input type="text" name="nom" id="nom" class="form-control"/>
      </div>
      <label for="niveau">Niveau:</label>
       <select name="niveau" id="niveau" class="form-control">
       <option value="all">TOUS LES FILIERES</option>
       <option value="LICENCE">LICENCE</option>
       <option value="MASTER">MASTER</option>
       <option value="MASTER 1">MASTER 1</option>
       <option value="TECHNICIEN">TECHNICIEN</option>
       <option value="BTS"> BREVET DE TECHNICIEN SUPERIEUR </option>
       </select>
      </div>
      <button type="submit" class="btn btn-primary" name="vb">
      <span class="glyphicon glyphicon-save"></span>
       ADICIONAR
      </button>
      </form>
     </div>
     </div>
     </div>
    </body>
</HTML>


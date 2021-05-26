<?php
require_once('identifier.php');
include('connexiondb.php');
$id=$_GET['id'];
$F="SELECT * FROM FILIERES WHERE idfiliere=$id";
$stm=$pdo->query($F);
$total=$stm->fetch();
$code=$total['code'];
$id=$total['idfiliere'];
$nomf=$total['nomfiliere'];
$niveau=$total['niveau'];



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
      <span class="alert-danger">ENREGISTREMENT</span>
     </div>
     </div>

     <div class="panel panel-primary" magetop>
     <div class="panel-heading"></div>
     <div class="panel-body">
      <form method="post" action ="updatefiliere.php">
      <div class="form-group">
      <label for="Code">Matricule:</label>
      <input type="text" name="idf" id="idf" class="form-control" value="<?php echo $id?>"/>
      </div>
      <div class="form-group">
      <label for="Code">CODE:</label>
      <input type="text" name="code" id="code" class="form-control" value="<?php echo $code?>"/>
      </div>
      <label for="nom">Nom-Filiere:</label>
      <input type="text" name="nom" id="nom" class="form-control"value="<?php echo $nomf?>"/>
      </div>
      <label for="niveau">Niveau:</label>
       <select name="niveau" id="niveau" class="form-control">
       <option value="<?php echo $niveau?>"><?php echo $niveau ?></option>
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

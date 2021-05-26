<?php
 require_once('identifier.php'); 
?>
<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8">
    <title>gestion des filieres</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/monstyle.css">
    <style>

        .radio{
            font-style:italic;
            font-size:12px;
        }
    </style>
    </head>
    <body>
    <?php
      include("menup.php");

     ?>
     <div class="container">
     <div class="panel panel-primary  magetop">
     <div class="panel-heading"></div>
     <div class="panel-body">
      <form method="POST" action="donneclient.php">
      <label>Nom</label>
      <input type="text" name="nom" class="form-control" value="<?php if(isset($nom)){echo $nom;}?>"/>
      <label>Preom</label>
      <input type="text" name="prenom" class="form-control"value="<?php if(isset($prenom)){echo $prenom;}?>"/>
      <label>Civilite::</label>
      <br>
     <input type="radio" name="civilite" value="M" class="radio">MASCULIN </>
     <input type="radio" name="civilite" value="F" class="radio">FEMININ </br>
     <br>
      <label>Telephone</label>
      <input type="text" name="telephone" class="form-control"value="<?php if(isset($telephone)){echo $telephone;}?>"/>

      <label>Adresse</label>
      <input type="text" name="adresse" class="form-control"value="<?php if(isset($adresse)){echo $adresse;}?>"/>
      <br>
      <button type="submit" name="vb" class="btn btn-primary">
     <span class="glyphicon glyphicon-save"></span>ENREGISTER

      </button>
      </form>
      <br> <br>
      <?php
      if(isset($nicki)){
          foreach ($nicki as $ambroise) {
             echo '<div class="alert alert-danger">'.$ambroise.'
             
             </div>';
          }
      }
      ?>
     </div>
     </div>

     <div class="panel panel-primary" magetop>
     <div class="panel-heading"></div>
     <div class="panel-body">
      le tableau
     </div>
     </div>

     </div>
    </body>
</HTML>
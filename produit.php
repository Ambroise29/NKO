<?php
  require_once('identifier.php'); 
  require_once('connexiondb.php');
if(isset($_POST['vb'])){

    $ref=$_POST["ref"];
    $des=$_POST["dess"];
    $put=$_POST["put"];
    $nomphoto=isset($_FILES['photos']['name'])? $_FILES['photos']['name']:"";
    $imatemp=$_FILES['photos']['tmp_name'];
    move_uploaded_file($imatemp,"../images/".$nomphoto);
    $erreur=array();

    if(empty($ref)){
        $erreur[]="VEILLEZ ENTRER LE CODE DU PRODUIT";
    }elseif(empty($des)){
        $erreur[]="VEILLEZ ENTRER La description du produit";  
    }elseif(empty($put)){
        $erreur[]="VEILLEZ ENTRER LE PRIX DU PRODUIT";
    }else{
        $reqprod="INSERT INTO PRODUITS(refprod,descriptionprod,prixprod,photos)VALUES(?,?,?,?)";
        $stm=$pdo->prepare($reqprod);
        $stm->execute(array($ref,$des,$put,$nomphoto));
        $erreur[]='ENREGISTREMENT EFFECTUEE AVEC SUCCES';
    }
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
     <div class="panel-heading">ENREGISTREMENT-PRODUIT</div>
     <div class="panel-body">
      <form method="POST" enctype="multipart/form-data">
      <label for="refprod">REF:</label>
      <input type="text" name="ref" class="form-control" id="ref" placeholder="ref produiut"/>

      <label for="desss">DESCRIPTION:</label>
     <input type="text" name="dess" class="form-control"/>
     
      <label for="tyyhh">Prix:</label>
      <input type="number" name="put" class="form-control" id="put" placeholder="prix produit"/>

      
      <label for="tyyhh">IMAGE:</label>
      <input type="file" name="photos" class="form-control" id="photos"/>

      <button type="submit" name="vb" class="btn btn-primary">
      <span class="glyphicon glyphicon-save"></span>salvar
      
      </button>
      </form>
     </div>
     </div>
     </div>
     </div>

     </div>
     <?php
     if(isset($erreur)){
         foreach($erreur as $ambroise){
             echo '<div class="alert alert-danger">'.$ambroise.' </div>';
         }
     }
     ?>
    </body>
</HTML>

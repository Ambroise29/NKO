<?php
//require_once('identifier.php');
require_once('connexiondb.php');
$idp=$_GET['idp'];
$rep="SELECT * FROM PRODUITS WHERE idprod=$idp";
$ep=$pdo->query($rep);

$new=$ep->fetch();
$ref=$new['refprod'];
$designation=$new['descriptionprod'];
$prix=$new['prixprod'];
?>
<?php
   if(isset($_POST['pd'])){
       $ref=$_POST['ref'];
       $designation=$_POST['designation'];
       $prix=$_POST['prix'];
       $erreur=array();
       if(empty($ref)){
           $erreur[]="veillez remplir le refernce du produit";
       }elseif(empty($designation)){
        $erreur[]="veillez renseigner la designation du produit";
       }elseif(empty($prix)){
        $erreur[]="veillez renseigner le prix du produit";
       }elseif($prix<0){
        $erreur[]="Le prix du produit ne doit pas etre inferieur a zero(0)";
       }else{
           $reps="UPDATE PRODUITS SET refprod=?,descriptionprod=?,prixprod=? WHERE idprod=?";
           $stm=$pdo->prepare($reps);
           $stm->execute(array($ref,$designation,$prix,$idp));
           $erreur[]="La mise a jour a ete effectue avec succes";
       }
       
   }

?>
<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8">
    <title>Mise a jour du produit</title>
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
      <form method="POST">
          <div class="group-form">
              <label for"ref">REF:</label>
              <input type="text" name="ref" value="<?=$ref?>" class="form-control"/>
              <label for"ref">DESIGNATION:</label>
              <input type="text" name="designation" value="<?=$designation?>" class="form-control"/>
              <label for"ref">PRIX UNITAIRE:</label>
              <input type="number" name="prix" value="<?=$prix?>" class="form-control"/>
              <input type="submit" class="btn btn-primary" name="pd" value="ENREGISTRER"/>
          </div>
      </form>
     </div>
     </div>

     <div class="panel panel-primary" magetop>
     <div class="panel-heading"></div>
     <div class="panel-body">
      le tableau
     </div>
     </div>

     </div>
     <?php
     if(isset($erreur)){
         foreach ($erreur as $ariane) {
             echo '<div class="alert alert-danger">'.$ariane.'
             </div>';
         }
     }
     ?>
    </body>
</HTML>




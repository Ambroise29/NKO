<?php
 require_once('identifier.php'); 
 require_once('connexiondb.php');
$cm="SELECT nom,prenom,civilite,refprod,descriptionprod,prixprod,qts,totals FROM CLIENTS as c ,PRODUITS as p,COMMANDES as cm
WHERE c.idclient=cm.idclient AND p.idprod=cm.idprod"; 
$aclient=$pdo->query($cm);
$ambroise=$aclient->fetch(PDO::FETCH_OBJ);

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
    
     </div>
     </div>

     <div class="panel panel-primary" magetop>
     <div class="panel-heading"></div>
     <div class="panel-body">
      <table class="table table">
          <thead>
              <tr>
              <th>REF</th>
              <th>Designation</th>
              <th>Prix</th>
              <th>Qts</th>
              <th>Total</th>
              </tr>
          </thead>
          <tbody>
              <?Php
             while($ambroise=$aclient->fetch(PDO::FETCH_OBJ)){?>
            <tr>
              <td><?= $ambroise->refprod;?></td>
              <td><?= $ambroise->descriptionprod;?></td>
              <td><?= $ambroise->prixprod;?></td>
              <td><?= $ambroise->qts;?></td>
              <td><?= $ambroise->totals;?></td>
            </tr>
             
                  
              <?php }
              ?>
          </tbody>
      </table>
     </div>
     </div>

     </div>
    </body>
</HTML>

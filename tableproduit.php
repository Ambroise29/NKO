
<?php
 //require_once('identifier.php'); 
require_once('connexiondb.php');

$page=isset($_GET['page']) ? $_GET['page'] :1;
$seize=isset($_GET['seize']) ? $_GET['seize']:4;
$refdesput=isset($_GET['refdesput']) ? $_GET['refdesput']:'';
$arreter=($page-1)*$seize;
$reqafficher="SELECT * FROM PRODUITS WHERE (refprod LIKE '%$refdesput%' OR prixprod LIKE '%$refdesput%') LIMIT $seize offset $arreter ";
$resultat=$pdo->query($reqafficher);

// requte compter

$reqcon="SELECT COUNT(*) PD FROM PRODUITS WHERE (refprod LIKE '%$refdesput%' OR prixprod LIKE '%$refdesput%') ";
$stm=$pdo->query($reqcon);
$nt=$stm->fetch();
$moime=$nt['PD'];
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
      <form method="GET">
      <input type="text" name="refdesput" class="lpp"/>
      <button type="submit" class="btn btn-primary">
      <samp class="glyphicon glyphicon-search"></samp>rechercher
      </button>

      <button type="submit" class="btn btn-success">
      <samp class="glyphicon glyphicon-plus"></samp><a href="produit.php">Nouveau-Produit</a>
      </button>
      </form>
     </div>
     </div>

     <div class="panel panel-primary" magetop>
     <div class="panel-heading"></div>
     <div class="panel-body">
     <table class="table" id="ambroiseariane">
      <thead>
      <tr>
      <th>ID-PRODUIT</th>
      <th>REF-PRODUIT</th>
      <th>DESCRIPTION-PRODUIT</th>
      <th>PRIX-PRODUIT</th>
      <th>ACTION</th>
      </tr>
      </thead>
      <tbody>
      
      <?php while($reponse=$resultat->fetch()){?>
    <tr>
      <td class="element" id="t1"><?php echo $reponse['idprod'];?></td>
      <td class="element" id="t2"><?php echo $reponse['refprod'];?></td>
      <td class="element" id="t3"><?php echo $reponse['descriptionprod'];?></td>
      <td class="element" id="t4"><?php echo $reponse['prixprod'];?></td>
      <td>
      <a href="editerproduit.php?idp=<?=$reponse['idprod']?>">
      <span class="glyphicon glyphicon-edit"></span>
      
      </a>

      <a onclick="return confirm('voulez vous supprimer ce produit?')" href="#">
      <span class="glyphicon glyphicon-trash"></span>
      </a>
      </td>
      </tr>
     <?php } ?>
     
      </tbody>
      <tfoot>
        <tr>

        <td colspan="3">Total:</td>
        <td id="totalo">=</td>
        </tr>
      </tfoot>
      </table>
     </div>
     
     </div>

     </div>
     <script>
      var sidonie=document.getElementById("ambroiseariane");
      sumval=document.getElementById("totalo");
      for(var i=1;i<sidonie.rows.length;i++){
      sumval.innerHTML= sumval.innerHTML+parseInt(sidonie.rows[i].cells[3].innerHTML);
       
      }
    console.log(n.innerHTML);
     
     </script>
    </body>
</HTML>
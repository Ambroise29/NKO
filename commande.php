
<?php
require_once('donneclient.php');
    $p=$_GET['param'];
    $reaf="SELECT * FROM PRODUITS  WHERE idprod=$p ";
    $stm=$pdo->prepare($reaf);
    $stm->execute();
    $tg=$stm->fetch();
    $ref=$tg['refprod'];
    $d=$tg['descriptionprod'];
    $pu=$tg['prixprod'];
 
    $erro=array();
    if(isset($_POST['add'])){
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $civilite=$_POST['civilite'];
        $ref=$_POST['ref'];
        $qt=$_POST['qts'];
        $total=$_POST['total'];
        $prixprod=$_POST['prixprod'];
        $dates=$_POST['dates'];

    }

    if(isset($_POST['vb'])){
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $civilite=$_POST['civilite'];

        $qt=$_POST['qts'];
        $total=$_POST['total'];
        $dates=$_POST['dates'];
        
        $insere="INSERT INTO CLIENTS(nom,prenom,civilite)VALUES(?,?,?)";
        $save=$pdo->prepare($insere);
        $save->execute(array($nom,$prenom,$civilite));

         $cm="SELECT * FROM CLIENTS ORDER BY idclient DESC";
         $aclient=$pdo->query($cm);
         $ac=$aclient->fetch();
         $idd=$ac['idclient'];


             
        $cmdo="INSERT INTO COMMANDES(qts,totales,idclient,idprod,datess)VALUES(?,?,?,?,?)";
        $nick=$pdo->prepare($cmdo);
        $nick->execute(array($qt,$total,$idd,$p,$dates));
    }
?>
<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8">
    <title>gestion des filieres</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet"  href="../jquery/jquery-3.5.1.min.js">
    <link rel="stylesheet" href="../css/monstyle.css">
    <style>
    
    .p1{
        width: 900px;
       
        height:100px;
    }

    .p2{
        width: 900px;
       
        height:100px;
        margin-top:25px;
    }
    .p3{
        width: 900px;
        
        height:100px;
        margin-top:25px;
    }
    .long1,.long2,.long3{
     width:250px;
     padding:10px;
    }
    .p1,.p2,.p3{
        margin-left:110px;
    }
    #FN{
        width:100px;
        margin-left:910px;
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
      <form method="POST">
    
      <div class="p1">
      <h5>INFOS-CLENT</h5>
      Nom:<input type="text" name="nom" id="nom"  class="long1"/>
      Preom:<input type="text" name="prenom" id="nom"class="long1" />
      civilite:<select name="civilite"  class="long1"/>>
      <option value="M" >Masculin</option>
      <option value="F">FEMININ</option>
      </select>
      </div>

     <div class="p2">
     <h5>INFOS-PRODUIT</h5>
     Ref:<input type="text" name="ref" id="ref" class="long2" value="<?php echo $ref?>"/>
     Designation:<input type="text" name="designation" class="long2 value="<?php echo $d?>"/>
     Prix:<input type="number" name="prixprod" class="long2" value="<?php echo $pu?>"/>
     </div>

     <div class="p3">
     <h5>INFOS-COMMANDE</h5>
     Qts:<input type="number" name="qts" class="long3"/>
     Total:<input type="number" name="total" class="long3"/>
     Datecmd:<input type="date" name="dates" class="long3"/>
     </div>
     <button typpe="submit" class="btn btn-primary" name="add">
     <span class="glyphicon glyphicon-save"></span>Ajouter
     </button>
     <button typpe="submit" class="btn btn-primary" name="vb" id="FN">
     <span class="glyphicon glyphicon-save"></span>Finalizar
     </button>
     </div>
     
      </form>
     </div>


     <div class="panel panel-primary" magetop>
     <div class="panel-heading"></div>
     <div class="panel-body">
      <table class="table table">
      <thead>
      <tr>
      <th>REF</th>
      <th>QTS</th>
      <th>PRIX</th>
      <th>TOTAL</th>
      <th>DATE</th>
      </tr>
      </thead>
      <tbody>
      <tr>
      <td><?php if(isset($_POST['add'],$_POST['ref'])){echo $ref;}?></td>
      <td><?php if(isset($_POST['add'],$_POST['qts'])){echo $qt;}?></td>
      <td><?php if(isset($_POST['add'],$_POST['prixprod'])){echo $prixprod;}?></td>
      <td><?php if(isset($_POST['add'],$_POST['total'])){echo $total;}?></td>
      <td><?php if(isset($_POST['add'],$_POST['dates'])){echo $dates;}?></td>
    
      </tr>
      </tbody>
      </table>
     </div>
     </div>

     </div>
     <?php
    
     ?>

    </body>
</HTML>
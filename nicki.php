<?php      
 require_once('identifier.php');   
require_once('connexiondb.php');  
if(isset($_POST['addp'])){
    if(isset($_SESSION['Cart'])){

        $idtable=array_column($_SESSION['Cart'],"id");

        if(!in_array($_GET['id'],$idtable)){
            $matable=array(
                'id'=>$_GET['id'],
                "ref"=>$_POST['refprod'],
                "dess"=>$_POST['dess'],
                "pix"=>$_POST['pix'],
                "quantite"=>$_POST['qts']
    
            );
            $_SESSION['Cart'][]=$matable;
        }

    }else{

        $matable=array(
            'id'=>$_GET['id'],
            "ref"=>$_POST['refprod'],
            "dess"=>$_POST['dess'],
            "pix"=>$_POST['pix'],
            "quantite"=>$_POST['qts']

        );
        $_SESSION['Cart'][]=$matable;
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
    <style>

        .longimg{
          width:200px;
          height:150px;
        }
        #vb{
            width:200px;
            margin-top:10px;
        }
        .long{
            width:200px;
          
        }
        .vg{
            margin-top:50px;
            border:solid 0px red;
            width:580px;
            margin-left:-5px;
        }
        h6{
            text-align:center;
            background:blue;
            color:white;
            padding:15px;
        }
        .tabs{
            margin-left:610px;
            margin-top:70px;
            border:solid 1px black;
            width:700px;
            position:fixed;
           
            
        }

        .cen{
            background:blue;
            color:white;
        }
        .nkk{
            position:fixed;
        }
       
        
    </style>
    </head>
    <body>

    <?php
      include("menup.php");

      $page=isset($_GET['page']) ? $_GET['page'] :1;
      $size=isset($_GET['size']) ? $_GET['size']:4;
      $arrete=($page-1)*$size;
      $produit="SELECT * FROM PRODUITS LIMIT $size offset $arrete";
      $stm=$pdo->query($produit);
      
      
      $com="SELECT COUNT(*) PP FROM PRODUITS LIMIT $size offset $arrete";
      $com=$pdo->query($com);
      $moi=$com->fetch();
      $np=$moi['PP'];
      echo $np;
      $reste=$np % $size;
      echo $reste;
      if($reste===0){
          $npage=($np/$size);
      }else{
          $npage=floor($np/$size)+1;
      }

      

    ?>
<div class="container-fluid vg">
<div class="row">
<div class="col-md-12">
<?php while($reponse=$stm->fetch()){?>
<form method="POST"action="nicki.php?id=<?=$reponse['idprod']?>">
<div class="col-md-6">
<img src="../images/<?=$reponse['photos'] ?>" class="longimg">
<h5><?=$reponse['descriptionprod']?></h5>
<h5 class="cent"><?=number_format($reponse['prixprod'],2).'$R'; ?></h5>
<input type="hidden" name="refprod" value="<?=$reponse['refprod']?>">
<input type="hidden" name="dess" value="<?=$reponse['descriptionprod']?>">
<input type="hidden" name="pix" value="<?=$reponse['prixprod']?>">
<input type="number" name="qts" value="1" class="long">
<input type="submit" name="addp" class="btn btn-warning btn-block" value="Add-Panier" id="vb"/>
</form> 
</div>                                                  
<?php } ?> 
</form>
</div> 
</div> 
</div> 

 <ul class="pagination pagination-sm">
 <?php

if(isset($_GET['action']))
{
    if($_GET['action']=="effacertout"){
    unset($_SESSION['Cart']);
    }

  }

      if(isset($_GET['ids']))
      {
      foreach($_SESSION['Cart'] as $key => $value) {
        if($_GET['ids']===$value['id']){
         unset($_SESSION['Cart'][$key]);
        }
     }


}
 for($i=1;$i<=$npage;$i++){?>

  <li class="page-item nkkr"><a href="nicki.php?page=<?=$i;?>"><?=$i++?></a></li>

<?php
}
?>

</ul> 
 
<nav class="navbar navbar- navbar-fixed-top tabs"> 
    <h6>MON PANIER</h6>
    <?php
    $total=0;
     $table="";
     $table.="
     <table class='table table-dark'>
     <thead>
     <tr>
     <th>ID</th>
     <th>REF</th>
     <th>DESIGNATION</th>
     <th>PRIX</th>
     <th>QUANTITE</th>
     <th>SOUS-TOTAL</th>
     <th>ACTION</th>
     </tr>
     </thead>
     ";
     if(!empty($_SESSION['Cart'])){
         foreach ($_SESSION['Cart'] as $key => $value) {
             $table.="
             <tr>
             <td>".$value['id']."</td>
             <td>".$value['ref']."</td>
             <td>".$value['dess']."</td>
             <td>".$value['pix']."</td>
             <td>".$value['quantite']."</td>
             <td>" .number_format($value['pix'] * $value['quantite'], 2)."</td>

              <td>
              <a href='nicki.php?ids=".$value['id']."'>
              <button type='submit' class='btn-danger my-block'>
              <span class='glyphicon glyphicon-remove'></span>Remove
              </button>
              <a/>
              </td>
               </tr>
             ";
             $total=$total+$value['pix']*$value['quantite'];
         }
            
             $table.="
             <tfoot>
             <tr>
             <td colspan='5'>Total:</td>
             <td class='cen'>".'R$' .' '.number_format($total,2)."</td>
           
             </tr>
            </tfoot>
            <td>
            <a href='nicki.php?action=effacertout'>
            <buton type='submit' class='btn btn-danger'>
            <span class='glyphicon glyphicon-remove'></span>Vider-Panier
            </buton>
            </a>
            </td>
            <td>
            <a href='nicki.php?action=enregistrer'>
            <buton type='submit' class='btn btn-danger'>
            <span class='glyphicon glyphicon-remove'></span>FINALISER
            </buton>
            </a>
            </td>
             ";
           
  
        
         //session_destroy();
     }
         
     echo $table;
    ?>
    <a href="client.php">Continuer</a>
</nav>

<?php 
if(isset($_GET['action'])){
   if($_GET['action']=="enregistrer"){
    if(isset($_SESSION['client'])){
        $idclient=$_SESSION['client']['idclient'];
        if(!empty($_SESSION['Cart'])){
            foreach ($_SESSION['Cart'] as $key => $value) {
               $idprod=$value['id'];
               $ref=$value['ref'];
               $des=$value['dess'];
               $pix=$value['pix'];
               $qtss=$value['quantite'];
               $somme=$pix*$qtss;
            
               $recv="INSERT INTO COMMANDES(qts,idclient,idprod,totals)VALUES(?,?,?,?)";
               $cmdb=$pdo->prepare($recv);$cmdb->execute(array($qtss,$idclient,$idprod,$somme));
             unset($_SESSION['Cart']);
             unset($_SESSION['client']);
             
            }
          }
         }
   

session_destroy();   
   }
 
}


?>
</body>


</HTML>


   
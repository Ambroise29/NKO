<?php
 require_once('identifier.php'); 
 require_once('connexiondb.php');
$revo=isset($_GET['rev']) ? $_GET['rev'] :'';
    $page=isset($_GET['page']) ? $_GET['page'] :1;
    $size=isset($_GET['size']) ? $_GET['size'] :20;
    $arreter=($page-1);
    $reaf="SELECT * FROM PRODUITS WHERE (refprod LIKE '%$revo%' OR prixprod LIKE '%$revo' OR  descriptionprod LIKE '%$revo') LIMIT $size offset $arreter ";
    $stm=$pdo->prepare($reaf);
    $stm->execute();

    $com="SELECT COUNT(*) P FROM PRODUITS WHERE (refprod LIKE '%$revo%' OR prixprod LIKE '%$revo' OR descriptionprod LIKE '%$revo')";
    $pd=$pdo->prepare($com);
    $pd->execute();
    $pn=$pd->fetch();
    $nb=$pn['P'];
    echo $nb;
    $reste=$nb % $size;
    if($reste===0){
        $npage=$nb/$size;
    }else{
        $npage=floor($nb/$size)+1;
    }
    

    ?>
<!DOCTYPE HTML>
<html>
<head>
<title>LISTE DES PRODUITS</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/monstyle.css">
    <style>
   .pa{
       display:inline-block;
       background-color: white;
       color: blue;
       border:solid 1px black;
   }
   table{
       margin-top: 70px;
   }
   h1{
       text-align:center;
       background:red;
       color:white;
       margin-top: 80px;
    
   }
   .sp{
       margin-left: 300px;
       font-family: 'Times New Roman', Times, serif;
       font-family: Arial, Helvetica, sans-serif;
   }
   input{
       margin-left:80px;
       padding:10px;
       width: 450px;
   }
  
    </style>
</head>
<body>
<?php
include('menup.php');
?>
<h1>LISTE DES PROUDUITS DISPONIBLE EN STOOCK</h1>
<form method="GET">

<input type="text" name="rev" placeholder="chercher par nom ou par prix"/>
<button type="submit" name="vb" class="btn btn-primary" >

<span class="glyphicon glyphicon-search"></span>Rechercher
</button>
<span class='alert-success sp'><?php echo 'Nous avons trouve:'.''.$nb.' '.'comme reponse de recherche.'?></span>
</form>
<div class="container">

<table class="table table">
<tbody>


<?php   while($reponse=$stm->fetch()){?>


 
             <tr>
              <td><?php echo  'IDPROD:'.$reponse['idprod'].'<br>'.'REF'.' '.$reponse['refprod'].'<br>'
                    .'DESIGNATION:'.$reponse['descriptionprod'].'<br>'
                   .'PRIX:'.$reponse['prixprod']. ' '.'R$'.'<br>'
               ?> 
               <td><a href="commande.php?param=<?php echo $reponse['idprod']; ?>">COMPRAR</a></td>
              </td>
             
             </tr>
       
    <?php }?>

</tbody>
<tfoot colspan="4">
<tr>

</tr>

</tfoot>
</table>


<div class="pagination">

<?php
  for($i=1;$i <=$npage;$i++){?>
  <ul class="pa">
 <button type="submit"> <li><a href="listaproduit.php?page=<?php echo $i;?>"><?php echo $i;?></a></li></button>
  
  </ul>
   
 <?php } ?>
</div>
  
</div>
</body>
</html>

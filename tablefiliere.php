<?php
require_once('identifier.php');
//$_SESSION['user']['role']="";
require_once('connexiondb.php');
$codenom=isset($_GET['codenom'])?$_GET['codenom']:"";
$page=isset($_GET['page'])?$_GET['page']:1;
$size=isset($_GET['size'])?$_GET['size']:4;
$arreter=($page-1)*$size;

// requete selecte filiere
$filiere="SELECT * FROM FILIERES 
WHERE (code LIKE '%$codenom%' OR nomfiliere LIKE'%$codenom%') LIMIT $size offset $arreter;";
$resultat=$pdo->query($filiere);

//quete compter nombre de filieres
$compteuser="SELECT COUNT(*) CM FROM FILIERES WHERE (code LIKE '%$codenom%' OR nomfiliere LIKE '%$codenom%')";
$stm=$pdo->prepare($compteuser);
$stm->execute();
$tr=$stm->fetch();
$nu=$tr['CM'];

// pagination
$reste=$nu % $size;
if($reste===0){
    $npage=($nu/$size);
}else{
   $npage=floor($nu/$size)+1;
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
      <form method="GET">
       <input type="text" name="codenom"/>
       <button type="submit" name="vb" class="btn btn-primary">
       <span class="glyphicon glyphicon-search">Recherche-Filiere</span>
       </button>

      <?php if($_SESSION['user']['role']=='ADMIN'){?>
         <a href="ajouterfiliere.php">
         <span class="glyphicon glyphicon-plus">Nouvelle-Filiere</span>
         </a>
     <?php }?>

      </form>
     </div>
     </div>

     <div class="panel panel-primary" magetop>
     <div class="panel-heading"></div>
     <div class="panel-body">
    <table class="table">
    <thead>
  <tr>
  <th>ID</th>
    <th>CODE</th>
    <th>NOM-FILIERE</th>
    <th>NIVEAU</th>
    <th>ACTION</th>
  
  </tr>
    </thead>
    <tbody>
    <?php while($reponse=$resultat->fetch()){?>
   <tr class="<?php echo $reponse['code']=='IG'? 'alert-danger':'alert-black' ?>">
   <td><?php echo $reponse['idfiliere']; ?></td>
   <td><?php echo $reponse['code']; ?></td>
   <td><?php echo $reponse['nomfiliere']; ?></td>
   <td><?php echo $reponse['niveau']; ?></td>
   <td>
    <?php if($_SESSION['user']['role']=='ADMIN'){ ?>

      <a href="editerfiliere.php? id=<?php echo $reponse['idfiliere'];?>">
      <span class="glyphicon glyphicon-edit">editer</span>
      </a>

      <a onclick="return confirm('voulez vous supprimer cette filiere ?')" 
      href="suprimerfiliere.php? id=<?php echo $reponse['idfiliere'];?>">
      <span class="glyphicon glyphicon-trash">suprimer</span>
      </a>

     <a href="ajouterfiliere.php">
     <span class="glyphicon glyphicon-plus"><i>ajouter</i></span>
     </a>

    <?php
    }
     ?>

   </td>
   </tr>
   <?php
     }
    ?>
    </tbody>
    </table>
     </div>

     <ul class="pagination">
        <?php for($i=1;$i<=$npage;$i++){?>
          <li class="<?php if($i==$npage) echo 'active'?>">
          <a href="tablefiliere.php?page=<?php echo $i;?>">
           <?php echo $i;?>
            </a>
          </li>
          <?php }?>
         
      </ul>

     </div>
     <a href="changerpwd.php">Changer votre mot de passe</a>
    </body>
</HTML>
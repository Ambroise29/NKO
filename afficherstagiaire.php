<?php
require_once('identifier.php');
include('connexiondb.php');
$nomprenom=isset($_GET['nomprenom'])?$_GET['nomprenom']:"";
$page=isset($_GET['page'])?$_GET['page']:1;
$size=isset($_GET['size'])?$_GET['size']:6;
$arreter=($page-1)*$size;

$stagiaire="SELECT idstag,nom,prenom,civilite,code,nomfiliere ,photos
 FROM STAGIAIRES as s,FILIERES as f
WHERE s.idfiliere=f.idfiliere
AND (nom LIKE '%$nomprenom%' OR prenom LIKE '%$nomprenom%')
LIMIT $size
offset $arreter ";
$stm=$pdo->query($stagiaire);

// requet compter
$cont="SELECT COUNT(*) PF FROM STAGIAIRES WHERE (nom LIKE '%$nomprenom%' OR prenom LIKE '%$nomprenom%') ";
$b=$pdo->query($cont);
$d=$b->fetch();
$ng=$d['PF'];
$reste=$ng % $size;
if($reste===0){
    $npage=($ng/$size);
}else{
   $npage=floor($ng/$size)+1;
}


?>
<!DOCTYPE HTML>
<head>
<htm <meta charset="utf-8">
    <title>gestion des filieres</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/monstyle.css">
    </head>
    <body>
    <?php
      include("menup.php");
     ?>
     <div class="container">
     <div class="panel panel-success  magetop">
     <div class="panel-heading">RECHRCHER PAR NOM & PRENOM</div>
     <span class="glyphicon glyphiccon-alerte">Nombre de resultat de recherche:<?php echo $ng ?></span>
     <div class="panel-body">
     <form method="GET" enctype="multipart/form-data">
            <input type="text" name="nomprenom" class="f">
            <button type="submit" name="vb" class="btn btn-success" id="vbb" >
                <span class="glyphicon glyphicon-search"></span>REWCHERCHER
            </button>
        </form>
     </div>
     </div>
    <bdy>
        
       
<?php while($total=$stm->fetch()){?>
    <div class="ta">
    <?php echo "Matricule:"  .$total['idstag'];?> <br>
     <?php echo "Nom:"  .$total['nom'];?> <br>
    <?php echo 'Prenom:'  .$total['prenom']?> <br>
    <?php echo ' SEXE:' .$total['civilite']?> <br>
    <?php echo 'Code-Filiere:'    .$total['code']?> <br>
    <?php echo 'Nom-Filiere:'  .$total['nomfiliere'] . '***************** =>'?> 
      <a href="editerimage.php?image="<?php echo $total['idstag']?>">
      <img src="../images/<?php echo $total['photos']?> "class="vbb"/> <br>
     </a>
    </div>

    <?php
    }?>
     <div class="po">
     <ul class="pagination">
        <?php for($i=1;$i<=$npage;$i++){?>
          <li class="<?php if($i==$npage) echo 'active'?>">
          <a href="afficherstagiaire.php?page=<?php echo $i;?>">
           <?php echo $i;?>
            </a>
          </li>
          <?php }?>
         
      </ul>
     </div>
    </bdy>
</html>
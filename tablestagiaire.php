
<?php
require_once('identifier.php');
require_once('connexiondb.php');//connexion a la base de donnee
$nomprenom=isset($_GET['nomprenom'])?$_GET['nomprenom']:"";
$page=isset($_GET['page'])?$_GET['page']:1;
$size=isset($_GET['size'])?$_GET['size']:4;
$arreter=($page-1)*$size;
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

//requete stagiaire

$requetstagiaire="SELECT idstag,nom,prenom,civilite,photos,code,nomfiliere,dateentrer,datesortir
 FROM STAGIAIRES as s,FILIERES as f
 WHERE f.idfiliere=s.idfiliere AND (nom LIKE '%$nomprenom%' OR prenom LIKE '%$nomprenom%')
 ORDER BY idstag
 LIMIT $size offset $arreter";
 $resultat=$pdo->query($requetstagiaire);
 //fin requete stagiaire
?>
<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8">
    <title>Modifier Stagiaire</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/monstyle.css">
    <script type="text/javascript" src="../jquery/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../jquery/ambroise.js"></script>
    </head>
    <body>
    <?php
      include("menup.php");
     ?>
     <div class="container">
     <div class="panel panel-primary  magetop">
     <div class="panel-heading">RECHERCHER PAR NOM OU PAR PRENOM</div>
     <div class="panel-body">
     </div>
     <form method="GET" class="form-inline">
        <input type="text" name="nomprenom"/>
        <button type="submit" value="btn" class="btn btn-primary">
         <span class="glyphicon glyphicon-search"></span>Rechercher
       </button>
           <?php if($_SESSION['user']['role']=='ADMIN')
           {?>
            <a href="ajouterstagiaire.php">
            <span class="glyphicon glyphicon-plus"></span>Nouvelle-Stagiaire
            </a>

           <?php };?>
          &nbsp ,&nbsp

       <a href="afficherstagiaire.php">
         <span class="glyphicon glyphicon-plus alert-danger">LISTA -STAGIAIRE</span>
       </a>

       </form>
     </div>

     <div class="panel panel-primary" magetop>
     <div class="panel-heading">  LISTES DES STAGIAIRES(<?php echo $ng ?>) <input type="number" id="mm"/></div>

     <div class="panel-body">
     <table class="table" id="tp">
     <thead>
     <tr>
     <th>ID</th>
     <th>Nom</th>
     <th>Prenom</th>
     <th>Civilite</th>
     <th>Code-filiere</th>
     <th>Nom-Filiere</th>
     <th>Date -Entrer</th>
     <th>Date-Sortir</th>
     <th>Photo</th>
     <?php if($_SESSION['user']['role']=='ADMIN'){?>
       <th>ACTION</th>
       
    <?php
    }?>
     
     </tr>
     </thead>
     <tbody>
     <?php while($reponse=$resultat->fetch()){?>
     <tr>
     <td class="pl"><?php echo $reponse['idstag']; ?></td>
     <td class="pl"><?php echo $reponse['nom']; ?></td>
     <td class="pl"><?php echo $reponse['prenom']; ?></td>
     <td class="pl"><?php echo $reponse['civilite']; ?></td>
     <td class="pl"><?php echo $reponse['code']; ?></td>
     <td class="pl"><?php echo $reponse['nomfiliere']; ?></td>
     <td class="pl"><?php echo $reponse['dateentrer']; ?></td>
     <td class="pl"><?php echo $reponse['datesortir']; ?></td>
     <td class="pl"><img src="../images/<?php echo $reponse['photos']?>" width="50" heigth="10px"></td>
     <td>

     <?php if($_SESSION['user']['role']=='ADMIN'){ ?>
      
     <a href="editerstagiaire.php?ids=<?php echo $reponse['idstag']; ?>">
     <span class="glyphicon glyphicon-edit"></span>
     </a>

     <a onclick="return confirm('Vous etes su de supprimer ?')" href="suprimerstagiaire.php? idstag=<?php echo $reponse['idstag']; ?>">
     <span class="glyphicon glyphicon-trash"></span>
     <a>
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
    
<div>
     <ul class="pagination">
        <?php for($i=1;$i<=$npage;$i++){?>
          <li class="<?php if($i==$npage) echo 'active'?>">
          <a href="tablestagiaire.php?page=<?php echo $i;?>">
           <?php echo $i;?>
            </a>
          </li>
          <?php }?>
         
      </ul>
     </div>
     </div>
     </div>
     </div>
    </body>
</HTML>

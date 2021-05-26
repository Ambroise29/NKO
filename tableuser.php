<?php
require_once('identifier.php');
include('connexiondb.php');
$loginemail=isset($_GET['user'])?$_GET['user']:"";
$page=isset($_GET['page'])?$_GET['page']:1;
$size=isset($_GET['size'])?$_GET['size']:8;
$arreter=($page-1)*$size;
$user="SELECT * FROM UTILISATEURS WHERE 
 (logins LIKE'%$loginemail%' OR emails LIKE '%$loginemail%' )
LIMIT $size offset $arreter " ;
$resultat=$pdo->query($user);
// rrequte compter
$compteuser="SELECT COUNT(*) CM FROM UTILISATEURS WHERE (logins LIKE '%$loginemail%' OR emails LIKE '%$loginemail%')";
$stm=$pdo->prepare($compteuser);
$stm->execute();
$tr=$stm->fetch();
$nu=$tr['CM'];
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
     <div class="panel-heading">USARIO</div>
     <div class="panel-body">
      <form method="GET">
          <input type="text" name="user" class="userchamp">
          <button type="submit" class="btn btn-success" name="vbuser">
              <span class="glyphicon glyphicon-search">rechercher</span>
          </button>
          <?php 
               if($_SESSION['user']['role']=='ADMIN'){?>
               <a href="ajouteruser.php" class="btn btn-primary">
               <span class="glyphicon glyphicon-plus"></span>Noueau User
               </a>
               
          <?php
          }
          ?>
      </form>
     </div>
     </div>

     <div class="panel panel-primary" magetop>
     <div class="panel-heading">Nombre d'utilisateur:(<?php echo $nu ?>)</div>
     <div class="panel-body">
     <table class="table table table-striped">
         <thead>
             <tr>
                 <th>ID</th>
                 <th>Login</th>
                 <th>Email</th>
                 <th>Role</th>
                 <th>Photo</th>
             </tr>
         </thead>
         <tbody>
             <?php while($reponse=$resultat->fetch()){?>
                <tr class="<?php echo $reponse['etats']==0 ? 'danger':'alert-info'?>">
                 <td><?php echo $reponse['iduser']?></td>
                 <td><?php echo $reponse['logins']?></td>
                 <td><?php echo $reponse['emails']?></td>
                 <td><?php echo $reponse['role']?></td>
                 <td><img src="../images/<?php echo $reponse['photos']?>" width="50px" height="50px"/></td>
                 <td>

                 <a href="editeruser.php?id=<?php echo  $reponse['iduser'] ?>">
                  <span class="glyphicon glyphicon-edit"></span>
                </a>

                 <?php if($_SESSION['user']['role']=='ADMIN'){ ?>
                 
                <a onclick="return confirm('voulez vous supprimer utilisateur?')" href="suprimeruser.php?iduser=<?php echo $reponse['iduser']?>">
                <span class="glyphicon glyphicon-trash"></span>
               </a>  
               
                <a href="activerdesactiver.php?id=<?php echo  $reponse['iduser'] ?>">
                  
                  <?php
                     if($reponse['etats']==0){
                         echo '<span class="glyphicon glyphicon-remove"></span>';
                         
                     }else{
                        echo '<span class="glyphicon glyphicon-ok"></span>'; 
                     }
                     ?>
    
                  </a>


                 <?php     
                  }
                  ?>
                </td>
                <?php
                  }
                  ?>
             </tr>
           
         </tbody>
     </table>
     </div>
         
<div>
     <ul class="pagination">
        <?php for($i=1;$i<=$npage;$i++){?>
          <li class="<?php if($i==$npage) echo 'active'?>">
          <a href="tableuser.php?page=<?php echo $i;?>">
           <?php echo $i;?>
            </a>
          </li>
          <?php }?>
         
      </ul>
     </div>
     </div>

     </div>
    </body>
</HTML>
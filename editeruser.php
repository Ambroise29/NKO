<?php
 require_once('identifier.php'); 
include('connexiondb.php');
$mh="";
$iduser=isset($_GET['id'])?$_GET['id']:1;
$edit="SELECT * FROM UTILISATEURS WHERE iduser=?";
$param=array($iduser);
$stm=$pdo->prepare($edit);
$stm->execute($param);
$user=$stm->fetch();
$idus=$user['iduser'];
$logins=$user['logins'];
$email=$user['emails'];
$roles=strtoupper($user['role']);
$civilite=$user['etats'];
$photo=$user['photos'];
$usersss=$user['pwd'];

switch ($roles) {
    case 'ADMIN':
           $mh= 'vous etes un  aministrateur';
        break;

        case 'USER':
            $mh= 'vous etes un simpleuser';
         break;
        case 'VISITEUR':
            $mh= 'vous etes un visiteur';
        break;
    
    default:
            $mh='suis desole';
        break;
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
      CRIAR SUA CONTA USUARIA
     </div>
     </div>

     <div class="panel panel-primary" magetop>
     <div class="panel-heading"><span class="alert-danger"><?php if(isset($mh)){ echo $mh;}?></span></div>
     <div class="panel-body">
      <form method ="post" enctype="multipart/form-data" action="updateuser.php">
      <div class="form-grup">
          <label for"login">ID:</label>
          <input type="number" name="iddd" class="form-control" value="<?php echo $idus?>"/>
      </div>
      <div class="form-grup">
          <label for"login">Login:</label>
          <input type="text" name="login" class="form-control" value="<?php echo $logins ?>"/>
      </div>

      <div class="form-grup">
          <label for"email">Email:</label>
          <input type="email" name="emails" class="form-control"value="<?php echo $email ?>"/>
      </div>

      <div class="form-grup">
          <label for"Role">Role:</label>
          <select name="roles" class="form-control">
           
              <option value="ADMIN"<?php if($roles=="ADMIN") echo "selected" ?>>Administrateur</option>

              <option value="USER"<?php if($roles=="USER") echo "selected" ?>>USER</option>
              <option value="PARTICULIER"<?php if($roles=="PARTICULIERE") echo "selected" ?>> PARTICULIER</option>
          </select>
      </div>
      
      <div class="form-grup">
          <label for"passwd">Mot de passe:</label>
          <input type="password" name="pass" class="form-control" value="<?php echo $usersss ?>"/>
      </div>
      <div class="form-grup">                     
          <label for"photo">Photo:</label>
          <input type="file" name="photo" class="form-control"/>
      </div>
      <button type="submit" class="btn btn-success">
          <span class="glyphicon glyphicon-save"></span>
          Salvar
      </button>

    </form>
     </div>
     </div>
     

     </div>
    </body>
</HTML>

<?php
require_once('connexiondb.php');
if(isset($_POST['vb'])){
         $emails=$_POST['ema'];
         $valid=array();
         $resultat="";

    if(empty($emails)){
        $valid[]="Taper votre email de recuperation";
    }else{

          $req="SELECT * FROM UTILISATEURS WHERE emails=?";
          $resultat=$pdo->prepare($req);
          $resultat->execute(array($emails));
          $n=$resultat->fetch();
          $id=$n['iduser'];
          $pass=$n['pwd'];

        if($resultat->rowCount()){
              
           $head="MIME-Version:1.0\r\n";
           $head.='From:"GESTIONSTAGIAIRE.COM"<support@GESTIONSTAGIAIRE.COM>'."\n";
           $head.='Content-Type:text/html;charset="utf-8" '."\n";
           $head.='Content-Transfer-Encoding:8bits';
           $to=$emails;
           $objet="RECUPERATION DE MOT DE PASSE";
           $message='Votre mot de passe est: '.$pass;
           mail($to,$objet,$message,$head);
           $valid[]="Nous venons d'envoyer un email de recuperation sur votre email,veillez confirmer";

        }else{
            $valid[]="votre email de recuperation ne correspond a aucun compte utilisateur";
    
        }
       
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
    .vbn{
        margin-top:20px;
        width: 400px;
        padding: 8px;
    }
    .up{
        padding: 20px;
    }
    h4{
       text-align:center;
    }
    </style>
    </head>
    <body>
   
     <div class="container">
     <div class="panel panel-primary  magetop">
     <div class="panel-heading"><h4>Reinitialisation de mot de passe</h4></div>
     <div class="panel-body">
     <form method="POST">
     <input type="text" class="form-control up" value="<?php if(isset($emails)){echo $emails;}?>" name="ema" placeholder="Taper votre email de recuperation"/>
     <button type="submit" class="btn btn-success vbn" name="vb">
     <span class="glyphicon glyphicon-save"></span>ENVOYER
     </button>
     </form>
     </div>
     </div>

     <div class="panel panel-primary" magetop>
     <div class="panel-heading"></div>
     <div class="panel-body">

     <?php
         if(isset($valid))
     {

         foreach ($valid as $ariane) 
          {
            echo '<div class="alert alert-danger">'.$ariane.'</div>';
        
           }   
       }
     ?>
     </div>
     </div>

     </div>
    </body>
</HTML>
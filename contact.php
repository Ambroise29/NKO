<?php
require_once('connexiondb.php');
if(isset($_POST['vb'])){
    $nom=$_POST['nom'];
    $to=$_POST['email'];
    $message=$_POST['msg'];
    $destinataire="gestionstagiaire2021@gmail.com";
    $head="MIME-Version:1.0\r\n";
    $head.='From:"GESTIONSTAGIAIRE.COM"<support@GESTIONSTAGIAIRE.COM>'."\n";
    $head.='Content-Type:text/html;charset="utf-8" '."\n";
    $head.='Content-Transfer-Encoding:8bits';
    $com=$to.'<br>'.$nom.'<br>'.$message;
    $et=array();
    if(empty($nom)){
        $et[]="veillez entrer votre nom complet";
    }else if(empty($to)){
        $et[]="veillez entrer votre email"; 
    }else if(empty($message)){
        $et[]="veillez entrer votre message";

    }

    mail($destinataire,$nom,$com,$head);
     $to="";
     $nom="";
     $message="";
   
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/monstyle.css">
    </head>
<style>
form{
    text-align:center;
    width: 500px;
    margin-left: 400px;
    height: 425px;
    margin-top: 80px;
    background: black;
    opacity:8s
}
.lp{
    width: 400px;
    padding: 15px;
    display: inline-block;
    
}
.lp1{
    width: 405px;
    height: 200px;
    margin-top: 25px;
}
.bp{
    margin-top: 15px;
}
h2{
    text-align: center;
    background-color:blue;
    color:white;
}
.vb{
    width: 200px;background-color:green;
    color: white;
}
</style>
</head>

<body>
<?php
      include("menup.php");

     ?>
 <form method="POST">
 <h2>CONTATEZ-NOUS</h2>
 <input type="text" name="nom" class="lp" placeholder="votre nom" value="<?php if(isset($nom)){echo $nom;}?>"/>
 <input type="email" name="email" class="lp bp" placeholder="votre email"value="<?php if(isset($to)){echo $to;}?>"/><br>
<textarea name="msg" class="lp1" placeholder="Taper votre message"value="<?php if(isset($message)){echo $message;}?>"></textarea><br>
<input type="submit" name="vb" value="ENVOYER" class="vb">
<?php
if(isset($et)){
    foreach($et as $ambroise){

        echo '<div class="alert alert-danger">'.$ambroise.'</div>';
    }
}
?>
 </form>
</body>
</html>

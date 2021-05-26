<?php
require_once('connexiondb.php');
require_once('../LESFONCTIONS/fonctions.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
$login=$_POST['loginss'];
$email=$_POST['emails'];
$pwd=$_POST['pass'];
$pwd1=$_POST['pass1'];
$npass=MD5($pwd);
$nomphoto=isset($_FILES['photos']['name'])? $_FILES['photos']['name']:"";
$imatemp=$_FILES['photos']['tmp_name'];
move_uploaded_file($imatemp,"../images/".$nomphoto);
$ambroise=array();
$nnb;
   if(empty($login)){
       $ambroise[]="Taper votre login";
   }else if(strlen($login)<6){
       $ambroise[]="votre login doit atteindre 6 caracteres";
   }else if(empty($pwd) || empty($pwd1)){
       $ambroise[]="veillez remplir les champs mot de passe";
   }else if(strlen($pwd)<4){
       $ambroise[]="votre mot de passe doit atteindre 4 caracteres";
   }else if($pwd!==$pwd1){
       $ambroise[]="Les mots de passe ne correspondent pas";
   }elseif(empty($email)){
     $ambroise[]="veillez entrer votre email";   
   }else if(recherche_par_login($login)==true){
    $ambroise[]="Un compte existe deja avec ce login";
   }else if(recherche_par_email($email)==true){
    $ambroise[]="Un compte existe deja avec ce email";
   }else{
       
    $requser="INSERT INTO UTILISATEURS(logins,emails,pwd,photos)VALUES(?,?,?,?)";
    $param=array($login,$email,$npass,$nomphoto);
    $stm=$pdo->prepare($requser);
    $stm->execute($param);
    $login="";
    $email="";
    $pwd="";
    $pwd1="";
    $ambroise[]= "Felicitatio!!!!!!! votre compte a ete cree avec succes";  
   // header('location:refresh:5'. 'tableuser.php');
    header("refresh:2,url=tableuser.php");

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
    </head>
    <body>
    <?php
      include("menup.php");
     ?>
     <div class="container">
     <div class="panel panel-primary  magetop">
     <div class="panel-heading"></div>
     <div class="panel-body">
      CRIAR SUA CONTA USUARI
     </div>
     </div>

     <div class="panel panel-primary" magetop>
     <div class="panel-heading"><div class="alert-danger">
         <?php
         if(isset($ambroise)){

        foreach ($ambroise as $ariane) {
            echo '<div class="alert alert-danger">'.$ariane.'</div>';
        
         }   
       }
     ?>
     
    </div></div>
     <div class="panel-body">
      <form method ="POST" enctype="multipart/form-data">
     
      <div class="form-grup">
          <label for"passwd">Login:</label>
          <input type="text"
           name="loginss" class="form-control" 
           placeholder="Taper votre login"
           value="<?php if(isset($login)){echo $login;}?>"
         
           />
      </div>
      
      <div class="form-grup">
          <label for"passwd">Email:</label>
          <input type="email"
           name="emails" class="form-control" 
           placeholder="Taper votre email"
           value="<?php if(isset($email)){echo $email;}?>"
           />
      </div>

      <div class="form-grup">
          <label for"passwd">Mot de passe:</label>
          <input type="password"
           name="pass" class="form-control" 
           placeholder="Taper votre mot de passe"
           id="pw1" 
           value="<?php if(isset($pwd)){echo $pwd;}?>"         
           />
         
           <input type="checkbox" id="cp1"/>

      </div>

      <div class="form-grup">
          <label for"passwd">Mot de passe:</label>
          <input type="password"
           name="pass1" class="form-control" 
           placeholder="Confirmer le mot de passe"
           id="pw2"
           value="<?php if(isset($pwd1)){echo $pwd1;}?>"
           />
           <input type="checkbox" id="cp2"/>
      </div>
    
    <div class="form-grup">
          <label for"passwd">Photo:</label>
          <input type="file"
           name="photos" class="form-control" 
           placeholder="Selectionner votre photo"
           
           />
      </div>

      <input type="submit" class="btn btn-success" name="vb" value="Salvar"/>
    </form>
   
     </div>
     </div>
     </div>
     <script type="text/javascript" src="../jquery/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
      
      var p1=$('#pw1');
      var p2=$('#pw2');
      var p11=$('#cp1');
      var p22=$('#cp2');
      $('document').ready(function(){
          p11.click(function(){
             if(p11.prop('checked')){
                  p1.attr('type','text');
              }else{
                p1.attr('type','password'); 
              }

          });

          p22.click(function(){
             if(p22.prop('checked')){
                  p2.attr('type','text');
              }else{
                p2.attr('type','password'); 
              }

          });

      });
    
    </script>
    
    </body>
</HTML>
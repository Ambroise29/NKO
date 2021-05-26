<?php
require_once('identifier.php');
include('connexiondb.php');
if(isset($_POST['vb'])){
  $date1=isset($_POST['date1'])? $_POST['date1']:"";
  $date2=isset($_POST['date2'])? $_POST['date2']:"";
  $nom=isset($_POST['nom'])? $_POST['nom']:"";
  $prenom=isset($_POST['prenom'])? $_POST['prenom']:"";
  $civilite=isset($_POST['civilite'])? $_POST['civilite']:"F";
  $nomfiliere=isset($_POST['F'])? $_POST['F']:0;
  $nomphoto=isset($_FILES['photo']['name'])? $_FILES['photo']['name']:"";
  $imatemp=$_FILES['photo']['tmp_name'];
  move_uploaded_file($imatemp,"../images/".$nomphoto);
  $stagiaire="INSERT INTO STAGIAIRES(nom,prenom,civilite,photos,idfiliere,dateentrer,datesortir)VALUES(?,?,?,?,?,?,?)";
  $param=array($nom,$prenom,$civilite,$nomphoto,$nomfiliere,$date1,$date2);
  $insert=$pdo->prepare($stagiaire);
  $insert->execute($param);
  header('Location:tablestagiaire.php');

}
$filiere="SELECT * FROM FILIERES";
$resultatfiliere=$pdo->prepare($filiere);
$resultatfiliere->execute();

?>
<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8">
    <title>gestion des filieres</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/monstyle.css">
    <link rel="stylesheet" href="../jquery/jquery-ui.min.css">
    </head>
    <body>
    <?php
      include("menup.php");
     ?>
     <div class="container">
     <div class="panel panel-primary  magetop">
     <div class="panel-heading">ENREGISTREMENT-STAGIAIRE</div>
     <form  method="post" enctype="multipart/form-data">
     <div class="panel-body">
       
     <label class="nomst">Date-Entrer:</label>
      <input type="text" name="date1" id="date1" class="dat"/>
      
      
      <label class="nomst">Date-Sortir:</label>
      <input type="text" name="date2" id="date2" class="dat"/>
     </div>
     </div>

     <div class="panel panel-primary" magetop>
     <div class="panel-heading"></div>
     <div class="panel-body">
    
      <div class="form-grup">
      <label class="nomst">Nom-Stagiaire:</label>
      <input type="text" name="nom" id="nom-stagiaire" class="form-control" placeholder="votre nom"/>
      </div>
      <div class="form-grup">
      <label class="nomst">Prenom-Stagiaire:</label>
      <input type="text" name="prenom" id="nom-stagiaire" class="form-control" placeholder="votre prenom"/>
      </div>
      <div class="form-grup">
      <label class="civilite">civilite:</label></br>
        <input type="radio" value="M" name="civilite">M </br>
        <input type="radio" value="F" name="civilite">F
      </div>
      <div class="form-grup">
      <label class="filiere">FILIERE:</label>
        <select name="F" class="form-control">
        <option value="all"></option>
        <?php while($reponse=$resultatfiliere->fetch()){?>
        <option value="<?php echo $reponse['idfiliere'];?>"><?php echo $reponse['nomfiliere'];?></option>
        <?php }?>
        </select>
      </div>
      <div class="form-grup">
      <labe>Photo:</labe>
      <input type="file" name="photo" id="photo" class="form-control"/>
      </div>
    

     <div class="form-grup">
     <button type="submit" class="btn btn-success" name="vb" id="btn">
      <span class="glyphicon glyphicon-save"></span>ADICIONAR
      </button>
     </div>
      </form>
     </div>
     </div>

     </div>
     <script type="text/javascript" src="../jquery/jquery-3.5.1.min.js"></script>
     <script type="text/javascript" src="../jquery/jquery-ui.min.js"></script>
     <script>

      $('#date1').datepicker({
         dateFormat:"dd-mm-yy"
       });
       $('#date2').datepicker({
        dateFormat:"dd-mm-yy"
       });
     </script>
    </body>
</HTML>
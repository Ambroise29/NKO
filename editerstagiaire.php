<?php
require_once('identifier.php');
include('connexiondb.php');
$idstagiaire=$_GET['ids'];
//remplissage filiere
$filiere =" SELECT * FROM FILIERES ";
$resultatfiliere=$pdo->query($filiere);

//remplissage  du formulaire
$stagiaire="SELECT * FROM STAGIAIRES WHERE idstag=$idstagiaire";
$stm=$pdo->query($stagiaire);
$nbstag=$stm->fetch();
$civilite= strtoupper($nbstag['civilite']);
$idFF=$nbstag['idfiliere'];
echo $idFF;







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
     <div class="panel-heading"></div>
     <form  method="POST" action="updatestagiaire.php" enctype="multipart/form-data">
     <div class="panel-body">
     <label class="nomst">Date-Entrer:</label>
      <input type="text" name="date1" id="date1" class="dat"value="<?php echo  $nbstag['dateentrer']?>"/>
      
      <label class="nomst">Date-Sortir:</label>
      <input type="text" name="date2" id="date2" class="dat"value="<?php echo  $nbstag['datesortir']?>"/>
     </div>

     <div class="panel panel-primary" magetop>
     <div class="panel-heading"></div>
     <div class="panel-body">
      
      <div class="form-grup">
      <label class="nomst">ID:</label>
      <input type="number" name="idstag" id="nom-stagiaire" class="form-control"
       placeholder="votre nom" value="<?php echo  $nbstag['idstag']?>"/>
      </div>

      <div class="form-grup">
      <label class="nomst">Nom-Stagiaire:</label>
      <input type="text" name="nom" id="nom-stagiaire" class="form-control"
       placeholder="votre nom" value="<?php echo  $nbstag['nom']?>"/>
      </div>
      <div class="form-grup">
      <label class="nomst">Prenom-Stagiaire:</label>
      <input type="text" name="prenom" id="nom-stagiaire" class="form-control"
       placeholder="votre prenom" value="<?php echo  $nbstag['prenom']?>"/>
      </div>
      <div class="form-grup">
      <label class="civilite">civilite:</label></br>
      <label><input type="radio" name="civilite" value="F"
      <?php if($civilite==="F") echo "checked" ?>/>F</label><br>
      <label><input type="radio" name="civilite" value="M"
       <?php if($civilite==="M") echo "checked"?> />M</label> 
     
       
      </div>
      <div class="form-grup">
      <label class="filiere">FILIERE:</label>
        <select name="nomF" class="form-control">
        <?php while($reponse=$resultatfiliere->fetch()){?>
        <option value="<?php echo $reponse['idfiliere'];?>"
        <?php if($idFF===$reponse['idfiliere']) echo "selected" ?>><?php echo $reponse['nomfiliere']?></option>
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

<?php
require_once('identifier.php');
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<style>
.nom{
    display: inline;
    padding: 10px;
    width: 300px;
    margin-left: 30px;
    margin-top: 65px;
}
th{
    background: red;color:white;
}
td{
    background:blue;
    color:white;
    margin-top: 100px;
}
img{
    opacity: 2s;
}
table{
    margin-top: 15px;
}
</style>
</head>
<body>
<?php
include('menup.php');
?>
<form method="POST">
<input type="text" name="nom" class="nom" placeholder="votre nom"/>
<input type="date" name="dates" class="nom" placeholder="dte dentrer"/>
<input type="submit" value="TESTER" name="vb" class="nom"><span class="alert-info">Rechercher par nom et date d'admission</span>

</body>
</html>

<?php
require_once('connexiondb.php');
require_once('../LESFONCTIONS/fonctions.php');
if (isset($_POST['vb'])) {
    $nom=$_POST['nom'];
    $daate=$_POST['dates'];
    $resultats=explode('-', $daate);
    $d=array();

    if (empty($nom)) {
        $d[]="VEILLEZ REMPLIR VOTRE NOM";
    } elseif (empty($daate)) {
        $d[]="VEILLEZ REMPLIR la date";
    } else {
        $j=$resultats[2];
        $mois=$resultats[1];
        $anne=$resultats[0];
        $dav= $j.'-'.$mois.'-'.$anne;

        if (arianeamour($nom, $dav)>0) {
            $nom=arianeamour($nom, $dav)['nom'];
            $prenom=arianeamour($nom, $dav)['prenom'];
            $civilite=arianeamour($nom, $dav)['civilite'];
            $photo=arianeamour($nom, $dav)['photos'];
            $date1=arianeamour($nom, $dav)['dateentrer'];
            $date2=arianeamour($nom, $dav)['datesortir'];
            $photo=arianeamour($nom, $dav)['photos'];
            $code=arianeamour($nom, $dav)['code'];
            $filiere=arianeamour($nom, $dav)['nomfiliere'];
  
            echo '<table class="table table ">
            <thead>
            <tr>
            <th>Nom</th>
            <th>Preom</th>
            <th>Civilite</th>
            <th>dateentrer</th>
            <th>Datesortie</th>
            <th>Code</th>
            <th>LibFiliere</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td>'.$nom.'</td>
            <td>'.$prenom.'</td>
            <td>'.$civilite.'</td>
            <td>'.$date1.'</td>
            <td>'.$date2.'</td>
            <td>'.$code.'</td>
            <td>'.$filiere.'</td>
            </tr>
            </tbody>
            
            
        </table>';
        echo '<img src="../images/'.$photo.'" width="1280px" height="1000px"/>';

        } else {
            $d[]="desole";
        }
      
    }
}
?>
   
   </form>
<?php
if(isset($d)){
    foreach($d as $am){
        echo '<div class="alert alert-danger">'.$am.'</div>';
    }
}

?>

      











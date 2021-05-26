if(isset($_GET['page']){
    $page = $_GET['page'];
}else{
    $page =1;
}
if(isset($_GET['size'])){
    $size = $_GET['size'];
}else{
    $size =4;
}
$arreter=($page-1)*$size;
//connexion a la base de donnee
require_once('connexiondb.pph');
$requete="SELECT * FROM FILIERES LIMITE $size offset $arreter";
$requete="SELECT COUNT(*) countp FROM FILIERES ";
$resultat=$pd->query($requete);
$ntotale=$resultat->fetch();
$nligne=$ntotale['countp'];

$reste=$nligne % $size;
if($reste===0){
    $npage=$nligne/$size;
}else{
    $npage=floor($nligne/$size)+1;
}

$nomphoto=isset($_FILES['photo']['name'])? $_FILES['photo']['name']:"";
$imatemp=$_FILES['photo']['tmp_name'];
move_uploaded_file($imatemp,"../images/".$nomphoto);
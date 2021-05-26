<?php

function recherche_par_login($login){
    Global $pdo;
    $reqlog="SELECT * FROM UTILISATEURS WHERE logins=?";
    $resultat=$pdo->prepare($reqlog);
    $resultat->execute(array($login));
    return $resultat->rowCount();
}


function recherche_par_email($email){
    Global $pdo;
    $reqlog="SELECT * FROM UTILISATEURS WHERE emails=?";
    $resultat=$pdo->prepare($reqlog);
    $resultat->execute(array($email));
    return $resultat->rowCount();
}

function arianeamour($nom,$dates){
    Global $pdo;
    $reqlog="SELECT nom,prenom,civilite,photos,dateentrer,datesortir,code,nomfiliere FROM STAGIAIRES as s,FILIERES as f
     WHERE s.idfiliere=f.idfiliere AND nom =? AND dateentrer=?";
    $resultat=$pdo->prepare($reqlog);
    $resultat->execute(array($nom,$dates));
    return $resultat->fetch();
}

function afficherprod($nom,$mage,$limite){
Global $pdo;
$reqafficher="SELECT * FROM PRODUITS WHERE 
(refprod LIKE '% $nom%' OR prixprod LIKE '%$nom%') 
LIMIT $mage offset $limite ";
$resultat=$pdo->query($reqafficher);
return $resultat;

}


 
   

?>

<?php


   
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
<ul class="nav navbar-nav navbar-">
<li><a href="imprimer.php">imprimer</a></li>
<li><a href="tablefiliere.php">FILIERES</a></li>
<li><a href="tablestagiaire.php">Lista stagiaires</a></li>
<li><a href="tableuser.php">Utilisateurs</a></li>
<li><a href="dieu.php">Rechercher</a></li>
<li><a href="produit.php">ADD-PRODUIT</a></li>
<li><a href="nicki.php">CATALOGUE</a></li>
<li><a href="listaproduit.php">ACHETER-PRODUIT</a></li>
</ul>

<ul class="nav navbar-nav navbar-right">
<li><a href="#"><i class="glyphicon glyphicon-user"></i><?php if(isset($_SESSION['user']['logins']))echo $_SESSION['user']['logins']?></a></li>
<li><a href="sedeconnecter.php"><i class="glyphicon glyphicon-log-out"></i> &nbspSe deconnecter</a></li>
</ul>
</nav>
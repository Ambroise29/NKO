<?php
 require_once('identifier.php'); 


$message='
<html>
<body>
<div align="center">
j\'ai envoiyer le mail avec PHP
</div>

</body>

</html>

';
mail("ambroisefzounmenou@gmail.com","salut",$message,$head);

?>
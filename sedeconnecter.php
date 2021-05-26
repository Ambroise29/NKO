<?php
require_once('identifier.php');
session_destroy();
header('Location:login.php');
?>
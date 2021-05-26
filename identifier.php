<?php
  session_start();
  if($_SESSION['user']==false){
      header('Location:login.php');
  }


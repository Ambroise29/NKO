<?php
require_once('identifier.php');
if($_SESSION['user']['iduser']){
  $id=  $_SESSION['user']['iduser'];
}
if($_SESSION['user']['logins']){
  $logs=  $_SESSION['user']['logins'];
}
?>

<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8">
    <title>gestion des filieres</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/monstyle.css">
    <script type="text/javascript" src="../jquery/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../jquery/ambroisce.js"></script>
    <style>
      .pl,.pl1{
        display:inline-block;
      }

      .pl22,.pl11{
        display:inline-block;
      }
      label{
        display:block;
      }
      form{
        text-align:center;
        background:black;
        color:white;
      }
      .lg{
        width:400px;
        padding:10px;
        color:black;
      }
      #vb{
        margin-top:20px;
        width:300px;
        padding:10px;
      }
    </style>
  </head>
    <body>
     <div class="container">
     <div class="panel panel-primary  magetop">
     <div class="panel-heading">changement du mot de passe</div>
     <div class="panel-body">
      <span class="alert-danger"><?php if(isset($id,$logs)) {echo 'ID-USER====>'.$id. ' ** et **'. 'LOGIN:===>'.$logs ;}?></span>
     </div>
     </div>

     <div class="panel panel-primary" magetop>
     <div class="panel-heading"></div>
     <div class="panel-body">
     <form method="POST" action="updatepasse.php">
       <label class="lp">Ancien mot de passe:</label>
       <input type="password" name="pwd1" id="pwd1" placeholder="Digite sua antiga senha" class="pl lg"/> <input type="checkbox" id="ed" class="pl1"/><br>
       <label class="lp">Nova senha:</label>
       <input type="password" name="pwd2" id="pwd2" placeholder="Digite a nova senha" class="pl22 lg"/>  <input type="checkbox" id="edds" class="pl11"/><br>
       <button type="submit" value="btn" class="btn btn-primary vnn" name="vb" id="vb">
         <span class="glyphicon glyphicon-move"></span>Alterar
       </button><br><br>

       <span class="eddd"></span><br>
       </form>
     </div>
     </div>

     </div>
     <script type="text/javascript" src="../jquery/jquery-3.5.1.min.js"></script>
     <script type="text/javascript">
    
     $(document).ready(function () {
      var p1=$('#pwd1');
     var p2=$('#pwd2');
     var ed=$('#ed');
     var ed1=$('#edds');

      ed.click(function () {
        if(ed.prop('checked')){
         p1.attr('type',"text");
       }else{
        p1.attr('type',"password");
       }
        
      });

      ed1.click(function () {
        if(ed1.prop('checked')){
         p2.attr('type',"text");
       }else{
        p2.attr('type',"password");
       }
        
      });
       
     });
    </script>
    </body>
</HTML>

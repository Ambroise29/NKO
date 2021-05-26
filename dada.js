$(document).ready(function(){
   $("input[name='code']").blur(function(){
       var $nom=$("input[name='nom']");
       var $prix=$("input[name='prix']");
       code=$(this).val();
       $.getJSON('regina.php',{code},
       function(retorna){
         $nom.val(retorna.nom) ; 
         $prix.val(retorna.prix) ;   
       });
       
   });
});


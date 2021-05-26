$(document).ready(function()
{
    valid=true;
    var p1=$('#pwd1');
    var p2=$('#pwd2');
    var n=5;
    $('#vb').click(function()
    {
     if(p1.val()==""){
        p1.css('border','solid 2px red');
        p1.focus();
        $('.ed').text('Digite sua nova senha');
        $('.ed').css('color','red');
       valid=false;
       
       }else if(p2.val()==""){
         p2.css('border','solid 2px red');
         p2.focus();
         $('.edd').text('repetir a senha');
         $('.edd').css('color','red');
         valid=false;

       }else if(p1.val()!==p2.val()){
        $('.edd').text('mot de passe ne correspond pas');
        $('.edd').css('color','red');
        valid=false;

       }else if(p1.val()<=2){
        $('.eddd').text('mot de passe  doit atteindre 6 caracteres');
        $('.eddd').css('color','blue');
        valid=false;
       }
      return valid;

    }); 

    $('#pwd1').keyup(function(){
    $('.ed').text('');
    $('.ed').css('color','red');
    });
      
  
    $('#pwd2').keyup(function(){
      $('.edd').text('');
      $('.edd').css('color','red');
      });
        
      if($('#pwd2').val() !=$('#pwd1').val()){
        $('.edd').text('Le mot de passe ne correspond pas');
        $('.edd').css('color','red');
      }else{
        $('.edd').text('');
      }
          
});

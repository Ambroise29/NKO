$(document).ready(function(){
    
       
                   $(document).on('input','.prod',function(){
                     var som=0;
                     var prix=$('#pp').val();
                     $('#qt').each(function(){
                         var qt=$(this).val();
                         if($.isNumeric(qt)){
                             som+=parseFloat(qt*prix);
                         }
                         $('#total').val(som);
                     }); 
                   });
         
});

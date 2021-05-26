$(document).ready(function(){
                valid=true;
                $('#vb').click(function(){
                 if($('#nom').val()==""){
                   $('#nom').css('border','solid 2px red');
                   $('#nom').focus();
                   $('#en').text('VEILLEZ REMPLIR VOTRE NOM');
                    $('#en').css('color','red');
                   valid=false;
                   
                 }
              
                 
                    if($('#prenom').val()==""){
                   $('#prenom').css('border','solid 2px red');
                   $('#prenom').focus();
                   $('#ep').text('VEILLEZ REMPLIR VOTRE PRENOM');
                     $('#ep').css('color','red');
                   valid=false;
                   
                 }
                 if($('#dates').val()==""){
                   $('#dates').css('border','solid 2px red');
                   $('#dates').focus();
                   $('#ed').text('VEILLEZ ENTRER LA DATE DE NAISSANCE');
                     $('#ed').css('color','red');
                   valid=false;
                   
                 }
               
                 if($('#emails').val()==""){
                   $('#emails').css('border','solid 2px red');
                   $('#emails').focus();
                   $('#em').text('POR FAVOR PREENCHE O CAMPO DE EMAIL');
                     $('#em').css('color','red');
                   valid=false;
                   
                 }
                   if($('#tels').val()==""){
                   $('#tels').css('border','solid 2px red');
                   $('#tels').focus();
                   $('#et').text('POR FAVOR PREENCHE O CAMPO DE EMAIL');
                     $('#et').css('color','red');
                   valid=false;
                   
                 }
             
                 return valid;
              
                
                
                }); 
                
                $('#nom').keyup(function(){
                    $('#nom').css('border','solid 2px black');
                   $('#en').text('');
                    
                });
                $('#prenom').keyup(function(){
                    $('#prenom').css('border','solid 2px black');
                   $('#ep').text('');
                    
                });
                $('#dates').keyup(function(){
                    $('#dates').css('border','solid 2px black');
                   $('#ed').text('');
                    
                });
                
                $('#emails').keyup(function(){
                    $('#emails').css('border','solid 2px black');
                   $('#em').text('');
                    
                });
                $('#nom').keyup(function(){
                    $('#nom').css('border','solid 2px black');
                   $('#en').text('');
                    
                });
               $('#gt').click(function(){
                   $('#ff').css('background','red').focus();   
               });       
            });



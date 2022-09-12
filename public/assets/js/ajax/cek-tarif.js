$(document).ready(function(){  
    $('#origin').keyup(function(){  
         var query = $(this).val();  
         if(query != '')  
         {  
              $.ajax({  
                   url:"https://api.rajaongkir.com/starter/city?Key=07af1af69385a56138b075b45aad61ef",  
                   type:'get',
                   dataType:'json',
                    headers:{'Access-Control-Allow-Origin':'http://127.0.0.1:8000'},

                   data:{query:query},  
                   success:function(data)  
                   {  
                        $('#originList').fadeIn();  
                        $('#originList').html(data);  
                   }  
              });  
         }  
    });  
    $(document).on('click', 'li', function(){  
         $('#origin').val($(this).text());  
         $('#originList').fadeOut();  
    });  
});  
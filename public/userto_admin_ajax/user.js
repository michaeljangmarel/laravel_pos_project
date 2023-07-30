$(document).ready(function(){
    $('.rolech').change(function () {
         $main = $(this).parents('tr') ;
         $id = $main.find('.usid').val();
         $chst = $main.find('.rolech').val();

         $.ajax({
             type : 'get' ,
             dataType : 'json' ,
             url : '/ustoad' ,
             data :  {
                'user_id' : $id ,
                'chst' : $chst
             } ,
             success : function(response){
                 if(response.status == 'true' ){
                    window.location.href = '/User_lists_' ;
                 }
             }
         })

        });
});

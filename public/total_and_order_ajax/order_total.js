$(document).ready(function(){

    $('.dele').click(function(){

        $('#tabless tbody tr').remove() ;
        $('#toss').html('0 kyat');
        $('#deli').html('3000  Kyats');

          $.ajax({
            type : 'get' ,
            url : '/lala' ,
            dataType : 'json'
        });
    });

    // $('#remove').click(function(){
    //     $main = $(this).parents('tr');
    //     $product_id = $main.find('#proid').val();

    //     $main.remove();


    //     $.ajax({
    //         type : 'get' ,
    //         url : '/lalas' ,
    //         data : { 'id' : $product_id} ,
    //         dataType : 'json'
    //     });


    // });

    $('.btn-plus').click(function(){
         $main = $(this).parents('tr');
         $price =Number( $main.find('#price').text().replace('Kyats' , ''));
          $amount = Number($main.find('#total_piz').val());
         $final = $price * $amount ;

         $main.find('#final_total').html($final + 'Kyats');
         //  total summary

         ssd();


           });


           $('.btn-minus').click(function(){
         $main = $(this).parents('tr');
         $price =Number( $main.find('#price').text().replace('Kyats' , ''));
          $amount = Number($main.find('#total_piz').val());
         $final = $price * $amount ;

         $main.find('#final_total').html($final + 'Kyats');
         //  total summary

         ssd();
           });


           function ssd(){
            $finalss = 0;
         $('#tabless tbody tr').each(function (index,row){
             $finalss += Number( $(row).find('#final_total').text().replace('Kyats' , ''));
         });

         $('#toss').html(`${$finalss} Kyats` );
         $('#deli').html( `${$finalss + 3000} Kyats`);

           }


     $('#orderbtn').click(function(){
        $orderlist = [];
        $code =   Math.floor(Math.random() * 1000) ;
         $('#tabless tbody tr').each(function (index,row){
            $orderlist.push({
                'user_id' : $(row).find('#usidss').val(),
                'product_id': $(row).find('#proid').val(),
                'total' :  $(row).find('#final_total').text().replace('Kyats','')*1,
                'qty' :   $(row).find('#total_piz').val(),
                'order_code' :  $code
            });

         });

         console.log($orderlist);

         $.ajax({
            type : 'get' ,
            url : '/ccc' ,
            dataType : 'json' ,
            data : Object.assign({}, $orderlist) ,
            success : function(response){
                if(response.status == 'true'){
                    window.location.href = '/userCategory';
                }
               }
        })

      })





});

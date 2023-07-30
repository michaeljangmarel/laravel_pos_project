$(document).ready(function(){

    $('#object').change(function () {

       $lala = $('#object').val() ;

       if($lala == 'asc'){
           $.ajax({
               type: 'get',
               url : '/ffx' ,
               data : { 'status' : 'asc' } ,
               dataType : 'json' ,
               success : function (response){
                $total = '' ;
                for($i = 0 ; $i<response.length ; $i++){
                    $total  += `
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1" >
               <div class="product-item bg-light mb-4" id="usform">
                   <div class="product-img position-relative overflow-hidden">
                       <img    class="img-fluid w-100" height="220px" src="{{ asset('storage/${response[$i].image}' ) }}" alt="">
                        <div class="product-action">
                           <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                           <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                           {{-- <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                           <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a> --}}
                       </div>
                   </div>
                   <div class="text-center py-4">
                       <a class="h6 text-decoration-none text-truncate" href="">${response[$i].name}</a>
                       <div class="d-flex align-items-center justify-content-center mt-2">
                           <h5>${response[$i].price} Kyats</h5><h6 class="text-muted ml-2"> </h6>
                       </div>
                   </div>
               </div>
           </div>`}

           $('#notify').html($total);


       }
           })
           }else if($lala == 'desc'){
               $.ajax({
                   type: 'get',
                   url : '/ffx' ,
                   data : { 'status' : 'desc' } ,
                   dataType : 'json' ,
                   success : function(response){
                       $total = '' ;
                for($i = 0 ; $i<response.length ; $i++){
                    $total  += `
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1" >
               <div class="product-item bg-light mb-4" id="usform">
                   <div class="product-img position-relative overflow-hidden">
                       <img    class="img-fluid w-100" height="220px" src="{{ asset('storage/${response[$i].image}' ) }}" alt="">
                        <div class="product-action">
                           <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                           <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                           {{-- <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                           <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a> --}}
                       </div>
                   </div>
                   <div class="text-center py-4">
                       <a class="h6 text-decoration-none text-truncate" href="">${response[$i].name}</a>
                       <div class="d-flex align-items-center justify-content-center mt-2">
                           <h5>${response[$i].price} Kyats</h5><h6 class="text-muted ml-2"> </h6>
                       </div>
                   </div>
               </div>
           </div>`}
           $('#notify').html($total);


        }
           })

       }



     })


});    $(document).ready(function(){

    $('#object').change(function () {

       $lala = $('#object').val() ;

       if($lala == 'asc'){
           $.ajax({
               type: 'get',
               url : '/ffx' ,
               data : { 'status' : 'asc' } ,
               dataType : 'json' ,
               success : function (response){
                $total = '' ;
                for($i = 0 ; $i<response.length ; $i++){
                    $total  += `
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1" >
               <div class="product-item bg-light mb-4" id="usform">
                   <div class="product-img position-relative overflow-hidden">
                       <img    class="img-fluid w-100" height="220px" src="{{ asset('storage/${response[$i].image}' ) }}" alt="">
                        <div class="product-action">
                           <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                           <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                           {{-- <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                           <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a> --}}
                       </div>
                   </div>
                   <div class="text-center py-4">
                       <a class="h6 text-decoration-none text-truncate" href="">${response[$i].name}</a>
                       <div class="d-flex align-items-center justify-content-center mt-2">
                           <h5>${response[$i].price} Kyats</h5><h6 class="text-muted ml-2"> </h6>
                       </div>
                   </div>
               </div>
           </div>`}

           $('#notify').html($total);


       }
           })
           }else if($lala == 'desc'){
               $.ajax({
                   type: 'get',
                   url : '/ffx' ,
                   data : { 'status' : 'desc' } ,
                   dataType : 'json' ,
                   success : function(response){
                       $total = '' ;
                for($i = 0 ; $i<response.length ; $i++){
                    $total  += `
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1" >
               <div class="product-item bg-light mb-4" id="usform">
                   <div class="product-img position-relative overflow-hidden">
                       <img    class="img-fluid w-100" height="220px" src="{{ asset('storage/${response[$i].image}' ) }}" alt="">
                        <div class="product-action">
                           <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                           <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                           {{-- <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                           <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a> --}}
                       </div>
                   </div>
                   <div class="text-center py-4">
                       <a class="h6 text-decoration-none text-truncate" href="">${response[$i].name}</a>
                       <div class="d-flex align-items-center justify-content-center mt-2">
                           <h5>${response[$i].price} Kyats</h5><h6 class="text-muted ml-2"> </h6>
                       </div>
                   </div>
               </div>
           </div>`}
           $('#notify').html($total);


        }
           })

       }



     })


});

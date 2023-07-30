$(document).ready(function(){

    $.ajax({
        type : 'get' ,
        url : '/view' ,
        dataType : 'json' ,
        data : { 'pro_id' : $('#productid').val()  }
    });

    $('#start').click(function(){

        $about = {
            'pizid' : $('#totalpiz').val() ,
            'proid' :  $('#productid').val(),
            'usid' :$('#currentid').val(),
        };


        $.ajax({
            type : 'get' ,
            url : '/ajaxx' ,
            dataType : 'json' ,
            data : $about ,
            success : function(response){
                if(response.mess == 'true'){
                    window.location.href = '/userCategory' ;
                }
              }
        })

        })
})

$(function (){

    $('#from_Wirde').on( "submit", function(e) {
        var form = $(this);
        
         let detail = $('#detail').val()
        

        var base_url = window.location.origin;

       
        var formData = {
                'detail' :  detail,
                
            
        };

        var returnedArray =[]
        $.ajax({
            url:  base_url+'/test/check_data.php',
            type: 'POST',
            dataType: 'JSON',
            data: formData,
            beforeSend: function () {
                
            },
            success: function(resp){
                if(resp.valu.ength != 0 ){
                           $('#error-list').empty();
                            
                            $('.alert-error').show();
                            $.each( resp.valu, function( key, data ) {
                               
                                $('#error-list').append('<li>' +data + '</li>');
                            });
                   
                        }else{
                             $('#text_v').html("<p style='color:#006400;' >Success</p>");
                        }
              
               
                
   
              
            }
        }).fail(function (xhr) {
            $('[type="submit"]').prop('disabled', false);
        }).always(function() {
          
        });
        e.preventDefault();

        return false

    })



    $('h3').on( "click", function(e) {

        var id        = $(this).data("id");
        //  let type =     $(this).data("type");

        //  console.log(id);
        // var actionUrl = $baseUrl + 'company/announce/pin';

        


        // $.ajax({
        //     url:  actionUrl,
        //     type: 'POST',
        //     dataType: 'JSON',
        //     data: {id: id ,type: type,[csrfName]:csrfHash},
        //     beforeSend: function () {
        //         Global.loading();
        //     },
        //     success: function(resp){
   
        //         // if(resp.result == false){
        //         //     $('[type="submit"]').prop('disabled', false);
        //         //     Global.alert('warning', 'Warning:', resp.message);
        //         //     return false;
        //         // }
        //         // Global.toast('success', 'Success:', resp.message);
        //         // location.reload();
               
   
              
        //     }
        // }).fail(function (xhr) {
        //     $('[type="submit"]').prop('disabled', false);
        // }).always(function() {
        //     Global.stopLoading();
        // });
        // e.preventDefault();

     
    });





    




})
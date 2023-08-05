$(function (){

    $('#from_Wirde').on( "submit", function(e) {
        var form = $(this);
        console.log(form);
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












})
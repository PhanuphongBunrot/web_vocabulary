$(function (){




    $("h3").click(function(){
        var id        = $(this).data("id");
        console.log(id );

        
        var formData = {
            'id' :  id,
            
        
    };
    var base_url = window.location.origin;
   
    $.ajax({
        url:  base_url+'/test/get_data.php',
        type: 'POST',
        dataType: 'JSON',
        data: formData,
        beforeSend: function () {
            
        },
        success: function(resp){
            Swal.fire(resp.valu_V+' = '+resp.valu)
           
            

          
        }
    }).fail(function (xhr) {
        $('[type="submit"]').prop('disabled', false);
    }).always(function() {
      
    });
  

      });



    
})
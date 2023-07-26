$(function() {

    $('#from_eng').on( "submit", function(e) {
        var form = $(this);
        
        let mea_en = $('#mea_en').val()
        let vla_en    = $('#vla_en').val()
        let id = $('#id').val()

        var base_url = window.location.origin;

       
        var formData = {
                'mea_en' :  mea_en,
                'vla_en' : vla_en,
                'id': id
            
        };


        $.ajax({
            url:  base_url+'/test/check.php',
            type: 'POST',
            dataType: 'JSON',
            data: formData,
            beforeSend: function () {
                
            },
            success: function(resp){

                if(resp.status == 'false'){
                    
                    $('#text_v').html("<p style='color:#DC143C;' >"+resp.valu+"</p>");
                    setTimeout(() => {
                        
                        location.reload();
                      }, "2000");
                    
                }else{
                    $('#text_v').html("<p style='color:#006400;' >Success</p>");
                    setTimeout(() => {
                        
                        location.reload();
                      }, "2000");
                }
               
                
   
              
            }
        }).fail(function (xhr) {
            $('[type="submit"]').prop('disabled', false);
        }).always(function() {
          
        });
        e.preventDefault();

        return false

    })

    $('#form_th').on( "submit", function(e) {
        var form = $(this);
        let mea_en = $('#mea_en_f').val()
        let vla_en    = $('#vla_en_f').val()
        let id = $('#id_f').val()

     

       var base_url = window.location.origin;

    
       var formData = {
               'mea_en' :  mea_en,
               'vla_en' : vla_en,
               'id': id
           
       };


       $.ajax({
           url:  base_url+'/test/check.php',
           type: 'POST',
           dataType: 'JSON',
           data: formData,
           beforeSend: function () {
               
           },
           success: function(resp){
  
            if(resp.status == 'false'){
                $('#text').html("<p style='color:#DC143C;' >"+resp.valu+"</p>");
                setTimeout(() => {
                    
                    location.reload();
                  }, "2000");
                
            }else{
                $('#text').html("<p style='color:#006400;' >Success</p>");
                setTimeout(() => {
                        
                    location.reload();
                  }, "2000");
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
let form = document.forms["my-form"];
form.addEventListener("submit", getValues);

function getValues(event){
	event.preventDefault();
   const d =  this.myCountry.value
   console.log(d);
   var base_url = window.location.origin;

   $.ajax({
    url: base_url+'/test/search.php?vla='+d,
    success: function (resp) {
      console.log(resp[0].mas);
    
      $('#data').text(resp[0].mas);
     
      
    }
})
} 
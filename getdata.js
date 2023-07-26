let form = document.forms["my-form"];
form.addEventListener("submit", getValues);

function getValues(event){
	event.preventDefault();
   const d =  this.myCountry.value
   console.log(d);


   $.ajax({
    url: 'http://localhost/test/search.php?vla='+d,
    success: function (resp) {
      console.log(resp[0].mas);
    
      $('#data').text(resp[0].mas);
     
    
    }
})
} 
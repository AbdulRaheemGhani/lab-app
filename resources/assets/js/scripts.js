$(document).ready(function(){
    
    function selectById()
    {
	   var id = $("#ids").val();
	   window.location.href="http://localhost/laboratory/doctors/"+id;
	   
	}

    setTimeout(function(){
        $('#alertSuccess').fadeOut(700);
      }, 2000);

      
});

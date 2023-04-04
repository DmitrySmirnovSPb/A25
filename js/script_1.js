$(document).ready(function() {
    $( "#top" ).hover(function() {
       if($( "#top" ).attr("flag") == "none"){
        $("#form").css("display","block");
       }
      });
    $( ".close" ).click(function(){
        $("#form").css("display","none");
    });
});
jQuery(document).ready(function($){
    
    $(document).mouseover(function(){
        
if ($('.app-theme-color-field').hasClass('iris-error')){ /* check if color field has an error */
   
    $(".app-customization-submission  input[type=submit]").attr("disabled", "disabled");
    
    $('span.error-message').show(); 
}
        
        else{
          $(".app-customization-submission  input[type=submit]").removeAttr("disabled", "disabled");
            
            $('span.error-message').hide(); 
        }
        
    });
    /* end of header color validation */

});
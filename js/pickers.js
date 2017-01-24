jQuery(document).ready(function($){

    $('.app-theme-color-field').wpColorPicker();
    $('#word-niks').click(function(){
       $(".app-theme-color-field").attr("value", ""); 
        $(".wp-color-result").removeAttr("style");
    });
    
    
});
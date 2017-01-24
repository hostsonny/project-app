<?php 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function project_app_add_custom_app_style_to_theme(){?>
<style>
    
    <?php $options = get_option('Project_App_customization')?>
    /* style for app background */
        <?php if($options['website-bg'] != NULL): ?>
    #app-theme{
    background-color:<?php echo $options['website-bg'];    ?>;
}
    <?php endif; ?>
    
    /* style for app links */
    <?php if($options['link-colors']  != NULL): ?>
      #app-theme a{
    color:<?php echo $options['link-colors'];    ?>;  
    }
    <?php endif; ?>   
    
    /* style for app buttons */
    <?php if($options['button-bg']  != NULL || $options['button-color'] != NULL): ?>
      #app-theme button,
    #app-theme .button{
    background-color:<?php echo $options['button-bg'];    ?>;
    color:<?php echo $options['button-color'];    ?>;  
    }
    <?php endif; ?> 
    
    /* style for menu */
    <?php if($options['header'] != NULL || $options['header-color'] != NULL): ?>
    #app-theme .primary-menu{
        <?php if($options['header'] != NULL): ?>
     background:<?php echo $options['header']; ?>;
        <?php endif;?>
        
        <?php if($options['header-color'] != NULL): ?>
     color:<?php echo $options['header-color']; ?>;  
        <?php endif; ?>
    }
    <?php endif; ?>
    
    
    /* style for footer */
    <?php if($options['footer-bg'] != NULL): ?>
    #app-theme footer, #app-theme footer li{
        background-color:<?php echo $options['footer-bg']; ?>;  
    }
    <?php endif; ?>
    
    <?php if($options['footer-color'] != NULL): ?>
    #app-theme footer li,
    #app-theme footer li a{
            color: <?php echo $options['footer-color'];   ?>;
    }
    <?php endif; ?>
    /* style for pages */
    
    <?php if($options['page-title-bg'] != NULL || $options['page-title-color'] != NULL): ?>
                #app-theme .page-title{
                    
                  <?php  if($options['page-title-bg'] != NULL): ?>
        background: <?php echo $options['page-title-bg'];   ?>;
                    <?php endif; ?>
                    
                  <?php  if($options['page-title-color'] != NULL): ?>    
        color: <?php echo $options['page-title-color'];   ?>;
                    <?php endif; ?>
    }
    <?php endif; ?>
    
    <?php if($options['page-color'] != NULL || $options['page-bg'] != NULL): ?>
    #app-theme .single-page{
        <?php  if($options['page-color'] != NULL): ?>
        color:<?php echo $options['page-color'];  ?>;
        <?php endif; ?>
        
        <?php  if($options['page-bg'] != NULL): ?>
        background:<?php echo $options['page-bg'];   ?>;
        <?php endif; ?>
    }
    <?php endif; ?>
    
    /* style for posts */
    <?php if($options['post-title-bg'] != NULL || $options['post-title-color'] != NULL): ?>
                    #app-theme .post-title{
        <?php  if($options['post-title-bg'] != NULL): ?>
        background: <?php echo $options['post-title-bg'];   ?>;
        <?php endif; ?>
        
        <?php  if($options['post-title-color'] != NULL): ?>
        color: <?php echo $options['post-title-color'];   ?>;
        <?php endif; ?>
    }
    <?php endif; ?>
    
    <?php if($options['post-color'] != NULL || $options['post-bg'] != NULL): ?>
    #app-theme .app-single-post,
    #app-theme .post .excerpt{
        <?php  if($options['post-color'] != NULL): ?>
        color:<?php echo $options['post-color'];   ?>;
        <?php endif; ?>
        
        <?php  if($options['post-bg'] != NULL): ?>
        background:<?php echo $options['post-bg'];   ?>;
        <?php endif; ?>
    }
    <?php endif; ?>
    
    <?php if($options['comment-color'] != NULL || $options['comment-bg'] != NULL): ?>
    #app-theme .commentlist article{
        <?php  if($options['comment-color'] != NULL): ?>
        color:<?php echo $options['comment-color'];   ?>;
        <?php endif; ?>
        
        <?php  if($options['comment-bg'] != NULL): ?>
        background:<?php echo $options['comment-bg'];   ?>;
        <?php endif; ?>
    }
    <?php endif; ?>
    
    <?php  if($options['comment-form-color'] != NULL): ?>
    #app-theme .comment-respond,
    #app-theme .comment-form textarea#comment{
       color:<?php echo $options['comment-form-color'];    ?>;
    }
    <?php endif; ?>
    
        <?php if($options['comment-form-bg'] != NULL): ?>
        #app-theme .comment-form textarea#comment{
        background-color:<?php echo $options['comment-form-bg'];   ?>; 
        }
    <?php endif; ?>
    
    <?php if($options['navi-bg'] != NULL): ?>
    #app-theme .navi{
        background-color:<?php echo $options['navi-bg'];?>;
    }
    <?php endif; ?>
    
    <?php if($options['navi-items-bg'] != NULL || $options['navi-items-border'] != NULL): ?>
    #app-theme .navi li{
        <?php  if($options['navi-items-bg'] != NULL): ?>
        background-color:<?php echo $options['navi-items-bg'];?>;
        <?php endif; ?>
        
        <?php  if($options['navi-items-border'] != NULL): ?>
        color:<?php echo $options['navi-items-border'];?>;
        <?php endif; ?>
    }
    <?php endif; ?>
    
    <?php if($options['navi-color'] != NULL): ?>
    #app-theme .navi li a{
        color:<?php echo $options['navi-color'];?>;
    }
    <?php endif; ?>
    
    /* products background color */
    <?php if ($options['prod-bg'] != NULL): ?>
    #app-theme .woocommerce ul.products li.product, 
    #app-theme .woocommerce-page ul.products li.product,  
    #app-theme .woocommerce ul.products li.product, 
    #app-theme.woocommerce ul.products li.product, 
    #app-theme .woocommerce-page ul.products li.product, 
    #app-theme .woocommerce-page[class*=columns-] ul.products li.product, 
    #app-theme .woocommerce[class*=columns-] ul.products li.product,
    #app-theme div.product{
        background-color:<?php echo $options['prod-bg'];   ?>;
    }
    <?php endif; ?>
    /* products colors*/
    <?php if ($options['single-prod-color'] != NULL): ?>
    #app-theme div.product {
    color:<?php echo $options['single-prod-color'];   ?>;
    }
    <?php endif; ?>
    
    /* woo star rating colors */
    <?php if ($options['woo-star-color'] != NULL): ?>
   #app-theme .star-rating{
        color:<?php echo $options['woo-star-color'];   ?>;
    }
    <?php endif; ?>
    
    /* add to cart colors */
    <?php if($options['add-tc-bg'] != NULL || $options['add-tc-color'] != NULL): ?>
   #app-theme ul.products li.product .button,
   #app-theme div.product form.cart .button{
        <?php if ($options['add-tc-bg'] != NULL): ?>
        background-color:<?php echo $options['add-tc-bg'];   ?> ;
        <?php endif; ?>
        
        <?php if ($options['add-tc-color'] != NULL): ?>
        color:<?php echo $options['add-tc-color'];   ?> ;
        <?php endif; ?>
    }
    <?php endif; ?>
    <?php if($options['woo-sale-bg'] != NULL || $options['woo-sale-color'] != NULL): ?>
    
    #app-theme span.onsale{
    <?php if ($options['woo-sale-bg'] != NULL): ?>
    background-color:<?php echo $options['woo-sale-bg']; ?>;
    <?php endif; ?>
    
    <?php if ($options['woo-sale-color'] != NULL): ?>
    color:<?php echo $options['woo-sale-color']; ?>;
    <?php endif; ?>
    }
    
    <?php endif; ?>
</style>

<?php }
add_action('wp_head', 'project_app_add_custom_app_style_to_theme');

?>
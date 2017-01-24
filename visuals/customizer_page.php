<?php

// this shows the app customization options and content + an iPhone emulator built with CSS 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<h1><?php _e('Customize App Theme', 'project-app') ?></h1>

<?php

    //enqueing iPhone device CSS
    wp_enqueue_style('project_app_iphone-device', plugin_dir_url( __FILE__ ) . 'css/assets/devices.min.css' );
    //enqueing JQ validation
    //If the user tries to hack this, it's still secured on the server
    wp_enqueue_script( 'project_app_validation_script', plugin_dir_url( __FILE__ ) . '../js/validating.js' );

?>


<!-- mobile device -->
<div class="phone-frame" style="float:right;">
<div class="marvel-device iphone6 silver">
    <div class="top-bar"></div>
    <div class="sleep"></div>
    <div class="volume"></div>
    <div class="camera"></div>
    <div class="sensor"></div>
    <div class="speaker"></div>
    <div class="screen">
    <iframe style="width:inherit; height:inherit" src="<?php echo get_site_url( 'null', '?appkey=' . get_option('project_app_key') )?>"></iframe>
    </div>
    <div class="home"></div>
    <div class="bottom-bar"></div>
</div>
<a target=_blank href="https://hostsonny.com/wordpress-app/"><button id="publish-btn" class="button button-primary"><?php _e('publish now', 'project-app') ?></button></a>
<center>
    <div class='app-key-req'>
       <h2><?php _e('Your App Key: ', 'project-app'); echo get_option('project_app_key'); ?></h2>
       <span><?php _e('Your app key is required to create and publish your app'); ?></span>
    </div>    
</center>
</div>

	<form id="form1" method="post" action="options.php">
        <!-- settings for header background customization -->
<?php 
    settings_fields( 'project_app_customization-settings' ); 
    do_settings_sections( 'project_app_customization-settings' ); 
    wp_nonce_field( 'project_app_customize','project_app_customization_nonce' );
               
    $options = get_option('Project_App_customization');
    $name =    "Project_App_customization";
               
    /* error message for invalid information in the color picker fields */ 
    $errmsg =  __('Looks like you put in some invalid information, please check all the input fields of the color pickers', 'project-app'); 
?>     
  
        

          <!-- start of general color -->
      <span class="error-message" style="color:#dd3333; display:none; font-weight:bold;"><?php echo $errmsg; ?></span>
      <h4><?php _e('General Colors', 'project-app'); ?></h4>
        
      <table>
      <!-- customization for website bg -->
      <tr valign="top">
      <th scope="row">
      <?php _e('Website background color', 'project-app'); ?>
      </th>    
      <td><input name="<?php echo $name?>[website-bg]" type="text" value="<?php echo $options['website-bg'];   ?>" class="app-theme-color-field"/></td>   
      </tr>
          
      <!-- customization for website a tags --> 
      <tr valign="top">
      <th scope="row">
      <?php _e('Link colors', 'project-app'); ?>
      </th>    
      <td><input name="<?php echo $name?>[link-colors]" type="text" value="<?php echo $options['link-colors'];   ?>" class="app-theme-color-field"/></td>   
      </tr>
          
      <!-- customization for website buttons --> 
      <tr valign="top">
      <th scope="row" >
      <?php _e('Buttons background color', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[button-bg]" type="text" value="<?php echo $options['button-bg'];   ?>" class="app-theme-color-field"/></td>   
      </tr>
          
      <!-- customization for website button colors--> 
      <tr valign="top">
      <th scope="row">
          <?php _e('Buttons color', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[button-color]" type="text" value="<?php echo $options['button-color'];   ?>" class="app-theme-color-field"/></td>   
      </tr>                            
      </table>
        
      <span class="error-message" style="color:#dd3333; display:none; font-weight:bold;"><?php echo $errmsg; ?></span>
      <h4><?php _e('Header Colors', 'project-app'); ?></h4>
      <table>
      <!-- customization for header menu --> 
      <tr valign="top">
      <th scope="row">
      <?php _e('Header menu background color:', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[header]" type="text" value="<?php echo $options['header'];  ?>" class="app-theme-color-field"/></td>  
      </tr>
            
      <!-- customization for blogtitle -->
      <tr valign="top">
      <th scope="row">
      <?php _e('Header menu font color:', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[header-color]" type="text" value="<?php echo $options['header-color'];  ?>" class="app-theme-color-field"/></td>   
      </tr>    
      </table>
        
     <span class="error-message" style="color:#dd3333; display:none; font-weight:bold;"><?php echo $errmsg; ?></span>
     <h4><?php _e('Navigation Menu Colors', 'project-app'); ?></h4>
     <table>
     <!-- customization for navigation menu bg -->
     <tr valign="top">
     <th scope="row">
     <?php _e('Navigation menu background color', 'project-app'); ?></th>    
     <td><input name="<?php echo $name?>[navi-bg]" type="text" value="<?php echo $options['navi-bg'];   ?>" class="app-theme-color-field"/></td>   
     </tr>
            
     <!-- customization for navigation menu items bg -->
     <tr valign="top">
     <th scope="row">
     <?php _e('Navigation menu items background color', 'project-app'); ?></th>    
     <td><input name="<?php echo $name?>[navi-items-bg]" type="text" value="<?php echo $options['navi-items-bg'];   ?>" class="app-theme-color-field"/></td>   
     </tr>
            
     <!-- customization for navigation menu items border-color -->
     <tr valign="top">
     <th scope="row">
     <?php _e('Navigation menu items border color', 'project-app'); ?></th>    
     <td><input name="<?php echo $name?>[navi-items-border]" type="text" value="<?php echo $options['navi-items-border'];   ?>" class="app-theme-color-field"/></td>   
     </tr>
         
     <!-- customization for navigation menu bg -->
      <tr valign="top">
      <th scope="row">
      <?php _e('Navigation menu font color', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[navi-color]" type="text" value="<?php echo $options['navi-color'];   ?>" class="app-theme-color-field"/></td>   
      </tr>   
      </table>
        
      <span class="error-message" style="color:#dd3333; display:none; font-weight:bold;"><?php echo $errmsg; ?></span>
      <h4><?php _e('Footer Colors', 'project-app'); ?></h4>
      <table>
      <!-- customization for footer -->
      <tr valign="top">
      <th scope="row">
      <?php _e('Footer background color:', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[footer-bg]" type="text" value="<?php echo $options['footer-bg'];   ?>" class="app-theme-color-field"/></td>   
      </tr>

      <!-- customization for footer li-->
      <tr valign="top">
      <th scope="row">
      <?php _e('Footer font color:', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[footer-color]" type="text" value="<?php echo $options['footer-color'];   ?>" class="app-theme-color-field"/></td>   
      </tr>      
      </table>
        
      <span class="error-message" style="color:#dd3333; display:none; font-weight:bold;"><?php echo $errmsg; ?></span>
      <h4><?php _e('Page Colors', 'project-app'); ?></h4>
      <table>
      <!-- customization for page title bg-->
      <tr valign="top">
      <th scope="row">
          <?php _e('Page title background color', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[page-title-bg]" type="text" value="<?php echo $options['page-title-bg'];   ?>" class="app-theme-color-field"/></td>   
      </tr>
          
      <!-- customization for page title color-->
      <tr valign="top">
      <th scope="row">
      <?php _e('Page title color', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[page-title-color]" type="text" value="<?php echo $options['page-title-color'];   ?>" class="app-theme-color-field"/></td>   
      </tr>
          
      <!-- customization for page text color-->
      <tr valign="top">
      <th scope="row">
      <?php _e('Page font color', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[page-color]" type="text" value="<?php echo $options['page-color'];   ?>" class="app-theme-color-field"/></td>   
      </tr>  
            
      <!-- customization for page backgroundcolor-->
      <tr valign="top">
      <th scope="row">
      <?php _e('Page backgroundcolor', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[page-bg]" type="text" value="<?php echo $options['page-bg'];   ?>" class="app-theme-color-field"/></td>   
      </tr> 
      </table>
        
      <span class="error-message" style="color:#dd3333; display:none; font-weight:bold;"><?php echo $errmsg; ?></span>
      <!-- start of single post colors -->
      <h4><?php _e('Post Colors', 'project-app'); ?></h4>
      <table>
            
      <!-- customization for post title bg-->
      <tr valign="top">
      <th scope="row">
      <?php _e('Post title background color', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[post-title-bg]" type="text" value="<?php echo $options['post-title-bg'];   ?>" class="app-theme-color-field"/></td>   
      </tr>
          
      <!-- customization for post title color-->
      <tr valign="top">
      <th scope="row">
      <?php _e('Post title color', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[post-title-color]" type="text" value="<?php echo $options['post-title-color'];   ?>" class="app-theme-color-field"/></td>   
      </tr>  
          
      <!-- customization for post text color-->
      <tr valign="top">
      <th scope="row">
      <?php _e('Post font color', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[post-color]" type="text" value="<?php echo $options['post-color'];   ?>" class="app-theme-color-field"/></td>   
      </tr>  
            
      <!-- customization for post backgroundcolor-->
      <tr valign="top">
      <th scope="row">
          <?php _e('Post backgroundcolor', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[post-bg]" type="text" value="<?php echo $options['post-bg'];  ?>" class="app-theme-color-field"/></td>   
      </tr>
            
      <!-- customization for comments font-color-->
      <tr valign="top">
      <th scope="row">
          <?php _e('Comments font-color', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[comment-color]" type="text" value="<?php echo $options['comment-color'];   ?>" class="app-theme-color-field"/></td>   
      </tr> 
            
      <!-- customization for comments background-color-->
      <tr valign="top">
      <th scope="row">
          <?php _e('Comments background-color', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[comment-bg]" type="text" value="<?php echo $options['comment-bg'];    ?>" class="app-theme-color-field"/></td>   
      </tr> 
            
      <!-- customization for comment form font-->
      <tr valign="top">
      <th scope="row">
      <?php _e('Comment form font-color', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[comment-form-color]" type="text" value="<?php echo $options['comment-form-color'];  ?>" class="app-theme-color-field"/></td>   
      </tr>
    
      <!-- customization for comment form bgc-->
      <tr valign="top">
      <th scope="row">
      <?php _e('Comment form background-color', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[comment-form-bg]" type="text" value="<?php echo $options['comment-form-bg'];   ?>" class="app-theme-color-field"/></td>                   
      </tr>
      </table>
        
      <span class="error-message" style="color:#dd3333; display:none; font-weight:bold;"><?php echo $errmsg; ?></span>
      
      <!-- start of single post colors -->
      <?php if(class_exists('woocommerce')):?> 
        
      <h4><?php _e('WooCommerce Colors', 'project-app'); ?></h4>
      <table>    
      <!-- customization for WooCommerce items->   
      <!-- customization for WooCommerce Page BG-->
      <tr valign="top">
      <th scope="row">
          <?php _e('WooCommerce products background color', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[prod-bg]" type="text" value="<?php echo $options['prod-bg'];   ?>" class="app-theme-color-field"/></td>                   
      </tr>
            
      <!-- customization for WooCommerce Page Color-->
      <tr valign="top">
      <th scope="row">
          <?php _e('WooCommerce single product font color', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[single-prod-color]" type="text" value="<?php echo $options['single-prod-color'];   ?>" class="app-theme-color-field"/></td>                   
      </tr>
            
      <!-- customization for WooCommerce Star Rating Color-->
      <tr valign="top">
      <th scope="row">
          <?php _e('WooCommerce star rating color', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[woo-star-color]" type="text" value="<?php echo $options['woo-star-color'];   ?>" class="app-theme-color-field"/></td>                   
      </tr>
            
      <!-- customization for WooCommerce add to cart button backgroundcolor-->
      <tr valign="top">
      <th scope="row">
          <?php _e('WooCommerce add to cart button color', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[add-tc-bg]" type="text" value="<?php echo $options['add-tc-bg'];   ?>" class="app-theme-color-field"/></td>                   
      </tr>
            
      <!-- customization for WooCommerce add to cart button font color-->
      <tr valign="top">
      <th scope="row">
          <?php _e('WooCommerce add to cart button font color', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[add-tc-color]" type="text" value="<?php echo $options['add-tc-color'];   ?>" class="app-theme-color-field"/></td>                   
      </tr>
          
      <!-- customization for WooCommerce sale flash background color-->
      <tr valign="top">
      <th scope="row">
          <?php _e('WooCommerce sale flash background color', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[woo-sale-bg]" type="text" value="<?php echo $options['woo-sale-bg'];   ?>" class="app-theme-color-field"/></td>                   
      </tr>
          
      <!-- customization for WooCommerce sale flash color-->
      <tr valign="top">
      <th scope="row">
          <?php _e('WooCommerce sale flash font color', 'project-app'); ?></th>    
      <td><input name="<?php echo $name?>[woo-sale-color]" type="text" value="<?php echo $options['woo-sale-color'];   ?>" class="app-theme-color-field"/></td>                   
      </tr>
      </table>
      <?php endif; ?> 
        
      <span class="error-message" style="color:#dd3333; display:none; font-weight:bold;"><?php echo $errmsg; ?></span>
      <div class="clear-all-button">
      <input type="button" id="word-niks" class="button button-small wp-picker-clear" value="Clear All"/>
      </div>
        
        
        
      <div class="app-customization-submission">
        <?php submit_button(); ?>
      </div>
</form>


<style>
    th{
    text-align: left;
      }
    #publish-btn{
        display: block;
        margin: 0 auto;
        height: 50px;
        width: 80%;
        margin-top: 20px;
        font-size: 30px;
        text-transform: uppercase;
        font-weight: bold;
        background-color: #ff0000;
        border: #ff0000;
        transition: .5s;
        text-shadow: 0 -1px 1px #ff0000, 1px 0 1px #ff0000, 0 1px 1px #ff0000, -1px 0 1px #ff0000;
    }
    
    .phone-frame a{
        text-decoration: none;
        color: #fff;
    }
    
    #publish-btn:hover{
       background-color: #ff0000;
    }
    
    .app-key-req span{
        font-style:italic;
        font-size: 10px
    }
    
    .app-key-req h2{
        margin-bottom: 0px;
    }
</style>


                         



    

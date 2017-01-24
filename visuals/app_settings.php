<?php

/* this shows the app customization options and content */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<h1><?php _e('Mobile App Settings', 'project-app')?></h1>

 <?php $args = array(
    'depth'                 => 0,
    'child_of'              => 0,
    'selected'              => get_option( 'Project_App_home', '0' ),
    'echo'                  => 1,
    'name'                  => 'Project_App_home',
    'id'                    => null, // string
    'class'                 => null, // string
    'show_option_none'      => null, // string
    'show_option_no_change' => null, // string
    'option_none_value'     => null, // string
); 

    //scanning themes folder
$themes_folder = scandir(get_theme_root());
?>



	<form id="form1" method="post" action="options.php">
        <!-- general settings -->
    <?php
        settings_fields( 'project_app_general-app-settings' );  
        do_settings_sections( 'project_app_general-app-settings' );  
        wp_nonce_field( 'project_app_gsettings','project_app_gsettings_nonce' ); 
    ?>
        <!-- start of general settings -->
        
    <h4><?php _e('General Settings', 'project-app'); ?></h4>
        
    <table>
    <tr valign="top">
    <th scope="row">
    <?php _e('App Home Page', 'project-app'); ?>
    </th> 
    <td> 
                    
    <?php 
    //dropdown pages function of WordPress
    wp_dropdown_pages($args);
    ?>
    </td>
    </tr>
                    
    <tr valign="top">
    <th scope="row">
    <?php _e('App Theme', 'project-app'); ?>
    </th>
    <td>
    <select name="Project_App_theme">
    <?php  
    //puting each theme folder in 'different' $v variable
    foreach ($themes_folder as $v){
    //getting only the correct directories from the folder
    if (!is_dir ( $v ) && !is_file($v)){
    ?>
                            
    <option
    <?php 
    //checking if a $v is selected and putting it our as selected in the list
    if ($v == get_option('Project_App_theme', get_stylesheet())){
    echo "selected='selected'"; 
    } 
    //end of option opening tag?>
    >
    <?php
    echo $v
    ?>
    </option>
    <?php }}   ?>                      
    </select>
        </br>
        <span class='app-theme-msg'><?php _e('Download app theme from ', 'project-app'); ?><a href='https://hostsonny.com/wp-content/uploads/2017/01/Project-App-Theme.zip'><?php _e('here', 'project-app'); ?></a><?php _e(', or use one of your installed WordPress themes', 'project-app'); ?></span>
    </td>                                                                 
    </tr>        

    </table>
        
    <div class="app-customization-submission">
    <?php
    //default WP submit button
    submit_button(); 
    ?>
    </div>
    </form>


<style>
    th{
      text-align: left;
      }
    .app-theme-msg{
        font-style:italic;
        font-size: 10px
    }
</style>
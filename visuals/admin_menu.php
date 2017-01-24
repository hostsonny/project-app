<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/* saving app theme colors into database */

function project_app_update_app_theme_settings() {
    /* checking customization settings for mischievious actions */
    if (isset($_POST['Project_App_customization'])){
    if (check_admin_referer( 'project_app_customize','project_app_customization_nonce' ) ){ 
    register_setting( 'project_app_customization-settings', 'Project_App_customization');
    }
    }
    
    //Start of checking general settings
    //checking if user put in correct value and didn't try anything strange
    if (isset ($_POST['Project_App_home'])){
        if (in_array($_POST['Project_App_home'], get_all_page_ids()) && check_admin_referer( 'project_app_gsettings', 'project_app_gsettings_nonce')){
        register_setting( 'project_app_general-app-settings', 'Project_App_home' );
    }
    }
    
    if (isset ($_POST['Project_App_theme'])){
    if(check_admin_referer( 'project_app_gsettings','project_app_gsettings_nonce' )){
        register_setting( 'project_app_general-app-settings', 'Project_App_theme' );
    }
    }
}

//creating admin menu for project app plugin
function project_app_add_admin_menu(){
    
    $project_app_page_title = "Mobile App";
    $project_app_menu_title = "Mobile App";
    $project_app_capability = "manage_options";
    $project_app_menu_slug = "project-app-settings";
    $project_app_function = "project_app_general_settings_page";
    $project_app_icon_url = "";
    $project_app_position = 4;
        
    //add menu page for general settings
    add_menu_page( $project_app_page_title, $project_app_menu_title, $project_app_capability, $project_app_menu_slug, $project_app_function, $project_app_icon_url, $project_app_position );
    
    $parent_slug = "project-app-settings";
    $page_title = "Customize App";
    $menu_title = "Customize App";
    $capability = "manage_options";
    $menu_slug = "project-app-customizer";
    $function = "project_app_color_customization_page";
    //add menu page for color customization settings
    add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function);
    
    add_action( 'admin_init', 'project_app_update_app_theme_settings' );
}

add_action("admin_menu", "project_app_add_admin_menu");

//creating general settings app page output
function project_app_general_settings_page(){
    if(!current_user_can("manage_options")){
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    else{
    echo '<div class="wrap">';
	require_once(plugin_dir_path(__FILE__) . "app_settings.php");
	echo '</div>';
    }
}
    
//creating color customization page output
    function project_app_color_customization_page(){
    if(!current_user_can("manage_options")){
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    else{
    echo '<div class="wrap">';
	require_once(plugin_dir_path(__FILE__) . "customizer_page.php");
	echo '</div>';
    }
}

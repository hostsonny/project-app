<?php
/*
Plugin Name: Project App
Plugin URI: https://hostsonny.com/wordpress-app/
Description: The mobile app plugin to sync an app with your website's pages, posts and products. Works with all plugins.
Version: 1.5
Author: HostSonny
Author URI: https://hostsonny.com/
Text Domain: project-app
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

require(plugin_dir_path(__FILE__) . "visuals/admin_menu.php");
require(plugin_dir_path(__FILE__) . "styles.php");


function project_app_app_plugin_init() {
    /* making plugin translation ready */
  load_plugin_textdomain( 'project-app', false, 'project-app/languages' );
    
    //loading app menu
    register_nav_menus(
    array(
      'Prime_App_Menu' => __( 'App Menu', 'project_app' ),
          )
  );
  
}
add_action('init', 'project_app_app_plugin_init');

//register widgets sideabr

function project_app_app_widgets_init() {
     //adding sidebar widget
        	register_sidebar( array(
		'name'          =>  __('App Sidebar', 'app' ),
		'id'            => 'app-sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="sidebarWidget">',
		'after_title'   => '</h2>',
	) );
    
}

add_action( 'widgets_init', 'project_app_app_widgets_init' );

//checking if app key isn't already registered
if (get_option('project_app_key') == ''){
function project_app_key($length = 10) {
    //defining the allowed characters in the app key
    $keyChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $keyCharsLength = strlen($keyChars); //amount of allowed characters
    $randomKey = '';
    for ($i = 0; $i < $length; $i++) {
        $randomKey .= $keyChars[rand(0, $keyCharsLength - 1)]; //generating random key for this specific user
    }
    return $randomKey;
}
    $app_key = project_app_key(); //stored the key in a variable
    add_option('project_app_key', $app_key); //added app key to database
}

function project_app_pluginsstart(){
    //checking if server has https
    if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
    $htt = 'https://';
    }else{
    $htt = 'http://';    
    }
    
    //checking the internet url to make ready for returning app theme
$url = $htt . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    //checking if not another query field is used
    if(!strpos($url, '?')){
        $mark = '?';
    }else{
        $mark = '&';
    } 
if (strpos($url, get_option('project_app_key')) !== false) {
    //redirecting to the app home page
    $location = get_page_uri( get_option( 'Project_App_home', 0 )) . $mark . 'theme=app-theme';
    //echo "<script>window.location.assign('$location' )</script>";
}

    //checking if current url is app theme queried, if so, add filters
if(strpos($url, 'theme=app-theme') && get_stylesheet() != get_option('Project_App_theme', get_stylesheet()) || strpos($_SERVER['HTTP_REFERER'], 'theme=app-theme')){
    //filtering stylkesheet and template for app theme
add_filter( 'stylesheet', 'project_app_use_app_theme' );
add_filter( 'template', 'project_app_use_app_theme' );   
}

    //function for using the app theme
function project_app_use_app_theme(){
    return get_option('Project_App_theme');
}    
//checking where the user is coming from (which url they were one in the previous page)
    if(strpos($_SERVER['HTTP_REFERER'], 'theme=app-theme')){
        //checking if the current url isn't already app theme queried
        if(!strpos($url, 'theme=app-theme')){           
        $data = array('theme'=>'app-theme');
        $new_location =  $htt . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . $mark . http_build_query($data);
        echo "<script>window.location.assign('$new_location' )</script>";
        }
    }

}
add_action('plugins_loaded', 'project_app_pluginsstart');

//enqueing scripts for color picker in customizer_page
function project_app_enqueue_color_picker( $hook_suffix ) {
    // enqueing default wp color picker
    wp_enqueue_style( 'wp-color-picker' );
    //enqueing my own jquery file
    wp_enqueue_script( 'project-app-script-handle', plugins_url('js/pickers.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

add_action( 'admin_enqueue_scripts', 'project_app_enqueue_color_picker' );

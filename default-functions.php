<?php

function dashboard_redirect($url) {
  $url = 'wp-admin/edit.php?post_type=page';
  return $url;
    // global $current_user;
    // // is there a user ?
    // if(is_array($user->roles)) {
    //     // check, whether user has the author role:
    //     if(in_array('author', $current_user->roles)) {
    //     }
    // }
}
add_filter('login_redirect', 'dashboard_redirect');  


//remove items from wp-admin
function Wps_remove_tools(){
  remove_menu_page( 'index.php' );                  //Dashboard
  // remove_menu_page( 'jetpack' );                    //Jetpack* 
  remove_menu_page( 'edit.php' );                   //Posts
  // remove_menu_page( 'upload.php' );                 //Media
  remove_menu_page( 'edit.php?post_type=page' );    //Pages
  remove_menu_page( 'edit-comments.php' );          //Comments
  remove_menu_page( 'themes.php' );                 //Appearance
  // remove_menu_page( 'plugins.php' );                //Plugins
  // remove_menu_page( 'users.php' );                  //Users
  // remove_menu_page( 'tools.php' );                  //Tools
  // remove_menu_page( 'options-general.php' );        //Settings
}
add_action( 'admin_menu', 'Wps_remove_tools', 99 );


//remove login header on html
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

//add scripts and stylesheets
function portfolio_scripts(){
	wp_enqueue_style( 'css', get_template_directory_uri() . '/css/styles.css' );
	wp_enqueue_script( 'js', get_template_directory_uri() . '/js/scripts.js' );
}

add_action( 'wp_enqueue_scripts', 'portfolio_scripts' );


//add Google Fonts
function portfolio_google_fonts(){
	wp_register_style('OpenSans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800');
	wp_enqueue_style( 'OpenSans' );
}

add_action('wp_print_styles', 'portfolio_google_fonts');

//wordpress titles
add_theme_support( 'title-tag' );


function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}
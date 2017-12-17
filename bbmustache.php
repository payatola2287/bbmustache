<?php
/**
 * Plugin Name: Beaver Builder Mustache Modules
 * Plugin URI: https://github.com/payatola2287/bbmustache
 * Description: Custom Modules for Beaver Page Builder
 * Version: 2.0.2
 * Author Name: Paolo Gallardo
 * Author URI: http://paologallardo.com
**/
define( 'BBMUSTACHE_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'BBMUSTACHE_MODULE_URL', plugins_url( '/', __FILE__ ) );

require 'plugin-update-checker/plugin-update-checker.php';
 $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
 	'https://github.com/payatola2287/bbmustache',
 	__FILE__,
 	'bbmustache'
 );

function grow_mustache(){
  /* Load the mustache modules only when Beaver is installed and activated */
  if( class_exists( 'FLBuilder' ) ){
    include 'bbmustache-heading/bbmustache-heading.php';
    include 'bbmustache-text/bbmustache-text.php';
    include 'bbmustache-posts/bbmustache-posts.php';
  }
}
/* Hook to init */
add_action( 'init','grow_mustache' );

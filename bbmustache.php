<?php
/**
 * Plugin Name: Beaver Builder Mustache
 * Plugin URI:
 * Description: Custom Modules for Beaver Page Builder
 * Version: 1.0
 * Author Name: Paolo Gallardo
 * Author URI: http://paologallardo.com
**/
define( 'BBMUSTACHE_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'BBMUSTACHE_MODULE_URL', plugins_url( '/', __FILE__ ) );
function grow_mustache(){
  /* Load the mustache modules only when Beaver is installed and activated */
  if( class_exists( 'FLBuilder' ) ){
    include 'bbmustache-heading/bbmustache-heading.php';
    include 'bbmustache-text/bbmustache-text.php';
  }
}
/* Hook to init */
add_action( 'init','grow_mustache' );

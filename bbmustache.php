<?php
/**
 * Plugin Name: Beaver Builder Mustache Modules
 * Plugin URI: https://github.com/payatola2287/bbmustache
 * Description: Custom Modules for Beaver Page Builder
 * Version: 2.1.72
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

function get_bb_globals(){
  $global_settings = FLBuilderModel::get_global_settings();
  return $global_settings;
}

function grow_mustache(){
  /* Load the mustache modules only when Beaver is installed and activated */
  if( class_exists( 'FLBuilder' ) ){
    include 'classes/MustacheMenuWalker.php';
    include 'bbmustache-heading/bbmustache-heading.php';
    include 'bbmustache-text/bbmustache-text.php';
    include 'bbmustache-posts/bbmustache-posts.php';
    include 'bbmustache-cards/bbmustache-cards.php';
    include 'bbmustache-search/bbmustache-search.php';
    include 'bbmustache-menu/bbmustache-menu.php';
  }
}
/* Hook to init */
add_action( 'init','grow_mustache' );

function bbmustache_custom_builder_fields( $fields ) {
  	$fields['align'] 	  = BBMUSTACHE_MODULE_DIR .'settings/fields/mustache-align.php';
    $fields['bbm-radio'] 	  = BBMUSTACHE_MODULE_DIR .'settings/fields/mustache-radio.php';
    $fields['bbm-menu'] 	  = BBMUSTACHE_MODULE_DIR .'settings/fields/mustache-menus.php';
  	return $fields;
}
add_filter( 'fl_builder_custom_fields', 'bbmustache_custom_builder_fields' );

function bbmustache_custom_field_assets() {
    if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
        wp_enqueue_style( 'bbmustache-custom-fields', BBMUSTACHE_MODULE_URL . 'settings/css/settings.css', array( 'font-awesome' ), '' );
    }
}
add_action( 'wp_enqueue_scripts', 'bbmustache_custom_field_assets' );

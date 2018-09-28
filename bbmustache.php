<?php
/**
 * Plugin Name: Beaver Builder Mustache Modules
 * Plugin URI: https://github.com/payatola2287/bbmustache
 * Description: Custom Modules for Beaver Page Builder
 * Version: 2.1.75
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
    include 'bbmustache-testimonials/bbmustache-testimonials.php';
    wp_enqueue_style( 'bbmustache-css',plugins_url( '/module/bbmustache.css',__FILE__ ) );
  }
}
/* Hook to init */
add_action( 'init','grow_mustache' );
/**
* add the settings fields to the builder
**/
function bbmustache_custom_builder_fields( $fields ){
  $fields['align'] 	  = BBMUSTACHE_MODULE_DIR . 'settings/fields/mustache-align.php';
  $fields['bbm-radio'] 	  = BBMUSTACHE_MODULE_DIR . 'settings/fields/mustache-radio.php';
  $fields['bbm-menu'] 	  = BBMUSTACHE_MODULE_DIR .'settings/fields/mustache-menus.php';
  return $fields;
}
/**
* add the settings fields css
**/
function bbmustache_custom_field_assets(){
  if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
      wp_enqueue_style( 'bbmustache-custom-fields', BBMUSTACHE_MODULE_URL . 'settings/css/settings.css', array( 'font-awesome' ), '' );
  }
}
add_filter( 'fl_builder_custom_fields', 'bbmustache_custom_builder_fields' );
add_action( 'wp_enqueue_scripts', 'bbmustache_custom_field_assets' );
function bbmustache_custom_background_setting( $form,$slug ){
  if( $slug === 'row' || $slug === 'col' ){
    $form['tabs']['responsive'] = array(
      'title' => __( 'Responsive','fl-builder' ),
      'sections' => array(
        'medium_screens_responsive' => array(
          'title' => __( 'Medium Devices','fl-builder' ),
          'fields' => array(
            'med_background_type' => array(
              'type' => 'select',
              'label' => __( 'Background Type','fl-builder' ),
              'options' => array(
                'none' => __( 'None','fl-builder' ),
                'color' => __( 'Color','fl-builder' ),
                'photo' => __( 'Photo','fl-builder' )
              ),
              'default' => 'none',
              'toggle' => array(
                'color' => array(
                  'sections' => array(
                    'med_bg_settings'
                  ),
                  'fields' => array(
                    'med_bg_color'
                  )
                ),
                'photo' => array(
                  'sections' => array(
                    'med_bg_settings',
                  ),
                  'fields' => array(
                    'med_bg_photo_select',
                    'med_bg_photo_position',
                    'med_bg_photo_size',
                    'med_bg_photo_attachment'
                  )
                )
              )
            ), // end of med_background_type field
          )
        ), // end medium_screens_responsive section
        'med_bg_settings' => array(
          'title' => __( 'Background Settings','fl-builder' ),
          'fields' => array(
            'med_bg_color' => array(
              'type' => 'color',
              'default' => '#fff',
              'label' => __( 'Background Color','fl-builder' )
            ), // end of med_bg_color field
            'med_bg_photo_select' => array(
              'type' => 'photo',
              'label' => __( 'Background Image','fl-builder' ),
              'show_remove' => true
            ), // end of med_bg_photo_select field
            'med_bg_photo_position' => array(
              'type' => 'select',
              'label' => __( 'Background Position','fl-buider' ),
              'options' => array(
                'left top' => __( 'Left Top','fl-builder' ),
                'left center' => __( 'Left Center', 'fl-builder' ),
                'left bottom' => __( 'Left bottom','fl-builder' ),
                'center top' => __( 'Center Top','fl-builder' ),
                'center center' => __( 'Center','fl-builder' ),
                'center bottom' => __( 'Center Bottom','fl-builder' ),
                'right top' => __( 'Right Top','fl-builder' ),
                'right center' => __( 'Right Center','fl-builder' ),
                'right bottom' => __( 'Right Bottom','fl-builder' )
              ),
              'default' => 'center center'
            ), // end of med_bg_photo_position field
            'med_bg_photo_size' => array(
              'type' => 'bbm-radio',
              'label' => __( 'Background Size','fl-builder' ),
              'options' => array(
                'auto' => __( 'Default','fl-builder' ),
                'contain' => __( 'Contain','fl-builder' ),
                'cover' => __( 'Cover','fl-builder' )
              ),
              'default' => 'cover'
            ), // end of med_bg_photo_size field
            'med_bg_photo_attachment' => array(
              'type' => 'bbm-radio',
              'label' => __( 'Background Attachment','fl-builder' ),
              'options' => array(
                'scroll' => __( 'Scroll','fl-builder' ),
                'fixed' => __( 'Fixed','fl-builder' )
              ),
              'default' => 'scroll'
            ), // end of med_bg_photo_attachment field
          )
        ), // end of med_bg_settings section
        'small_screens_responsive' => array(
          'title' => __( 'Small Devices','fl-builder' ),
          'fields' => array(
            'sm_background_type' => array(
              'type' => 'select',
              'label' => __( 'Background Type','fl-builder' ),
              'options' => array(
                'none' => __( 'None','fl-builder' ),
                'color' => __( 'Color','fl-builder' ),
                'photo' => __( 'Photo','fl-builder' )
              ),
              'default' => 'none',
              'toggle' => array(
                'color' => array(
                  'sections' => array(
                    'sm_bg_settings'
                  ),
                  'fields' => array(
                    'sm_bg_color'
                  )
                ),
                'photo' => array(
                  'sections' => array(
                    'sm_bg_settings',
                  ),
                  'fields' => array(
                    'sm_bg_photo_select',
                    'sm_bg_photo_position',
                    'sm_bg_photo_size',
                    'sm_bg_photo_attachment'
                  )
                )
              )
            ), // end of sm_background_type field
          )
        ), // end small_screens_responsive section
        'sm_bg_settings' => array(
          'title' => __( 'Background Settings','fl-builder' ),
          'fields' => array(
            'sm_bg_color' => array(
              'type' => 'color',
              'default' => '#fff',
              'label' => __( 'Background Color','fl-builder' )
            ), // end of sm_bg_color field
            'sm_bg_photo_select' => array(
              'type' => 'photo',
              'label' => __( 'Background Image','fl-builder' ),
              'show_remove' => true
            ), // end of sm_bg_photo_select field
            'sm_bg_photo_position' => array(
              'type' => 'select',
              'label' => __( 'Background Position','fl-buider' ),
              'options' => array(
                'left top' => __( 'Left Top','fl-builder' ),
                'left center' => __( 'Left Center', 'fl-builder' ),
                'left bottom' => __( 'Left bottom','fl-builder' ),
                'center top' => __( 'Center Top','fl-builder' ),
                'center center' => __( 'Center','fl-builder' ),
                'center bottom' => __( 'Center Bottom','fl-builder' ),
                'right top' => __( 'Right Top','fl-builder' ),
                'right center' => __( 'Right Center','fl-builder' ),
                'right bottom' => __( 'Right Bottom','fl-builder' )
              ),
              'default' => 'center center'
            ), // end of sm_bg_photo_position field
            'sm_bg_photo_size' => array(
              'type' => 'bbm-radio',
              'label' => __( 'Background Size','fl-builder' ),
              'options' => array(
                'auto' => __( 'Default','fl-builder' ),
                'contain' => __( 'Contain','fl-builder' ),
                'cover' => __( 'Cover','fl-builder' )
              ),
              'default' => 'cover'
            ), // end of sm_bg_photo_size field
            'sm_bg_photo_attachment' => array(
              'type' => 'bbm-radio',
              'label' => __( 'Background Attachment','fl-builder' ),
              'options' => array(
                'scroll' => __( 'Scroll','fl-builder' ),
                'fixed' => __( 'Fixed','fl-builder' )
              ),
              'default' => 'scroll'
            ), // end of sm_bg_photo_attachment field
          )
        ), // end of sm_bg_settings section
      ),
    );
  }
  return $form;
}
add_filter( 'fl_builder_register_settings_form', 'bbmustache_custom_background_setting',10,2 );

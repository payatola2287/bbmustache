<?php
/**
 * Module Name: Mustache Text
 * Version: 1.0
**/
class MustacheText extends FLBuilderModule {
  public function __construct(){
    $instance_config = array(
      'name' => __( 'Mustache Text', 'fl-builder' ),
      'description' => __( 'Creative Text.','fl-builder' ),
      'category' => __( 'Mustache Modules','fl-builder' ),
      'dir' => BBMUSTACHE_MODULE_DIR . 'bbmustache-text/',
      'url' => BBMUSTACHE_MODULE_URL . 'bbmustache-text/'
    );
    parent::__construct( $instance_config );
  }
}
FLBuilder::register_module( 'MustacheText',array(
  'content-tab' => array(
    'title' => __( 'Content','fl-builder' ),
    'sections' => array(
      'content-text-section' => array(
        'title' => __( 'Text','fl-builder' ),
        'fields' => array(
          'content_text' => array(
            'type' => 'editor',
            'row' => 10,
            'media_buttons' => false
          )
        )
      )
    )
  ),
  'style-tab' => array(
    'title' => __( 'Style','fl-buider' ),
    'sections' => array(
      'colors-section' => array(
        'title' => 'Text Color',
        'fields' => array(
          'p_color' => array(
            'type' => 'color',
            'label' => __( 'Text Color' ,'fl-builder' ),
            'default' => '333333',
            'show_reset' => true
          )
        )
      )
    )
  ),
  'typography-tab' => array(
    'title' => __( 'Typography','fl-builder' ),
    'sections' => array(
      'font-section' => array(
        'fields' => array(
          'text_fam' => array(
            'type' => 'font',
            'label' => __( 'Font','fl-builder' ),
            'default' => array(
              'family' => 'Lato',
              'weight' => 400
            )
          ),
          'text_size' => array(
            'type' => 'text',
            'label' => __( 'Font Size','fl-buider' ),
            'default' => '16px'
          ),
          'text_line_height' => array(
            'type' => 'text',
            'label' => __( 'Font Size','fl-buider' ),
            'default' => '1.5'
          )
        )
      )
    )
  )
) );

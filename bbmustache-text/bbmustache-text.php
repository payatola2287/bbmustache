<?php
/**
 * Module Name: Mustache Text
 * Version: 2.0
**/
class MustacheText extends FLBuilderModule {
  public function __construct(){
    $instance_config = array(
      'name' => __( 'Mustache Text', 'fl-builder' ),
      'description' => __( 'Normal Text Content','fl-builder' ),
      'category' => __( 'Content Modules','fl-builder' ),
      'group' => __( 'Mustache Modules','fl-builder' ),
      'dir' => BBMUSTACHE_MODULE_DIR . 'bbmustache-text/',
      'url' => BBMUSTACHE_MODULE_URL . 'bbmustache-text/',
      'icon' => 'text.svg',
    );
    parent::__construct( $instance_config );
  }
  public function color( $color_setting_field_value ){
    if( strncmp($color_setting_field_value, "rgba", 4) === 0 ){
      return $color_setting_field_value;
    }
    return "#".$color_setting_field_value;
  }
}
FLBuilder::register_module( 'MustacheText',array(
  'content-tab' => array(
    'title' => __( 'Content','fl-builder' ),
    'sections' => array(
      'content-text-section' => array(
        'fields' => array(
          'content_text' => array(
            'type' => 'editor',
            'row' => 10,
            'media_buttons' => true
          )
        )
      ),
      'text-alignment-section' => array(
        'fields' => array(
          'alignment' => array(
            'type' => 'align',
            'label' => 'Text Alignment',
            'default' => 'left'
          ),
          'transform' => array(
            'type' => 'select',
            'label' => __( 'Text Transform','fl-builder' ),
            'default' => 'auto',
            'options' => array(
              'auto' => __( 'Default','fl-builder' ),
              'lowercase' => __( 'lowercase','fl-builder' ),
              'uppercase' => __( 'UPPERCASE','fl-builder' ),
              'capitalize' => __( 'Capitalize','fl-builder' )
            )
          )
        )
      )
    )
  ),
  'style-tab' => array(
    'title' => __( 'Style','fl-buider' ),
    'sections' => array(
      'colors-section' => array(
        'fields' => array(
          'p_color' => array(
            'type' => 'color',
            'label' => __( 'Text Color' ,'fl-builder' ),
            'default' => '333333',
            'show_reset' => true,
            'preview' => array(
              'type' =>'css',
              'property' => 'color',
              'selector' => '.bbmustache-text'
            )
          ),
          'p_margin' => array(
            'type' => 'dimension',
            'label' => __( 'Margin','fl-builder' ),
            'default' => '0',
            'description' => __( 'Margins of each paragraph','fl-builder' )
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
              'family' => 'Default',
              'weight' => 400
            )
          ),
          'text_size' => array(
            'type' => 'unit',
            'label' => __( 'Font Size','fl-buider' ),
            'default' => '16',
            'description' => 'px',
            'responsive' => true
          ),
          'text_line_height' => array(
            'type' => 'unit',
            'label' => __( 'Line Height','fl-buider' ),
            'default' => '1.5',
            'responsive' => true
          )
        )
      ),
    )
  )
) );

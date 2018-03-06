<?php
/**
 * Module Name: Mustache Heading
 * Version: 2.1
**/
class MustacheHeading extends FLBuilderModule {
  public function __construct(){
    $instance_config = array(
      'name' => __( 'Mustache Heading', 'fl-builder' ),
      'description' => __( 'Text content heading','fl-builder' ),
      'category' => __( 'Content Modules','fl-builder' ),
      'dir' => BBMUSTACHE_MODULE_DIR . 'bbmustache-heading/',
      'url' => BBMUSTACHE_MODULE_URL . 'bbmustache-heading/',
      'group' => __( 'Mustache Modules','fl-builder' )
    );
    parent::__construct( $instance_config );
  }
}
FLBuilder::register_module( 'MustacheHeading', array(
  'content-tab' => array(
    'title' => __( 'Content' ,'fl-builder' ),
    'sections' => array(
      'heading-html-tag-section' => array(
        'title' => __( 'HTML Tag','fl-buider' ),
        'fields' => array(
          'html_tag' => array(
            'type' => 'select',
            'label' => __( 'Select HTML Tag','fl-builer' ),
            'default' => 'h1',
            'options' => array(
              'h1' => __( 'H1','fl-builder' ),
              'h2' => __( 'H2','fl-builder' ),
              'h3' => __( 'H3','fl-builder' ),
              'h4' => __( 'H4','fl-builder' ),
              'h5' => __( 'H5','fl-builder' ),
              'h6' => __( 'H6','fl-builder' ),
              'div' => __( 'DIV','fl-builder' )
            )
          )
        )
      ),
      'heading-content-section' => array(
        'title' => __( 'Title','fl-builder' ),
        'fields' => array(
          'bg_text_field' => array(
            'type' => 'text',
            'label' => __( 'Heading Text','fl-builder' )
          ),
        )
      ),
      'text-content-section' => array(
        'title' => __( 'Content','fl-builder' ),
        'fields' => array(
          'main_text_field' => array(
            'type' => 'editor',
            'row' => 10,
            'media_buttons' => true
          )
        )
      )
    )
  ),
  'styling-tab' => array(
    'title' => __( 'Style','fl-builder' ),
    'sections' => array(
      'background-text-styling-section' => array(
        'title' => __( 'Heading Text Style','fl-builder' ),
        'fields' => array(
          'bg_text_margin' => array(
            'type' => 'dimension',
            'responsive' => true,
            'label' => __( 'Margins','fl-builder' ),
            'default' => '5',
            'description' => 'px',
            'preview' => array(
              'type' => 'css',
              'selector' => '.bbmustache-text-bg',
              'property' => 'margin'
            )
          ),
          'bg_text_color' => array(
            'type' => 'color',
            'label' => __( 'Text Color' ,'fl-builder' ),
            'default' => '333333',
            'show_reset' => true,
            'preview' => array(
              'type' => 'css',
              'property' => 'color',
              'selector' => '.bbmustache-text-bg'
            )
          ),
          'bg_text_align' => array(
            'type' => 'select',
            'label' => __( 'Text Align','fl-builder' ),
            'default' => 'center',
            'options' => array(
              'center' => __( 'Center Align Text','fl-builder' ),
              'left' => __( 'Left Align Text','fl-builder' ),
              'right' => __( 'Right Align Text','fl-builder' )
            ),
            'preview' => array(
              'type' => 'css',
              'property' => 'text-align',
              'selector' => '.bbmustache-text-bg'
            )
          ),
          'bg_text_transform' => array(
            'type' => 'select',
            'label' => __( 'Text Transform','fl-builder' ),
            'default' => 'none',
            'options' => array(
              'none' => __( 'None','fl-builder' ),
              'uppercase' => __( 'UPPERCASE','fl-builder' ),
              'capitalize' => __( 'Capitalize','fl-builder' ),
              'lowercase' => __( 'lowercase','fl-builder' )
            ),
            'preview' => array(
              'type' => 'css',
              'property' => 'text-transform',
              'selector' => '.bbmustache-text-bg'
            )
          )
        )
      ),
      'main-text-styling-section' => array(
        'title' => __( 'Main Text Style','fl-builder' ),
        'fields' => array(
          'main_text_color' => array(
            'type' => 'color',
            'label' => __( 'Text Color' ,'fl-builder' ),
            'default' => '333333',
            'show_reset' => true,
          ),
          'main_text_align' => array(
            'type' => 'select',
            'label' => __( 'Text Align','fl-builder' ),
            'default' => 'center',
            'options' => array(
              'center' => __( 'Center Align Text','fl-builder' ),
              'left' => __( 'Left Align Text','fl-builder' ),
              'right' => __( 'Right Align Text','fl-builder' )
            )
          ),
          'main_text_transform' => array(
            'type' => 'select',
            'label' => __( 'Text Transform','fl-builder' ),
            'default' => 'none',
            'options' => array(
              'none' => __( 'None','fl-builder' ),
              'uppercase' => __( 'UPPERCASE','fl-builder' ),
              'capitalize' => __( 'Capitalize','fl-builder' ),
              'lowercase' => __( 'lowercase','fl-builder' )
            )
          )
        )
      )
    )
  ),
  'typography-tab'=> array(
    'title' => __( 'Typography','fl-builder' ),
    'sections' => array(
      'bg-text-font-style' => array(
        'title' => __( 'Background Text Font','fl-builder' ),
        'fields' => array(
          'bg_text_fam' => array(
            'type' => 'font',
            'label' => __( 'Font','fl-builder' ),
            'default' => array(
              'family' => 'Lato',
              'weight' => 700
            )
          ),
          'bg_text_size' => array(
            'type' => 'unit',
            'label' => __( 'Font Size','fl-builder' ),
            'default' => '48',
            'responsive' => true,
            'description' => 'px'
          ),
          'bg_text_line_height' => array(
            'type' => 'unit',
            'label' => __( 'Line Height','fl-builder' ),
            'default' => '1.5',
            'responsive' => true,
          ),
          'bg_text_letter_spacing' => array(
            'type' => 'unit',
            'label' => __( 'Letter Spacing','fl-buidler' ),
            'default' => '0',
          )
        )
      ),
      'main-text-font-style' => array(
        'title' => __( 'Main Text Styling','fl-buidler' ),
        'fields' => array(
          'main_text_fam' => array(
            'type' => 'font',
            'label' => __( 'Font','fl-builder' ),
            'default' => array(
              'family' => 'Lato',
              'weight' => 700
            )
          ),
          'main_text_size' => array(
            'type' => 'unit',
            'label' => __( 'Font Size','fl-builder' ),
            'default' => '32',
            'responsive' => true
          ),
          'main_text_line_height' => array(
            'type' => 'text',
            'label' => __( 'Line Height','fl-builder' ),
            'default' => '1.5',
            'responsive' => true
          ),
        )
      )
    )
  )
) );

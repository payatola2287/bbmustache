<?php
/**
 * Module: BB Mustache Search Module
 **/
 class BBMustacheSearch extends FLBuilderModule {
   public function __construct() {
     parent::__construct(array(
            'name'            => __( 'Search', 'fl-builder' ),
            'description'     => __( 'Customizeble Search form', 'fl-builder' ),
            'group'           => __( 'Mustache Modules', 'fl-builder' ),
            'category'        => __( 'Standard Modules', 'fl-builder' ),
            'dir'             => BBMUSTACHE_MODULE_DIR . 'bbmustache-search/',
            'url'             => BBMUSTACHE_MODULE_URL . 'bbmustache-search/',
            'partial_refresh' => true, // Defaults to false and can be omitted.
        ));
      $this->add_css( 'font-awesome' );
   }
   public function color( $color_setting_field_value ){
     if( strncmp($color_setting_field_value, "rgba", 4) === 0 ){
       return $color_setting_field_value;
     }
     return "#".$color_setting_field_value;
   }
   public function alignment_class( $alignment ){
     $class = 'field-center';
     if( $alignment == 'left' ){
       $class = 'field-left';
     }elseif( $alignment == 'right' ){
       $class = 'field-right';
     }
     return $class;
   }
 }

 FLBuilder::register_module( 'BBMustacheSearch',array(
   'general-tab' => array(
     'title' => __( 'General','fl-builder' ),
     'sections' => array(
       'content_section' => array(
         'title' => __( 'Content','fl-builder' ),
         'fields' => array(
           'input_placeholder' => array(
             'type' => 'text',
             'label' => __( 'Placeholder','fl-builder' ),
             'default' => 'Search...'
           ),
         )
       ), // end of content_section section
     )
   ), // end of general-tab tab
   'style-tab' => array(
     'title' => __( 'Style','fl-builder' ),
     'sections' => array(
       'form_styling' => array(
         'title' => __( 'Form','fl-builder' ),
         'fields' => array(
           'form_bg_color' => array(
             'type' => 'color',
             'default' => 'fff',
             'show_reset' => true,
             'show_alpha' => true,
             'label' => __( 'Background Color','fl-builder' )
           ),
           'form_padding' => array(
             'type' => 'dimension',
             'label' => __( 'Padding','fl-builder' ),
             'description' => 'px',
           ),
         )
       ), // end of form_styling section
       'input_styling' => array(
         'title' => __( 'Input','fl-builder' ),
         'fields' => array(
           'text_color' => array(
             'type' => 'color',
             'default' => '000',
             'show_reset' => true,
             'show_alpha' => true,
             'label' => __( 'Text Color','fl-builder' ),
           ),
           'text_background_color' => array(
             'type' => 'color',
             'default' => '000',
             'show_reset' => true,
             'show_alpha' => true,
             'label' => __( 'Background Color','fl-builder' ),
           ),
           'input_border_position' => array(
             'type' => 'select',
             'options' => array(
               'box' => __( 'Default','fl-builder' ),
               'underline' => __( 'Underline','fl-builder' )
             ),
             'label' => __( 'Border Position','fl-builder' )
           ),
           'input_border_width' => array(
             'type' => 'unit',
             'default' => 1,
             'label' => __( 'Border Width','fl-builder' ),
             'description' => 'px'
           ),
           'input_border_color' => array(
             'type' => 'color',
             'show_reset' => true,
             'show_alpha' => true,
             'default' => 'ccc',
             'label' => __( 'Border Color','fl-builder' )
           ),
           'focus_border_color' => array(
             'type' => 'color',
             'show_reset' => true,
             'show_alpha' => true,
             'default' => 'ad1aac',
             'label' => __( 'Border Color','fl-builder' )
           ),
           'input_padding' => array(
             'type' => 'dimension',
             'label' => __( 'Padding','fl-builder' ),
             'description' => 'px',
           ),
           'input_width' => array(
             'type' => 'select',
             'options' => array(
               'custom' => __( 'Custom Width','fl-builder' ),
               'auto' => __( 'Auto','fl-builder' )
             ),
             'default' => 'auto',
             'label' => __( 'Field Width','fl-builder' ),
             'toggle' => array(
               'custom' => array(
                 'fields' => array( 'input_width_value' )
               )
             )
           ),
           'input_width_value' => array(
             'type' => 'unit',
             'default' => '150',
             'label' => __( 'Input Width','fl-builder' ),
             'desc' => 'px',
           ),
           'input_alignment' => array(
             'type' => 'select',
             'default' => 'left',
             'options' => array(
               'left' => __( 'Left','fl-builder' ),
               'center' => __( 'Center','fl-builder' ),
               'right' => __( 'Right','fl-builder' )
             ),
             'label' => __( 'Alignment','fl-builder' )
           )
         )
       ),// end of input_styling section
       'icon_styling' => array(
         'title' => __( 'Icon','fl-builder' ),
         'fields' => array(
           'icon_color' => array(
             'type' => 'color',
             'default' => 'fff',
             'show_reset' => true,
             'show_alpha' => true,
             'label' => __( 'Color','fl-builder' ),
           ),
           'icon_background_color' => array(
             'type' => 'color',
             'default' => '000',
             'show_reset' => true,
             'show_alpha' => true,
             'label' => __( 'Background Color','fl-builder' ),
           ),
         )
       ), // end of icon_styling section
       'placeholder_styling' => array(
         'title' => __( 'Placeholder','fl-builder' ),
         'fields' => array(
           'placeholder_color' => array(
             'type' => 'color',
             'default' => '000',
             'show_reset' => true,
             'show_alpha' => true,
             'label' => __( 'Color','fl-builder' ),
           ),
         )
       ),  // end of placeholder_styling section
     )
   ),
   'typography-tab' => array(
     'title' => __( 'Typography','fl-builder' ),
     'sections' => array(
       'title_font_section' => array(
         'title' => __( 'Title','fl-builder' ),
         'fields' => array(
           'title_font' => array(
             'type' => 'font',
             'label' => __( 'Font','fl-builder' ),
           ),
           'title_line_height' => array(
             'type' => 'unit',
             'label' => __( 'Line Height','fl-builder' ),
           ),
           'title_font_size' => array(
             'type' => 'unit',
             'label' => __( 'Font Size','fl-builder' ),
             'responsive' => true
           ),
           'title_transform' => array(
             'type' => 'select',
             'label' => __( 'Transform','fl-builder' ),
             'type' => 'select',
             'options' => array(
               'default' => __( 'Default','fl-builder' ),
               'uppercase' => __( 'UPPERCASE','fl-builder' ),
               'lowercase' => __( 'lowercase','fl-builder' ),
               'capitalize' => __( 'Capitalize','fl-builder' )
             )
           )
         )
       ), // End of title_font_section section
       'desc_font_section' => array(
         'title' => __( 'Description','fl-builder' ),
         'fields' => array(
           'desc_font' => array(
             'type' => 'font',
             'label' => __( 'Font','fl-builder' ),
           ),
           'desc_line_height' => array(
             'type' => 'unit',
             'label' => __( 'Line Height','fl-builder' ),
           ),
           'desc_font_size' => array(
             'type' => 'unit',
             'label' => __( 'Font Size','fl-builder' ),
             'responsive' => true
           ),
           'desc_transform' => array(
             'type' => 'select',
             'label' => __( 'Transform','fl-builder' ),
             'type' => 'select',
             'options' => array(
               'default' => __( 'Default','fl-builder' ),
               'uppercase' => __( 'UPPERCASE','fl-builder' ),
               'lowercase' => __( 'lowercase','fl-builder' ),
               'capitalize' => __( 'Capitalize','fl-builder' )
             )
           )
         )
       ), // End of desc_font_section section
       'input_font_section' => array(
         'title' => __( 'Input','fl-builder' ),
         'fields' => array(
           'input_font' => array(
             'type' => 'font',
             'label' => __( 'Font','fl-builder' ),
           ),
           'input_line_height' => array(
             'type' => 'unit',
             'label' => __( 'Line Height','fl-builder' ),
           ),
           'input_font_size' => array(
             'type' => 'unit',
             'label' => __( 'Font Size','fl-builder' ),
             'responsive' => true
           ),
           'input_transform' => array(
             'type' => 'select',
             'label' => __( 'Transform','fl-builder' ),
             'type' => 'select',
             'options' => array(
               'default' => __( 'Default','fl-builder' ),
               'uppercase' => __( 'UPPERCASE','fl-builder' ),
               'lowercase' => __( 'lowercase','fl-builder' ),
               'capitalize' => __( 'Capitalize','fl-builder' )
             )
           )
         )
       ), // End of input_font_section section
     )
   )
 ) );

<?php
/**
 * Module Name: Mustache Testimonials
 * Version: 1.0
**/
class MustacheTestimonials extends FLBuilderModule {
  public function __construct(){
    $instance_config = array(
      'name' => __( 'Mustache Testimonials', 'fl-builder' ),
      'description' => __( 'Testimonials','fl-builder' ),
      'category' => __( 'Content Modules','fl-builder' ),
      'group' => __( 'Mustache Modules','fl-builder' ),
      'dir' => BBMUSTACHE_MODULE_DIR . 'bbmustache-testimonials/',
      'url' => BBMUSTACHE_MODULE_URL . 'bbmustache-testimonials/',
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

  /**
   * @function quoterGridOpener
   * Outputs the quoter grid opening tag
   * @param string $gridType - Type of grid to use
   * @param int $gridColumnCount - Number of columns for this grid
   **/
  public function quoterGridOpener( $gridType = 'grid', $gridColumnCount = 3 ){
    $string = '<div class="bbmustache-testimonials-grid ' . $gridType . '">';
    echo $string;
  }

  /**
   * @function quoterItemOpener
   * Outputs the individual quoter opening tag
   * @param int $gridItemCount - item count in the loop - Required
   * @param string $emphasis - emphasis this item
   * @param string $gridId - slug of the grid item
   **/
  public function quoterItemOpener( $gridItemCount, $emphasis = 'no', $gridId = '' ){
    $string = '<div class="bbmustache-testimonial-grid-item testimonial-grid-' . $gridItemCount;
    if( 'yes' == $emphasis ){
      $string .= ' bbmustache-testimonial-grid-emphasis';
    }

    if( '' != $gridId ){
      $string .= '" id="' . $gridId . '">';
    }else{
      $string .= '">';
    }
    echo $string;
  }
  /**
   * @function quoterDetails
   * Outputs the quoter name
   * @param string $name - Name of the quoter | Required
   * @param string $image - Image source url
   * @param string $link - Link to the profile of the quoter
   * @param string $position - Position of the quoter
   **/
  public function quoterDetails( $name, $image = '', $link = '', $position = '' ){
    $string = '<div class="bbmustache-testimonial-quoter-details-wrapper">';
    if( '' != $image ){
      $string .= '<figure class="bbmustache-testimonial-quoter-figure"><img src="' . $image . '" alt="' . $name . '" class="bbmustache-testimonial-quoter-image" /></figure>';
    }
    $string .= '<p class="bbmustache-testimonial-name">';
    if( '' != $link ){
      $string .= '<a href="' . $link . '" alt="' . $name . '">' . $name . '</a>';
    }else{
      $string .= $name;
    }
    if( '' != $position ){
      $string .= ', <span class="bbmustache-testimonial-position">' . $position . '</span>';
    }
    $string .= '</p>';
    $string .= '</div>';

    echo $string;
  }
}
FLBuilder::register_settings_form( 'bbmustache_testimonial_form_field', array(
  'title' => __( 'Testimonial','fl-builder' ),
  'tabs' => array(
    'general_tab' => array(
        'title' => __( 'General','fl-builder' ),
        'sections' => array(
          'emp_section' => array(
            'title' => __( 'Emphasis','fl-builder' ),
            'fields' => array(
              'quote_emphasis' => array(
                'label' => __( 'Emphasize','fl-builder' ),
                'type' => 'bbm-radio',
                'options' => array(
                  'yes' => __( 'Yes','fl-builder' ),
                  'no' => __( 'No','fl-builder' )
                ),
                'default' => 'no'
              ), // end of quote_emphasis field
            )
          ), // end of emp_section section
          'gen_name' => array(
            'title' => __( 'Content','fl-builder' ),
            'fields' => array(
              'quoter_name' => array(
                'label' => __( 'Name','fl-builder' ),
                'type' => 'text',
                'placeholder' => __( 'John Doe','fl-builder' )
              ), // end of quoter_name field
              'quoter_position' => array(
                'label' => __( 'Position','fl-builder' ),
                'type' => 'text',
                'placeholder' => __( 'Position','fl-builder' )
              ), // end of quoter_position field
              'quoter_image' => array(
                'label' => __( 'Image' ,'fl-builder' ),
                'type' => 'photo',
                'show_remove' => true
              ), // end of quoter_image field
              'quoter_link' => array(
                'label' => __( 'Link','fl-builder' ),
                'type' => 'link',
                'placeholder' => 'http:// | https://'
              ), // end of quoter_link field
            )
          ), // end of gen_name section
          'quote_section' => array(
            'title' => __( 'Quote','fl-builder' ),
            'fields' => array(
              'quote' => array(
                'type' => 'editor'
              ), // end of quote field
            )
          ), // end of quote_section
        )
    ), // end of general_tab tab
  )
) );
FLBuilder::register_module( 'MustacheTestimonials', array(
  'content_tab' => array(
    'title' => __( 'Content','fl-builder' ),
    'sections' => array(
      'testimonial_content_section' => array(
        'fields' => array(
          'testimonials_form' => array(
            'label' => __( 'Testimonial' ),
            'type' => 'form',
            'form' => 'bbmustache_testimonial_form_field',
            'preview' => 'quoter_name',
            'multiple' => true
          ), // end of testimonials_form field
        )
      ), // end of testimonial_content_section sections
    )
  ), // end of content_tab tab
  'style_tab' => array(
    'title' => __( 'Style','fl-builder' ),
    'sections' => array(
      'layout_style_section' => array(
        'title' => __( 'Layout','fl-builder' ),
        'fields' => array(
          'column_count' => array(
            'type' => 'unit',
            'label' => __( 'Column Count', 'fl-builder' ),
            'default' => 3
          ), // end of column_count field
        )
      ), // end layout_style_section section
      'color_style_section' => array(
        'title' => __( 'Color','fl-builder' ),
        'fields' => array(
          'background_color' => array(
            'label' => __( 'Background Color','fl-builder' ),
            'type' => 'color',
            'default' => 'fefefe',
            'show_alpha' => true,
            'show_reset' => true
          ), // end of background_color field,
          'hover_background_color' => array(
            'label' => __( 'Hover Background Color','fl-builder' ),
            'type' => 'color',
            'default' => 'fefefe',
            'show_alpha' => true,
            'show_reset' => true
          ), // end of hover_background_color field
          'text_color' => array(
            'label' => __( 'Text Color','fl-builder' ),
            'type' => 'color',
            'default' => '333333',
            'show_alpha' => true,
            'show_reset' => true
          ), // end of text_color field
          'hover_color' => array(
            'label' => __( 'Hover Text Color','fl-builder' ),
            'type' => 'color',
            'default' => '000000',
            'show_alpha' => true,
            'show_reset' => true
          ), // end of hover_color field
          'quotation_mark_color' => array(
            'label' => __( 'Quotation Mark Color','fl-builder' ),
            'type' => 'color',
            'default' => 'aaaaaa',
            'show_alpha' => true,
            'show_reset' => true
          ), // end of quotation_mark_color field
        )
      ), // end color_style_section section
      'emphasis_style_section' => array(
        'title' => __( 'Emphasis Color','fl-builder' ),
        'fields' => array(
          'emphasis_background_color' => array(
            'label' => __( 'Background Color','fl-builder' ),
            'type' => 'color',
            'default' => 'fefefe',
            'show_alpha' => true,
            'show_reset' => true
          ), // end of emphasis_background_color field,
          'emphasis_hover_background_color' => array(
            'label' => __( 'Hover Background Color','fl-builder' ),
            'type' => 'color',
            'default' => 'fefefe',
            'show_alpha' => true,
            'show_reset' => true
          ), // end of emphasis_hover_background_color field
          'emphasis_text_color' => array(
            'label' => __( 'Text Color','fl-builder' ),
            'type' => 'color',
            'default' => '333333',
            'show_alpha' => true,
            'show_reset' => true
          ), // end of emphasis_text_color field
          'emphasis_hover_color' => array(
            'label' => __( 'Hover Text Color','fl-builder' ),
            'type' => 'color',
            'default' => '000000',
            'show_alpha' => true,
            'show_reset' => true
          ), // end of emphasis_hover_color field
          'emphasis_quotation_mark_color' => array(
            'label' => __( 'Quotation Mark Color','fl-builder' ),
            'type' => 'color',
            'default' => 'aaaaaa',
            'show_alpha' => true,
            'show_reset' => true
          ), // end of emphasis_quotation_mark_color field
        )
      ), // end of emphasis_style_section section
      'spacing_style_section' => array(
        'title' => __( 'Spacing','fl-builder' ),
        'fields' => array(
          'margins' => array(
            'type' => 'dimension',
            'label' => __( 'Margins','fl-builder' ),
            'description' => 'px',
            'default' => '15'
          ), // end of margins field
          'paddings' => array(
            'type' => 'dimension',
            'label' => __( 'Paddings','fl-builder' ),
            'description' => 'px',
            'default' => '15'
          ), // end of paddings field
        )
      ), // end spacing_style_section section
    )
  ), // end of style_tab tab
  'typography_tab' => array(
    'title' => __( 'Typography','fl-builder' ),
    'sections' => array(
      'default_text_section' => array(
        'title' => __( 'Default Text','fl-builder' ),
        'fields' => array(
          'text_family' => array(
            'type' => 'font',
            'label' => __( 'Text Font','fl-builder' )
          ), // end of text_family field
          'text_size' => array(
            'type' => 'unit',
            'label' => __( 'Text Size','fl-builder' ),
            'default' => '18',
            'description' => 'px'
          ), // end of text_size field
          'line_height' => array(
            'type' => 'unit',
            'label' => __( 'Line Height','fl-builder' ),
            'default' => '1.3',
          ), // end of line_height field
        )
      ), // end of default_text_section
      'emphasis_text_section' => array(
        'title' => __( 'Emphasis Text','fl-builder' ),
        'fields' => array(
          'emphasis_text_family' => array(
            'type' => 'font',
            'label' => __( 'Text Font','fl-builder' )
          ), // end of emphasis_text_family field
          'emphasis_text_size' => array(
            'type' => 'unit',
            'label' => __( 'Text Size','fl-builder' ),
            'default' => '18',
            'description' => 'px'
          ), // end of emphasis_text_size field
          'emphasis_line_height' => array(
            'type' => 'unit',
            'label' => __( 'Line Height','fl-builder' ),
            'default' => '1.3',
          ), // end of emphasis_line_height field
        )
      ), // end of emphasis_text_section
    )
  ), // end of typography_tab tab
  'responsive_tab' => array(
    'title' => __( 'Responsive','fl-builder' ),
    'sections' => array(
      'medium_section' => array(
        'title' => __( 'Tab','fl-builder' ),
        'fields' => array(
          'med_column_count' => array(
            'type' => 'unit',
            'label' => __( 'Column Count', 'fl-builder' ),
            'default' => '3'
          ), // end of med_column_count field
          'med_default_text_size' => array(
            'type' => 'unit',
            'label' => __( 'Text Size','fl-builder' ),
            'default' => '18',
            'description' => 'px'
          ), // end of med_default_text_size field
          'med_emphasis_text_size' => array(
            'type' => 'unit',
            'label' => __( 'Emphasis Text Size','fl-builder' ),
            'default' => '18',
            'description' => 'px'
          ), // end of med_emphasis_text_size field
          'med_default_line_height' => array(
            'type' => 'unit',
            'label' => __( 'Line Height','fl-builder' ),
            'default' => '1.3',
          ), // end of med_default_line_height field
          'med_emphasis_line_height' => array(
            'type' => 'unit',
            'label' => __( 'Emphasis Line Height','fl-builder' ),
            'default' => '1.3',
          ), // end of med_emphasis_line_height field
        )
      ), // end of medium_section section
      'small_section' => array(
        'title' => __( 'Phone','fl-builder' ),
        'fields' => array(
          'sm_column_count' => array(
            'type' => 'unit',
            'label' => __( 'Column Count', 'fl-builder' ),
            'default' => '1'
          ), // end of sm_column_count field
          'sm_default_text_size' => array(
            'type' => 'unit',
            'label' => __( 'Text Size','fl-builder' ),
            'default' => '18',
            'description' => 'px'
          ), // end of sm_default_text_size field
          'sm_emphasis_text_size' => array(
            'type' => 'unit',
            'label' => __( 'Emphasis Text Size','fl-builder' ),
            'default' => '18',
            'description' => 'px'
          ), // end of sm_emphasis_text_size field
          'sm_default_line_height' => array(
            'type' => 'unit',
            'label' => __( 'Line Height','fl-builder' ),
            'default' => '1.3',
          ), // end of sm_default_line_height field
          'sm_emphasis_line_height' => array(
            'type' => 'unit',
            'label' => __( 'Emphasis Line Height','fl-builder' ),
            'default' => '1.3',
          ), // end of sm_emphasis_line_height field field
        )
      ), // end of small_section section
    )
  ), // end of responsive_tab tab
) );

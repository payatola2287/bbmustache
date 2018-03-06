<?php
/**
 * Module Name: Mustache Hover Cards
 * Version: 2.0
**/
class MustacheHCards extends FLBuilderModule {
  public function __construct(){
    $instance_config = array(
      'name' => __( 'Mustache Cards', 'fl-builder' ),
      'category' => __( 'Creative Modules','fl-builder' ),
      'icon' => 'layout.svg',
      'group' => __( 'Mustache Modules','fl-builder' ),
      'dir' => BBMUSTACHE_MODULE_DIR . 'bbmustache-cards/',
      'url' => BBMUSTACHE_MODULE_URL . 'bbmustache-cards/'
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
/*
* Registers the module to Beaver builder
*/
FLBuilder::register_module( 'MustacheHCards', apply_filters( 'bbmustache_cards_settings',array(
  'general_tab' => array(
    'title' => __( 'General','fl-builder' ),
    'sections' => array(
      'general_layout' => array(
        'title' => __( 'Layout' ,'fl-builder' ),
        'fields' => array(
          'card_layout' => array(
            'type' => 'select',
            'label' => __( 'Style','fl-builder' ),
            'options' => array(
              'kep-zero' => __( 'Style 0','fl-builder' ),
              'jared' => __( 'Style 1','fl-builder' ),
              'bison' => __( 'Style 2','fl-builder' ),
              'lightning-horn' => __( 'Style 3','fl-builder' )
            ),
            'default' => 'jared'
          ), // End of card_layout field
          'columns' => array(
              'type' => 'unit',
              'label' => __( 'Columns','fl-builder' ),
              'description' => 'column/s',
              'responsive' => true
          ), // End of columns field
          'card_height' => array(
            'type' => 'unit',
            'label' => __( 'Card Height','fl-builder' ),
            'responsive' => array(
              'placeholder' => array(
                'default' => '250',
                'medium' => '250',
                'responsive' => '250'
              )
            ),
            'default' => '250',
            'description' => 'px'
          ), // End of card_height field
        ),
      ), // End of general_layout section
      'general_spacing' => array(
        'title' => __( 'Margins','fl-builder' ),
        'fields' => array(
          'cards_margin' => array(
            'type' => 'dimension',
            'label' => __( 'Margins','fl-builder' ),
            'default' => '2',
            'description' => '%',
            //'responsive' => true
          ), // End of cards_margin field
        )
      ), // End of general_spacing section
    )
  ), // End of general_tab tab
  'content_tab' => array(
    'title' => __( 'Content','fl-builder' ),
    'sections' => array(
      'card_content_section' => array(
        'title' => __( 'Cards','fl-builder' ),
        'fields' => array(
          'cards_content' => array(
            'type' => 'form',
            'multiple' => true,
            'form' => 'cards_content',
            'label' => __( 'Card','fl-builder' ),
            'preview_text' => 'card_title_text'
          ), // End of cards_content fields
        )
      ), // End of card_content_section section
      'link_section' => array(
        'title' => __( 'Link','fl-builder' ),
        'fields' => array(
          'link_type' => array(
            'label' => __( 'Type','fl-builder' ),
            'type' => 'select',
            'options' => array(
              'none' => __( 'None','fl-builder' ),
              'box' => __( 'Box','fl-builder' ),
            ),
            'default' => 'box',
          ), // End of link_type field
        )
      ), // End of link_section section
    )
  ), // End of content_tab tab
  'styling_tab' => array(
    'title' => __( 'Style','fl-builder' ),
    'sections' => array(
      'card_styles' => array(
        'title' => __( 'Card','fl-builder' ),
        'fields' => array(
          'card_border' => array(
            'type' => 'select',
            'label' => __( 'Border','fl-builder' ),
            'options' => array(
              'none' => __( 'None','fl-builder' ),
              'solid' => __( 'Solid','fl-builder' ),
              'dashed' => __( 'Dashed','fl-buider' )
            ),
            'default' => 'none',
            'toggle' => array(
              'solid' => array( 'fields' => array( 'card_border_width','card_border_color' ) ),
              'dashed' => array( 'fields' => array( 'card_border_width','card_border_color' ) ),
            )
          ), // End of card_border field
          'card_border_width' => array(
            'type' => 'unit',
            'label' => __( 'Border Width', 'fl-builder' ),
            'description' => 'px',
            'default' => '1'
          ), // End of card_border_width field
          'card_border_color' => array(
            'type' => 'color',
            'label' => __( 'Border Color','fl-builder' ),
            'default' => '000',
            'show_reset' => true,
            'show_alpha' => true
          ), // End of card_border_color field
        )
      ), // End of card_styles section
      'layout_style' => array(
        'title' => __( 'Layout','fl-builder' ),
        'fields' => array(
          'overlay_color' => array(
            'type' => 'color',
            'label' => __( 'Overlay Color','fl-builder' ),
            'show_reset' => true,
            'show_alpha' => true,
            'default' => '000'
          ), // End of effect_border field
          'inner_box_border_width' => array(
            'type' => 'unit',
            'label' => __( 'Border Width','fl-builder' ),
            'default' => '1'
          ), // End of inner_box_border_width field
          'inner_box_border_color' => array(
            'type' => 'color',
            'label' => __( 'Border Color','fl-builder' ),
            'default' => '000',
            'show_reset' => true
          )
        )
      ), // End of layout_style section
      'title_styles' => array(
        'title' => __( 'Title','fl-builder' ),
        'fields' => array(
          'title_color' => array(
            'type' => 'color',
            'default' => '000',
            'label' => __( 'Color','fl-builder' )
           ), // End of title_color field
           'title_padding' => array(
             'type' => 'dimension',
             'label' => __( 'Padding','fl-builder' ),
             'default' => '0',
             'description' => 'px',
             'responsive' => true
           ), // End of title_padding field
           'title_margin' => array(
             'type' => 'dimension',
             'label' => __( 'Margin','fl-builder' ),
             'default' => '0',
             'description' => 'px',
             'responsive' => true
           ), // End of title_margin field
        )
      ), // End of title_styles section
      'content_styles' => array(
        'title' => __( 'Content','fl-builder' ),
        'fields' => array(
          'content_color' => array(
            'type' => 'color',
            'default' => '000',
            'label' => __( 'Color','fl-builder' )
           ), // End of title_color field
           'content_padding' => array(
             'type' => 'dimension',
             'label' => __( 'Padding','fl-builder' ),
             'default' => '0',
             'description' => 'px',
             'responsive' => true
           ), // End of title_padding field
           'content_margin' => array(
             'type' => 'dimension',
             'label' => __( 'Margin','fl-builder' ),
             'default' => '0',
             'description' => 'px',
             'responsive' => true
           ), // End of title_margin field
         )
      ), // End of content_styles section
      'image_background_styles' => array(), // End of image_background_styles section
    )
  ),
  'typography_tab' => array(
    'title' => __( 'Typography','fl-builder' ),
    'sections' => array(
      'title_typo' => array(
        'title' => __( 'Title','fl-builder' ),
        'fields' => array(
          'title_font' => array(
            'type' => 'font',
            'label' => __( 'Font','fl-builder' ),
          ), // End of title_font field
          'title_font_size' => array(
            'type' => 'unit',
            'default' => '36',
            'description' => 'px',
            'responsive' => array(
              'placeholder' => array(
                'default' => '36',
                'medium' => '36',
                'reponsive' => '36'
              )
            ),
            'label' => __( 'Font Size','fl-builder' )
          ), // End of title_font_size
        )
      ), // End of title_typo section
      'content_typo' => array(
        'title' => __( 'Content','fl-builder' ),
        'fields' => array(
          'content_font' => array(
            'type' => 'font',
            'label' => __( 'Font','fl-builder' ),
          ), // End of content_font field
          'content_font_size' => array(
            'type' => 'unit',
            'default' => '36',
            'description' => 'px',
            'responsive' => array(
              'placeholder' => array(
                'default' => '36',
                'medium' => '36',
                'reponsive' => '36'
              )
            ),
            'label' => __( 'Font Size','fl-builder' )
          ), // End of content_font_size field
        )
      ), // End of content_typo section
    )
  ), // End of typography_tab tab
) ) );

/*
* Registers a forms to be used as elements in the card
*/
FLBuilder::register_settings_form( 'cards_content', apply_filters( 'cards_content_settings', array(
      'title' => __( 'Cards','fl-builder' ),
      'tabs' => array(
        'card_tab' => array(
          'title' => __( 'Contents','fl-builder' ),
          'sections' => array(
            'title_content' => array(
              'title' => __( 'Card Title','fl-builder' ),
              'fields' => array(
                'card_title_text' => array(
                  'type' => 'text',
                  'label' => __( 'Title','fl-builder' ),
                  'default' => __( 'Card Title','fl-builder' )
                ) // End of card_title_text field
              )
            ), // End of title_content section
            'body_content' => array(
              'title' => __( 'Card Text','fl-builder' ),
              'fields' => array(
                'card_content_text' => array(
                  'type' => 'editor',
                  'label' => __( 'Content','fl-builder' ),
                  'default' => __( 'Card Description','fl-builder' ),
                  'rows'          => 10,
                  'wpautop'       => true
                ), // End of card_content_text field
              )
            ), // End of body_content section
            'link_section' => array(
              'title' => __( 'Card Link','fl-builder' ),
              'fields' => array(
                'card_link' => array(
                  'label' => __( 'Card Link','fl-builder' ),
                  'type' => 'link',
                  'description' => __( 'This only works if you set the link type to either box or button','fl-builder' )
                ), // End of card_link field

              )
            ), // End of link_section section
          )
        ),// End of card_tab tab
        'card_bg_tab' => array(
          'title' => __( 'Background','fl-builder' ),
          'sections' => array(
            'background_type_section' => array(
              'title' => __( 'Background Type' ,'fl-builder' ),
              'fields' => array(
                'background_type' => array(
                  'type' => 'select',
                  'label' => __( 'Type','fl-builder' ),
                  'options' => array(
                    'image' => __( 'Image','fl-builder' ),
                    'color' => __( 'Color','fl-builder' )
                  ),
                  'default' => 'image',
                  'toggle' => array(
                    'image' => array(
                      'fields' => array( 'background_image' )
                    ),
                    'color' => array(
                      'fields' => array(
                        'background_color'
                      )
                    )
                  )
                ), // End of background_type field
                'background_image' => array(
                  'type' => 'photo',
                  'label' => __( 'Background Image','fl-builder' ),
                  'show_remove' => true
                ), // End of background_image field
                'background_color' => array(
                  'type' => 'color',
                  'label' => __( 'Background Color','fl-builder' ),
                  'default' => 'ddd',
                  'show_reset' => true,
                  'show_alpha' => true
                ), // End of background_color field
              )
            ), // End of background_type_section section
          )
        ), // End of card_bg_tab tab
      )
) ) );

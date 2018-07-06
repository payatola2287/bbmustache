<?php
/**
 * Module Name: Mustache Menu
 * Version: 2.0
**/
class MustacheMenu extends FLBuilderModule {
  public function __construct(){
    $instance_config = array(
      'name' => __( 'Menu', 'fl-builder' ),
      'description' => __( 'Menu Module','fl-builder' ),
      'category' => __( 'Standard Modules','fl-builder' ),
      'group' => __( 'Mustache Modules','fl-builder' ),
      'dir' => BBMUSTACHE_MODULE_DIR . 'bbmustache-menu/',
      'url' => BBMUSTACHE_MODULE_URL . 'bbmustache-menu/',
      'icon' => 'hamburger-menu.svg',
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
FLBuilder::register_module( 'MustacheMenu',array(
  'content-tab' => array(
    'title' => __( 'Content','fl-builder' ),
    'sections' => array(
      'content-text-section' => array(
        'title' => __( 'Content','f-builder' ),
        'fields' => array(
          'use_menu' => array(
            'type' => 'bbm-menu',
            'label' => __( 'Menu','fl-builder' )
          ), // end of use_menu field
          'use_image' => array(
            'label' => __( 'Use Image','fl-builder' ),
            'type' => 'select',
            'options' => array(
              'yes' => __( 'Yes','fl-builder' ),
              'no' => __( 'No','fl-builder' )
            ),
            'default' => 'no',
            'toggle' => array(
              'yes' => array(
                'sections' => array(
                  'logo-section'
                )
              )
            )
          ), // end of use_image field
        )
      ),

      'text-alignment-section' => array(
        'fields' => array(
          'alignment' => array(
            'type' => 'align',
            'label' => __( 'Text Alignment', 'fl-builder' ),
            'default' => 'left'
          ),

        )
      ), // end of text-alignment-section section
    )
  ),
  'layout-tab' => array(
    'title' => __( 'Layout','fl-builder' ),
    'sections' => array(
      'logo-section' => array(
        'title' => __( 'Image','fl-builder' ),
        'fields' => array(
          'logo_image' => array(
            'type' => 'photo',
            'label' => __( 'Logo','fl-builder' ),
          ), // end of logo_image field
          'logo_link' => array(
            'type' => 'link',
            'label' => __( 'Link','fl-builder' )
          ), // end of logo_link field
        )
      ), // end of logo-section section
      'menu-layout-section' => array(
        'title' => __( 'Layout','fl-builder' ),
        'fields' => array(
          'layout' => array(
            'label' => __( 'Choose','fl-builder' ),
            'type' => 'select',
            'options' => array(
              'side' => __( 'Side','fl-builder' ),
              //'full' => __( 'Fullscreen','fl-builder' )
            ),
            'default' => 'side',
            'toggle' => array(
              'side' => array(
                'fields' => array(
                  'menu_alignment'
                )
              )
            )
          ), // end of layout field
          'menu_alignment' => array(
              'type' => 'bbm-radio',
              'label' => __( 'Menu Alignment','fl-builder' ),
              'options' => array(
                'left' => __( 'Left','fl-builder' ),
                'right' => __( 'Right','fl-builder' )
              ),
              'default' => 'right'
          ), // end of menu_alignment field
        )
      ), // end of menu-layout-section section
      'menu-toggle-layout-section' => array(
        'title' => __( 'Menu Toggle','fl-builder' ),
        'fields' => array(
          'toggle_layout' => array(
            'label' => __( 'Layout','fl-builder' ),
            'type' => 'bbm-radio',
            'options' => array(
              'right-inline' => __( 'Text Right','fl-builder' ),
              'left-inline' => __( 'Text Left','fl-builder' ),
              'stacked' => __( 'Stacked','fl-builder' ),
            ),
            'default' => 'inline'
          ), // end of toggle_layout field
          'toggle_text' => array(
            'label' => __( 'Text','fl-builder' ),
            'type' => 'text',
            'description' => __( 'Leave blank to remove.','fl-builder' ),
            'placeholder' => __( 'Menu','fl-builder' ),
            'default' => 'Menu'
          ), // end of toggle_text field
          'close_toggle_text' => array(
            'label' => __( 'Close Text','fl-builder' ),
            'type' => 'text',
            'description' => __( 'Leave blank to remove.','fl-builder' ),
            'placeholder' => __( 'Close','fl-builder' ),
            'default' => 'Menu'
          ), // end of toggle_text field
          'toggle_position' => array(
            'label' => __( 'Position','fl-builder' ),
            'type' => 'bbm-radio',
            'options' => array(
              'left' => __( 'Left','fl-builder' ),
              'center' => __( 'Center','fl-builder' ),
              'right' => __( 'Right','fl-builder' ),
            ),
            'default' => 'right'
          ), // end of toggle_position field
          'text_icon_spacing' => array(
            'type' => 'unit',
            'description' => 'px',
            'label' => __( 'Text to Icon Spacing','fl-builder' ),
            'default' => 10,
          ), // end of text_icon_spacing field
        )
      ), // end of menu-toggle-layout-section section
    )
  ),
  'style-tab' => array(
    'title' => __( 'Style','fl-buider' ),
    'sections' => array(
        'menu-style-section' => array(
          'title' => __( 'Menu','fl-builder' ),
          'fields' => array(
            'menu_background' => array(
              'type' => 'color',
              'label' => __( 'Menu Background','fl-builder' ),
              'default' => '000',
              'show_reset' => true,
              'show_alpha' => true
            ), // end of menu_background field
          )
        ), // end of menu-style-section section
        'menu-toggle-style-section' => array(
          'title' => __( 'Menu Toggle','fl-builder' ),
          'fields' => array(
            'menu_toggle_color' => array(
              'type' => 'color',
              'label' => __( 'Color','fl-builder' ),
              'show_reset' => true,
              'default' => "333"
            ), // end of menu_toggle_color field
            'menu_toggle_hover_color' => array(
              'type' => 'color',
              'label' => __( 'Hover Color','fl-builder' ),
              'show_reset' => true,
              'default' => "000"
            ), // end of menu_toggle_hover_color field
            'text_toggle_color' => array(
              'type' => 'color',
              'label' => __( 'Background Color','fl-builder' ),
              'show_reset' => true,
              'default' => "333",
              'show_alpha' => true,
            ), // end of menu_toggle_color field
            'text_toggle_hover_color' => array(
              'type' => 'color',
              'label' => __( 'Background Hover Color','fl-builder' ),
              'show_reset' => true,
              'show_alpha' => true,
              'default' => "000"
            ), // end of menu_toggle_hover_color field

          )
        ), // end of menu-toggle-style-section
        'menu-heading-section' => array(
          'title' => __( 'Menu Heading','fl-builder' ),
          'fields' => array(
            'heading_padding' => array(
              'type' => 'dimension',
              'responsive' => true,
              'label' => __( 'Padding','fl-builder' ),
              'default' => '14'
             ), // end of heading_padding field
             'heading_padding_unit' => array(
               'type' => 'bbm-radio',
               'label' => __( 'Unit','fl-builder' ),
               'options' => array(
                 'px' => 'PX',
                 '%' => '%'
               ),
               'default' => 'px'
             ), // end of heading_padding_unit field
             'heading_color' => array(
               'type' => 'color',
               'label' => __( 'Text Color','fl-builder' ),
               'show_reset' => true,
               'default' => "fff"
             ),// end of heading_color field
             'heading_background' => array(
               'type' => 'color',
               'label' => __( 'Background Color','fl-builder' ),
               'show_reset' => true,
               'default' => "fff",
               'show_alpha' => true
             ), // end of heading_background field
          )
        ), // end of menu-heading-section section
        'links-section' => array(
          'title' => __( 'Links','fl-builder' ),
          'fields' => array(
              'link_padding' => array(
                'type' => 'dimension',
                'responsive' => true,
                'label' => __( 'Padding','fl-builder' ),
                'default' => "14",
              ),// end of link_color field
              'link_padding_unit' => array(
                'type' => 'bbm-radio',
                'label' => __( 'Unit','fl-builder' ),
                'options' => array(
                  'px' => 'PX',
                  '%' => '%'
                ),
                'default' => 'px'
              ),// end of link_padding_unit field
              'link_color' => array(
                'type' => 'color',
                'label' => __( 'Text Color','fl-builder' ),
                'show_reset' => true,
                'default' => "fff"
              ),// end of link_color field
              'link_hover' => array(
                'type' => 'color',
                'label' => __( 'Text Color','fl-builder' ),
                'show_reset' => true,
                'default' => "fefefe"
              ), // end of link_hover field
              'link_background' => array(
                'type' => 'color',
                'label' => __( 'Background Color','fl-builder' ),
                'show_reset' => true,
                'default' => "fff",
                'show_alpha' => true
              ), // end of link_background field
              'link_hover_background' => array(
                'type' => 'color',
                'label' => __( 'Background Color','fl-builder' ),
                'show_reset' => true,
                'default' => "fff",
                'show_alpha' => true
              ), // end of link_hover_background field
            )
          ),// end of links-section section
      )
  ),
  'typography-tab' => array(
    'title' => __( 'Typography','fl-builder' ),
    'sections' => array(
      'toggle-typo-section' =>  array(
        'title' => __( 'Menu Toggle','fl-builder' ),
        'fields' => array(
          'toggle_text_fam' => array(
            'type' => 'font',
            'label' => __( 'Font','fl-builder' ),
            'default' => array(
              'family' => 'Default',
              'weight' => 400
            )
          ), // end of toggle_text_fam field
          'toggle_text_transform' => array(
            'type' => 'bbm-radio',
            'label' => __( 'Text Transform','fl-builder' ),
            'default' => 'uppercase',
            'options' => array(
              'auto' => __( 'Default','fl-builder' ),
              'lowercase' => __( 'lowercase','fl-builder' ),
              'uppercase' => __( 'UPPERCASE','fl-builder' ),
              'capitalize' => __( 'Capitalize','fl-builder' )
            )
          ),
        )
      ),// end of toggle-type-section section
      'heading-type-section' => array(
        'title' => __( 'Heading','fl-builder' ),
        'fields' => array(
          'heading_fam' => array(
            'type' => 'font',
            'label' => __( 'Font','fl-builder' ),
            'default' => array(
              'family' => 'Default',
              'weight' => 400
            )
          ), // end of heading_fam field
          'heading_size' => array(
            'type' => 'unit',
            'label' => __( 'Font Size','fl-buider' ),
            'default' => '16',
            'description' => 'px',
            'responsive' => true
          ), // end of heading_size field
          'heading_line_height' => array(
            'type' => 'unit',
            'label' => __( 'Line Height','fl-buider' ),
            'default' => '1.5',
            'responsive' => true
          ), // end of heading_line_height field
          'heading_transform' => array(
            'type' => 'bbm-radio',
            'label' => __( 'Text Transform','fl-builder' ),
            'default' => 'auto',
            'options' => array(
              'auto' => __( 'Default','fl-builder' ),
              'lowercase' => __( 'lowercase','fl-builder' ),
              'uppercase' => __( 'UPPERCASE','fl-builder' ),
              'capitalize' => __( 'Capitalize','fl-builder' )
            )
          ), // end of heading_transform field
        )
      ),  // end of heading-type-section section
      'font-section' => array(
        'title' => __( 'Links','fl-builder' ),
        'fields' => array(
          'text_fam' => array(
            'type' => 'font',
            'label' => __( 'Font','fl-builder' ),
            'default' => array(
              'family' => 'Default',
              'weight' => 400
            )
          ), // end of text_fam field
          'text_size' => array(
            'type' => 'unit',
            'label' => __( 'Font Size','fl-buider' ),
            'default' => '16',
            'description' => 'px',
            'responsive' => true
          ), // end of text_size field
          'text_line_height' => array(
            'type' => 'unit',
            'label' => __( 'Line Height','fl-buider' ),
            'default' => '1.5',
            'responsive' => true
          ), // end of text_line_height field
          'text_transform' => array(
            'type' => 'bbm-radio',
            'label' => __( 'Text Transform','fl-builder' ),
            'default' => 'auto',
            'options' => array(
              'auto' => __( 'Default','fl-builder' ),
              'lowercase' => __( 'lowercase','fl-builder' ),
              'uppercase' => __( 'UPPERCASE','fl-builder' ),
              'capitalize' => __( 'Capitalize','fl-builder' )
            )
          ), // end of text_transform field
        )
      ),
    )
  )
) );

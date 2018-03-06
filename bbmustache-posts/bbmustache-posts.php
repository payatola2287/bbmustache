<?php
/**
 * Module Name: Mustache Posts
 * Version: 2.0
**/
class MustachePosts extends FLBuilderModule{
  public function __construct(){
    parent::__construct(array(
        'name'            => __( 'Mustache Posts', 'fl-builder' ),
        'description'     => __( 'Module to display list of posts', 'fl-builder' ),
        'group'           => __( 'Mustache Modules', 'fl-builder' ),
        'category'        => __( 'Content Modules', 'fl-builder' ),
        'dir'             => BBMUSTACHE_MODULE_DIR . 'bbmustache-posts/',
        'url'             => BBMUSTACHE_MODULE_URL . 'bbmustache-posts/',
        'icon' => 'layout.svg',
        'editor_export'   => true, // Defaults to true and can be omitted.
        'enabled'         => true, // Defaults to true and can be omitted.
        'partial_refresh' => false, // Defaults to false and can be omitted.
    ));
  }
  public function color( $color_setting_field_value ){
    if( strncmp($color_setting_field_value, "rgba", 4) === 0 ){
      return $color_setting_field_value;
    }
    return "#".$color_setting_field_value;
  }
  public function sanitize_number( $value ){
    return is_numeric( $value ) ? $value : -1;
  }
}
FLBuilder::register_module( 'MustachePosts', apply_filters(
  'mustacheposts_settings',array(
    'general_tab' => array(
      'title' => __( 'General','fl-builder' ),
      'sections' => array(
        'layout_section' => array(
          'title' => __( 'Layout','fl-builder'),
          'fields' => array(
            'posts_layout' => array(
              'type' => 'select',
              'label' => __( 'Style','fl-builder' ),
              'options' => array(
                'daft' => __( 'Style 1' ,'fl-builder'),
                'nutcracker' => __( 'Style 2','fl-builder' ),// Add more in the future releases
              ),
              'default' => 'daft',
              'toggle' => array(
                'nutcracker' => array(
                  'sections' => array(
                    'image_style_section',

                  )
                ),
                'daft' => array(
                  'fields' => array(
                    'display_image',
                    'background_style_section'
                  )
                )
              )
            ),
            'posts_per_page' => array(
              'type' => 'unit',
              'label' => __( 'Posts Per Page','fl-builder' ),
              'default' => 3,
            ),
            'columns_count' => array(
              'type' => 'unit',
              'label' => __( 'Columns','fl-builder' ),
              'description' => __( 'column','fl-builder' ),
              'responsive' => array(
                'default' => array(
                  'default' => 3,
                  'medium' => 2,
                  'responsive' => 1
                )
              ),
              'default' => 3
            ),
            'equal_heights' => array(
              'label' => __( 'Equalize Heights','fl-builder' ),
              'type' => 'select',
              'options' => array(
                'yes' => __( 'Yes','fl-builder' ),
                'no' => __( 'No','fl-builder' ),
              ),
              'default' => 'no',
              'toggle' => array(
                'yes' => array(
                  'fields' => array( 'column_height' )
                )
              )
            ),
            'column_height' => array(
              'label' => __( 'Column Height','fl-builder' ),
              'type' => 'unit',
              'description' => 'px',
              'responsive' => true,
              'default' => '350'
            )

          )
        ),
        //'display_section' => array(), WILL BE ADDED IN THE FUTURE VERSION
        'link_section' => array(
          'title' => __( 'Link','fl-builder' ),
          'fields' => array(
            'link_type' => array(
              'label' => __( 'Link Type','fl-builder' ),
              'type' => 'select',
              'options' => array(
                'none' => __( 'None','fl-builder' ),
                'button' => __( 'Button','fl-builder' ),
                'box' => __( 'Box','fl-builder' )
              ),
              'default' => 'box',
              'toggle' => array(
                'button' => array(
                  'sections' => array(
                    'button_style_section',
                    'button_typo_section',
                    'button_section',
                    'button_typo_section'
                  ),
                  'fields' => array(
                    'button_text'
                  )
                )
              )
            ),
            'button_text' => array(
              'type' => 'text',
              'default' => __( 'Read More','fl-builder' ),
              'label' => __( 'Button Text','fl-builder' )
            )
          )
        ),
        'image_section' => array(
          'title' => __( 'Image','fl-builder' ),
          'fields' => array(
            'display_image' => array(
              'type' => 'select',
              'label' => __( 'Display Image','fl-builder' ),
              'options' => array(
                'yes' => __( 'Yes','fl-builder' ),
                'no' => __( 'No','fl-builder' )
              ),
              'default' => 'yes',
              'toggle' => array(
                'yes' => array(
                  'sections' => array(
                    'image_style_section'
                  ),
                  'fields' => array(
                    'image_size'
                  )
                )
              )
            ),
            'image_size' => array(
              'type' => 'photo-sizes',
              'label' => __( 'Image Size','fl-builder' ),
              'default' => 'medium'
            )
          )
        ),
        'content_section' => array(
          'title' => __( 'Content','fl-builder' ),
          'fields' => array(
            'display_content' => array(
              'label' => __( 'Display Content','fl-builder' ),
              'type' => 'select',
              'options' => array(
                'yes' => __( 'Yes','fl-builder' ),
                'no'  => __( 'No','fl-builder' )
              ),
              'default' => 'yes',
              'toggle' => array(
                'yes' => array(
                  'fields' => array(
                    'content_type',
                    'content_color',
                    'content_background',
                  ),
                  'sections' => array(
                    'content_typo_section'
                  )
                )
              )
            ),
            'content_type' => array(
              'label' => __( 'Content Source','fl-builder' ),
              'type' => 'select',
              'options' => array(
                'content' => __( 'Post Content','fl-builder' ),
                'excerpt' => __( 'Post Excerpt','fl-builder' )
              ),
              'default' => 'excerpt',
              'toggle' => array(
                'content' => array(
                  'fields' => array(
                    'content_trim'
                  )
                )
              )
            ),
            'content_trim' => array(
              'type' => 'unit',
              'label' => __( 'Number of Words','fl-builder' ),
              'description' => __( 'We recommend that you trim the number of words to be displayed.','fl-builder' ),
              'default' => 15
            )
          )
        ),
        'pagination_section' => array(
          'title' => __( 'Pagination','fl-builder' ),
          'fields' => array(
            'enable_pagination' => array(
              'type' => 'select',
              'label' => __( 'Enable Pagination','fl-builder' ),
              'options' => array(
                'yes' => __( 'Yes','fl-builder' ),
                'no' => __( 'No','fl-builder' )
              ),
              'default' => 'yes',
              'toggle' => array(
                'yes' => array(
                  'tabs' => array( 'pagination_tab' )
                )
              )
            )
          )
        )
      )
    ),
    'posts_tab' => array(
      'title' => __( 'Content','fl-builder' ),
      'file' => FL_BUILDER_DIR . 'includes/loop-settings.php'
    ),
    'styling_tab' => array(
      'title' => __( 'Style','fl-builder' ),
      'sections' => array(
        'color_section' => array(
          'title' => __( 'Colors','fl-builder' ),
          'fields'=> array(
            'title_color' => array(
              'label' => __( 'Title','fl-builder' ),
              'type' => 'color',
              'default' => 'fff',
              'preview' => array(
                'type' => 'css',
                'selector' => '.post-title',
                'property' => 'color'
              ),
              'show_reset' => true
            ),
            'title_background' => array(
              'label' => __( 'Title Background','fl-builder' ),
              'type' => 'color',
              'default' => '000',
              'show_reset' => true,
              'show_alpha' => true,
              'preview' => array(
                'type' => 'css',
                'selector' => '.post-title',
                'property' => 'background-color'
              ),

            ),
            'content_color' => array(
              'label' => __( 'Content Color','fl-builder' ),
              'type' => 'color',
              'default' => 'fff',
              'preview' => array(
                'type' => 'css',
                'selector' => '.post-content',
                'property' => 'color'
              ),
              'show_reset' => true
            ),
            'content_background' => array(
              'label' => __( 'Content Background','fl-builder' ),
              'type' => 'color',
              'default' => '000',
              'show_reset' => true,
              'show_alpha' => true,
              'preview' => array(
                'type' => 'css',
                'selector' => '.post-content',
                'property' => 'background-color'
              )
            )
          )
        ),
        'box_section' => array(
          'title' => __( 'List','fl-builder' ),
          'fields' => array(
            'grid_item_padding' => array(
              'type' => 'dimension',
              'label' => __( 'Grid Item Padding','fl-builder' ),
              'description' => 'px',
              'default' => '15'
            ),
            'grid_item_spacing' => array(
              'type' => 'dimension',
              'label' => __( 'Grid Item Margin','fl-builder' ),
              'description' => '%',
              'default' => '5'
            ),
            'box_content_background' => array(
              'type' => 'color',
              'label' => __( 'Box Content Background Color','fl-builder' ),
              'default' => '000',
              'show_reset' => true,
              'show_alpha' => true
            )
          )
        ), // end of box_section section
        'background_style_section' => array(
          'title' => __( 'Background Image','fl-builder' ),
          'fields' => array(
            'background_image_size' => array(
              'type' => 'select',
              'label' => __( 'Background Image Size','fl-builder' ),
              'options' => array(
                'default' => __( 'Default','fl-builder' ),
                'contain' => __( 'Fit','fl-builder' ),
                'cover' => __( 'Fill','fl-builder' ),
                'custom' => __( 'Custom','fl-builder' )
              ),
              'default' => 'cover',
              'toggle' => array(
                'custom' => array(
                  'fields' => array( 'background_image_custom_size_width',
                'background_image_custom_size_height' )
                )
              )
            ), // end of background_image_size field
            'background_image_custom_size_width' => array(
              'type' => 'text',
              'label' => __( 'Background Image Width','fl-builder' ),
              'desc' => __( 'include units, em px %','fl-builder' ),
              'default' => 'auto'
            ), // end of background_image_custom_size_width field
            'background_image_custom_size_height' => array(
              'type' => 'text',
              'label' => __( 'Background Image Height','fl-builder' ),
              'desc' => __( 'include units, em px %','fl-builder' ),
              'default' => 'auto'
            ), // end of background_image_custom_size_height field
            'background_image_position' => array(
              'type' => 'select',
              'label' => __( 'Position','fl-builder' ),
              'options' => array(
                'left-top' => __( 'Left Top','fl-builder' ),
                'center-top' => __( 'Center Top','fl-builder' ),
                'right-top' => __( 'Right Top','fl-buider' ),
                'left-center' => __( 'Left Center','fl-builder' ),
                'center-center' => __( 'Center Center','fl-builder' ),
                'right-center' => __( 'Right Center','fl-builder' ),
                'left-bottom' => __( 'Left Bottom','fl-builder' ),
                'center-bottom' => __( 'Center Bottom','fl-builder' ),
                'right-bottom' => __( 'Right Bottom','fl-builder' )
              ),
              'default' => 'center-center'
            ), // end of background_image_position field
          )
        ), // end of backgkround_style_section section
        'image_style_section' => array(
          'title' => __( 'Image','fl-builder' ),
          'fields' => array(
            'figure_border_color' => array(
              'type' => 'color',
              'default' => 'aaa',
              'show_reset' => true,
              'label' => __( 'Container Border Color','fl-builder' ),
            ),
            'figure_border_width' => array(
              'type' => 'dimension',
              'default' => 1,
              'label' => __( 'Container Border Width','fl-builder' ),
              'desc' => 'px'
            ),
            'figure_padding' => array(
              'type' => 'dimension',
              'default' => 0,
              'label' => __( 'Container Padding','fl-builder' ),
              'desc' => 'px'
            ),
            'image_border_color' => array(
              'type' => 'color',
              'default' => 'fff',
              'show_reset' => true,
              'label' => __( 'Image Border Color','fl-builder' ),
            ),
            'image_border_width' => array(
              'type' => 'dimension',
              'default' => 1,
              'label' => __( 'Image Border Width','fl-builder' ),
              'desc' => 'px'
            ),
            'image_hover_overlay_color' => array(
              'type' => 'color',
              'default' => 'fff',
              'show_reset' => true,
              'show_alpha' => true,
              'label' => __( 'Hover Overlay Color','fl-builder' ),
            ),
            'image_hover_border_color' => array(
              'type' => 'color',
              'default' => 'fff',
              'show_reset' => true,
              'show_alpha' => true,
              'label' => __( 'Hover Border Color','fl-builder' ),
            ),
          )
        ), // end of image_style_section
      )
    ),
    'pagination_tab' => array(
      'title' => __( 'Pagination','fl-builder' ),
      'sections' => array(
        'pagination_layout_style' => array(
          'title' => __( 'Layout','fl-builder' ),
          'fields' => array(
            'pagination_alignment' => array(
              'type' => 'select',
              'label' => __( 'Alignment','fl-builder' ),
              'options' => array(
                'left' => __( 'Left' ,'fl-builder' ),
                'right' => __( 'Right' ,'fl-builder' ),
                'center' => __( 'Center','fl-builder' )
              )
            )
          )
        ),
        'pagination_spacing_style' => array(
          'title' => __( 'Paddings & Margins','fl-builder' ),
          'fields' => array(
            'pagination_item_padding' => array(
              'type' => 'dimension',
              'description' => 'px',
              'label' => __( 'Pagination Item Padding','fl-builder' ),
              'default' => '5',
            ),
            'pagination_item_margin' => array(
              'type' => 'dimension',
              'description' => 'px',
              'label' => __( 'Pagination Item Margin','fl-builder' ),
              'default' => '5',
            )
          )
        ),
        'pagination_background_style' => array(
          'title' => __( 'Colors','fl-builder' ),
          'fields' => array(
            'pagination_item_color' => array(
              'type' => 'color',
              'show_reset' => true,
              'default' => 'fff',
              'label' => __( 'Item Color','fl-builder' )
            ),
            'pagination_item_hover_color' => array(
              'type' => 'color',
              'show_reset' => true,
              'default' => 'fefefe',
              'label' => __( 'Item Hover Color','fl-builder' )
            ),
            'pagination_item_background_color' => array(
              'type' => 'color',
              'show_reset' => true,
              'show_alpha' => true,
              'default' => '000',
              'label' => __( 'Item Background Color','fl-builder' )
            ),
            'pagination_item_background_hover_color' => array(
              'type' => 'color',
              'show_reset' => true,
              'show_alpha' => true,
              'default' => '0a0a0a',
              'label' => __( 'Item Hover Background Color','fl-builder' )
            )
          )
        )
      )
    ),
    'typography_tab' => array(
      'title' => __( 'Typography','fl-builder' ),
      'sections' => array(
        'title_typo_section' => array(
          'title' => __( 'Title','fl-builder' ),
          'fields' => array(
            'title_font' => array(
              'type' => 'font',
              'default' => 'Default',
              'label' => __( 'Font','fl-builder' )
            ),
            'title_size' => array(
              'type' => 'unit',
              'responsive' => array(
                'default' => array(
                  'default' => '36',
                  'medium' => '28',
                  'responsive' => '22'
                )
              ),
              'label' => __( 'Font Size','fl-builder' ),
              'description' => 'px'
            ),
            'title_line_height' => array(
              'type' => 'unit',
              'responsive' => array(
                'default' => array(
                  'default' => 1,
                  'medium' => 1,
                  'reponsive' => 1
                )
              ),
              'label' => __( 'Line Height','fl-builder' ),
            ),
            'title_transform' => array(
              'label' => __( 'Text Transform','fl-builder' ),
              'type' => 'select',
              'options' => array(
                'default' => __( 'Default','fl-builder' ),
                'lowercase' => __( 'lowercase','fl-builder' ),
                'uppercase' => __( 'UPPERCASE','fl-builder' ),
                'capitalize' => __( 'Capitalize','fl-builder' )
              ),
              'default' => 'default',
              'preview' => array(
                'type' => 'css',
                'selector' => '.title--post-title',
                'property' => 'text-transform'
              )
            )
          )
        ),
        'content_typo_section' => array(
          'title' => __( 'Content','fl-builder' ),
          'fields' => array(
            'content_font' => array(
              'type' => 'font',
              'default' => 'Default',
              'label' => __( 'Font','fl-builder' )
            ),'content_size' => array(
              'type' => 'unit',
              'label' => __( 'Font Size','fl-builder' ),
              'description' => 'px',
              'default' => '16'
            ),
            'content_line_height' => array(
              'type' => 'unit',
              'responsive' => true,
              'label' => __( 'Line Height','fl-builder' ),
              'default' => '1'
            ),
            'content_transform' => array(
              'label' => __( 'Text Transform','fl-builder' ),
              'type' => 'select',
              'options' => array(
                'default' => __( 'Default','fl-builder' ),
                'lowercase' => __( 'lowercase','fl-builder' ),
                'uppercase' => __( 'UPPERCASE','fl-builder' ),
                'capitalize' => __( 'Capitalize','fl-builder' )
              ),
              'default' => 'default',
              'preview' => array(
                'type' => 'css',
                'selector' => '.title--post-title',
                'property' => 'text-transform'
              )
            )
          )
        ),
        'button_typo_section' => array(
          'title' => __( 'Button','fl-builder' ),
          'fields' => array(
            'title_font' => array(
              'type' => 'font',
              'default' => 'Default',
              'label' => __( 'Font','fl-builder' )
            ),
            'button_size' => array(
              'type' => 'unit',
              'responsive' => true,
              'label' => __( 'Font Size','fl-builder' ),
              'description' => 'px',
              'default' => '16'
            ),
            'button_line_height' => array(
              'type' => 'unit',
              'responsive' => true,
              'label' => __( 'Line Height','fl-builder' ),
            ),
            'button_transform' => array(
              'label' => __( 'Text Transform','fl-builder' ),
              'type' => 'select',
              'options' => array(
                'default' => __( 'Default','fl-builder' ),
                'lowercase' => __( 'lowercase','fl-builder' ),
                'uppercase' => __( 'UPPERCASE','fl-builder' ),
                'capitalize' => __( 'Capitalize','fl-builder' )
              ),
              'default' => 'default',
              'preview' => array(
                'type' => 'css',
                'selector' => '.title--post-title',
                'property' => 'text-transform'
              )
            )
          )
        )
      )
    )
  )
) );

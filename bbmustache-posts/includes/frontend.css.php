<?php
  $global_settings = FLBuilderModel::get_global_settings();
?>
.fl-node-<?php echo $id; ?> .list--posts{
  margin-left: -<?php  echo absint( $settings->grid_item_spacing_left ) ?>%;
  margin-right: -<?php echo absint( $settings->grid_item_spacing_right ); ?>%;
}
.fl-node-<?php echo $id; ?> .item--grid{
  width: calc( 100% - <?php echo absint( $settings->grid_item_spacing_right ) + absint( $settings->grid_item_spacing_left ); ?>% );
  margin: <?php echo absint( $settings->grid_item_spacing_top ) . '% ' . absint( $settings->grid_item_spacing_right ) . '% ' . absint( $settings->grid_item_spacing_bottom ) . '% ' . absint( $settings->grid_item_spacing_left ) . '%'; ?>;
  <?php if( 'no' == $settings->equal_heights ): ?>
    height: <?php echo ( '' != $settings->column_height_responsive ) ? absint( $settings->column_height_responsive ) : absint( $settings->column_height ); ?>px;
  <?php endif; ?>

  /* THIS IS THE LAYOUT OPTIONS. for now, this is included here but in the future put this on a separate class */
  overflow: hidden;
}

.fl-node-<?php echo $id; ?> .item--grid .title--post-title{
  color: <?php echo $module->color( $settings->title_color ); ?>;
  font-family: <?php echo ( 'Default' == $settings->title_font['family'] ) ? 'inherit':$settings->title_font['family'] ;?>;
  font-size: <?php echo ( '' == $settings->title_size_responsive ) ? ( '' == $settings->title_size_medium ) ? absint( $settings->title_size ): absint( $settings->title_size_medium ) : absint( $settings->title_size_responsive ); ?>px;
}
.fl-node-<?php echo $id; ?> .item--grid .area--content{
  color: <?php echo $module->color( $settings->content_color ); ?>;
  font-family: <?php echo ( 'Default' == $settings->content_font['family'] ) ? 'inherit':$settings->content_font['family'] ;?>;
  font-size: <?php echo ( '' == $settings->content_size_responsive ) ? ( '' == $settings->content_size_medium ) ? absint( $settings->content_size ): absint( $settings->content_size_medium ) : absint( $settings->content_size_responsive ); ?>px;
}

/* PAGINATION CSS */
.page-numbers .page-numbers{
  color: <?php echo $module->color( $settings->pagination_item_color ); ?>;
  background-color: <?php echo $module->color( $settings->pagination_item_background_color ); ?>;
  padding: <?php echo absint( $settings->pagination_item_padding_top ); ?>px <?php echo absint( $settings->pagination_item_padding_right ); ?>px <?php echo absint( $settings->pagination_item_padding_bottom ); ?>px <?php echo absint( $settings->pagination_item_padding_left ); ?>px;
  margin: <?php echo intval( $settings->pagination_item_margin_top ); ?>px <?php echo intval( $settings->pagination_item_margin_right ); ?>px <?php echo intval( $settings->pagination_item_margin_bottom ); ?>px <?php echo intval( $settings->pagination_item_margin_left ); ?>px;
  -webkit-transition: background-color 0.3s ease-in;
   -o-transition: background-color 0.3s ease-in;
   transition: background-color 0.3s ease-in;
}
.page-numbers .page-numbers:hover,
.page-numbers .page-numbers.current{
  color: <?php echo $module->color( $settings->pagination_item_hover_color ); ?>;
  background-color: <?php echo $module->color( $settings->pagination_item_background_hover_color ); ?>;
}

/* DAFT LAYOUT ONLY CSS */
<?php if( 'daft' == $settings->posts_layout ): ?>
.fl-node-<?php echo $id; ?> .item--grid.layout--daft .wrapper--content,
.fl-node-<?php echo $id; ?> .item--grid.layout--daft .item--link{
  padding: <?php echo absint( $settings->grid_item_padding_top ) . 'px ' . absint( $settings->grid_item_padding_right ) . 'px ' . absint( $settings->grid_item_padding_bottom ) . 'px ' . absint( $settings->grid_item_padding_left ) . 'px'; ?>;
  background-color: <?php echo $module->color( $settings->box_content_background ); ?>;
  height: 100%;
}
<?php endif; ?>
/* NUTCRACKER LAYOUT ONLY CSS */
<?php if( 'nutcracker' == $settings->posts_layout ): ?>
.fl-node-<?php echo $id; ?> .item--grid.layout--nutcracker .wrapper--image-thumbnail{
  border-color: <?php echo $module->color( $settings->figure_border_color ); ?>;
  border-top-width: <?php echo $settings->figure_border_width_top; ?>px;
  border-bottom-width: <?php echo $settings->figure_border_width_bottom; ?>px;
  border-left-width: <?php echo $settings->figure_border_width_left; ?>px;
  border-right-width: <?php echo $settings->figure_border_width_right; ?>px;
  border-style: solid;
  padding: <?php echo $settings->figure_padding_top; ?>px <?php echo $settings->figure_padding_right; ?>px <?php echo $settings->figure_padding_bottom; ?>px <?php echo $settings->figure_padding_left; ?>px;
}
.fl-node-<?php echo $id; ?> .item--grid.layout--nutcracker .image--thumbnail{
  border-color: <?php echo $module->color( $settings->image_border_color ); ?>;
  border-top-width: <?php echo $settings->image_border_width_top; ?>px;
  border-bottom-width: <?php echo $settings->image_border_width_bottom; ?>px;
  border-left-width: <?php echo $settings->image_border_width_left; ?>px;
  border-right-width: <?php echo $settings->image_border_width_right; ?>px;
  border-style: solid;
}
.fl-node-<?php echo $id; ?> .item--grid.layout--nutcracker:hover .wrapper--image-thumbnail .image--thumbnail{
  border-color: <?php echo $module->color( $settings->image_hover_border_color ); ?>;
}
.fl-node-<?php echo $id; ?> .item--grid.layout--nutcracker:hover .wrapper--image-thumbnail:before{
  background-color: <?php echo $module->color( $settings->image_hover_overlay_color ); ?>

}
<?php endif; ?>
@media screen and (min-width: <?php echo $global_settings->responsive_breakpoint; ?>px){
  .fl-node-<?php echo $id; ?> .item--grid{
    width: calc( <?php echo 100 / absint( $settings->columns_count_medium ); ?>% - <?php echo absint( $settings->grid_item_spacing_right ) + absint( $settings->grid_item_spacing_left ); ?>% );
    <?php if( 'no' == $settings->equal_heights ): ?>
      height: <?php echo ( '' != $settings->column_height_medium ) ? absint( $settings->column_height_medium ) : absint( $settings->column_height ); ?>px;
    <?php endif; ?>
  }
  .fl-node-<?php echo $id; ?> .item--grid .title--post-title{
    font-size: <?php echo ( '' == $settings->title_size_medium ) ? absint( $settings->title_size ) : absint( $settings->title_size_medium ); ?>px;
  }
  .fl-node-<?php echo $id; ?> .item--grid .area--content{
    font-size: <?php echo ( '' == $settings->content_size_medium ) ? absint( $settings->content_size ) : absint( $settings->content_size_medium ); ?>px;
  }
}
@media screen and (min-width: <?php echo $global_settings->medium_breakpoint; ?>px){
  .fl-node-<?php echo $id; ?> .item--grid{
    width: calc( <?php echo 100 / absint( $settings->columns_count ); ?>% - <?php echo absint( $settings->grid_item_spacing_right ) + absint( $settings->grid_item_spacing_left ); ?>% );
    <?php if( 'no' == $settings->equal_heights ): ?>
      height: <?php echo absint( $settings->column_height ); ?>px;
    <?php endif; ?>
  }
  .fl-node-<?php echo $id; ?> .item--grid .title--post-title{
    font-size: <?php echo absint( $settings->title_size ); ?>px;
  }
  .fl-node-<?php echo $id; ?> .item--grid .area--content{
    font-size: <?php echo absint( $settings->content_size ); ?>px;
  }
}

<?php
  $global_settings = FLBuilderModel::get_global_settings();
  $text_size = intval( $settings->text_size );
  $med_text_size = intval( $settings->text_size_medium );
  $sm_text_size = intval( $settings->text_size_responsive );
  $heading_size = intval( $settings->heading_size );
  $med_heading_size = intval( $settings->heading_size_medium );
  $sm_heading_size = intval( $settings->heading_size_responsive );
?>
.fl-node-<?php echo $id; ?> .bbm-toggle-wrapper div.bbm-menu-toggle .bbm-toggle-text{
  color: <?php echo $module->color( $settings->menu_toggle_color ); ?>;
}
.fl-node-<?php echo $id; ?> .bbm-toggle-wrapper div.bbm-menu-toggle .bbm-toggle-line{
  background-color: <?php echo $module->color( $settings->menu_toggle_color ); ?>;
}
.fl-node-<?php echo $id; ?> .bbm-menu-wrapper:before{
  background: <?php echo $module->color( $settings->menu_background ); ?>;
}
<?php if( $settings->toggle_layout == 'left-inline' ): ?>
.fl-node-<?php echo $id; ?> .bbm-menu-toggle-left-inline .bbm-toggle-line-wrapper{
  margin-left: <?php echo $settings->text_icon_spacing; ?>px;
}
<?php endif; ?>
<?php if( $settings->toggle_layout == 'right-inline' ): ?>
.fl-node-<?php echo $id; ?> .bbm-menu-toggle-right-inline .bbm-toggle-line-wrapper{
  margin-right: <?php echo $settings->text_icon_spacing; ?>px;
}
<?php endif; ?>
.fl-node-<?php echo $id; ?> .bbm-menu li.heading span{
  display: inline-block;
  padding: <?php
    echo intval( $settings->heading_padding_top ) . $settings->heading_padding_unit . ' ' . intval( $settings->heading_padding_right ) . $settings->heading_padding_unit . ' ' . intval( $settings->heading_padding_bottom ) . $settings->heading_padding_unit . ' ' . intval( $settings->heading_padding_left ) . $settings->heading_padding_unit
  ?>;
  color: <?php echo $module->color( $settings->heading_color ); ?>;
  background-color: <?php echo $module->color( $settings->heading_background ); ?>;
  font-family: "<?php echo $settings->heading_fam['family']; ?>";
  font-weight: <?php echo $settings->heading_fam['weight']; ?>;
  font-size: <?php echo ( 0 == $sm_heading_size ) ? ( 0 == $med_heading_size ) ? $med_heading_size : $heading_size : $sm_heading_size; ?>px;
}
.fl-node-<?php echo $id; ?> .bbm-menu li.menu-item a{
  display: inline-block;
  padding: <?php
    echo intval( $settings->link_padding_top ) . $settings->link_padding_unit . ' ' . intval( $settings->link_padding_right ) . $settings->link_padding_unit . ' ' . intval( $settings->link_padding_bottom ) . $settings->link_padding_unit . ' ' . intval( $settings->link_padding_left ) . $settings->link_padding_unit;
  ?>;
  color: <?php echo $module->color( $settings->link_color ); ?>;
  text-decoration: none;
  background-color: <?php echo $module->color( $settings->link_background ); ?>;
  font-family: "<?php echo $settings->text_fam['family']; ?>";
  font-weight: <?php echo $settings->text_fam['weight']; ?>;
  font-size: <?php echo ( 0 == $sm_text_size ) ? ( 0 == $med_text_size ) ? $med_text_size : $text_size : $sm_text_size; ?>px;
  line-height: <?php echo $settings->text_line_height; ?>;
  text-transform: <?php echo $settings->text_transform; ?>;

}
.fl-node-<?php echo $id; ?> .bbm-menu li.menu-item a:hover{
  color: <?php echo $module->color( $settings->link_hover ); ?>;
  text-decoration: none;
  background-color: <?php echo $module->color( $settings->link_hover_background ); ?>;
}
.fl-node-<?php echo $id; ?> .bbm-toggle-text{
  font-family: "<?php echo $settings->toggle_text_fam['family']; ?>";
  font-weight: <?php echo $settings->toggle_text_fam['weight']; ?>;
  text-transform: <?php echo $settings->toggle_text_transform; ?>;
}
@media screen and ( min-width: <?php echo $global_settings->responsive_breakpoint; ?>px ){
  .fl-node-<?php echo $id; ?> .bbm-menu li.heading span{
    font-size: <?php echo ( 0 == $med_heading_size ) ? $heading_size : $med_heading_size; ?>px;
  }
  .fl-node-<?php echo $id; ?> .bbm-menu li.menu-item a{
    font-size: <?php echo ( 0 == $med_text_size ) ? $text_size : $med_text_size; ?>px;
  }
}
@media screen and ( min-width: <?php echo $global_settings->medium_breakpoint; ?>px ){
  .fl-node-<?php echo $id; ?> .bbm-menu li.heading span{
    font-size: <?php echo $heading_size; ?>px;
  }
  .fl-node-<?php echo $id; ?> .bbm-menu li.menu-item a{
    font-size: <?php echo $text_size; ?>px;
  }

}

<?php
  $global_settings = FLBuilderModel::get_global_settings();
  $bg_font_fam = $settings->bg_text_fam['family'];
  $bg_font_weight = $settings->bg_text_famp['weight'];
  $bg_font_size = $settings->bg_text_size;
  $bg_text_line_height = $settings->bg_text_line_height;
  $bg_text_letter_spacing = $settings->bg_text_letter_spacing;
  $bg_text_color = $settings->bg_text_color;
  $bg_text_align = $settings->bg_text_align;
  $bg_text_transform = $settings->bg_text_transform;

  $main_font_fam = $settings->main_text_fam['family'];
  $main_font_weight = $settings->main_text_fam['weight'];
  $main_font_size = $settings->main_text_size;
  $main_text_line_height = $settings->main_text_line_height;
  $main_text_color = $settings->main_text_color;
  $main_text_align = $settings->main_text_align;
  $main_text_transform = $settings->main_text_transform;
?>
<?php if( '' != $settings->main_text_field ): ?>
.fl-node-<?php echo $id; ?> .bbmustache-content-text{
  font-family: <?php echo $main_font_fam; ?>;
  font-weight: <?php echo $main_font_weight; ?>;
  font-size: <?php echo ( '' != $settings->main_text_size_responsive ) ? $settings->main_text_size_responsive : ( '' != $settings->main_text_size_medium ) ? $settings->main_text_size_medium : $settings->main_text_size ; ?>px;
  line-height: <?php echo $main_text_line_height; ?>;
  color: #<?php echo $main_text_color; ?>;
  text-align: <?php echo $main_text_align; ?>;
  text-transform: <?php echo $main_text_transform; ?>;
}
<?php endif; ?>
.fl-node-<?php echo $id; ?> .bbmustache-text-bg{
  font-family: <?php echo $bg_font_fam; ?>;
  font-weight: <?php echo $bg_font_weight; ?>;
  font-size: <?php echo ( '' != $settings->bg_text_size_responsive ) ? ( '' != $settings->bg_text_size_medium ) ? $settings->bg_text_size : $settings->bg_text_size_medium : $settings->bt_text_size_responsive; ?>px;
  line-height: <?php echo $bg_text_line_height; ?>;
  color: #<?php echo $bg_text_color; ?>;
  text-align: <?php echo $bg_text_align; ?>;
  text-transform: <?php echo $bg_text_transform; ?>;
  margin: <?php echo $settings->bg_text_margin_top; ?>px <?php echo $settings->bg_text_margin_right; ?>px <?php echo $settings->bg_text_margin_bottom; ?>px <?php echo $settings->bg_text_margin_left; ?>
}
@media screen and ( min-width: <?php echo $global_settings->responsive_breakpoint; ?>px ){
  .fl-node-<?php echo $id; ?> .bbmustache-text-bg{
    font-size: <?php echo ( '' != $settings->bg_text_size_medium ) ? $settings->bg_text_size : $settings->bg_text_size_medium ; ?>px;
  }
  .fl-node-<?php echo $id; ?> .bbmustache-content-text{
    font-size: <?php echo ( '' != $settings->bg_text_size_medium ) ? $settings->bg_text_size : $settings->bg_text_size_medium; ?>px;
  }
}
@media screen and ( min-width: <?php echo $global_settings->medium_breakpoint; ?>px ){
  .fl-node-<?php echo $id; ?> .bbmustache-text-bg{
    font-size: <?php echo $settings->bg_text_size; ?>px;
  }
  .fl-node-<?php echo $id; ?> .bbmustache-content-text{
    font-size: <?php echo $settings->bg_text_size; ?>px;
  }
}

<?php
  $global_settings = FLBuilderModel::get_global_settings();
  $p_color = $settings->p_color;
  $text_fam = $settings->text_fam['family'];
  $text_weight = $settings->text_fam['weight'];
  $text_size = intval($settings->text_size);
  $med_text_size = intval($settings->text_size_medium);
  $sm_text_size = intval($settings->text_size_responsive);
  $text_line_height = $settings->text_line_height;
  $sm_align = $settings->mobile_responsive_align;
  $md_align = $settings->tab_responsive_align;
  $lg_align = $settings->alignment;
?>
.fl-node-<?php echo $id; ?> .bbmustache-module-wrapper > *{
  line-height: <?php echo $text_line_height; ?>;
  font-family: <?php echo $text_fam; ?>;
  font-weight: <?php echo $text_weight; ?>;
  font-size: <?php echo ( 0 == $sm_text_size ) ? ( 0 == $med_text_size ) ? $med_text_size : $text_size : $sm_text_size; ?>px;
  text-align: <?php echo $sm_align; ?>;
  text-transform: <?php echo $settings->transform; ?>;
  margin: <?php echo  intval( $settings->p_margin_top ); ?>px <?php echo intval( $settings->p_margin_right ); ?>px <?php echo intval( $settings->p_margin_bottom ); ?>px <?php echo intval( $settings->p_margin_left ); ?>px;
}
.fl-node-<?php echo $id; ?> .bbmustache-module-wrapper{
  color: #<?php echo $p_color; ?>;
}
.fl-node-<?php echo $id; ?> .bbmustache-module-wrapper .bbmustache-text:last-of-type{
  margin-bottom: 0;
}
@media screen and ( min-width: <?php echo $global_settings->responsive_breakpoint; ?>px ){
  .fl-node-<?php echo $id; ?> .bbmustache-module-wrapper .bbmustache-text{
    font-size: <?php echo ( 0 == $med_text_size ) ? $text_size : $med_text_size; ?>px;
    text-align: <?php echo $md_align; ?>;
  }
}
@media screen and ( min-width: <?php echo $global_settings->medium_breakpoint; ?>px ){
  .fl-node-<?php echo $id; ?> .bbmustache-module-wrapper .bbmustache-text{
    font-size: <?php echo $text_size; ?>px;
    text-align: <?php echo $lg_align; ?>;
  }
}

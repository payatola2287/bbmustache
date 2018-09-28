<?php
/**
 * CSS FILE OF THE MODULE
 **/

 /**
  * VARIABLES
  **/
  $global_settings = FLBuilderModel::get_global_settings();
  $columnCount = intval( $settings->column_count );
  $itemBackgroundColor = $module->color( $settings->background_color );
  $itemBackgroundHoverColor = $module->color( $settings->hover_background_color );
  $textColor = $module->color( $settings->text_color );
  $hoverColor = $module->color( $settings->hover_color );
  $quotationMarkColor = $module->color( $settings->quotation_mark_color );
  $emItemBackgroundColor = $module->color( $settings->emphasis_background_color );
  $emItemBackgroundHoverColor = $module->color( $settings->emphasis_hover_background_color );
  $emTextColor = $module->color( $settings->emphasis_text_color );
  $emHoverColor = $module->color( $settings->emphasis_hover_color );
  $emQuotationMarkColor = $module->color( $settings->emphasis_quotation_mark_color );
  $margin_top = intval( $settings->margins_top );
  $margin_right = intval( $settings->margins_right );
  $margin_left = intval( $settings->margins_left );
  $margin_bottom = intval( $settings->margins_bottom );
  $padding_top = intval( $settings->paddings_top );
  $padding_right = intval( $settings->paddings_right );
  $padding_left = intval( $settings->paddings_left );
  $padding_bottom = intval( $settings->paddings_bottom );
  $fontFamily = $settings->text_family['family'];
  $fontWeight = $settings->text_family['weight'];
  $fontSize = intval( $settings->text_size );
  $lineHeight = floatval( $settings->line_height );
  $emFontFamily = $settings->emphasis_text_family['family'];
  $emFontWeight = $settings->emphasis_text_family['weight'];
  $emFontSize = intval( $settings->emphasis_text_size );
  $emLineHeight = floatval( $settings->emphasis_line_height );
  // Medium Screens
  $medColumnCount = intval( $settings->med_column_count );
  $medTextSize = intval( $settings->med_default_text_size );
  $medEmTextSize = intval( $settings->med_emphasis_text_size );
  $medLineHeight = floatval( $settings->med_default_line_height );
  $medEmLineHeight = floatval( $settings->med_emphasis_line_height );
  // Small Screens
  $smColumnCount = intval( $settings->sm_column_count );
  $smTextSize = intval( $settings->sm_default_text_size );
  $smEmTextSize = intval( $settings->sm_emphasis_text_size );
  $smLineHeight = floatval( $settings->sm_default_line_height );
  $smEmLineHeight = floatval( $settings->sm_emphasis_line_height );
?>

/**
 * DEFAULT DEVICES
 **/
.fl-node-<?php echo $id; ?> .bbmustache-testimonial-grid-item{
  width: calc(<?php echo 100 / $smColumnCount; ?>% - <?php echo $margin_right + $margin_left; ?>px );
}
.fl-node-<?php echo $id; ?> .bbmustache-testimonial-quote-text{
  background: <?php echo $itemBackgroundColor; ?>;
}
.fl-node-<?php echo $id; ?> .bbmustache-testimonial-name{
  font-size: <?php echo $smTextSize; ?>px;
  line-height: <?php echo $smLineHeight; ?>;
  color: <?php echo $textColor; ?>;
  font-family: <?php echo $fontFamily; ?>;
  font-weight: <?php echo $fontWeight; ?>;
}
.fl-node-<?php echo $id; ?> .bbmustache-testimonial-quote-text p{
  font-size: <?php echo $smTextSize; ?>px;
  line-height: <?php echo $smLineHeight; ?>;
  color: <?php echo $textColor; ?>;
  font-family: <?php echo $fontFamily; ?>;
  font-weight: <?php echo $fontWeight; ?>;
}
.fl-node-<?php echo $id; ?> .bbmustache-testimonial-quote-text:before{
  color: <?php echo $quotationMarkColor; ?>;
}
/**
 * EMPHASIS TESTIMONIAL
 **/
.fl-node-<?php echo $id; ?> .bbmustache-testimonial-grid-emphasis .bbmustache-testimonial-quote-text{
  background: <?php echo $emItemBackgroundColor; ?>;
}
.fl-node-<?php echo $id; ?> .bbmustache-testimonial-grid-emphasis .bbmustache-testimonial-quote-text p{
  font-size: <?php echo $smEmTextSize; ?>px;
  line-height: <?php echo $smEmLineHeight; ?>;
  font-family: '<?php echo $emFontFamily; ?>';
  font-weight: <?php echo $emFontWeight; ?>;
}
.fl-node-<?php echo $id; ?> .bbmustache-testimonial-grid-emphasis .bbmustache-testimonial-quote-text:before{
  color: <?php echo $emQuotationMarkColor; ?>;
}
/**
 * MEDIUM DEVICES
 **/
@media screen and ( min-width: <?php echo $global_settings->responsive_breakpoint; ?>px ){
  .fl-node-<?php echo $id; ?> .bbmustache-testimonial-grid-item{
    width: calc(<?php echo 100 / $medColumnCount; ?>% - <?php echo $margin_right + $margin_left; ?>px );
  }
  .fl-node-<?php echo $id; ?> .bbmustache-testimonial-quote-text p{
    font-size: <?php echo $medTextSize; ?>px;
    line-height: <?php echo $medLineHeight; ?>;
  }
  .fl-node-<?php echo $id; ?> .bbmustache-testimonial-grid-emphasis .bbmustache-testimonial-quote-text p{
    font-size: <?php echo $medEmTextSize; ?>px;
    line-height: <?php echo $medEmLineHeight; ?>;
  }
  .fl-node-<?php echo $id; ?> .bbmustache-testimonial-name{
    font-size: <?php echo $medTextSize; ?>px;
    line-height: <?php echo $medLineHeight; ?>;
  }
}
/**
 * WIDE DEVICES
 **/
 @media screen and ( min-width: <?php echo $global_settings->medium_breakpoint; ?>px ){
   .fl-node-<?php echo $id; ?> .bbmustache-testimonial-grid-item{
     width: calc(<?php echo 100 / $columnCount; ?>% - <?php echo $margin_right + $margin_left; ?>px );
   }
   .fl-node-<?php echo $id; ?> .bbmustache-testimonial-quote-text p{
     font-size: <?php echo $fontSize; ?>px;
     line-height: <?php echo $lineHeight; ?>;
   }
   .fl-node-<?php echo $id; ?> .bbmustache-testimonial-grid-emphasis .bbmustache-testimonial-quote-text p{
     font-size: <?php echo $emFontSize; ?>px;
     line-height: <?php echo $emLineHeight; ?>;
   }
   .fl-node-<?php echo $id; ?> .bbmustache-testimonial-name{
     font-size: <?php echo $fontSize; ?>px;
     line-height: <?php echo $lineHeight; ?>;
   }
 }

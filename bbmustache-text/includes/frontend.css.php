<?php
  $p_color = $settings->p_color;
  $text_fam = $settings->text_fam['family'];
  $text_weight = $settings->text_fam['weight'];
  $text_size = $settings->text_size;
  $text_line_height = $settings->text_line_height;
?>
.bbmustache-module-wrapper .bbmustache-text{
  line-height: <?php echo $text_line_height; ?>;
  color: #<?php echo $p_color; ?>;
  font-family: <?php echo $text_fam; ?>;
  font-weight: <?php echo $text_weight; ?>;
  font-size: <?php echo $text_size;?>;
}

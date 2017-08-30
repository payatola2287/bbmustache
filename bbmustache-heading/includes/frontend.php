<?php
  $html_tag = $settings->html_tag;
  $bg_text =  $settings->bg_text_field;
  $main_text = $settings->main_text_field;
  $p = str_replace( "<p>",'<p class="bbmustache-content-text">',$main_text );
?>
<div class="bbmustache-fancy-heading-holder" id="<?php echo $module->node; ?>">
  <<?php echo $html_tag; ?> class="bbmustache-text-bg"><?php echo $bg_text; ?></<?php echo $html_tag; ?>>
  <?php echo $p; ?>
</div>

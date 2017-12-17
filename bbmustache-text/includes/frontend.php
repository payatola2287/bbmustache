<?php
$global_settings = FLBuilderModel::get_global_settings();
$content_text = $settings->content_text;
  $p_text = str_replace( "<p>",'<p class="bbmustache-text">',$content_text );
?>
<div class="bbmustache-text-holder bbmustache-module-wrapper">
  <?php echo apply_filters( 'the_content' ,$p_text ); ?>
</div>

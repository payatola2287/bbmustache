<?php
  $content_text = $settings->content_text;
  $p_text = str_replace( "<p>",'<p class="bbmustache-text">',$content_text );
?>
<div class="bbmustache-text-holder bbmustache-module-wrapper">
  <?php echo $p_text; ?>
</div>

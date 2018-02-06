.fl-node-<?php echo $id; ?> .bbmustache-search-form.field-left {
  -webkit-box-pack: start;
    -ms-flex-pack: start;
        justify-content: flex-start;
}
.fl-node-<?php echo $id; ?> .bbmustache-search-form.field-right{
  -webkit-box-pack: end;
    -ms-flex-pack: end;
        justify-content: flex-end;
}
.fl-node-<?php echo $id; ?> .bbmustache-search-form.field-center{
  -webkit-box-pack: center;
    -ms-flex-pack: center;
        justify-content: center;
}
.fl-node-<?php echo $id; ?> .bbmustache-search-form{
  background: <?php echo $module->color( $settings->form_bg_color ); ?>;
  padding: <?php echo $settings->form_padding_top; ?>px <?php echo $settings->form_padding_right; ?>px <?php echo $settings->form_padding_bottom; ?>px <?php echo $settings->form_padding_left; ?>px;
}
.fl-node-<?php echo $id; ?> .bbmustache-search-field{
  color: <?php echo $module->color( $settings->text_color ); ?>;
  background-color: <?php echo $module->color( $settings->text_background_color ); ?>;
  <?php if( 'box' == $settings->input_border_position ): ?>
    border: <?php echo $settings->input_border_width; ?>px solid <?php echo $module->color( $settings->input_border_color ); ?>;
  <?php elseif( 'underline' == $settings->input_border_position ): ?>
    border-bottom: <?php echo $settings->input_border_width; ?>px solid <?php echo $module->color( $settings->input_border_color ); ?>;
  <?php endif; ?>
  padding: <?php echo $settings->input_padding_top; ?>px <?php echo $settings->input_padding_right; ?>px <?php echo $settings->input_padding_bottom; ?>px <?php echo $settings->input_padding_left; ?>px;
  width: <?php echo ( 'custom' == $settings->input_width ) ? $settings->input_width_value . 'px': 'auto' ; ?>;
}
.fl-node-<?php echo $id; ?> .bbmustache-search-submit{
  color: <?php echo $module->color( $settings->icon_color ); ?>;
  background-color: <?php echo $module->color( $settings->icon_background_color ); ?>;
}
.fl-node-<?php echo $id; ?> .bbmustache-search-form ::placeholder{
  color: <?php echo $module->color( $settings->placeholder_color ); ?>;
}

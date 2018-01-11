<?php
  $global_settings = get_bb_globals();

  $cards = $settings->cards_content;
?>

.bbmustache-cards-wrapper{
  -webkit-box-orient: vertical;
-webkit-box-direction: normal;
    -ms-flex-direction: column;
        flex-direction: column;
}
.fl-node-<?php echo $id; ?> .bbmustache-card{
  width: calc( 100% - <?php echo absint( $settings->cards_margin_right ) + absint( $settings->cards_margin_left ); ?>% );
  height: <?php echo $settings->card_height_responsive; ?>px;
  <?php if( $settings->card_border != 'none' ): ?>
    border: <?php echo $settings->card_border_width; ?>px <?php echo $settings->card_border; ?> <?php echo $module->color( $settings->card_border_color ); ?>;
  <?php endif; ?>
}
.fl-node-<?php echo $id; ?> .card-title{
  font-family: <?php echo $settings->title_font['family']; ?>;
  font-weight: <?php echo $settings->title_font['weight']; ?>;
  font-size: <?php echo $settings->title_font_size_responsive; ?>px;
  color: <?php echo $module->color( $settings->title_color ); ?>;
  padding: <?php echo $settings->title_padding_top; ?>px <?php echo $settings->title_padding_right; ?>px <?php echo $settings->title_padding_bottom; ?>px <?php echo $settings->title_padding_left; ?>px;
  margin: <?php echo $settings->title_margin_top; ?>px <?php echo $settings->title_margin_right; ?>px <?php echo $settings->title_margin_bottom; ?>px <?php echo $settings->title_margin_left; ?>px;
}
.fl-node-<?php echo $id; ?> .card-content{
  font-family: <?php echo $settings->content_font['family']; ?>;
  font-weight: <?php echo $settings->content_font['weight']; ?>;
  font-size: <?php echo $settings->content_font_size_responsive; ?>px;
  color: <?php echo $module->color( $settings->content_color ); ?>;
  padding: <?php echo $settings->content_padding_top; ?>px <?php echo $settings->content_padding_right; ?>px <?php echo $settings->content_padding_bottom; ?>px <?php echo $settings->content_padding_left; ?>px;
  margin: <?php echo $settings->content_margin_top; ?>px <?php echo $settings->content_margin_right; ?>px <?php echo $settings->content_margin_bottom; ?>px <?php echo $settings->content_margin_left; ?>px;
}
<?php $ctr = 1; foreach( $cards as $card ): ?>
  .fl-node-<?php echo $id; ?> .card-<?php echo $ctr; ?>{
    <?php if( $card->background_type == 'color' ): ?>
      background: <?php echo $module->color( $card->background_color ); ?>;
    <?php elseif( $card->background_type == 'image' ): ?>
      background: url('<?php echo $card->background_image_src; ?>') no-repeat center top;
      background-size: cover;
    <?php endif; ?>

  }
<?php $ctr++; endforeach; ?>

<?php if( $settings->card_layout == 'jared' ): ?>
  .fl-node-<?php echo $id; ?> .bbmustache-card.card-layout-jared .box-link:before,
  .fl-node-<?php echo $id; ?> .bbmustache-card.card-layout-jared .card-effect:before{
    border: <?php echo $settings->inner_box_border_width; ?>px solid <?php echo $module->color( $settings->inner_box_border_color ); ?>;
  }
<?php endif; ?>

@media screen and ( min-width: <?php echo $global_settings->responsive_breakpoint; ?>px ){
  .bbmustache-cards-wrapper{
    -webkit-box-orient: horizontal;
-webkit-box-direction: normal;
    -ms-flex-direction: row;
        flex-direction: row;
        margin: 0 -<?php echo $settings->cards_margin_right; ?>% 0 -<?php echo $settings->cards_margin_left; ?>%
  }
  .fl-node-<?php echo $id; ?> .bbmustache-card{
    width: calc( <?php echo 100 / absint( $settings->columns_medium ); ?>% - <?php echo absint( $settings->cards_margin_right ) + absint( $settings->cards_margin_left ); ?>% );
    width: calc( 100% / <?php echo $settings->columns_medium; ?> );
    margin: <?php echo $settings->cards_margin_top; ?>% <?php echo $settings->cards_margin_right; ?>% <?php echo $settings->cards_margin_bottom; ?>% <?php echo $settings->cards_margin_left; ?>%;
    height: <?php echo $settings->card_height_medium; ?>px;
  }
  .fl-node-<?php echo $id; ?> .card-title{
    font-size: <?php echo $settings->title_font_size_medium; ?>px;
  }
  .fl-node-<?php echo $id; ?> .card-content{
    font-size: <?php echo $settings->content_font_size_medium; ?>px;
  }
}
@media screen and ( min-width: <?php echo $global_settings->medium_breakpoint; ?>px ){
  .fl-node-<?php echo $id; ?> .bbmustache-card{
    width: calc( <?php echo 100 / absint( $settings->columns ); ?>% - <?php echo absint( $settings->cards_margin_right ) + absint( $settings->cards_margin_left ); ?>% );
    margin: <?php echo $settings->cards_margin_top; ?>% <?php echo $settings->cards_margin_right; ?>% <?php echo $settings->cards_margin_bottom; ?>% <?php echo $settings->cards_margin_left; ?>%;
    height: <?php echo $settings->card_height; ?>px;
  }
  .fl-node-<?php echo $id; ?> .card-title{
    font-size: <?php echo $settings->title_font_size; ?>px;
  }
  .fl-node-<?php echo $id; ?> .card-content{
    font-size: <?php echo $settings->content_font_size; ?>px;
  }
}

<?php
  /*
  * This is the frontend of the hover cards
  */

  $style = $settings->card_layout;
  $cards = $settings->cards_content;
  $ctr = 1;
  $link_type = $settings->link_type;
?>
<div id = "fl-node-<?php echo $id; ?>" class="fl-node-<?php echo $id; ?> bbmustache-cards">
  <div class="fl-node-<?php echo $id; ?>-wrapper bbmustache-cards-wrapper">
    <?php
      foreach( $cards as $card ):
        ?>
        <div class="bbmustache-card card-<?php echo $ctr; ?> card-layout-<?php echo $style; ?>" id="bbmustache-card-<?php echo $ctr; ?>">
          <?php if( $link_type == 'box' ): ?>
            <a class="card-link box-link" href="<?php echo $card->card_link; ?>" title="View <?php echo $card->card_title_text; ?>"></a>
          <?php else: ?>
            <span class="card-effect"></span>
          <?php endif; ?>
          <section class="card-content-wrapper">
            <h3 class="card-title">
              <?php echo $card->card_title_text; ?>
            </h3>
            <section class="card-content">
              <?php echo apply_filters( 'the_content' , $card->card_content_text ); ?>
            </section>
          </section>
          <?php if( $link_type == 'button' ): ?>
            <a class="card-link" href="<?php echo $card->card_link; ?>" title="View <?php echo $card->card_title_text; ?>"></a>
          <?php endif; ?>
        </div>
        <?php
      $ctr++; endforeach;
    ?>
  </div>
</div>

<?php
  $thumbnail_src = get_the_post_thumbnail_url( get_the_ID(),$settings->image_size );
?>
<li class="item--grid item--post-<?php echo get_the_ID(); ?> layout--<?php echo $settings->posts_layout; ?>" style="background-image:url(<?php echo $thumbnail_src; ?>);">
  <?php if( 'box' == $settings->link_type ): ?>
    <a href="<?php echo get_the_permalink(); ?>" class="item--link link--post-link" title="Go to <?php echo get_the_title(); ?>">
  <?php elseif( 'none' == $settings->link_type ): ?>
    <div class="wrapper--content">
  <?php endif; ?>
    <h3 class="title--post-title"><?php echo get_the_title(); ?></h3>
    <?php if( $settings->display_content == 'yes' ): ?>
      <div class="area--content content--post-snippet">
        <?php
          if( $settings->content_type == 'content' ):
            echo wp_trim_words( get_the_content(),absint( $settings->content_trim ),'...' );
          elseif( $settings->content_type == 'excerpt' ):
            echo get_the_excerpt();
          endif;
        ?>
      </div>
      <?php if( 'button' == $settings->link_type ): ?>
        <div class="wrapper--button">
          <a href="<?php echo get_the_permalink(); ?>" class="item--link button--link" title="Go to <?php echo get_the_title(); ?>">
            <span class="text--button">
              <?php echo $settings->button_text; ?>
            </span>
          </a>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  <?php if( 'box' == $settings->link_type ): ?>
    </a>
  <?php elseif( 'none' == $settings->link_type ): ?>
    </div>
  <?php endif; ?>
</li>

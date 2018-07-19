<?php
  $thumbnail_src = get_the_post_thumbnail_url( get_the_ID(),$settings->image_size );

?>
<li class="item--grid item--post-<?php echo get_the_ID(); ?> layout--alpha-list">
  <?php if( $settings->link_type == 'box' ): ?>
    <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>" class="link--box-link"></a>
  <?php endif; ?>
  <header class="item--list-header">
    <h3 class="title--post-title" >
      <?php if( $settings->link_type == 'title' ): ?>
        <a href="<?php echo get_the_permalink(); ?>">
      <?php endif; ?>
      <i class="<?php echo $settings->icon_to_use; ?>"></i>
      <?php echo get_the_title(); ?>
      <?php if( $settings->link_type == 'title' ): ?>
        </a>
      <?php endif; ?>
    </h3>
  </header>
  <section class="item--list-meta">
    <a href="<?php echo get_the_author_link(); ?>"><?php echo get_author_name(); ?></a>
     / <date>
      <?php echo get_the_date(); ?>
    </date>
     / <span>
      <?php comments_number( '0 comments','1 comment', '% comments' ); ?>
    </span>
  </section>
  <figure class="item--list-figure">
    <img src="<?php echo $thumbnail_src; ?>" alt="<?php echo get_the_title(); ?>" />
  </figure>
  <?php if( $settings->link_type == 'button' ): ?>
    <footer class="item--list-footer">
      <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>" class="item--list-button">
        READ MORE
      </a>
    </footer>
  <?php endif; ?>
</li>

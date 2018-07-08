<?php
  $registered_navs = get_terms( 'nav_menu' );
?>

<div class="bbm-toggle-wrapper bbm-toggle-align-<?php echo $settings->menu_alignment; ?> text-<?php echo $settings->toggle_position; ?>">
  <div class="bbm-menu-toggle bbm-toggle-<?php echo $settings->toggle_layout; ?> bbm-toggle-<?php echo $settings->layout_style; ?>" data-toggle="<?php echo $settings->use_menu; ?>">
    <?php if( $settings->toggle_text != '' ): ?>
      <span class="bbm-toggle-text">
        <?php echo $settings->toggle_text; ?>
      </span>
    <?php endif; ?>
    <div class="bbm-toggle-line-wrapper">
      <span class="bbm-toggle-line"></span>
      <span class="bbm-toggle-line"></span>
      <span class="bbm-toggle-line"></span>
      <span class="bbm-toggle-line"></span>
    </div>
  </div>
</div>
<nav id="<?php echo $settings->use_menu; ?>" class="bbm-menu-wrapper bbm-menu-<?php echo $settings->menu_alignment; ?> bbm-menu-<?php echo $settings->layout_style; ?>">
  <?php if( $settings->layout_style == 'mushroom' ): ?>
    <div class="bbm-menu-toggle bbm-close" data-toggle="<?php echo $settings->use_menu; ?>">
      <?php if( $settings->close_toggle_text != '' ): ?>
        <span class="bbm-close-text">
          <?php echo $settings->close_toggle_text; ?>
        </span>
      <?php endif; ?>
      <div class="bbm-toggle-line-wrapper">
        <span class="bbm-toggle-line bbm-close-line"></span>
        <span class="bbm-toggle-line bbm-close-line"></span>
      </div>
    </div>
  <?php endif; ?>
  <?php if( $settings->use_image == 'yes' ): ?>
    <figure class="bbm-menu-logo">
      <?php if( $settings->logo_link != '' ): ?>
        <a href="<?php echo $settings->logo_link; ?>" class="bbm-menu-logo-link" title="<?php echo get_bloginfo( 'name' ); ?>">
      <?php endif; ?>
        <img src="<?php echo $settings->logo_image; ?>" class="bbm-menu-logo-image" alt="<?php echo get_bloginfo( 'name' ); ?>">
      <?php if( $settings->logo_link != '' ): ?>
        </a>
      <?php endif; ?>
    </figure>
  <?php endif; ?>
  <?php
    wp_nav_menu( array(
      'menu' => $settings->use_menu,
      'walker' => new MustacheMenuWalker(),
      'menu_class' => 'bbm-menu',
      'container_class' => 'bbm-wrapper'
    ) );
  ?>
</nav>

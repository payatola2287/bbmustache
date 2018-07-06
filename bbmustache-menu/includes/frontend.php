<?php
  $registered_navs = get_terms( 'nav_menu' );
?>
<div class="bbm-toggle-wrapper bbm-toggle-align-<?php echo $settings->menu_alignment; ?> text-<?php echo $settings->toggle_position; ?>">
  <div class="bbm-menu-toggle bbm-menu-toggle-<?php echo $settings->toggle_layout; ?>" data-toggle="<?php echo $settings->use_menu; ?>">
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
<nav id="<?php echo $settings->use_menu; ?>" class="bbm-menu-wrapper bbm-menu-<?php echo $settings->menu_alignment; ?>">
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

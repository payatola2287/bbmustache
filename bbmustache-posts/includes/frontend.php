<?php
  $query_posts = FLBuilderLoop::query( $settings );
  $global_settings = FLBuilderModel::get_global_settings();
?>
<?php if( $query_posts->have_posts() ): ?>
    <ul class="list--posts wrapper--posts-list fl-node-<?php echo $id; ?>-posts-list" id="fl-node-<?php echo $id; ?>-posts-list">
    <?php
        while( $query_posts->have_posts() ):
          $query_posts->the_post();
          include $module->dir . 'template-parts/' . $settings->posts_layout .'.php';
        endwhile;
    ?>
    </ul>
    <?php if( 'yes' == $settings->enable_pagination ): ?>
      <div class="wrapper--pagination pagination--<?php echo $settings->pagination_alignment; ?>">
        <?php FLBuilderLoop::pagination( $query_posts ); ?>
      </div>
    <?php endif; ?>
<?php else: ?>

<?php endif; // Instance Loop End
wp_reset_postdata();

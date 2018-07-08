(function($){
  <?php if( $settings->layout_style != 'mushroom' ): ?>
    $('.fl-node-<?php echo $id; ?> .bbm-menu-toggle').click(function(){
      let $this = $(this),
          $target = $this.data( 'toggle' ),
          $close = '<?php echo $settings->close_toggle_text; ?>',
          $text = '<?php echo $settings->toggle_text; ?>';
      $this.toggleClass( 'open' );
      $('#'+$target).toggleClass( 'open' );

        if( !$this.hasClass('open') ){
          $this.find('.bbm-toggle-text').html( $text );
        }else{
          $this.find('.bbm-toggle-text').html( $close );
        }
    });
  <?php else: ?>
    $('.fl-node-<?php echo $id; ?> .bbm-menu-toggle').click(function(){
      let $this = $(this),
          $target = $this.data( 'toggle' );
          $('#' + $target).toggleClass( 'open' );
      $this.hide();
    });
    $( '.fl-node-<?php echo $id; ?> .bbm-close' ).click(function(){
      let $this = $(this),
          $defaultToggle = $('.fl-node-<?php echo $id; ?> .bbm-menu-toggle'),
          $menuTarget = $this.data( 'toggle' );
      $defaultToggle.show();
      $('#' + $menuTarget).removeClass( 'open' );
      console.log($menuTarget);
    });
  <?php endif; ?>
})(jQuery);

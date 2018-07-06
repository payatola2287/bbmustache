(function($){
  $('.fl-node-<?php echo $id; ?> .bbm-menu-toggle').click(function(){
    let $target = $(this).data( 'toggle' ),
        $close = '<?php echo $settings->close_toggle_text; ?>',
        $text = '<?php echo $settings->toggle_text; ?>';
    $(this).toggleClass('open');
    $('#'+$target).toggleClass( 'open' );
    if( !$(this).hasClass('open') ){
      $(this).find('.bbm-toggle-text').html( $text );
    }else{
      $(this).find('.bbm-toggle-text').html( $close );
    }
  });
})(jQuery);

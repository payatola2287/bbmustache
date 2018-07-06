<?php
  $registered_navs = get_terms( 'nav_menu' );
?>
<select name="{{data.name}}" class="bbm-select">
  <#
    var navs = <?php echo json_encode( $registered_navs ); ?>;
    for( var nav in navs ){
      #>
        <option value="{{navs[nav].slug}}">{{navs[nav].name}}</option>
      <#
    }
  #>
</select>

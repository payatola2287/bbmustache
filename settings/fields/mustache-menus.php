<?php
  $registered_navs = get_terms( 'nav_menu' );
?>
<select name="{{data.name}}" class="bbm-select" data-value="{{data.value}}">
  <#
    var navs = <?php echo json_encode( $registered_navs ); ?>;
    for( var nav in navs ){
      var selected = ( navs[nav].slug == data.value ) ? 'selected="selected"':'' ;
      #>
        <option value="{{navs[nav].slug}}" {{selected}} >{{navs[nav].name}}</option>
      <#
    }
  #>
</select>

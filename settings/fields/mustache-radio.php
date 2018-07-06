<div class="bbmustache-button-group-wrapper">

  <#
    var field = data.field,
        name = data.name,
        value = data.value,
        atts = '',
        defaultVal = field.default;
    if ( field.toggle ) {
    	atts += " data-toggle='" + JSON.stringify( field.toggle ) + "'";
    }
    for( var optionKey in field.options  ){
      var optionVal = field.options[optionKey],
          selected = (value==optionKey) ? 'checked="checked"':'';
            #>
            <input name="{{name}}" type="radio" class="bbmustache-custom-radio" value="{{optionKey}}" id="{{name}}_{{optionKey}}_radio"{{selected}}{{atts}}>
            <label for="{{name}}_{{optionKey}}_radio">
                 {{optionVal}}
            </label>
            <#
    }
  #>
</div>

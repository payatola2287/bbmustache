<div class="bbmustache-align-wrapper bbmustache-button-group-wrapper">
          <input name="{{data.name}}" type="radio" class="bbmustache-custom-radio" value="auto" id="{{data.name}}_auto_radio" {{(data.value=="auto")?"checked":"" }}>
          <label for="{{data.name}}_auto_radio" title="Default">
               <i class="fa fa-ban"></i>
          </label>
          <input name="{{data.name}}" type="radio" class="bbmustache-custom-radio" value="left" id="{{data.name}}_left_radio" {{(data.value=="left")?"checked":"" }}>
          <label for="{{data.name}}_left_radio">
               <i class="fa fa-align-left"></i>
          </label>
          <input name="{{data.name}}" type="radio" class="bbmustache-custom-radio" value="center" id="{{data.name}}_center_radio" {{(data.value=="center")?"checked":""}}>
          <label for="{{data.name}}_center_radio">
               <i class="fa fa-align-center"></i>
          </label>
          <input name="{{data.name}}" type="radio" class="bbmustache-custom-radio" value="right" id="{{data.name}}_right_radio" {{(data.value=="right")?"checked":""}}>
          <label for="{{data.name}}_right_radio">
               <i class="fa fa-align-right"></i>
          </label>
     </div>

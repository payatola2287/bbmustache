<form role="search" method="get" class="bbmustache-search-form <?php echo $module->alignment_class( $settings->input_alignment ); ?>" action="<?php echo home_url( '/' ); ?>">
    <label class="field-label">
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
        <input type="search" class="bbmustache-search-field search-field"
            placeholder="<?php echo $settings->input_placeholder; ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </label>
    <button type="submit" class="bbmustache-search-submit search-submit"><span class="fa fa-search"></span></button>
</form>

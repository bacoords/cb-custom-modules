<?php
function fl_cbdate_field($name, $value, $field) {

?>

<script>
jQuery( document ).ready(function() {
    jQuery( ".datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'd MM yy'
    });
});
</script>

      <input type="text" class="datepicker" name="<?php echo $name; ?>" value="<?php echo $value; ?>" >

<?php
}
add_action('fl_builder_control_cbdate', 'fl_cbdate_field', 1, 3);

function fl_cbdate_field_assets() {
    if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
        wp_enqueue_style( 'jquery-ui-datepicker', CB_CUSTOM_MODULE_URL  . '/includes/BB-date-Field-master/assets/jquery-bootstrap-datepicker.css', array(), '' );
        wp_enqueue_script( 'jquery-ui-datepicker');
    }
}
add_action( 'wp_enqueue_scripts', 'fl_cbdate_field_assets' );

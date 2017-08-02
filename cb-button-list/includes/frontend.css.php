/**
 * This file should contain frontend styles that 
 * will be applied to individual module instances.
 *
 * You have access to three variables in this file: 
 * 
 * $module An instance of your module class.
 * $id The module's ID.
 * $settings The module's settings.
 *
 * Example: 
 */
 
.cb-button-list--button{
	
	width: 100%;
	margin-bottom: 1rem;

}



<?php
// Loop through and style each pricing box
for($i = 0; $i < count($settings->cb_button_list_form_field_repeater); $i++) :

	if(!is_object($settings->cb_button_list_form_field_repeater[$i])) continue;

	// Pricing Box Settings
	$button = $settings->cb_button_list_form_field_repeater[$i];

?>

<?php
FLBuilder::render_module_css('button', $id . ' .cb-button-list--button-' . $i , array(
	'align'             => $module->filter_value( $button, 'btn_align' ),
	'bg_color'          => $module->filter_value( $button, 'btn_bg_color' ),
	'bg_hover_color'    => $module->filter_value( $button, 'btn_bg_hover_color' ),
	'bg_opacity'        => $module->filter_value( $button, 'btn_bg_opacity' ),
	'bg_hover_opacity'  => $module->filter_value( $button, 'btn_bg_hover_opacity' ),
	'button_transition' => $module->filter_value( $button, 'btn_button_transition' ),
	'border_radius'     => $module->filter_value( $button, 'btn_border_radius' ),
	'border_size'       => $module->filter_value( $button, 'btn_border_size' ),
	'font_size'         => $module->filter_value( $button, 'btn_font_size' ),
	'icon'              => $button->btn_icon,
	'icon_position'     => $button->btn_icon_position,
	'link'              => $button->button_url,
	'link_target'       => '_self',
	'padding'           => $module->filter_value( $button, 'btn_padding' ),
	'style'             => $module->filter_value( $button, 'btn_style' ),
	'text_color'        => $module->filter_value( $button, 'btn_text_color' ),
	'text_hover_color'  => $module->filter_value( $button, 'btn_text_hover_color' ),
	'width'             => $module->filter_value( $button, 'btn_width' )
));
?>

<?php endfor; ?>

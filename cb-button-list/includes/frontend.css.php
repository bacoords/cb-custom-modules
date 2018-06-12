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
$i = 0;
foreach($settings->cb_button_list_form_field_repeater as $button) :

	$button_text = $button->button_text;

	if($button->cb_link_type == 'file') {
		$button_url = wp_get_attachment_url( $button->cb_link_file );
		$attachment_meta = wp_prepare_attachment_for_js( $button->cb_link_file );

		$button_text .= '  <small>( ' . $attachment_meta['filesizeHumanReadable'] . ' )</small>';
	} else {
		$button_url = $button->cb_link_link;
	}
	$btn_bg_opacity = isset($button->btn_bg_opacity) ? $button->btn_bg_opacity : '0';

  $button_id = $id . ' .cb-button-list--button-' . $i;
  FLBuilder::render_module_css('button', $button_id, array(
  	'align'             => $module->filter_btn_value( $button, 'btn_align' ),
  	'bg_color'          => $module->filter_btn_value( $button, 'btn_bg_color' ),
  	'bg_hover_color'    => $module->filter_btn_value( $button, 'btn_bg_hover_color' ),
  	'bg_opacity'        => $module->filter_btn_value( $button, 'btn_bg_opacity' ),
  	'bg_hover_opacity'  => $module->filter_btn_value( $button, 'btn_bg_hover_opacity' ),
  	'button_transition' => $module->filter_btn_value( $button, 'btn_button_transition' ),
  	'border_radius'     => $module->filter_btn_value( $button, 'btn_border_radius' ),
  	'border_size'       => $module->filter_btn_value( $button, 'btn_border_size' ),
  	'font_size'         => $module->filter_btn_value( $button, 'btn_font_size' ),
  	'icon'              => $button->btn_icon,
  	'icon_position'     => $button->btn_icon_position,
  	'link'              => $button_url,
  	'link_target'       => '_self',
  	'padding'           => $module->filter_btn_value( $button, 'btn_padding' ),
  	'style'             => $module->filter_btn_value( $button, 'btn_style' ),
  	'text_color'        => $module->filter_btn_value( $button, 'btn_text_color' ),
  	'text_hover_color'  => $module->filter_btn_value( $button, 'btn_text_hover_color' ),
  	'width'             => $module->filter_btn_value( $button, 'btn_width' )
  ));

  $i++;

endforeach; ?>

<?php

/**
 * This file should be used to render each module instance.
 * You have access to two variables in this file:
 *
 * $module An instance of your module class.
 * $settings The module's settings.
 *
 *
 */

?>

<div class="cb-button-list">

	<?php $i = 0; ?>

	<?php foreach($settings->cb_button_list_form_field_repeater as $button){ ?>

		<div class="cb-button-list--button cb-button-list--button-<?php echo $i; $i++; ?>">

			<?php

			$button_text = $button->button_text;

			if($button->cb_link_type == 'file') {
				$button_url = wp_get_attachment_url( $button->cb_link_file );
				$attachment_meta = wp_prepare_attachment_for_js( $button->cb_link_file );

				$button_text .= '  <small>( ' . $attachment_meta['filesizeHumanReadable'] . ' )</small>';
			} else {
				$button_url = $button->cb_link_link;
			}
			$btn_bg_opacity = isset($button->btn_bg_opacity) ? $button->btn_bg_opacity : '0';

			$btn_settings = array(
				'align'							=> $module->filter_btn_value( $button, 'btn_align' ),
				'bg_color'          => $module->filter_btn_value( $button, 'btn_bg_color' ),
				'bg_hover_color'    => $module->filter_btn_value( $button, 'btn_bg_hover_color' ),
				'bg_opacity'        => $btn_bg_opacity,
				'border_radius'     => $module->filter_btn_value( $button, 'btn_border_radius' ),
				'border_size'       => $module->filter_btn_value( $button, 'btn_border_size' ),
				'font_size'         => $module->filter_btn_value( $button, 'btn_font_size' ),
				'icon'              => $button->btn_icon,
				'icon_position'     => $button->btn_icon_position,
				'icon_animation'		=> $button->btn_icon_animation,
				'link'              => $button_url,
				'link_nofollow' 		=> $button->btn_link_nofollow,
				'link_target'       => $button->btn_link_target,
				'padding'           => $module->filter_btn_value( $button, 'btn_padding' ),
				'style'             => $module->filter_btn_value( $button, 'btn_style' ),
				'text'              => $button_text,
				'text_color'        => $module->filter_btn_value( $button, 'btn_text_color' ),
				'text_hover_color'  => $module->filter_btn_value( $button, 'btn_text_hover_color' ),
				'width'             => $module->filter_btn_value( $button, 'btn_width' )
			);

			FLBuilder::render_module_html('button', $btn_settings);

		?>

		</div>

	<?php } ?>

</div>

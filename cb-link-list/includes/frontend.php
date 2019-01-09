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


<?php

$form_field_repeater = $settings->cb_link_list_form_field_repeater;

$icon_size = $settings->cb_link_list_icon_size;
$font = $settings->cb_link_list_font;
$line_height = $settings->cb_link_list_line_height;
$label_font_size = $settings->cb_link_list_label_font_size;
$filesize_font_size = $settings->cb_link_list_filesize_font_size;

//Default Colors
$default_icon_color = isset($settings->cb_link_icon_color) ? $settings->cb_link_icon_color : '';
$default_icon_hover_color = isset($settings->cb_link_icon_hover_color) ? $settings->cb_link_icon_hover_color : '';
$default_icon_bg_color = isset($settings->cb_link_icon_bg_color) ? $settings->cb_link_icon_bg_color : 'transparent';
$default_icon_bg_hover_color = isset($settings->cb_link_icon_bg_hover_color) ? $settings->cb_link_icon_bg_hover_color : '';
$default_font_color = isset($settings->cb_link_font_color) ? $settings->cb_link_font_color : '';
$default_font_hover_color = isset($settings->cb_link_font_hover_color) ? $settings->cb_link_font_hover_color : '';
$default_filesize_color = isset($settings->cb_link_filesize_color) ? $settings->cb_link_filesize_color : '';
$default_filesize_hover_color = isset($settings->cb_link_filesize_hover_color) ? $settings->cb_link_filesize_hover_color : '';

?>

<div class="cb-link-list">

	<div class="row-fluid">

		<?php foreach($form_field_repeater as $link){ ?>

			<?php


			$label = $link->cb_link_label;
			$icon = $link->cb_link_icon;
			$type = $link->cb_link_type;

			if($type == 'file') {
				$link_url = wp_get_attachment_url( $link->cb_link_file );
				$attachment_meta = wp_prepare_attachment_for_js( $link->cb_link_file );

				$label .= '  <span class="cb-link-list__filesize">( ' . $attachment_meta['filesizeHumanReadable'] . ' )</span>';
			} else {
				$link_url = $link->cb_link_link;
			}

			$icon_color = isset($link->cb_link_icon_color) ? $link->cb_link_icon_color : $default_icon_color;
			$icon_hover_color = isset($link->cb_link_icon_hover_color) ? $link->cb_link_icon_hover_color : $default_icon_hover_color;
			$icon_bg_color = isset($link->cb_link_icon_bg_color) ? $link->cb_link_icon_bg_color : $default_icon_bg_color;
			$icon_bg_hover_color = isset($link->cb_link_icon_bg_hover_color) ? $link->cb_link_icon_bg_hover_color : $default_icon_bg_hover_color;
			$font_color = isset($link->cb_link_font_color) ? $link->cb_link_font_color : $default_font_color;
			$font_hover_color = isset($link->cb_link_font_hover_color) ? $link->cb_link_font_hover_color :  $default_font_hover_color;
			$filesize_color = isset($link->cb_link_filesize_color) ? $link->cb_link_filesize_color : $default_filesize_color;
			$filesize_hover_color = isset($link->cb_link_filesize_hover_color) ? $link->cb_link_filesize_hover_color : $default_filesize_hover_color;
			$link_target = isset($link->link_target) ? $link->link_target : '_self';
			?>

			<div class="col-xs-12">

				<div class="fl-icon-wrap">

				<?php
					$icon_settings = array(
						'bg_color'       => $icon_bg_color,
						'bg_hover_color' => $icon_bg_hover_color,
						'color'          => $icon_color,
						// 'exclude_wrapper'=> true,
						'hover_color'    => $icon_hover_color,
						'icon'           => $icon,
						'link'           => $link_url,
						'link_target'    => $link_target,
						'size'           => $icon_size,
						'text'           => $label,
						'three_d'        => ''
					);

					FLBuilder::render_module_html('icon', $icon_settings); ?>

				</div>

			</div>

		<?php } ?>

	</div>

</div>

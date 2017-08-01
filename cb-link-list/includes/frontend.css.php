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
$default_icon_bg_color = isset($settings->cb_link_icon_bg_color) ? $settings->cb_link_icon_bg_color : '';
$default_icon_bg_hover_color = isset($settings->cb_link_icon_bg_hover_color) ? $settings->cb_link_icon_bg_hover_color : '';
$default_font_color = isset($settings->cb_link_font_color) ? $settings->cb_link_font_color : '';
$default_font_hover_color = isset($settings->cb_link_font_hover_color) ? $settings->cb_link_font_hover_color : '';
$default_filesize_color = isset($settings->cb_link_filesize_color) ? $settings->cb_link_filesize_color : '';
$default_filesize_hover_color = isset($settings->cb_link_filesize_hover_color) ? $settings->cb_link_filesize_hover_color : '';

?>


<?php

FLBuilder::render_module_css('icon', $id, array(
	'align'          => '',
	'bg_color'       => $default_icon_bg_color,
	'bg_hover_color' => $default_icon_bg_hover_color,
	'color'          => $default_icon_color,
	'hover_color'    => $default_icon_hover_color,
	'icon'           => '',
	'link'           => '',
	'link_target'    => '',
	'size'           => $icon_size,
	'text'           => '',
	'three_d'        => ''
));

?>


.fl-node-<?php echo $id; ?> .fl-module-content .fl-icon-wrap .fl-icon i,
.fl-node-<?php echo $id; ?> .fl-module-content .fl-icon-wrap .fl-icon i:before {

	border-radius: 100%;
	-moz-border-radius: 100%;
	-webkit-border-radius: 100%;
	line-height: <?php echo $icon_size * 1.75; ?>px;
	height: <?php echo $icon_size * 1.75; ?>px;
	width: <?php echo $icon_size * 1.75; ?>px;
	text-align: center;
	
}

.fl-node-<?php echo $id; ?> .fl-module-content .fl-icon-wrap .fl-icon-text a{

	<?php if ( $font['family'] !== 'Default' ) :  ?>
		font-family: "<?php echo $font['family']; ?>";
	<?php endif; ?>
	<?php if ( $font['weight'] !== 'default' ) :  ?>
		font-weight: <?php echo $font['weight']; ?>;
	<?php endif; ?>
	<?php if ( $default_font_color !== '' ) :  ?>
		color: #<?php echo $default_font_color; ?>;
	<?php endif; ?>
	font-size: <?php echo $label_font_size; ?>px;
	line-height: <?php echo $line_height; ?>;
	
}

.fl-node-<?php echo $id; ?> .fl-module-content .fl-icon-wrap:hover .fl-icon-text a{

	<?php if ( $default_font_hover_color !== '' ) :  ?>
		color: #<?php echo $default_font_chover_olor; ?>;
	<?php endif; ?>
	text-decoration: none;
}

.fl-node-<?php echo $id; ?> .fl-module-content .fl-icon-text a span.cb-link-list__filesize {

	font-size: <?php echo $filesize_font_size; ?>px;
	color: #<?php echo $default_filesize_color; ?>;
	text-decoration: none;
}

.fl-node-<?php echo $id; ?> .fl-module-content .fl-icon-text a:hover span.cb-link-list__filesize {

	color: #<?php echo $default_filesize_hover_color; ?>;
	text-decoration: none;
}


<?php foreach($form_field_repeater as $i => $link) : ?>
	
	<?php if ( isset( $link->cb_link_icon_color ) || isset( $link->cb_link_icon_bg_color ) ) : ?>
		.fl-node-<?php echo $id; ?> .fl-module-content .row-fluid .col-xs-12:nth-child(<?php echo $i + 1; ?>) .fl-icon i,
		.fl-node-<?php echo $id; ?> .fl-module-content .row-fluid .col-xs-12:nth-child(<?php echo $i + 1; ?>) .fl-icon i:before {
			<?php if ( isset( $link->cb_link_icon_color ) ) : ?>
			color: #<?php echo $link->cb_link_icon_color; ?>;
			<?php endif; ?>
			<?php if ( isset( $link->cb_link_icon_bg_color ) ) : ?>
			background: #<?php echo $link->cb_link_icon_bg_color; ?>;
			<?php endif; ?>
		}
	<?php endif; ?>
	
	<?php if ( isset( $link->cb_link_icon_hover_color ) || isset( $link->cb_link_icon_bg_hover_color ) ) : ?>
		.fl-node-<?php echo $id; ?> .fl-module-content .row-fluid .col-xs-12:nth-child(<?php echo $i + 1; ?>) .fl-icon i:hover,
		.fl-node-<?php echo $id; ?> .fl-module-content .row-fluid .col-xs-12:nth-child(<?php echo $i + 1; ?>) .fl-icon i:hover:before,
		.fl-node-<?php echo $id; ?> .fl-module-content .row-fluid .col-xs-12:nth-child(<?php echo $i + 1; ?>) .fl-icon a:hover i,
		.fl-node-<?php echo $id; ?> .fl-module-content .row-fluid .col-xs-12:nth-child(<?php echo $i + 1; ?>) .fl-icon a:hover i:before {
			<?php if ( isset( $link->cb_link_icon_hover_color ) ) : ?>
			color: #<?php echo $link->cb_link_icon_hover_color; ?>;
			<?php endif; ?>
			<?php if ( isset( $link->cb_link_icon_bg_hover_color ) ) : ?>
			background: #<?php echo $link->cb_link_icon_bg_hover_color; ?>;
			<?php endif; ?>
		}
	<?php endif; ?>
	
	
	<?php if ( isset( $link->cb_link_font_color ) ) : ?>
		.fl-node-<?php echo $id; ?> .fl-module-content .row-fluid .col-xs-12:nth-child(<?php echo $i + 1; ?>) .fl-icon-wrap .fl-icon-text a {
			<?php if ( isset( $link->cb_link_font_color ) ) : ?>
			color: #<?php echo $link->cb_link_font_color; ?>;
			<?php endif; ?>
		}
	<?php endif; ?>
	
	<?php if ( isset( $link->cb_link_font_hover_color ) ) : ?>
		.fl-node-<?php echo $id; ?> .fl-module-content .row-fluid .col-xs-12:nth-child(<?php echo $i + 1; ?>) .fl-icon-wrap:hover .fl-icon-text a {
			<?php if ( isset( $link->cb_link_font_hover_color ) ) : ?>
			color: #<?php echo $link->cb_link_font_hover_color; ?>;
			<?php endif; ?>
		}
	<?php endif; ?>
	
	
	<?php if ( isset( $link->cb_link_filesize_color ) ) : ?>
		.fl-node-<?php echo $id; ?> .fl-module-content .row-fluid .col-xs-12:nth-child(<?php echo $i + 1; ?>) .fl-icon-wrap .fl-icon-text a span.cb-link-list__filesize {
			<?php if ( isset( $link->cb_link_filesize_color ) ) : ?>
			color: #<?php echo $link->cb_link_filesize_color; ?>;
			<?php endif; ?>
		}
	<?php endif; ?>
	
	<?php if ( isset( $link->cb_link_filesize_hover_color ) ) : ?>
		.fl-node-<?php echo $id; ?> .fl-module-content .row-fluid .col-xs-12:nth-child(<?php echo $i + 1; ?>) .fl-icon-wrap:hover .fl-icon-text a span.cb-link-list__filesize {
			<?php if ( isset( $link->cb_link_filesize_hover_color ) ) : ?>
			color: #<?php echo $link->cb_link_filesize_hover_color; ?>;
			<?php endif; ?>
		}
	<?php endif; ?>
	
<?php endforeach; ?>

<?php

$toggle_spacing = $settings->horizontal_spacing > 10 ? $settings->horizontal_spacing : 10;
$toggle_padding = ! empty( $settings->horizontal_spacing ) ? $settings->horizontal_spacing : 0;
$toggle_width 	= ( $toggle_padding + 14 );
$toggle_height 	= ceil( ( ( $toggle_padding * 2 ) + 14 ) * 0.65 );

/**
 * Overall menu styling
 */
?>
.fl-node-<?php echo $id; ?> .fl-cb-menu .menu,
.fl-node-<?php echo $id; ?> .fl-cb-menu .menu > li {
	<?php

	$menu_raw_color = ! empty( $settings->menu_bg_color ) ? $settings->menu_bg_color : 'transparent';
	$menu_opacity   = ! empty( $settings->menu_bg_opacity ) ? $settings->menu_bg_opacity : '100';
	$menu_color     = 'rgba(' . implode( ',', FLBuilderColor::hex_to_rgb( $menu_raw_color ) ) . ',' . ( $menu_opacity / 100 ) . ')';

	if ( ! empty( $settings->font ) && 'Default' != $settings->font['family'] ) {
		FLBuilderFonts::font_css( $settings->font );
	}
	if ( ! empty( $settings->text_size ) ) {
		echo 'font-size: ' . $settings->text_size . 'px;';
	}
	if ( ! empty( $settings->text_transform ) ) {
		echo 'text-transform: ' . $settings->text_transform . ';';
	}
	if ( ! empty( $settings->menu_bg_color ) ) {
		echo 'background-color: #' . $menu_raw_color . ';';
		echo 'background-color: ' . $menu_color . ';';
	}

	?>
}
<?php

/**
 * Overall menu alignment
 */
if ( 'horizontal' == $settings->menu_layout && ! empty( $settings->menu_align ) && in_array( $settings->menu_align, array( 'left', 'center', 'right' ) ) ) : ?>
.fl-node-<?php echo $id; ?> .fl-cb-menu{
	text-align: <?php echo $settings->menu_align ?>;
}
<?php endif;

/**
 * Overall submenu styling
 */
if ( ! empty( $settings->submenu_bg_color ) || 'yes' == $settings->drop_shadow ) : ?>
.fl-node-<?php echo $id; ?> .fl-cb-menu .sub-menu {
	<?php

	if ( ! empty( $settings->submenu_bg_color ) ) {
		$submenu_raw_color = ! empty( $settings->submenu_bg_color ) ? $settings->submenu_bg_color : 'transparent';
		$submenu_opacity   = ! empty( $settings->submenu_bg_opacity ) ? $settings->submenu_bg_opacity : '0';
		$submenu_color     = 'rgba(' . implode( ',', FLBuilderColor::hex_to_rgb( $submenu_raw_color ) ) . ',' . ( $submenu_opacity / 100 ) . ')';
		echo 'background-color: #' . $submenu_raw_color . ';';
		echo 'background-color: ' . $submenu_color . ';';
	}
	if ( 'yes' == $settings->drop_shadow ) {
		echo '-webkit-box-shadow: 0 1px 20px rgba(0,0,0,0.1);';
		echo '-ms-box-shadow: 0 1px 20px rgba(0,0,0,0.1);';
		echo 'box-shadow: 0 1px 20px rgba(0,0,0,0.1);';
	}

	?>
}
<?php endif;

if ( ! empty( $settings->sub_submenu_bg_color ) ) : ?>
.fl-node-<?php echo $id; ?> .fl-cb-menu .sub-menu .sub-menu {
	<?php

	if ( ! empty( $settings->sub_submenu_bg_color ) ) {
		$sub_submenu_raw_color = ! empty( $settings->sub_submenu_bg_color ) ? $settings->sub_submenu_bg_color : 'transparent';
		$sub_submenu_opacity   = ! empty( $settings->sub_submenu_bg_opacity ) ? $settings->sub_submenu_bg_opacity : '0';
		$sub_submenu_color     = 'rgba(' . implode( ',', FLBuilderColor::hex_to_rgb( $sub_submenu_raw_color ) ) . ',' . ( $sub_submenu_opacity / 100 ) . ')';
		echo 'background-color: #' . $sub_submenu_raw_color . ';';
		echo 'background-color: ' . $sub_submenu_color . ';';
	}

	?>
}
<?php endif;

/**
 * Toggle - Arrows / None
 */
if ( ( in_array( $settings->menu_layout, array( 'horizontal', 'vertical' ) ) && in_array( $settings->submenu_hover_toggle, array( 'arrows', 'none' ) ) ) || ( 'accordion' == $settings->menu_layout && 'arrows' == $settings->submenu_click_toggle  ) ) : ?>
	.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-menu-toggle:before{
		content: '';
		position: absolute;
		right: 50%;
		top: 50%;
		z-index: 1;
		display: block;
		width: 9px;
		height: 9px;
		margin: -5px -5px 0 0;
		border-right: 2px solid;
		border-bottom: 2px solid;
		-webkit-transform-origin: right bottom;
			-ms-transform-origin: right bottom;
				transform-origin: right bottom;
		-webkit-transform: translateX( -5px ) rotate( 45deg );
			-ms-transform: translateX( -5px ) rotate( 45deg );
				transform: translateX( -5px ) rotate( 45deg );
	}
	.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-has-submenu.fl-active > .fl-has-submenu-container .fl-menu-toggle{
		-webkit-transform: rotate( -180deg );
			-ms-transform: rotate( -180deg );
				transform: rotate( -180deg );
	}
<?php

/**
 * Toggle - Plus
 */
elseif ( ( in_array( $settings->menu_layout, array( 'horizontal', 'vertical' ) ) && 'plus' == $settings->submenu_hover_toggle ) || ( 'accordion' == $settings->menu_layout && 'plus' == $settings->submenu_click_toggle ) ) : ?>
	.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-menu-toggle:before,
	.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-menu-toggle:after{
		content: '';
		position: absolute;
		z-index: 1;
		display: block;
		border-color: #333;
	}
	.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-menu-toggle:before{
		left: 50%;
		top: 50%;
		width: 12px;
		border-top: 3px solid;
		-webkit-transform: translate( -50%, -50% );
			-ms-transform: translate( -50%, -50% );
				transform: translate( -50%, -50% );
	}
	.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-menu-toggle:after{
		left: 50%;
		top: 50%;
		border-left: 3px solid;
		height: 12px;
		-webkit-transform: translate( -50%, -50% );
			-ms-transform: translate( -50%, -50% );
				transform: translate( -50%, -50% );
	}
	.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-has-submenu.fl-active > .fl-has-submenu-container .fl-menu-toggle:after{
		display: none;
	}
<?php endif;

/**
 * Responsive enabled
 */
if ( $global_settings->responsive_enabled ) : ?>

	<?php if ( ( in_array( $settings->menu_layout, array( 'horizontal', 'vertical' ) ) && 'none' == $settings->submenu_hover_toggle ) ) : ?>
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-has-submenu-container a{
			padding-right: <?php echo $toggle_width ?>px;
		}
	<?php endif; ?>

	<?php // Submenu - horizontal or vertical ?>
	<?php if ( in_array( $settings->menu_layout, array( 'horizontal', 'vertical' ) ) ) : ?>
		.fl-node-<?php echo $id; ?> .menu .fl-has-submenu .sub-menu{
			display: none;
		}
	<?php endif; ?>

	.fl-node-<?php echo $id; ?> .fl-cb-menu li{
		border-top: 1px solid transparent;
	}
	.fl-node-<?php echo $id; ?> .fl-cb-menu li:first-child{
		border-top: none;
	}

	<?php if ( 'always' != $module->get_media_breakpoint() ) : ?>
		@media ( max-width: <?php echo $module->get_media_breakpoint() ?>px ) {
	<?php endif; ?>

		<?php if ( (isset( $settings->mobile_full_width ) && in_array( $settings->mobile_full_width, array( 'yes', 'below' ) ) ) && (isset( $settings->mobile_toggle ) && in_array( $settings->mobile_toggle, array( 'hamburger', 'hamburger-label' ) ) ) ) : ?>

			<?php if ( 'yes' == $settings->mobile_full_width ) : ?>
				.fl-node-<?php echo $id; ?> .fl-cb-menu .menu {
					position: absolute;
					left: <?php echo empty( $settings->margin_left ) ? $global_settings->module_margins : $settings->margin_left; ?>px;
					right: <?php echo empty( $settings->margin_right ) ? $global_settings->module_margins : $settings->margin_right; ?>px;
					z-index: 1500;
				}
			<?php endif; ?>

			<?php if ( ! empty( $settings->mobile_menu_bg ) ) :
				$menu_raw_color = ! empty( $settings->mobile_menu_bg ) ? $settings->mobile_menu_bg : 'transparent';
				$menu_opacity   = ! empty( $settings->menu_bg_opacity ) ? $settings->menu_bg_opacity : '100';
				$menu_color     = 'rgba(' . implode( ',', FLBuilderColor::hex_to_rgb( $menu_raw_color ) ) . ',' . ( $menu_opacity / 100 ) . ')';
				?>

				.fl-node-<?php echo $id; ?> .fl-cb-menu .menu,
				.fl-node-<?php echo $id; ?> .fl-cb-menu .menu > li{
					background-color: #<?php echo $menu_raw_color ?>;
					background-color: <?php echo $menu_color ?>;
				}
			<?php endif; ?>

		<?php endif; ?>

		<?php if ( 'expanded' != $settings->mobile_toggle ) : ?>
			.fl-node-<?php echo $id; ?> .fl-cb-menu .menu {
				display: none;
			}
		<?php endif; ?>

		.fl-cb-menu-horizontal {
			text-align: left;
		}

		.fl-module[data-node] .fl-cb-menu .sub-menu {
			background-color: transparent;
			-webkit-box-shadow: none;
			-ms-box-shadow: none;
			box-shadow: none;
		}

	<?php if ( 'always' != $module->get_media_breakpoint() ) : ?>
		} <?php // close media max-width ?>
	<?php endif; ?>

	<?php if ( 'always' != $module->get_media_breakpoint() ) : ?>
	@media ( min-width: <?php echo ( $module->get_media_breakpoint() ) + 1 ?>px ) {
		.fl-node-<?php echo $id; ?> .fl-cb-menu ul.sub-menu li{
			display: inline-block;
			float: left;
		}
		<?php // if menu is horizontal ?>
		<?php if ( 'horizontal' == $settings->menu_layout ) : ?>
			.fl-node-<?php echo $id; ?> .menu > li{ float: left; }

			.fl-node-<?php echo $id; ?> .menu li{
				border-left: 1px solid transparent;
				border-top: none;
			}

			.fl-node-<?php echo $id; ?> .menu li:first-child{
				border: none;
			}
			.fl-node-<?php echo $id; ?> .menu li li{
				border-left: 1px solid transparent;
				border-top: none;
			}

			.fl-node-<?php echo $id; ?> .menu .fl-has-submenu .sub-menu{
				position: absolute;

				left: 0;
				z-index: 10;
				visibility: hidden;
				opacity: 0;
				text-align:left;
			}
			<?php if ( 'horizontal' == $settings->menu_layout && ! empty( $settings->menu_align ) && in_array( $settings->menu_align, array( 'left', 'center', 'right' ) ) ) : ?>
				.fl-node-<?php echo $id; ?> .menu .fl-has-submenu .sub-menu{
					text-align: <?php echo $settings->menu_align ?>;
				}
				.fl-node-<?php echo $id; ?> .fl-cb-menu ul.sub-menu li{
					display: inline-block;
					float: left;
				}
			<?php endif; ?>
			.fl-node-<?php echo $id; ?> .fl-has-submenu .fl-has-submenu .sub-menu{
				top: 100%;
				left: 0;
			}

			<?php if ( ! empty( $settings->menu_align ) && 'default' != $settings->menu_align ) : ?>
				.fl-node-<?php echo $id; ?> .fl-cb-menu .menu{
					<?php
					if ( in_array( $settings->menu_align, array( 'left', 'right' ) ) ) {
						echo 'float: ' . $settings->menu_align . ';';
					} elseif ( 'center' == $settings->menu_align ) {
						echo 'display: inline-block;';
					}
					?>
				}
			<?php endif; ?>

			<?php if ( ! empty( $settings->menu_align ) && 'right' == $settings->menu_align ) : ?>
				.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-has-submenu:hover > .sub-menu{
					display: flex;
					justify-content: flex-end;
					flex-direction: row;
				}
				.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-has-submenu .fl-has-submenu:hover > .sub-menu{
					display: flex;
					justify-content: flex-end;
					flex-direction: row;
				}
			<?php endif; ?>

			<?php if ( ! empty( $settings->menu_align ) && 'center' == $settings->menu_align ) : ?>
				.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-has-submenu:hover > .sub-menu{
					display: flex;
					justify-content: center;
					flex-direction: row;
				}
				.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-has-submenu .fl-has-submenu:hover > .sub-menu{
					display: flex;
					justify-content: center;
					flex-direction: row;
				}
			<?php endif; ?>

		<?php // if menu is vertical ?>
		<?php elseif ( 'vertical' == $settings->menu_layout ) : ?>

			.fl-node-<?php echo $id; ?> .menu .fl-has-submenu .sub-menu{
				position: absolute;
				top: 0;
				left: 100%;
				z-index: 10;
				visibility: hidden;
				opacity: 0;
			}

		<?php endif; ?>

		<?php // if menu is horizontal or vertical ?>
		<?php if ( in_array( $settings->menu_layout, array( 'horizontal', 'vertical' ) ) ) : ?>

			.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-has-submenu:hover > .sub-menu,
			.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-has-submenu.focus > .sub-menu{
				display: block;
				visibility: visible;
				opacity: 1;
				z-index: 3;
				<?php if ( ! empty( $settings->menu_align ) && ('right' == $settings->menu_align || 'center' == $settings->menu_align) ) : ?>
					display: flex;
				<?php endif; ?>
			}

			<?php if( $settings->persist_active ) : ?>
				.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-has-submenu.current-menu-parent {
					background-color: #<?php echo $settings->link_hover_bg_color; ?>;
				}
				.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-has-submenu.current-menu-parent > .sub-menu{
					display: block;
					visibility: visible;
					opacity: 1;
					z-index: 1;
					<?php if ( ! empty( $settings->menu_align ) && ('right' == $settings->menu_align || 'center' == $settings->menu_align) ) : ?>
						display: flex;
					<?php endif; ?>
				}
			<?php endif; ?>


			.fl-node-<?php echo $id; ?> .menu .fl-has-submenu.fl-cb-menu-submenu-right .sub-menu{
				//top: 100%;
				left: inherit;
				right: 0;
			}

			.fl-node-<?php echo $id; ?> .menu .fl-has-submenu.fl-cb-menu-submenu-right .sub-menu li{
				display: inline-block;
			}

			.fl-node-<?php echo $id; ?> .menu .fl-has-submenu .fl-has-submenu.fl-cb-menu-submenu-right .sub-menu{
				top: 100%;
				left: inherit;
				// right: 100%;
			}

			.fl-node-<?php echo $id; ?> .menu .fl-has-submenu .fl-has-submenu.fl-cb-menu-submenu-right .sub-menu li{
				display: inline-block;
			}

			.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-has-submenu.fl-active > .fl-has-submenu-container .fl-menu-toggle{
				-webkit-transform: none;
					-ms-transform: none;
						transform: none;
			}

			<?php //change selector depending on layout ?>
			<?php if ( 'arrows' == $settings->submenu_hover_toggle ) : ?>
				<?php if ( 'horizontal' == $settings->menu_layout ) : ?>
				.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-has-submenu .fl-has-submenu .fl-menu-toggle:before{
				<?php elseif ( 'vertical' == $settings->menu_layout ) : ?>
				.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-has-submenu .fl-menu-toggle:before{
				<?php endif; ?>
					-webkit-transform: translateY( -5px ) rotate( -45deg );
						-ms-transform: translateY( -5px ) rotate( -45deg );
							transform: translateY( -5px ) rotate( -45deg );
				}
			<?php endif; ?>

			<?php if ( 'none' == $settings->submenu_hover_toggle ) : ?>
				.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-has-submenu-container a{
					padding-right: <?php echo $toggle_spacing ?>px;
				}
				.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-menu-toggle{
					display: none;
				}
			<?php endif; ?>

			.fl-node-<?php echo $id; ?> ul.sub-menu {
				padding: <?php echo ! empty( $settings->submenu_spacing ) ? $settings->submenu_spacing . 'px' : '0' ?>;
			}

		<?php endif; ?>

		<?php if ( 'expanded' != $settings->mobile_toggle ) : ?>
			.fl-node-<?php echo $id; ?> .fl-cb-menu-mobile-toggle{
				display: none;
			}
		<?php endif; ?>
	}
	<?php endif; ?>

<?php

/**
 * Responsive NOT enabled
 */
else : ?>

	<?php // if menu is horizontal ?>
	<?php if ( 'horizontal' == $settings->menu_layout ) : ?>

		.fl-node-<?php echo $id; ?> .fl-cb-menu .menu > li{ float: left; }

		.fl-node-<?php echo $id; ?> .menu li{
			border-left: 1px solid transparent;
		}

		.fl-node-<?php echo $id; ?> .menu li:first-child{
			border: none;
		}

		.fl-node-<?php echo $id; ?> .menu li li{
			border-left: 1px solid transparent;
		}

		<?php if ( ! empty( $settings->menu_align ) && 'default' != $settings->menu_align ) : ?>
			.fl-node-<?php echo $id; ?> .fl-cb-menu .menu{
				<?php
				if ( in_array( $settings->menu_align, array( 'left', 'right' ) ) ) {
					echo 'float: ' . $settings->menu_align . ';';
				} elseif ( 'center' == $settings->menu_align ) {
					echo 'display: inline-block;';
				}
				?>
			}
		<?php endif; ?>

	<?php endif; ?>

	<?php // if menu is horizontal or vertical ?>
	<?php if ( in_array( $settings->menu_layout, array( 'horizontal', 'vertical' ) ) ) : ?>

		.fl-node-<?php echo $id; ?> .menu .fl-has-submenu .sub-menu{
			position: absolute;
			top: 100%;
			left: 0;
			z-index: 10;
			visibility: hidden;
			opacity: 0;
		}

		.fl-node-<?php echo $id; ?> .menu .fl-has-submenu .fl-has-submenu .sub-menu{
			top: 0;
			left: 100%;
		}

		.fl-node-<?php echo $id; ?> .fl-cb-menu .menu.fl-toggle-arrows .fl-has-submenu .fl-has-submenu .fl-menu-toggle:before{
			-webkit-transform: translateY( -2px ) rotate( -45deg );
				-ms-transform: translateY( -2px ) rotate( -45deg );
					transform: translateY( -2px ) rotate( -45deg );
		}

		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-has-submenu:hover > .sub-menu,
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-has-submenu.focus > .sub-menu{
			display: block;
			visibility: visible;
			opacity: 1;
		}

		<?php if ( 'none' == $settings->submenu_hover_toggle ) : ?>
			.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-has-submenu-container a{
				padding-right: <?php echo $toggle_spacing ?>px;
			}
			.fl-cb-menu .fl-cb-menu .fl-menu-toggle{
				display: none;
			}
		<?php endif; ?>

	<?php endif; ?>

	<?php if ( 'expanded' != $settings->mobile_toggle ) : ?>
		.fl-node-<?php echo $id; ?> .fl-cb-menu-mobile-toggle{
			display: none;
		}
	<?php endif; ?>

<?php endif;

/**
 * Links
 */
?>
.fl-node-<?php echo $id; ?> .menu a{
	padding-left: <?php echo ! empty( $settings->horizontal_spacing ) ? $settings->horizontal_spacing . 'px' : '0' ?>;
	padding-right: <?php echo ! empty( $settings->horizontal_spacing ) ? $settings->horizontal_spacing . 'px' : '0' ?>;
	padding-top: <?php echo ! empty( $settings->vertical_spacing ) ? $settings->vertical_spacing . 'px' : '0' ?>;
	padding-bottom: <?php echo ! empty( $settings->vertical_spacing ) ? $settings->vertical_spacing . 'px' : '0' ?>;
}

<?php if ( ! empty( $settings->link_color ) ) : ?>
.fl-builder-content .fl-node-<?php echo $id; ?> .menu > li > a,
.fl-builder-content .fl-node-<?php echo $id; ?> .menu > li > .fl-has-submenu-container > a,
.fl-builder-content .fl-node-<?php echo $id; ?> .sub-menu > li > a,
.fl-builder-content .fl-node-<?php echo $id; ?> .sub-menu > li > .fl-has-submenu-container > a{
	color: #<?php echo $settings->link_color ?>;
	<?php if ( ! empty( $settings->link_bg_color ) ) : ?>
		background-color: #<?php echo $settings->link_bg_color ?>;
	<?php endif; ?>
}

	<?php if ( isset( $settings->link_color ) ) : ?>

		<?php if ( ( in_array( $settings->menu_layout, array( 'horizontal', 'vertical' ) ) && in_array( $settings->submenu_hover_toggle, array( 'arrows', 'none' ) ) ) || ( 'accordion' == $settings->menu_layout && 'arrows' == $settings->submenu_click_toggle ) ) : ?>
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-arrows .fl-menu-toggle:before,
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-none .fl-menu-toggle:before {
			border-color: #<?php echo $settings->link_color ?>;
		}
	<?php elseif ( ( in_array( $settings->menu_layout, array( 'horizontal', 'vertical' ) ) && 'plus' == $settings->submenu_hover_toggle ) || ( 'accordion' == $settings->menu_layout && 'plus' == $settings->submenu_click_toggle ) ) : ?>
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-plus .fl-menu-toggle:before,
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-plus .fl-menu-toggle:after{
			border-color: #<?php echo $settings->link_color ?>;
		}
		<?php endif; ?>
	<?php endif; ?>

<?php endif;

/**
 * Links - hover / active
 */
if ( ! empty( $settings->link_hover_bg_color ) || $settings->link_hover_color ) : ?>
.fl-node-<?php echo $id; ?> .menu > li > a:hover,
.fl-node-<?php echo $id; ?> .menu > li > a:focus,
.fl-node-<?php echo $id; ?> .menu > li > .fl-has-submenu-container:hover > a,
.fl-node-<?php echo $id; ?> .menu > li > .fl-has-submenu-container.focus > a,
.fl-node-<?php echo $id; ?> .sub-menu > li > a:hover,
.fl-node-<?php echo $id; ?> .sub-menu > li > a:focus,
.fl-node-<?php echo $id; ?> .sub-menu > li > .fl-has-submenu-container:hover > a,
.fl-node-<?php echo $id; ?> .sub-menu > li > .fl-has-submenu-container.focus > a,
.fl-node-<?php echo $id; ?> .menu > li.current-menu-item > a,
.fl-node-<?php echo $id; ?> .menu > li.current-menu-item > .fl-has-submenu-container > a,
.fl-node-<?php echo $id; ?> .sub-menu > li.current-menu-item > a,
.fl-node-<?php echo $id; ?> .sub-menu > li.current-menu-item > .fl-has-submenu-container > a{
	<?php
	if ( ! empty( $settings->link_hover_bg_color ) ) {
		echo 'background-color: #' . $settings->link_hover_bg_color . ';';
	}
	if ( ! empty( $settings->link_hover_color ) ) {
		echo 'color: #' . $settings->link_hover_color . ';';
	}
	?>
}
<?php endif ?>

<?php if ( ! empty( $settings->link_hover_color ) ) : ?>
		<?php if ( ( in_array( $settings->menu_layout, array( 'horizontal', 'vertical' ) ) && in_array( $settings->submenu_hover_toggle, array( 'arrows', 'none' ) ) ) || ( 'accordion' == $settings->menu_layout && 'arrows' == $settings->submenu_click_toggle ) ) : ?>
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-arrows .fl-has-submenu-container:hover > .fl-menu-toggle:before,
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-arrows .fl-has-submenu-container.focus > .fl-menu-toggle:before,
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-arrows li.current-menu-item >.fl-has-submenu-container > .fl-menu-toggle:before,
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-none .fl-has-submenu-container:hover > .fl-menu-toggle:before,
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-none .fl-has-submenu-container.focus > .fl-menu-toggle:before,
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-none li.current-menu-item >.fl-has-submenu-container > .fl-menu-toggle:before{
			border-color: #<?php echo $settings->link_hover_color ?>;
		}
	<?php elseif ( ( in_array( $settings->menu_layout, array( 'horizontal', 'vertical' ) ) && 'plus' == $settings->submenu_hover_toggle ) || ( 'accordion' == $settings->menu_layout && 'plus' == $settings->submenu_click_toggle ) ) : ?>
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-plus .fl-has-submenu-container:hover > .fl-menu-toggle:before,
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-plus .fl-has-submenu-container.focus > .fl-menu-toggle:before,
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-plus li.current-menu-item > .fl-has-submenu-container > .fl-menu-toggle:before,
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-plus .fl-has-submenu-container:hover > .fl-menu-toggle:after,
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-plus .fl-has-submenu-container.focus > .fl-menu-toggle:after,
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-plus li.current-menu-item > .fl-has-submenu-container > .fl-menu-toggle:after{
			border-color: #<?php echo $settings->link_hover_color ?>;
		}
	<?php endif; ?>

<?php endif;

/**
 * SUB Links - hover / active
 */
if ( ! empty( $settings->sub_link_hover_bg_color ) || $settings->sub_link_hover_color ) : ?>
.fl-node-<?php echo $id; ?> .sub-menu > li > a:hover,
.fl-node-<?php echo $id; ?> .sub-menu > li > a:focus,
.fl-node-<?php echo $id; ?> .sub-menu > li > .fl-has-submenu-container:hover > a,
.fl-node-<?php echo $id; ?> .sub-menu > li > .fl-has-submenu-container.focus > a,
.fl-node-<?php echo $id; ?> .sub-menu > li.current-menu-item > a,
.fl-node-<?php echo $id; ?> .sub-menu > li.current-menu-item > .fl-has-submenu-container > a{
	<?php
	if ( ! empty( $settings->sub_link_hover_bg_color ) ) {
		echo 'background-color: #' . $settings->sub_link_hover_bg_color . ';';
	}
	if ( ! empty( $settings->sub_link_hover_color ) ) {
		echo 'color: #' . $settings->sub_link_hover_color . ';';
	}
	?>
}
<?php endif ?>

<?php if ( ! empty( $settings->sub_link_hover_color ) ) : ?>
		<?php if ( ( in_array( $settings->menu_layout, array( 'horizontal', 'vertical' ) ) && in_array( $settings->submenu_hover_toggle, array( 'arrows', 'none' ) ) ) || ( 'accordion' == $settings->menu_layout && 'arrows' == $settings->submenu_click_toggle ) ) : ?>
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-arrows .fl-has-submenu-container:hover > .fl-menu-toggle:before,
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-arrows .fl-has-submenu-container.focus > .fl-menu-toggle:before,
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-arrows li.current-menu-item >.fl-has-submenu-container > .fl-menu-toggle:before,
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-none .fl-has-submenu-container:hover > .fl-menu-toggle:before,
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-none .fl-has-submenu-container.focus > .fl-menu-toggle:before,
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-none li.current-menu-item >.fl-has-submenu-container > .fl-menu-toggle:before{
			border-color: #<?php echo $settings->sub_link_hover_color ?>;
		}
	<?php elseif ( ( in_array( $settings->menu_layout, array( 'horizontal', 'vertical' ) ) && 'plus' == $settings->submenu_hover_toggle ) || ( 'accordion' == $settings->menu_layout && 'plus' == $settings->submenu_click_toggle ) ) : ?>
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-plus .fl-has-submenu-container:hover > .fl-menu-toggle:before,
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-plus .fl-has-submenu-container.focus > .fl-menu-toggle:before,
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-plus li.current-menu-item > .fl-has-submenu-container > .fl-menu-toggle:before,
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-plus .fl-has-submenu-container:hover > .fl-menu-toggle:after,
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-plus .fl-has-submenu-container.focus > .fl-menu-toggle:after,
		.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-toggle-plus li.current-menu-item > .fl-has-submenu-container > .fl-menu-toggle:after{
			border-color: #<?php echo $settings->sub_link_hover_color ?>;
		}
	<?php endif; ?>

<?php endif;

/**
 * Submenu toggle
 */
if ( ( in_array( $settings->menu_layout, array( 'horizontal', 'vertical' ) ) && in_array( $settings->submenu_hover_toggle, array( 'arrows', 'none' ) ) ) || ( 'accordion' == $settings->menu_layout && 'arrows' == $settings->submenu_click_toggle ) ) : ?>
	.fl-node-<?php echo $id; ?> .fl-cb-menu-<?php echo $settings->menu_layout ?>.fl-toggle-arrows .fl-has-submenu-container a{
		padding-right: <?php echo $toggle_width ?>px;

	}
	.fl-node-<?php echo $id; ?> .fl-cb-menu-<?php echo $settings->menu_layout ?>.fl-toggle-arrows .fl-menu-toggle,
	.fl-node-<?php echo $id; ?> .fl-cb-menu-<?php echo $settings->menu_layout ?>.fl-toggle-none .fl-menu-toggle{
		width: <?php echo $toggle_height ?>px;
		height: <?php echo $toggle_height ?>px;
		margin: -<?php echo $toggle_height / 2 ?>px 0 0;
	}
	.fl-node-<?php echo $id; ?> .fl-cb-menu-horizontal.fl-toggle-arrows .fl-menu-toggle,
	.fl-node-<?php echo $id; ?> .fl-cb-menu-horizontal.fl-toggle-none .fl-menu-toggle,
	.fl-node-<?php echo $id; ?> .fl-cb-menu-vertical.fl-toggle-arrows .fl-menu-toggle,
	.fl-node-<?php echo $id; ?> .fl-cb-menu-vertical.fl-toggle-none .fl-menu-toggle{
		width: <?php echo $toggle_width ?>px;
		height: <?php echo $toggle_height ?>px;
		margin: -<?php echo $toggle_height / 2 ?>px 0 0;
		position: absolute;
		right: 0;
		top: 50%;
	}
<?php elseif ( ( in_array( $settings->menu_layout, array( 'horizontal', 'vertical' ) ) && 'plus' == $settings->submenu_hover_toggle ) || ( 'accordion' == $settings->menu_layout && 'plus' == $settings->submenu_click_toggle ) ) : ?>
	.fl-node-<?php echo $id; ?> .fl-cb-menu-<?php echo $settings->menu_layout ?>.fl-toggle-plus .fl-has-submenu-container a{
		padding-right: <?php echo $toggle_width ?>px;
	}

	.fl-node-<?php echo $id; ?> .fl-cb-menu-accordion.fl-toggle-plus .fl-menu-toggle{
		width: <?php echo $toggle_height ?>px;
		height: <?php echo $toggle_height ?>px;
		margin: -<?php echo $toggle_height / 2 ?>px 0 0;
	}
	.fl-node-<?php echo $id; ?> .fl-cb-menu-horizontal.fl-toggle-plus .fl-menu-toggle,
	.fl-node-<?php echo $id; ?> .fl-cb-menu-vertical.fl-toggle-plus .fl-menu-toggle{
		width: <?php echo $toggle_width ?>px;
		height: <?php echo $toggle_height ?>px;
		margin: -<?php echo $toggle_height / 2 ?>px 0 0;
		position: absolute;
		right: 0;
		top: 50%;
	}
<?php endif;

/**
 * Separators
 */
if ( isset( $settings->show_separator ) && 'yes' == $settings->show_separator ) : ?>
	<?php

		$separator_raw_color = ! empty( $settings->separator_color ) ? $settings->separator_color : '000000';
		$separator_opacity   = ! empty( $settings->separator_opacity ) ? $settings->separator_opacity : '100';
		$separator_color     = 'rgba(' . implode( ',', FLBuilderColor::hex_to_rgb( $separator_raw_color ) ) . ',' . ( $separator_opacity / 100 ) . ')';

		?>
	.fl-node-<?php echo $id; ?> .menu.fl-cb-menu-<?php echo $settings->menu_layout ?> li,
	.fl-node-<?php echo $id; ?> .menu.fl-cb-menu-horizontal li li{
		border-color: #<?php echo $separator_raw_color; ?>;
		border-color: <?php echo $separator_color; ?>;
	}
<?php endif;

/**
 * Mobile toggle button
 */
if ( isset( $settings->mobile_toggle ) && 'expanded' != $settings->mobile_toggle ) : ?>
	<?php if ( 'horizontal' == $settings->menu_layout && ! empty( $settings->menu_align ) && 'default' != $settings->menu_align ) : ?>
		.fl-node-<?php echo $id; ?> .fl-cb-menu-mobile-toggle{
			<?php
			if ( in_array( $settings->menu_align, array( 'left', 'right' ) ) ) {
				echo 'float: ' . $settings->menu_align . ';';
			}
			?>
		}
	<?php endif; ?>

	.fl-node-<?php echo $id; ?> .fl-cb-menu-mobile-toggle{
		<?php
		if ( ! empty( $settings->text_size ) ) {
			echo 'font-size: ' . $settings->text_size . 'px;';
		}
		if ( isset( $settings->text_transform ) ) {
			echo 'text-transform: ' . $settings->text_transform . ';';
		}
		if ( isset( $settings->font_weight ) ) {
			echo 'font-weight: ' . $settings->font_weight . ';';
		}
		if ( ! empty( $settings->link_color ) ) {
			echo 'color: #' . $settings->link_color . ';';
		}
		if ( ! empty( $settings->menu_bg_color ) ) {
			echo 'background-color: #' . $settings->menu_bg_color . ';';
		}

		?>
		padding-left: <?php echo ! empty( $settings->horizontal_spacing ) ? $settings->horizontal_spacing . 'px' : '0' ?>;
		padding-right: <?php echo ! empty( $settings->horizontal_spacing ) ? $settings->horizontal_spacing . 'px' : '0' ?>;
		padding-top: <?php echo ! empty( $settings->vertical_spacing ) ? $settings->vertical_spacing . 'px' : '0' ?>;
		padding-bottom: <?php echo ! empty( $settings->vertical_spacing ) ? $settings->vertical_spacing . 'px' : '0' ?>;
		border-color: rgba( 0,0,0,0.1 );
	}
	.fl-node-<?php echo $id; ?> .fl-cb-menu-mobile-toggle rect{
		<?php
		if ( ! empty( $settings->link_color ) ) {
			echo 'fill: #' . $settings->link_color . ';';
		}
		?>
	}
	.fl-node-<?php echo $id; ?> .fl-cb-menu-mobile-toggle:hover,
	.fl-node-<?php echo $id; ?> .fl-cb-menu-mobile-toggle.fl-active{
		<?php
		if ( ! empty( $settings->link_hover_color ) ) {
			echo 'color: #' . $settings->link_hover_color . ';';
		}
		if ( ! empty( $settings->link_hover_bg_color ) ) {
			echo 'background-color: #' . $settings->link_hover_bg_color . ';';
		}
		?>
	}

	.fl-node-<?php echo $id; ?> .fl-cb-menu-mobile-toggle:hover rect,
	.fl-node-<?php echo $id; ?> .fl-cb-menu-mobile-toggle.fl-active rect{
		<?php
		if ( ! empty( $settings->link_hover_color ) ) {
			echo 'fill: #' . $settings->link_hover_color . ';';
		}
		?>
	}
<?php endif;

if ( isset( $settings->mobile_button_label ) && 'no' == $settings->mobile_button_label ) : ?>
	.fl-node-<?php echo $id; ?> .fl-cb-menu .fl-cb-menu-mobile-toggle.hamburger .fl-cb-menu-mobile-toggle-label{
		display: none;
	}
<?php endif;

/**
 * Mega menus
 */
?>
.fl-node-<?php echo $id; ?> ul.fl-cb-menu-horizontal li.mega-menu > ul.sub-menu > li > .fl-has-submenu-container a:hover {
	color: #<?php echo $settings->link_color ?>;
}

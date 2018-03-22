<?php

/**
 * @class CBCustomMenuModule
 */
class CBCustomMenuModule extends FLBuilderModule {

	/**
	 * @property $fl_builder_page_id
	 */
	public static $fl_builder_page_id;

	/**
	 * @method __construct
	 */
	public function __construct() {
		parent::__construct(array(
			'name'          	=> __( 'CB Advanced Menu', 'cb-custom-modules' ),
			'description'   	=> __( 'Default BB Menu Module but with a solid horizontal submenu.', 'cb-custom-modules' ),
			'group'      	=> __( 'CB Custom Modules', 'cb-custom-modules' ),
			'category'      	=> __( 'Menus', 'cb-custom-modules' ),
			'partial_refresh'	=> true,
			'editor_export' 	=> false,
			'icon'				=> 'hamburger-menu.svg',
		));

		add_action( 'pre_get_posts', 		__CLASS__ . '::set_pre_get_posts_query', 10, 2 );
		add_filter( 'wp_nav_menu_objects',  __CLASS__ . '::sort_nav_objects', 10, 2 );
	}

	public function render_toggle_button() {

		$toggle = $this->settings->mobile_toggle;

		if ( isset( $toggle ) && 'expanded' != $toggle ) {

			if ( in_array( $toggle, array( 'hamburger', 'hamburger-label' ) ) ) {

				echo '<button class="fl-cb-menu-mobile-toggle ' . $toggle . '"><div class="svg-container">';
				include FL_BUILDER_DIR . 'img/svg/hamburger-menu.svg';
				echo '</div>';

				if ( 'hamburger-label' == $toggle ) {
					echo '<span class="fl-cb-menu-mobile-toggle-label">' . __( 'Menu', 'cb-custom-modules' ) . '</span>';
				}

				echo '</button>';

			} elseif ( 'text' == $toggle ) {

				echo '<button class="fl-cb-menu-mobile-toggle text"><span class="fl-cb-menu-mobile-toggle-label">' . __( 'Menu', 'cb-custom-modules' ) . '</span></button>';

			}
		}
	}

	public static function set_pre_get_posts_query( $query ) {
		if ( ! is_admin() && $query->is_main_query() ) {

			if ( $query->queried_object_id ) {

				self::$fl_builder_page_id = $query->queried_object_id;

				// Fix when menu module is rendered via hook
			} elseif ( isset( $query->query_vars['page_id'] ) && 0 != $query->query_vars['page_id'] ) {

				self::$fl_builder_page_id = $query->query_vars['page_id'];

			}
		}
	}

	public static function sort_nav_objects( $sorted_menu_items, $args ) {
		$menu_items = array();
		$parent_items = array();
		foreach ( $sorted_menu_items as $key => $menu_item ) {
			$classes = (array) $menu_item->classes;

			// Setup classes for current menu item.
			if ( $menu_item->ID == self::$fl_builder_page_id ) {
				$parent_items[ $menu_item->object_id ] = $menu_item->menu_item_parent;

				if ( ! in_array( 'current-menu-item', $classes ) ) {
					$classes[] = 'current-menu-item';

					if ( 'page' == $menu_item->object ) {
						$classes[] = 'current_page_item';
					}
				}
			}
			$menu_item->classes = $classes;
			$menu_items[ $key ] = $menu_item;
		}

		// Setup classes for parent's current item.
		foreach ( $menu_items as $key => $sorted_item ) {
			if ( in_array( $sorted_item->db_id, $parent_items ) && ! in_array( 'current-menu-parent', (array) $sorted_item->classes ) ) {
				$menu_items[ $key ]->classes[] = 'current-menu-ancestor';
				$menu_items[ $key ]->classes[] = 'current-menu-parent';
			}
		}

		return $menu_items;
	}

	public function get_media_breakpoint() {
		$global_settings = FLBuilderModel::get_global_settings();
		$media_width = $global_settings->responsive_breakpoint;
		$mobile_breakpoint = $this->settings->mobile_breakpoint;

		if ( isset( $mobile_breakpoint ) && 'expanded' != $this->settings->mobile_toggle ) {
			if ( 'medium-mobile' == $mobile_breakpoint ) {
				$media_width = $global_settings->medium_breakpoint;
			} elseif ( 'mobile' == $this->settings->mobile_breakpoint ) {
				$media_width = $global_settings->responsive_breakpoint;
			} elseif ( 'always' == $this->settings->mobile_breakpoint ) {
				$media_width = 'always';
			}
		}

		return $media_width;
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('CBCustomMenuModule', array(
	'general'       => array( // Tab
		'title'         => __( 'General', 'cb-custom-modules' ), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => '', // Section Title
				'fields'        => array( // Section Fields
					'menu' => FLMenuModule::_get_menus(),
					'menu_layout' => array(
						'type'          => 'select',
						'label'         => __( 'Layout', 'cb-custom-modules' ),
						'default'       => 'horizontal',
						'options'       => array(
							'horizontal'	=> __( 'Pancake', 'cb-custom-modules' ),
						),
						'toggle'		=> array(
							'horizontal'	=> array(
								'fields'		=> array( 'submenu_hover_toggle', 'menu_align' ),
							),
							'vertical'		=> array(
								'fields'		=> array( 'submenu_hover_toggle' ),
							),
							'accordion'		=> array(
								'fields'		=> array( 'submenu_click_toggle', 'collapse' ),
							),
						),
					),
					'submenu_hover_toggle' => array(
						'type'          => 'select',
						'label'         => __( 'Submenu Icon', 'cb-custom-modules' ),
						'default'       => 'none',
						'options'       => array(
							'arrows'		=> __( 'Arrows', 'cb-custom-modules' ),
							'plus'			=> __( 'Plus sign', 'cb-custom-modules' ),
							'none'			=> __( 'None', 'cb-custom-modules' ),
						),
					),
					'submenu_click_toggle' => array(
						'type'          => 'select',
						'label'         => __( 'Submenu Icon click', 'cb-custom-modules' ),
						'default'       => 'arrows',
						'options'       => array(
							'arrows'		=> __( 'Arrows', 'cb-custom-modules' ),
							'plus'			=> __( 'Plus sign', 'cb-custom-modules' ),
						),
					),
					'collapse'   => array(
						'type'          => 'select',
						'label'         => __( 'Collapse Inactive', 'cb-custom-modules' ),
						'default'       => '1',
						'options'       => array(
							'1'             => __( 'Yes', 'cb-custom-modules' ),
							'0'             => __( 'No', 'cb-custom-modules' ),
						),
						'help'          => __( 'Choosing yes will keep only one item open at a time. Choosing no will allow multiple items to be open at the same time.', 'cb-custom-modules' ),
						'preview'       => array(
							'type'          => 'none',
						),
					),
					'persist_active'   => array(
						'type'          => 'select',
						'label'         => __( 'Persistent Active Submenu', 'cb-custom-modules' ),
						'default'       => '0',
						'options'       => array(
						'0'             => __( 'No', 'cb-custom-modules' ),
							'1'             => __( 'Yes', 'cb-custom-modules' ),
						),
						'help'          => __( 'Choosing yes will always display the submenu if it contains the current page.', 'cb-custom-modules' ),
						'preview'       => array(
							'type'          => 'none',
						),
					),
				),
			),
			'mobile'       => array(
				'title'         => __( 'Responsive', 'cb-custom-modules' ),
				'fields'        => array(
					'mobile_toggle' => array(
						'type'          => 'select',
						'label'         => __( 'Responsive Toggle', 'cb-custom-modules' ),
						'default'       => 'hamburger',
						'options'       => array(
							'hamburger'			=> __( 'Hamburger Icon', 'cb-custom-modules' ),
							'hamburger-label'	=> __( 'Hamburger Icon + Label', 'cb-custom-modules' ),
							'text'				=> __( 'Menu Button', 'cb-custom-modules' ),
							'expanded'			=> __( 'None', 'cb-custom-modules' ),
						),
						'toggle'		=> array(
							'hamburger'	=> array(
								'fields'		=> array( 'mobile_full_width', 'mobile_breakpoint' ),
							),
							'hamburger-label'	=> array(
								'fields'		=> array( 'mobile_full_width', 'mobile_breakpoint' ),
							),
							'text'	=> array(
								'fields'		=> array( 'mobile_breakpoint' ),
							),
						),
					),
					'mobile_full_width' => array(
						'type'          => 'select',
						'label'         => __( 'Responsive Style', 'cb-custom-modules' ),
						'default'       => 'no',
						'options'       => array(
							'no'			=> __( 'Inline', 'cb-custom-modules' ),
							'below'			=> __( 'Below Row', 'cb-custom-modules' ),
							'yes'			=> __( 'Overlay', 'cb-custom-modules' ),
						),
						'toggle'		=> array(
							'yes'	=> array(
								'fields'		=> array( 'mobile_menu_bg' ),
							),
							'below'	=> array(
								'fields'		=> array( 'mobile_menu_bg' ),
							),
						),
					),
					'mobile_breakpoint' => array(
						'type'          => 'select',
						'label'         => __( 'Responsive Breakpoint', 'cb-custom-modules' ),
						'default'       => 'mobile',
						'options'       => array(
							'always'		=> __( 'Always', 'cb-custom-modules' ),
							'medium-mobile'	=> __( 'Medium & Small Devices Only', 'cb-custom-modules' ),
							'mobile'		=> __( 'Small Devices Only', 'cb-custom-modules' ),
						),
					),
				),
			),
		),
	),
	'stylemain'         => array( // Tab
		'title'         => __( 'Main Styles', 'cb-custom-modules' ), // Tab title
		'sections'      => array( // Tab Sections
			'general_style'    => array(
				'title'         => '',
				'fields'        => array(
					'menu_align' => array(
						'type'          => 'select',
						'label'         => __( 'Menu Alignment', 'cb-custom-modules' ),
						'default'       => 'default',
						'options'       => array(
							'default'		=> __( 'Default', 'cb-custom-modules' ),
							'left'			=> __( 'Left', 'cb-custom-modules' ),
							'center'		=> __( 'Center', 'cb-custom-modules' ),
							'right'			=> __( 'Right', 'cb-custom-modules' ),
						),
					),
					'drop_shadow' => array(
						'type'          => 'select',
						'label'         => __( 'Submenu Drop Shadow', 'cb-custom-modules' ),
						'default'       => 'yes',
						'options'       => array(
							'no'			=> __( 'No', 'cb-custom-modules' ),
							'yes'			=> __( 'Yes', 'cb-custom-modules' ),
						),
					),
				),
			),
			'spacing'    	=> array(
				'title'         => __( 'Spacing', 'cb-custom-modules' ),
				'fields'        => array(
					'horizontal_spacing' => array(
						'type'          => 'text',
						'label'         => __( 'Link Horizontal Spacing', 'cb-custom-modules' ),
						'default'       => '14',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'      => array(
							'type'         => 'css',
							'rules'		   => array(
								array(
									'selector'     => '.menu a',
									'property'     => 'padding-left',
									'unit'		   => 'px',
								),
								array(
									'selector'     => '.menu a',
									'property'     => 'padding-right',
									'unit'		   => 'px',
								),
							),
						),
					),
					'vertical_spacing' => array(
						'type'          => 'text',
						'label'         => __( 'Link Vertical Spacing', 'cb-custom-modules' ),
						'default'       => '10',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'      => array(
							'type'         => 'css',
							'rules'		   => array(
								array(
									'selector'     => '.menu a',
									'property'     => 'padding-top',
									'unit'		   => 'px',
								),
								array(
									'selector'     => '.menu a',
									'property'     => 'padding-bottom',
									'unit'		   => 'px',
								),
							),
						),
					),
				),
			),
			'text_style'    => array(
				'title'         => __( 'Text', 'cb-custom-modules' ),
				'fields'        => array(
					'link_color'    => array(
						'type'          => 'color',
						'label'         => __( 'Link Color', 'cb-custom-modules' ),
						'show_reset'    => true,
						'preview'      => array(
							'type'         => 'css',
							'rules'		   => array(
								array(
									'selector'     => '.fl-cb-menu a, .menu > li > a, .menu > li > .fl-has-submenu-container > a, .sub-menu > li > a',
									'property'     => 'color',
								),
								array(
									'selector'     => '.menu .fl-cb-menu-toggle:before, .menu .fl-cb-menu-toggle:after',
									'property'     => 'border-color',
								),
							),
						),
					),
					'link_hover_color' => array(
						'type'          => 'color',
						'label'         => __( 'Link Hover Color', 'cb-custom-modules' ),
						'show_reset'    => true,
						'preview'      => array(
							'type'         => 'css',
							'selector'     => '.fl-cb-menu a, .menu > li.current-menu-item > a, .menu > li.current-menu-item > .fl-has-submenu-container > a, .sub-menu > li.current-menu-item > a',
							'property'     => 'color',
						),
					),
					'font'          => array(
						'type'          => 'font',
						'default'		=> array(
							'family'		=> 'Default',
							'weight'		=> 300,
						),
						'label'         => __( 'Link Font', 'cb-custom-modules' ),
						'preview'         => array(
							'type'            => 'font',
							'selector'        => '.menu',
						),
					),
					'text_size' => array(
						'type'          => 'text',
						'label'         => __( 'Link Size', 'cb-custom-modules' ),
						'default'       => '16',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'      => array(
							'type'         => 'css',
							'selector'     => '.menu',
							'property'     => 'font-size',
							'unit'		   => 'px',
						),
					),
					'text_transform' => array(
						'type'          => 'select',
						'label'         => __( 'Link Format', 'cb-custom-modules' ),
						'default'       => 'none',
						'options'       => array(
							'none'			=> __( 'None', 'cb-custom-modules' ),
							'uppercase'		=> __( 'Uppercase', 'cb-custom-modules' ),
							'lowercase'		=> __( 'Lowercase', 'cb-custom-modules' ),
							'capitalize'	=> __( 'Capitalize', 'cb-custom-modules' ),
						),
						'preview'      => array(
							'type'         => 'css',
							'selector'     => '.menu',
							'property'     => 'text-transform',
						),
					),
				),
			),
			'menu_style'    => array(
				'title'         => __( 'Backgrounds', 'cb-custom-modules' ),
				'fields'        => array(
					'menu_bg_color'   => array(
						'type'          => 'color',
						'label'         => __( 'Menu Background Color', 'cb-custom-modules' ),
						'show_reset'    => true,
						'preview'      => array(
							'type'         => 'css',
							'selector'     => '.menu',
							'property'     => 'background-color',
						),
					),
					'mobile_menu_bg'   => array(
						'type'          => 'color',
						'label'         => __( 'Menu Background Color (Mobile)', 'cb-custom-modules' ),
						'show_reset'    => true,
					),
					'menu_bg_opacity' => array(
						'type'          => 'text',
						'label'         => __( 'Menu Background Opacity', 'cb-custom-modules' ),
						'default'       => '100',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => '%',
					),
					'link_hover_bg_color' => array(
						'type'          => 'color',
						'label'         => __( 'Link Background Hover Color', 'cb-custom-modules' ),
						'show_reset'    => true,
						'preview'      => array(
							'type'         => 'css',
							'selector'     => '.menu > li.current-menu-item > a, .menu > li.current-menu-item > .fl-has-submenu-container > a',
							'property'     => 'background-color',
						),
					),
				),
			),
			'separator_style'    => array(
				'title'         => __( 'Separator', 'cb-custom-modules' ),
				'fields'        => array(
					'show_separator' => array(
						'type'          => 'select',
						'label'         => __( 'Show Separators', 'cb-custom-modules' ),
						'default'       => 'no',
						'options'       => array(
							'no'			=> __( 'No', 'cb-custom-modules' ),
							'yes'			=> __( 'Yes', 'cb-custom-modules' ),
						),
						'toggle'		=> array(
							'yes'			=> array(
								'fields'		=> array( 'separator_color', 'separator_opacity' ),
							),
						),
					),
					'separator_color'   => array(
						'type'          => 'color',
						'label'         => __( 'Separator Color', 'cb-custom-modules' ),
						'show_reset'    => true,
					),
					'separator_opacity' => array(
						'type'          => 'text',
						'label'         => __( 'Separator Opacity', 'cb-custom-modules' ),
						'default'       => '100',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => '%',
					),
				),
			),
		),
	),
	'stylesub'         => array( // Tab
		'title'         => __( 'Sub Level Styles', 'cb-custom-modules' ), // Tab title
		'sections'      => array( // Tab Sections
			'spacing'    	=> array(
				'title'         => __( 'Spacing', 'cb-custom-modules' ),
				'fields'        => array(
					'submenu_spacing' => array(
						'type'          => 'text',
						'label'         => __( 'Submenu Spacing', 'cb-custom-modules' ),
						'default'       => '0',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'      => array(
							'type'         => 'none',
						),
					),
				),
			),
			'text_style'    => array(
				'title'         => __( 'Text', 'cb-custom-modules' ),
				'fields'        => array(
					'sub_link_hover_color' => array(
						'type'          => 'color',
						'label'         => __( 'Sub Menu Link Hover Color', 'cb-custom-modules' ),
						'show_reset'    => true,
						'preview'      => array(
							'type'         => 'css',
							'selector'     => '.sub-menu > li.current-menu-item > a',
							'property'     => 'color',
						),
					),
					'sub_link_hover_bg_color' => array(
						'type'          => 'color',
						'label'         => __( 'Sub Menu Link Background Hover Color', 'cb-custom-modules' ),
						'show_reset'    => true,
						'preview'      => array(
							'type'         => 'css',
							'selector'     => '.sub-menu > li.current-menu-item > a, .sub-menu > li.current-menu-item > .fl-has-submenu-container > a',
							'property'     => 'background-color',
						),
					),
				),
			),
			'menu_style'    => array(
				'title'         => __( 'Backgrounds', 'cb-custom-modules' ),
				'fields'        => array(
					'submenu_bg_color' => array(
						'type'          => 'color',
						'label'         => __( 'Submenu Background Color', 'cb-custom-modules' ),
						'show_reset'    => true,
						'default'		=> 'ffffff',
						'preview'      => array(
							'type'         => 'css',
							'selector'     => '.fl-cb-menu .sub-menu',
							'property'     => 'background-color',
						),
					),
					'submenu_bg_opacity' => array(
						'type'          => 'text',
						'label'         => __( 'Submenu Background Opacity', 'cb-custom-modules' ),
						'default'       => '100',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => '%',
					),
					'sub_submenu_bg_color' => array(
						'type'          => 'color',
						'label'         => __( 'Second Submenu Background Color', 'cb-custom-modules' ),
						'show_reset'    => true,
						'default'		=> 'ffffff',
						'preview'      => array(
							'type'         => 'css',
							'selector'     => '.fl-cb-menu .sub-menu .sub-menu',
							'property'     => 'background-color',
						),
					),
					'sub_submenu_bg_opacity' => array(
						'type'          => 'text',
						'label'         => __( 'Second Submenu Background Opacity', 'cb-custom-modules' ),
						'default'       => '100',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => '%',
					),
				),
			),
		),
	),
));

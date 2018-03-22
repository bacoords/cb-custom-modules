<?php

/**
 * This is an example module with only the basic
 * setup necessary to get it working.
 *
 * @class CBCustomScoutModule
 */
class CBCustomScoutModule extends FLBuilderModule {

    /**
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Scout', 'cb-custom-modules'),
            'description'   => __('Sticky Navbar.', 'cb-custom-modules'),
            'group'		=> __('CB Custom Modules', 'cb-custom-modules'),
            'category'		=> __('Menus', 'cb-custom-modules'),
            'icon'        => 'hamburger-menu.svg',
            'dir'           => CB_CUSTOM_MODULE_DIR . 'cb-scout/',
            'url'           => CB_CUSTOM_MODULE_URL . 'cb-scout/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
						'partial_refresh' => true,
        ));
      $this->add_css('font-awesome');
    }

    public function responsive_breakpoint()
    {
      $settings = FLBuilderModel::get_global_settings();
      return $settings->responsive_breakpoint;
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('CBCustomScoutModule', array(
      'links'       => array( // Tab
        'title'         => __('Menu Items', 'cb-custom-modules'), // Tab title
        'sections'      => array( // Tab Sections
            'links'       => array( // Section
                'title'         => __('Menu Items', 'cb-custom-modules'), // Section Title
                'fields'        => array( // Section Fields
					'cb_scout_form_field_repeater' => array(
							'type'          => 'form',
							'label'         => __('Link', 'cb-custom-modules'),
							'form'          => 'cb_scout_form_field', // ID of a registered form.
							'preview_text'  => 'cb_scout_link_text', // ID of a field to use for the preview text.
							'multiple' 			=> true,
					),
                )
            )
        )
    ),
    'general'       => array( // Tab
        'title'         => __('Design', 'cb-custom-modules'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('Design', 'cb-custom-modules'), // Section Title
                'fields'        => array( // Section Fields
                    'cb_scout_elem_bg_color' => array(
                        'type'          => 'color',
                        'default'       => 'FFFFFF',
                        'label'         => __( 'Menu Background Color', 'cb-custom-modules' ),
                        'show_reset'    => true
                    ),
                    'cb_scout_text_align' => array(
                        'type'          => 'select',
                        'label'         => __( 'Menu Items Alignment', 'cb-custom-modules' ),
                        'default'       => 'center',
                        'options'       => array(
                            'center'      => __( 'Center', 'cb-custom-modules' ),
                            'flex-start'      => __( 'Left Side', 'cb-custom-modules' ),
                            'flex-end'      => __( 'Right Side', 'cb-custom-modules' ),
                            'space-between' => __( 'Spread Evently', 'cb-custom-modules')
                        ),
                    ),
                    'cb_scout_first_active' => array(
                        'type'          => 'select',
                        'label'         => __( 'First Element Active', 'cb-custom-modules' ),
                        'default'       => 'false',
                        'help'          => __( 'Apply active styles to first menu item by default.', 'cb-custom-modules' ),
                        'options'       => array(
                            'false' => __( 'No', 'cb-custom-modules'),
                            'true'      => __( 'Yes', 'cb-custom-modules' )
                        ),
                    ),
                    'cb_scout_responsive' => array(
                        'type'          => 'select',
                        'label'         => __( 'Responsive Behavior', 'cb-custom-modules' ),
                        'default'       => 'stay',
                        'help'          => __( 'How to adapt for mobile screens.', 'cb-custom-modules' ),
                        'options'       => array(
                            'stay' => __( 'Don\'t Fix To Top', 'cb-custom-modules'),
                            'icon'      => __( 'Fix To Top, Use Icon to Toggle', 'cb-custom-modules' ),
                            'stack'      => __( 'Fix To Top, Wrap Items', 'cb-custom-modules' )
                        ),
                    ),
                  'cb_scout_offset' => array(
                      'type'          => 'text',
                      'label'         => __( 'Offset from top', 'cb-custom-modules' ),
                      'default'       => '0',
                      'maxlength'     => '3',
                      'size'          => '3',
                      'placeholder'   => __( '0', 'cb-custom-modules' ),
                      'description'   => __( 'px', 'cb-custom-modules' ),
                      'help'          => __( 'Leave some space from the top of the window when element gets sticky to account for a menu or navigation bar. If Beaver Builder Bar or WP Admin Bar is showing, Scout rests directly below.', 'cb-custom-modules' )
                  ),
                  )
              ),
            'colors'       => array( // Section
                'title'         => __('Colors', 'cb-custom-modules'), // Section Title

                'fields'        => array( // Section Fields
                    'cb_scout_text_color_main' => array(
                        'type'          => 'color',
                        'label'         => __( 'Text Color', 'cb-custom-modules' ),
                        'show_reset'    => true
                    ),
                    'cb_scout_text_color_hover' => array(
                        'type'          => 'color',
                        'label'         => __( 'Hover Text Color', 'cb-custom-modules' ),
                        'show_reset'    => true
                    ),
                    'cb_scout_text_color_active' => array(
                        'type'          => 'color',
                        'label'         => __( 'Active Text Color', 'cb-custom-modules' ),
                        'show_reset'    => true
                    ),
                    'cb_scout_bg_color_main' => array(
                        'type'          => 'color',
                        'label'         => __( 'Background Color', 'cb-custom-modules' ),
                        'show_reset'    => true
                    ),
                    'cb_scout_bg_color_hover' => array(
                        'type'          => 'color',
                        'label'         => __( 'Hover Background Color', 'cb-custom-modules' ),
                        'show_reset'    => true
                    ),
                    'cb_scout_bg_color_active' => array(
                        'type'          => 'color',
                        'label'         => __( 'Active Background Color', 'cb-custom-modules' ),
                        'show_reset'    => true
                    ),
                )
            ),
          )
      )
));


/**
 * Register form
 */
FLBuilder::register_settings_form('cb_scout_form_field', array(
    'title' => __('New Link', 'cb-custom-modules'),
    'tabs'  => array(
        'image'      => array(
            'title'         => __('Link', 'cb-custom-modules'),
            'sections'      => array(
                'general'       => array(
                    'title'         => '',
                    'fields'        => array(
                        'cb_scout_link_url' => array(
                            'type'          => 'link',
                            'label'         => __('Link Field', 'cb-custom-modules'),
							'connections'   => array( 'url' )
                        ),
						'cb_scout_link_text' => array(
							'type'          => 'text',
							'label'         => __( 'Link Text', 'cb-custom-modules' ),
							'default'       => '',
							'maxlength'     => '50',
							'size'          => '45',
							'placeholder'   => __( 'Link Text Here', 'cb-custom-modules' ),
							'class'         => 'my-css-class',
							'description'   => __( '', 'cb-custom-modules' ),
							'connections'   => array( 'string' )
						),
                    )
                ),
            )
        )
    )
));

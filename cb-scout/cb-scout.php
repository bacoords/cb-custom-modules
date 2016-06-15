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
            'name'          => __('Scout', 'fl-builder'),
            'description'   => __('Sticky Navbar.', 'fl-builder'),
            'category'		=> __('CB Custom Modules', 'fl-builder'),
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
        'title'         => __('Menu Items', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'links'       => array( // Section
                'title'         => __('Menu Items', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
										'cb_scout_form_field_repeater' => array(
												'type'          => 'form',
												'label'         => __('Link', 'fl-builder'),
												'form'          => 'cb_scout_form_field', // ID of a registered form.
												'preview_text'  => 'cb_scout_link_text', // ID of a field to use for the preview text.
												'multiple' 			=> true,
										),
                )
            )
        )
    ),
    'general'       => array( // Tab
        'title'         => __('Design', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('Design', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'cb_scout_elem_bg_color' => array(
                        'type'          => 'color',
                        'default'       => 'FFFFFF',
                        'label'         => __( 'Menu Background Color', 'fl-builder' ),
                        'show_reset'    => true
                    ),
                    'cb_scout_text_align' => array(
                        'type'          => 'select',
                        'label'         => __( 'Menu Items Alignment', 'fl-builder' ),
                        'default'       => 'center',
                        'options'       => array(
                            'center'      => __( 'Center', 'fl-builder' ),
                            'flex-start'      => __( 'Left Side', 'fl-builder' ),
                            'flex-end'      => __( 'Right Side', 'fl-builder' ),
                            'space-between' => __( 'Spread Evently', 'fl-builder')
                        ),
                    ),
                    'cb_scout_first_active' => array(
                        'type'          => 'select',
                        'label'         => __( 'First Element Active', 'fl-builder' ),
                        'default'       => 'false',
                        'help'          => __( 'Apply active styles to first menu item by default.', 'fl-builder' ),
                        'options'       => array(
                            'false' => __( 'No', 'fl-builder'),
                            'true'      => __( 'Yes', 'fl-builder' )
                        ),
                    ),
                    'cb_scout_responsive' => array(
                        'type'          => 'select',
                        'label'         => __( 'Responsive Behavior', 'fl-builder' ),
                        'default'       => 'stay',
                        'help'          => __( 'How to adapt for mobile screens.', 'fl-builder' ),
                        'options'       => array(
                            'stay' => __( 'Don\'t Fix To Top', 'fl-builder'),
                            'icon'      => __( 'Fix To Top, Use Icon to Toggle', 'fl-builder' ),
                            'stack'      => __( 'Fix To Top, Wrap Items', 'fl-builder' )
                        ),
                    ),
                  )
              ),
            'colors'       => array( // Section
                'title'         => __('Colors', 'fl-builder'), // Section Title
              
                'fields'        => array( // Section Fields
                    'cb_scout_text_color_main' => array(
                        'type'          => 'color',
                        'label'         => __( 'Text Color', 'fl-builder' ),
                        'show_reset'    => true
                    ),
                    'cb_scout_text_color_hover' => array(
                        'type'          => 'color',
                        'label'         => __( 'Hover Text Color', 'fl-builder' ),
                        'show_reset'    => true
                    ),
                    'cb_scout_text_color_active' => array(
                        'type'          => 'color',
                        'label'         => __( 'Active Text Color', 'fl-builder' ),
                        'show_reset'    => true
                    ),
                    'cb_scout_bg_color_main' => array(
                        'type'          => 'color',
                        'label'         => __( 'Background Color', 'fl-builder' ),
                        'show_reset'    => true
                    ),
                    'cb_scout_bg_color_hover' => array(
                        'type'          => 'color',
                        'label'         => __( 'Hover Background Color', 'fl-builder' ),
                        'show_reset'    => true
                    ),
                    'cb_scout_bg_color_active' => array(
                        'type'          => 'color',
                        'label'         => __( 'Active Background Color', 'fl-builder' ),
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
    'title' => __('New Link', 'fl-builder'),
    'tabs'  => array(
        'image'      => array(
            'title'         => __('Link', 'fl-builder'),
            'sections'      => array(
                'general'       => array(
                    'title'         => '',
                    'fields'        => array(
                        'cb_scout_link_url' => array(
                            'type'          => 'link',
                            'label'         => __('Link Field', 'fl-builder')
                        ),
												'cb_scout_link_text' => array(
														'type'          => 'text',
														'label'         => __( 'Link Text', 'fl-builder' ),
														'default'       => '',
														'maxlength'     => '50',
														'size'          => '45',
														'placeholder'   => __( 'Link Text Here', 'fl-builder' ),
														'class'         => 'my-css-class',
														'description'   => __( '', 'fl-builder' )
												),
                    )
                ),
            )
        )
    )
));
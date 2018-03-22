<?php

/**
 * This is an example module with only the basic
 * setup necessary to get it working.
 *
 * @class CBCustomSpotlightModule
 */
class CBCustomSpotlightModule extends FLBuilderModule {

    /**
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Spotlight', 'cb-custom-modules'),
            'description'   => __('Let your viewer spotlight an image.', 'cb-custom-modules'),
            'group'		=> __('CB Custom Modules', 'cb-custom-modules'),
            'category'		=> __('Galleries', 'cb-custom-modules'),
            'icon'      => 'format-image.svg',
            'dir'           => CB_CUSTOM_MODULE_DIR . 'cb-spotlight/',
            'url'           => CB_CUSTOM_MODULE_URL . 'cb-spotlight/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
//						'partial_refresh' => true,
        ));
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('CBCustomSpotlightModule', array(
    'general'       => array( // Tab
        'title'         => __('General', 'cb-custom-modules'), // Tab title
        'sections'      => array( // Tab Sections
            'settings'       => array( // Section
                'title'         => __('Settings', 'cb-custom-modules'), // Section Title
                'fields'        => array( // Section Fields
					'cb_spotlight_text_field' => array(
							'type'          => 'text',
							'label'         => __( 'Header Text', 'cb-custom-modules' ),
							'default'       => '',
							'placeholder'   => __( 'Select an Image', 'cb-custom-modules' ),
							'class'         => 'my-css-class',
							'help'          => __( 'Set a header.', 'cb-custom-modules' ),
							'connections'   => array( 'string' )
					),
                    'cb_spotlight_column_order' => array(
                        'type'          => 'select',
                        'label'         => __( 'Select Column Order', 'cb-custom-modules' ),
                        'default'       => 'txph',
                        'options'       => array(
                            'txph'      => __( 'Text | Photos', 'cb-custom-modules' ),
                            'phtx'      => __( 'Photos | Text', 'cb-custom-modules' )
                        )
                    ),
                    'cb_spotlight_column_widths' => array(
                        'type'          => 'select',
                        'label'         => __( 'Select Column Widths', 'cb-custom-modules' ),
                        'default'       => '75/25',
                        'options'       => array(
                            '50/50'      => __( '50% | 50%', 'cb-custom-modules' ),
                            '75/25'      => __( '75% | 25%', 'cb-custom-modules' ),
                            '25/75'      => __( '25% | 75%', 'cb-custom-modules' ),
                            '66/34'      => __( '2/3  |  1/3', 'cb-custom-modules' ),
                            '34/66'      => __( '1/3  |  2/3', 'cb-custom-modules' )
                        ),
						'help'          => __( 'This applies to medium-sized screens and above. On smaller screens, the columns will collapse.', 'cb-custom-modules' )
                    ),
                )
            ),
            'design'       => array( // Section
                'title'         => __('Spotlight Images', 'cb-custom-modules'), // Section Title
                'fields'        => array( // Section Fields
				'cb_spotlight_form_field_repeater' => array(
						'type'          => 'form',
						'label'         => __('Spotlight Image', 'cb-custom-modules'),
						'form'          => 'cb_spotlight_form_field', // ID of a registered form.
						'preview_text'  => 'cb_spotlight_text_field', // ID of a field to use for the preview text.
						'multiple' 			=> true,
				),
)
            ),
        )
    )
));

/**
 * Register form
 */
FLBuilder::register_settings_form('cb_spotlight_form_field', array(
    'title' => __('New Image', 'cb-custom-modules'),
    'tabs'  => array(
        'image'      => array(
            'title'         => __('Spotlight Image', 'cb-custom-modules'),
            'sections'      => array(
                'general'       => array(
                    'title'         => '',
                    'fields'        => array(
						'cb_spotlight_photo_field' => array(
								'type'          => 'photo',
								'label'         => __('Spotlight Image', 'cb-custom-modules'),
								'show_remove'	=> false,
								'connections'   => array( 'photo' )
						),
						'cb_spotlight_text_field' => array(
								'type'          => 'text',
								'label'         => __( 'Spotlight Image Link Text', 'cb-custom-modules' ),
								'default'       => '',
								'maxlength'     => '140',
								'size'          => '45',
								'placeholder'   => __( 'Describe image here', 'cb-custom-modules' ),
								'class'         => 'my-css-class',
								'description'   => __( '', 'cb-custom-modules' ),
								'help'          => __( 'Users will click on this text to load this image.', 'cb-custom-modules' ),
								'connections'   => array( 'string' )
						),
                    )
                ),
            )
        )
    )
));

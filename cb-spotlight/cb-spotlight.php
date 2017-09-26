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
            'name'          => __('Spotlight', 'fl-builder'),
            'description'   => __('Let your viewer spotlight an image.', 'fl-builder'),
            'category'		=> __('CB Custom Modules', 'fl-builder'),
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
        'title'         => __('General', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'settings'       => array( // Section
                'title'         => __('Settings', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
					'cb_spotlight_text_field' => array(
							'type'          => 'text',
							'label'         => __( 'Header Text', 'fl-builder' ),
							'default'       => '',
							'placeholder'   => __( 'Select an Image', 'fl-builder' ),
							'class'         => 'my-css-class',
							'help'          => __( 'Set a header.', 'fl-builder' ),
							'connections'   => array( 'string' )
					),
                    'cb_spotlight_column_order' => array(
                        'type'          => 'select',
                        'label'         => __( 'Select Column Order', 'fl-builder' ),
                        'default'       => 'txph',
                        'options'       => array(
                            'txph'      => __( 'Text | Photos', 'fl-builder' ),
                            'phtx'      => __( 'Photos | Text', 'fl-builder' )
                        )
                    ),
                    'cb_spotlight_column_widths' => array(
                        'type'          => 'select',
                        'label'         => __( 'Select Column Widths', 'fl-builder' ),
                        'default'       => '75/25',
                        'options'       => array(
                            '50/50'      => __( '50% | 50%', 'fl-builder' ),
                            '75/25'      => __( '75% | 25%', 'fl-builder' ),
                            '25/75'      => __( '25% | 75%', 'fl-builder' ),
                            '66/34'      => __( '2/3  |  1/3', 'fl-builder' ),
                            '34/66'      => __( '1/3  |  2/3', 'fl-builder' )
                        ),
						'help'          => __( 'This applies to medium-sized screens and above. On smaller screens, the columns will collapse.', 'fl-builder' )
                    ),
                )
            ),
            'design'       => array( // Section
                'title'         => __('Spotlight Images', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
				'cb_spotlight_form_field_repeater' => array(
						'type'          => 'form',
						'label'         => __('Spotlight Image', 'fl-builder'),
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
    'title' => __('New Image', 'fl-builder'),
    'tabs'  => array(
        'image'      => array(
            'title'         => __('Spotlight Image', 'fl-builder'),
            'sections'      => array(
                'general'       => array(
                    'title'         => '',
                    'fields'        => array(
						'cb_spotlight_photo_field' => array(
								'type'          => 'photo',
								'label'         => __('Spotlight Image', 'fl-builder'),
								'show_remove'	=> false,
								'connections'   => array( 'photo' )
						),
						'cb_spotlight_text_field' => array(
								'type'          => 'text',
								'label'         => __( 'Spotlight Image Link Text', 'fl-builder' ),
								'default'       => '',
								'maxlength'     => '140',
								'size'          => '45',
								'placeholder'   => __( 'Describe image here', 'fl-builder' ),
								'class'         => 'my-css-class',
								'description'   => __( '', 'fl-builder' ),
								'help'          => __( 'Users will click on this text to load this image.', 'fl-builder' ),
								'connections'   => array( 'string' )
						),
                    )
                ),
            )
        )
    )
));
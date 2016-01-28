<?php

/**
 * This is an example module with only the basic
 * setup necessary to get it working.
 *
 * @class CBCustomPoiseModule
 */
class CBCustomPoiseModule extends FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Poise (CB Custom)', 'fl-builder'),
            'description'   => __('Display elements with poise.', 'fl-builder'),
            'category'		=> __('CB Custom Modules', 'fl-builder'),
            'dir'           => CB_CUSTOM_MODULE_DIR . 'poise/',
            'url'           => CB_CUSTOM_MODULE_URL . 'poise/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
//						'partial_refresh' => true,
        ));
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('CBCustomPoiseModule', array(
    'general'       => array( // Tab
        'title'         => __('General', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'design'       => array( // Section
                'title'         => __('Design', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
										'cb_poise_text_field' => array(
												'type'          => 'text',
												'label'         => __( 'Columns', 'fl-builder' ),
												'default'       => '',
												'maxlength'     => '2',
												'size'          => '4',
												'placeholder'   => __( '5', 'fl-builder' ),
												'class'         => 'my-css-class',
												'description'   => __( 'columns', 'fl-builder' ),
												'help'          => __( 'Set the max number of images per row.', 'fl-builder' )
										),
                )
            ),
            'photos'       => array( // Section
                'title'         => __('Photos', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
										'cb_poise_multiple_photos_field' => array(
												'type'          => 'multiple-photos',
												'label'         => __( 'Select all photos', 'fl-builder' )
										),
                )
            )
        )
    )
));
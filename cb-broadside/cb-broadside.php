<?php

/**
 * This is an example module with only the basic
 * setup necessary to get it working.
 *
 * @class CBCustomBroadsideModule
 */
class CBCustomBroadsideModule extends FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Broadside (CB Custom)', 'fl-builder'),
            'description'   => __('Display a gallery.', 'fl-builder'),
            'category'		=> __('CB Custom Modules', 'fl-builder'),
            'dir'           => CB_CUSTOM_MODULE_DIR . 'cb-broadside/',
            'url'           => CB_CUSTOM_MODULE_URL . 'cb-broadside/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
//						'partial_refresh' => true,
        ));
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('CBCustomBroadsideModule', array(
    'general'       => array( // Tab
        'title'         => __('General', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'photos'       => array( // Section
                'title'         => __('Select Photos', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
										'cb_broadside_multiple_photos_field' => array(
												'type'          => 'multiple-photos',
												'label'         => __( 'Select all photos', 'fl-builder' )
										),
                )
            )
        )
    )
));

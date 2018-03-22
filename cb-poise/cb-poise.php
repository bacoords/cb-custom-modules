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
            'name'          => __('Poise', 'cb-custom-modules'),
            'description'   => __('Display elements with poise.', 'cb-custom-modules'),
            'icon'          => 'format-gallery.svg',
            'group'		=> __('CB Custom Modules', 'cb-custom-modules'),
            'category'		=> __('Galleries', 'cb-custom-modules'),
            'dir'           => CB_CUSTOM_MODULE_DIR . 'cb-poise/',
            'url'           => CB_CUSTOM_MODULE_URL . 'cb-poise/',
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
        'title'         => __('General', 'cb-custom-modules'), // Tab title
        'sections'      => array( // Tab Sections
            'design'       => array( // Section
                'title'         => __('Design', 'cb-custom-modules'), // Section Title
                'fields'        => array( // Section Fields
					'cb_poise_text_field' => array(
							'type'          => 'text',
							'label'         => __( 'Columns', 'cb-custom-modules' ),
							'default'       => '',
							'maxlength'     => '2',
							'size'          => '4',
							'placeholder'   => __( '5', 'cb-custom-modules' ),
							'class'         => 'my-css-class',
							'description'   => __( 'columns', 'cb-custom-modules' ),
							'help'          => __( 'Set the max number of images per row.', 'cb-custom-modules' )
					),
                )
            ),
            'photos'       => array( // Section
                'title'         => __('Photos', 'cb-custom-modules'), // Section Title
                'fields'        => array( // Section Fields
					'cb_poise_multiple_photos_field' => array(
							'type'          => 'multiple-photos',
							'label'         => __( 'Select all photos', 'cb-custom-modules' ),
							'connections'   => array( 'multiple-photos' )
					),
                )
            )
        )
    )
));

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
            'name'          => __('Broadside', 'cb-custom-modules'),
            'description'   => __('Display a gallery.', 'cb-custom-modules'),
            'group'		=> __('CB Custom Modules', 'cb-custom-modules'),
            'category'		=> __('Galleries', 'cb-custom-modules'),
            'icon'        =>'format-gallery.svg',
            'dir'           => CB_CUSTOM_MODULE_DIR . 'cb-broadside/',
            'url'           => CB_CUSTOM_MODULE_URL . 'cb-broadside/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
//						'partial_refresh' => true,
        ));
        $this->add_js( 'jquery-magnificpopup' );
        $this->add_css( 'jquery-magnificpopup' );
    }



}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('CBCustomBroadsideModule', array(
    'general'       => array( // Tab
        'title'         => __('General', 'cb-custom-modules'), // Tab title
        'sections'      => array( // Tab Sections
            'options'       => array( // Section
                'title'         => __('Design Options', 'cb-custom-modules'), // Section Title
                'fields'        => array( // Section Fields
										'cb_broadside_bg_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Background Color', 'cb-custom-modules' ),
                        'default'       => '494949',
                        'show_reset'    => true
										),
                )
            ),
            'photos'       => array( // Section
                'title'         => __('Photos', 'cb-custom-modules'), // Section Title
                'fields'        => array( // Section Fields
						'cb_broadside_multiple_photos_field' => array(
								'type'          => 'multiple-photos',
								'label'         => __( 'Select all photos', 'cb-custom-modules' ),
								'connections'   => array( 'multiple-photos' )
						),
                )
            )
        )
    )
));

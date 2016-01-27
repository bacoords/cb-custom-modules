<?php

/**
 * This is an example module with only the basic
 * setup necessary to get it working.
 *
 * @class CBCustomShadeModule
 */
class CBCustomShadeModule extends FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Shade', 'fl-builder'),
            'description'   => __('Throw some custom shade.', 'fl-builder'),
            'category'		=> __('Advanced Modules', 'fl-builder'),
            'dir'           => CB_CUSTOM_MODULE_DIR . 'shade/',
            'url'           => CB_CUSTOM_MODULE_URL . 'shade/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('CBCustomShadeModule', array(
    'general'       => array( // Tab
        'title'         => __('General', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('General Section', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'my_photo_field' => array(
												'type'          => 'photo',
												'label'         => __('Background Photo', 'fl-builder')
												'show_remove'	=> false
										),
                    'my_editor_field' => array(
												'type'          => 'editor',
												'media_buttons' => true,
												'rows'          => 10
										),
										'my_link_field' => array(
												'type'          => 'link',
												'label'         => __('Link', 'fl-builder')
										)
                )
            )
        )
    )
));
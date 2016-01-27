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
            'name'          => __('Shade (CB Custom)', 'fl-builder'),
            'description'   => __('Throw some custom shade.', 'fl-builder'),
            'category'		=> __('CB Custom Modules', 'fl-builder'),
            'dir'           => CB_CUSTOM_MODULE_DIR . 'shade/',
            'url'           => CB_CUSTOM_MODULE_URL . 'shade/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
						'partial_refresh' => true,
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
            'design'       => array( // Section
                'title'         => __('Design', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'cb_shade_photo_field' => array(
												'type'          => 'photo',
												'label'         => __('Background Photo', 'fl-builder'),
												'show_remove'	=> false
										),
										'cb_shade_link_field' => array(
												'type'          => 'link',
												'label'         => __('Link (optional)', 'fl-builder')
										),
										'cb_shade_text_field' => array(
												'type'          => 'text',
												'label'         => __( 'Custom Minimum Height', 'fl-builder' ),
												'default'       => '',
												'maxlength'     => '4',
												'size'          => '6',
												'placeholder'   => __( '420', 'fl-builder' ),
												'class'         => 'my-css-class',
												'description'   => __( 'px', 'fl-builder' ),
												'help'          => __( 'Set a custom minimum height in pixels. For smaller screens, the module height may increase to accomodate content.', 'fl-builder' )
										),
                )
            ),
            'content'       => array( // Section
                'title'         => __('Content', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'cb_shade_editor_field' => array(
												'type'          => 'editor',
												'media_buttons' => true,
												'rows'          => 10
										),
                )
            )
        )
    )
));
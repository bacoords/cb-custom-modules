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
            'name'          => __('Spotlight (CB Custom)', 'fl-builder'),
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
FLBuilder::register_module('CBCustomPoiseModule', array(
    'general'       => array( // Tab
        'title'         => __('General', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'design'       => array( // Section
                'title'         => __('Select Photos', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
										'my_form_field' => array(
												'type'          => 'form',
												'label'         => __('Add Photo', 'fl-builder'),
												'form'          => 'cb_spotlight_form_field', // ID of a registered form.
												'preview_text'  => 'cb_spotlight_text_field', // ID of a field to use for the preview text.
												'multiple' 			=> true,
										)
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
            'title'         => __('Image', 'fl-builder'),
            'sections'      => array(
                'general'       => array(
                    'title'         => '',
                    'fields'        => array(
												'cb_spotlight_photo_field' => array(
														'type'          => 'photo',
														'label'         => __('Image', 'fl-builder'),
														'show_remove'	=> false
												),
												'cb_spotlight_text_field' => array(
														'type'          => 'text',
														'label'         => __( 'Image Link Text', 'fl-builder' ),
														'default'       => '',
														'maxlength'     => '140',
														'size'          => '30',
														'placeholder'   => __( 'Describe image here', 'fl-builder' ),
														'class'         => 'my-css-class',
														'description'   => __( 'px', 'fl-builder' ),
														'help'          => __( 'Users will click on this text to load this image.', 'fl-builder' )
												),
                    )
                ),
            )
        )
    )
));
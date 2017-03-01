<?php

/**
 * This is an example module with only the basic
 * setup necessary to get it working.
 *
 * @class CBCustomModalModule
 */
class CBCustomModalModule extends FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Modal', 'fl-builder'),
            'description'   => __('Pop-up Portfolio Style.', 'fl-builder'),
            'category'		=> __('CB Custom Modules', 'fl-builder'),
            'dir'           => CB_CUSTOM_MODULE_DIR . 'cb-modal/',
            'url'           => CB_CUSTOM_MODULE_URL . 'cb-modal/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
						'partial_refresh' => true,
        ));
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('CBCustomModalModule', array(
    'content'       => array( // Tab
        'title'         => __('Content', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'content'       => array( // Section
                'title'         => __('Content', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'cb_modal_photo' => array(
												'type'          => 'photo',
												'label'         => __('Photo', 'fl-builder'),
												'show_remove'	=> false
										),
                  'cb_modal_photo_align' => array(
                      'type'          => 'select',
                      'label'         => __( 'Alignment', 'fl-builder' ),
                      'default'       => 'center',
                      'options'       => array(
                          'left'      => __( 'Left', 'fl-builder' ),
                          'center'      => __( 'Center', 'fl-builder' ),
                          'right'      => __( 'Right', 'fl-builder' )
                      ),
                    ),
                    'cb_modal_content' => array(
												'type'          => 'editor',
												'media_buttons' => true,
												'rows'          => 10
										),
                )
            )
        )
    ),
      'design'       => array( // Tab
        'title'         => __('Design', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'design'       => array( // Section
                'title'         => __('Design', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'cb_modal_bgcolor' => array(
                        'type'          => 'color',
                        'label'         => __( 'Background Color', 'fl-builder' ),
                        'default'       => 'ffffff',
                        'show_reset'    => true
                    ),
                    'cb_modal_textcolor' => array(
                        'type'          => 'color',
                        'label'         => __( 'Text Color', 'fl-builder' ),
                        'default'       => '000000',
                        'show_reset'    => true
                    ),
                    'cb_modal_overlaycolor' => array(
                        'type'          => 'color',
                        'label'         => __( 'Overlay Color', 'fl-builder' ),
                        'default'       => '000000',
                        'show_reset'    => true
                    ),
                )
            ),
        ),
    ),
));
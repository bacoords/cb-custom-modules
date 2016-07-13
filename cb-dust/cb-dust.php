<?php

/**
 * This is an example module with only the basic
 * setup necessary to get it working.
 *
 * @class CBCustomDustModule
 */
class CBCustomDustModule extends FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Dust', 'fl-builder'),
            'description'   => __('Have fun with Particles.js.', 'fl-builder'),
            'category'		=> __('CB Custom Modules', 'fl-builder'),
            'dir'           => CB_CUSTOM_MODULE_DIR . 'cb-dust/',
            'url'           => CB_CUSTOM_MODULE_URL . 'cb-dust/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
						'partial_refresh' => true,
        ));
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('CBCustomDustModule', array(
    'general'       => array( // Tab
        'title'         => __('General', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'design'       => array( // Section
                'title'         => __('Design', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                   'cb_dust_particles' => array(
                        'type'          => 'select',
                        'label'         => __( 'Select a Theme', 'fl-builder' ),
                        'default'       => 'neural',
                        'options'       => array(
                            'neural'      => __( 'Neural', 'fl-builder' ),
                            'rain'      => __( 'Rain', 'fl-builder' ),
                            'snow'      => __( 'Snow', 'fl-builder' ),
                            'stars'      => __( 'Stars', 'fl-builder' ),
                            'bubbles'      => __( 'Bubbles', 'fl-builder' )
                        ),
                    ),
                    'cb_dust_bg_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Background Color', 'fl-builder' ),
                        'default'       => '494949',
                        'show_reset'    => true
                    ),
										'cb_dust_min_height' => array(
												'type'          => 'text',
												'label'         => __( 'Row Height', 'fl-builder' ),
												'default'       => '',
												'maxlength'     => '4',
												'size'          => '6',
												'placeholder'   => __( '420', 'fl-builder' ),
												'class'         => 'my-css-class',
												'description'   => __( 'px', 'fl-builder' ),
												'help'          => __( 'Set a custom height in pixels. Default: 420px.', 'fl-builder' )
										),
                )
            ),
            'content'       => array( // Section
                'title'         => __('Content', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'cb_dust_editor' => array(
												'type'          => 'editor',
												'media_buttons' => true,
												'rows'          => 10
										),
                )
            )
        )
    )
));
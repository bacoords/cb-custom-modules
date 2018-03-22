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
            'name'          => __('Dust', 'cb-custom-modules'),
            'description'   => __('Have fun with Particles.js.', 'cb-custom-modules'),
            'group'		=> __('CB Custom Modules', 'cb-custom-modules'),
            'category'		=> __('Backgrounds', 'cb-custom-modules'),
            'dir'           => CB_CUSTOM_MODULE_DIR . 'cb-dust/',
            'url'           => CB_CUSTOM_MODULE_URL . 'cb-dust/',
            'icon'          => 'star-filled.svg',
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
        'title'         => __('General', 'cb-custom-modules'), // Tab title
        'sections'      => array( // Tab Sections
            'design'       => array( // Section
                'title'         => __('Design', 'cb-custom-modules'), // Section Title
                'fields'        => array( // Section Fields
                   'cb_dust_particles' => array(
                        'type'          => 'select',
                        'label'         => __( 'Select a Theme', 'cb-custom-modules' ),
                        'default'       => 'neural',
                        'options'       => array(
                            'neural'      => __( 'Neural', 'cb-custom-modules' ),
                            'rain'      => __( 'Rain', 'cb-custom-modules' ),
                            'snow'      => __( 'Snow', 'cb-custom-modules' ),
                            'stars'      => __( 'Stars', 'cb-custom-modules' ),
                            'bubbles'      => __( 'Bubbles', 'cb-custom-modules' )
                        ),
                    ),
                   'cb_dust_mouse' => array(
                        'type'          => 'select',
                        'label'         => __( 'Mouse Interaction', 'cb-custom-modules' ),
                        'default'       => 'bg',
                        'options'       => array(
                            'bg'      	   => __( 'Particle Effect', 'cb-custom-modules' ),
                            'content'      => __( 'Content', 'cb-custom-modules' )
                        ),
            						'help'          => __( 'Change to \'Content\' to allow links inside of this module.', 'cb-custom-modules' )
                    ),
                    'cb_dust_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Color', 'cb-custom-modules' ),
                        'default'       => 'ffffff',
                        'show_reset'    => true
                    ),
                    'cb_dust_bg_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Background Color', 'cb-custom-modules' ),
                        'default'       => '494949',
                        'show_reset'    => true
                    ),
          					'cb_dust_min_height' => array(
          							'type'          => 'text',
          							'label'         => __( 'Row Height', 'cb-custom-modules' ),
          							'default'       => '',
          							'maxlength'     => '4',
          							'size'          => '6',
          							'placeholder'   => __( '420', 'cb-custom-modules' ),
          							'class'         => 'my-css-class',
          							'description'   => __( 'px', 'cb-custom-modules' ),
          							'help'          => __( 'Set a custom height in pixels. Default: 420px.', 'cb-custom-modules' )
          					),
                )
            ),
            'content'       => array( // Section
                'title'         => __('Content', 'cb-custom-modules'), // Section Title
                'fields'        => array( // Section Fields
                    'cb_dust_editor' => array(
          							'type'          => 'editor',
          							'media_buttons' => true,
          							'rows'          => 10,
          							'connections'   => array( 'string' )
          					),
                )
            )
        )
    )
));

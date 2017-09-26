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
            'category'		=> __('CB Custom Modules', 'fl-builder'),
            'dir'           => CB_CUSTOM_MODULE_DIR . 'cb-shade/',
            'url'           => CB_CUSTOM_MODULE_URL . 'cb-shade/',
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
    'content'       => array( // Tab
        'title'         => __('Content', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'content'       => array( // Section
                'title'         => __('Content', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
					'cb_shade_link_field' => array(
							'type'          => 'link',
							'label'         => __('Link (optional)', 'fl-builder'),
							'help'          => __( 'Set the entire module to be a link. You can also input links in the editor below.', 'fl-builder' ),
							'connections'   => array( 'url' )
					),
                    'cb_shade_vertical_align' => array(
                        'type'          => 'select',
                        'label'         => __( 'Vertical Alignment', 'fl-builder' ),
                        'default'       => 'center',
                        'options'       => array(
                            'flex-start'      => __( 'Top', 'fl-builder' ),
                            'center'      => __( 'Center', 'fl-builder' ),
                            'flex-end'      => __( 'Bottom', 'fl-builder' )
                        ),
						'help'          => __( 'Vertical alignment is not currently supported in Internet Explorer.', 'fl-builder' )
                    ),
                    'cb_shade_editor_field' => array(
							'type'          => 'editor',
							'media_buttons' => true,
							'rows'          => 10,
							'connections'   => array( 'string' )
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
                    'cb_shade_photo_field' => array(
							'type'          => 'photo',
							'label'         => __('Background Photo', 'fl-builder'),
							'show_remove'	=> false,
							'connections'   => array( 'photo' )
					),
                    'cb_shade_bg_align' => array(
                        'type'          => 'select',
                        'label'         => __( 'Background Alignment', 'fl-builder' ),
                        'default'       => 'center center',
                        'options'       => array(
                            'top left'      => __( 'Left Top', 'fl-builder' ),
                            'center left'      => __( 'Left Center', 'fl-builder' ),
                            'bottom left'      => __( 'Left Bottom', 'fl-builder' ),
                            'top center'      => __( 'Center Top', 'fl-builder' ),
                            'center center'      => __( 'Center', 'fl-builder' ),
                            'bottom center'      => __( 'Center Bottom', 'fl-builder' ),
                            'top right'      => __( 'Right Top', 'fl-builder' ),
                            'center right'      => __( 'Right Center', 'fl-builder' ),
                            'bottom right'      => __( 'Right Bottom', 'fl-builder' ),
                        ),
                    ),
                    'cb_shade_bg_size' => array(
                        'type'          => 'select',
                        'label'         => __( 'Background Size', 'fl-builder' ),
                        'default'       => 'cover',
                        'options'       => array(
                            'contain'      => __( 'Fit', 'fl-builder' ),
                            'cover'      => __( 'Fill', 'fl-builder' ),
                        ),
                    ),
                    'cb_shade_color_field' => array(
                        'type'          => 'color',
                        'label'         => __( 'Background/Overlay Color', 'fl-builder' ),
                        'default'       => '000000',
                        'show_reset'    => true
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
                    'cb_shade_secret' => array(
                        'type'          => 'select',
                        'label'         => __( 'Secret Content', 'fl-builder' ),
                        'default'       => 'off',
                        'options'       => array(
                            'off'      => __( 'Off', 'fl-builder' ),
                            'on'      => __( 'On', 'fl-builder' )
                        ),
						'help'          => __( 'Content inside of the Module ONLY appears on hover.', 'fl-builder' )
                    ),
                )
            ),
        ),
    ),
));
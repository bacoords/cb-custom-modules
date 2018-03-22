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
            'name'          => __('Shade', 'cb-custom-modules'),
            'description'   => __('Throw some custom shade.', 'cb-custom-modules'),
            'group'		=> __('CB Custom Modules', 'cb-custom-modules'),
            'category'		=> __('Photos', 'cb-custom-modules'),
            'icon'        => 'format-image.svg',
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
        'title'         => __('Content', 'cb-custom-modules'), // Tab title
        'sections'      => array( // Tab Sections
            'content'       => array( // Section
                'title'         => __('Content', 'cb-custom-modules'), // Section Title
                'fields'        => array( // Section Fields
					'cb_shade_link_field' => array(
							'type'          => 'link',
							'label'         => __('Link (optional)', 'cb-custom-modules'),
							'help'          => __( 'Set the entire module to be a link. You can also input links in the editor below.', 'cb-custom-modules' ),
							'connections'   => array( 'url' )
					),
                    'cb_shade_vertical_align' => array(
                        'type'          => 'select',
                        'label'         => __( 'Vertical Alignment', 'cb-custom-modules' ),
                        'default'       => 'center',
                        'options'       => array(
                            'flex-start'      => __( 'Top', 'cb-custom-modules' ),
                            'center'      => __( 'Center', 'cb-custom-modules' ),
                            'flex-end'      => __( 'Bottom', 'cb-custom-modules' )
                        ),
						'help'          => __( 'Vertical alignment is not currently supported in Internet Explorer.', 'cb-custom-modules' )
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
        'title'         => __('Design', 'cb-custom-modules'), // Tab title
        'sections'      => array( // Tab Sections
            'design'       => array( // Section
                'title'         => __('Design', 'cb-custom-modules'), // Section Title
                'fields'        => array( // Section Fields
                    'cb_shade_photo_field' => array(
							'type'          => 'photo',
							'label'         => __('Background Photo', 'cb-custom-modules'),
							'show_remove'	=> false,
							'connections'   => array( 'photo' )
					),
                    'cb_shade_bg_align' => array(
                        'type'          => 'select',
                        'label'         => __( 'Background Alignment', 'cb-custom-modules' ),
                        'default'       => 'center center',
                        'options'       => array(
                            'top left'      => __( 'Left Top', 'cb-custom-modules' ),
                            'center left'      => __( 'Left Center', 'cb-custom-modules' ),
                            'bottom left'      => __( 'Left Bottom', 'cb-custom-modules' ),
                            'top center'      => __( 'Center Top', 'cb-custom-modules' ),
                            'center center'      => __( 'Center', 'cb-custom-modules' ),
                            'bottom center'      => __( 'Center Bottom', 'cb-custom-modules' ),
                            'top right'      => __( 'Right Top', 'cb-custom-modules' ),
                            'center right'      => __( 'Right Center', 'cb-custom-modules' ),
                            'bottom right'      => __( 'Right Bottom', 'cb-custom-modules' ),
                        ),
                    ),
                    'cb_shade_bg_size' => array(
                        'type'          => 'select',
                        'label'         => __( 'Background Size', 'cb-custom-modules' ),
                        'default'       => 'cover',
                        'options'       => array(
                            'contain'      => __( 'Fit', 'cb-custom-modules' ),
                            'cover'      => __( 'Fill', 'cb-custom-modules' ),
                        ),
                    ),
                    'cb_shade_color_field' => array(
                        'type'          => 'color',
                        'label'         => __( 'Background/Overlay Color', 'cb-custom-modules' ),
                        'default'       => '000000',
                        'show_reset'    => true
                    ),
					'cb_shade_text_field' => array(
							'type'          => 'text',
							'label'         => __( 'Custom Minimum Height', 'cb-custom-modules' ),
							'default'       => '',
							'maxlength'     => '4',
							'size'          => '6',
							'placeholder'   => __( '420', 'cb-custom-modules' ),
							'class'         => 'my-css-class',
							'description'   => __( 'px', 'cb-custom-modules' ),
							'help'          => __( 'Set a custom minimum height in pixels. For smaller screens, the module height may increase to accomodate content.', 'cb-custom-modules' )
					),
                    'cb_shade_secret' => array(
                        'type'          => 'select',
                        'label'         => __( 'Secret Content', 'cb-custom-modules' ),
                        'default'       => 'off',
                        'options'       => array(
                            'off'      => __( 'Off', 'cb-custom-modules' ),
                            'on'      => __( 'On', 'cb-custom-modules' )
                        ),
						'help'          => __( 'Content inside of the Module ONLY appears on hover.', 'cb-custom-modules' )
                    ),
                )
            ),
        ),
    ),
));

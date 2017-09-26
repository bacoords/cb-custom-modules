<?php

/**
 * This is an example module with only the basic
 * setup necessary to get it working.
 *
 * @class CBCustomCaptionModule
 */
class CBCustomCaptionModule extends FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Legend', 'fl-builder'),
            'description'   => __('Photo Module with a secret caption.', 'fl-builder'),
            'category'		=> __('CB Custom Modules', 'fl-builder'),
            'dir'           => CB_CUSTOM_MODULE_DIR . 'cb-caption/',
            'url'           => CB_CUSTOM_MODULE_URL . 'cb-caption/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
						'partial_refresh' => true,
        ));
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('CBCustomCaptionModule', array(
    'content'       => array( // Tab
        'title'         => __('Content', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'content'       => array( // Section
                'title'         => __('Content', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
					'cb_caption_link_field' => array(
							'type'          => 'link',
							'label'         => __('Link (optional)', 'fl-builder'),
							'help'          => __( 'Set the photo to be a link. You can also input links in the editor below.', 'fl-builder' ),
							'connections'   => array( 'url' )
					),
                    'cb_caption_vertical_align' => array(
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
                    'cb_caption_editor_field' => array(
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
                    'cb_caption_photo' => array(
							'type'          => 'photo',
							'label'         => __('Photo', 'fl-builder'),
							'show_remove'	=> false,
							'connections'   => array( 'photo' )
					),
                    'cb_caption_photo_align' => array(
                        'type'          => 'select',
                        'label'         => __( 'Photo Alignment', 'fl-builder' ),
                        'default'       => 'left',
                        'options'       => array(
                            'left'      => __( 'Left', 'fl-builder' ),
                            'center'      => __( 'Center', 'fl-builder' ),
                            'right'      => __( 'Right', 'fl-builder' ),
                        ),
                    ),
                    'cb_caption_color_field' => array(
                        'type'          => 'color',
                        'label'         => __( 'Background/Overlay Color', 'fl-builder' ),
                        'default'       => '000000',
                        'show_reset'    => true
                    ),
                )
            ),
        ),
    ),
));
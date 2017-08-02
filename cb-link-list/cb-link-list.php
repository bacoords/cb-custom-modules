<?php

/**
 * This is an example module with only the basic
 * setup necessary to get it working.
 *
 * @class CBCustomLinkListModule
 */
class CBCustomLinkListModule extends FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Link List', 'fl-builder'),
            'description'   => __('Create a list of links from URLs or Media Library files.', 'fl-builder'),
            'category'		=> __('CB Custom Modules', 'fl-builder'),
            'dir'           => CB_CUSTOM_MODULE_DIR . 'cb-link-list/',
            'url'           => CB_CUSTOM_MODULE_URL . 'cb-link-list/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
//						'partial_refresh' => true,
        ));
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('CBCustomLinkListModule', array(
    'general'       => array( // Tab
        'title'         => __('Assets', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'design'       => array( // Section
                'title'         => __('', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
					'cb_link_list_form_field_repeater' => array(
							'type'          => 'form',
							'label'         => __('Link', 'fl-builder'),
							'form'          => 'cb_link_list_form_field', // ID of a registered form.
							'preview_text'  => 'cb_link_label', // ID of a field to use for the preview text.
							'multiple' 			=> true,
					),
                )
            ),
        )
    ),
    'style'       => array( // Tab
        'title'         => __('Style', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'settings'       => array( // Section
                'title'         => __('', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
					'cb_link_list_icon_size'          => array(
						'type'          => 'text',
						'label'         => __('Icon Size', 'fl-builder'),
						'default'       => '30',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'cb_link_list_font' => array(
						'type'          => 'font',
						'label'         => __( 'Font', 'fl-builder' ),
						'default'       => array(
							'family'        => 'Default',
							'weight'        => 'default'
						)
					),
					'cb_link_list_line_height'          => array(
						'type'          => 'text',
						'label'         => __('Line Height', 'fl-builder'),
						'default'       => '1.4',
						'maxlength'     => '4',
						'size'          => '4',
						'description'   => 'em'
					),
					'cb_link_list_label_font_size' => array(
						'type'          => 'text',
						'label'         => __('Label Font Size', 'fl-builder'),
						'default'       => '24',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'cb_link_list_filesize_font_size' => array(
						'type'          => 'text',
						'label'         => __('Filesize Font Size', 'fl-builder'),
						'default'       => '24',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
                )
            ),
            'color'       => array( // Section
                'title'         => __('Colors', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields					
					'cb_link_icon_color'         => array(
						'type'          => 'color',
						'label'         => __('Icon Default Color', 'fl-builder'),
						'show_reset'    => true
					),
					'cb_link_icon_hover_color' => array(
						'type'          => 'color',
						'label'         => __('Icon Hover Default Color', 'fl-builder'),
						'show_reset'    => true,
						'preview'       => array(
							'type'          => 'none'
						)
					),		
					'cb_link_icon_bg_color'         => array(
						'type'          => 'color',
						'label'         => __('Icon Default Background Color', 'fl-builder'),
						'show_reset'    => true
					),
					'cb_link_icon_bg_hover_color' => array(
						'type'          => 'color',
						'label'         => __('Icon Hover Default Background Color', 'fl-builder'),
						'show_reset'    => true,
						'preview'       => array(
							'type'          => 'none'
						)
					),
					'cb_link_font_color'      => array(
						'type'          => 'color',
						'label'         => __('Font Default Color', 'fl-builder'),
						'show_reset'    => true
					),
					'cb_link_font_hover_color' => array(
						'type'          => 'color',
						'label'         => __('Font Hover Default Color', 'fl-builder'),
						'show_reset'    => true,
						'preview'       => array(
							'type'          => 'none'
						)
					),
					'cb_link_filesize_color'      => array(
						'type'          => 'color',
						'label'         => __('Filesize Default Color', 'fl-builder'),
						'show_reset'    => true
					),
					'cb_link_filesize_hover_color' => array(
						'type'          => 'color',
						'label'         => __('Filesize Hover Default Color', 'fl-builder'),
						'show_reset'    => true,
						'preview'       => array(
							'type'          => 'none'
						)
					),
                )
            ),
        )
    )
));

/**
 * Register form
 */
FLBuilder::register_settings_form('cb_link_list_form_field', array(
    'title' => __('New Link', 'fl-builder'),
    'tabs'  => array(
        'file'      => array(
            'title'         => __('Link', 'fl-builder'),
            'sections'      => array(
                'label'       => array(
                    'title'         => 'Label',
                    'fields'        => array(
                        'cb_link_label' => array(
                                'type'          => 'text',
                                'label'         => __( 'Label', 'fl-builder' ),
                                'default'       => '',
                                'maxlength'     => '140',
                                'size'          => '45',
                                'placeholder'   => __( 'Describe image here', 'fl-builder' ),
                                'class'         => 'my-css-class',
                                'description'   => __( '', 'fl-builder' )
                        ),
                    )
                ),
                'icon'       => array(
                    'title'         => 'Icon',
                    'fields'        => array(
						'cb_link_icon' => array(
							'type'          => 'icon',
							'label'         => __( 'Icon', 'fl-builder' ),
							'show_remove'   => true
						),
                    )
                ),
                'type'       => array(
                    'title'         => 'Link',
                    'fields'        => array(
						'cb_link_type' => array(
							'type'          => 'select',
							'label'         => __( 'Link Type', 'fl-builder' ),
							'default'       => 'option-1',
							'options'       => array(
								'file'      => __( 'Media Library', 'fl-builder' ),
								'link'      => __( 'URL', 'fl-builder' )
							),
							'toggle'        => array(
								'file'      => array(
									'sections'      => array( 'file' )
								),
								'link'      => array(
									'sections'      => array( 'link' )
								)
							)
						),
                    )
                ),
                'file'       => array(
                    'title'         => '',
                    'fields'        => array(
                        'cb_link_file' => array(
                                'type'          => 'zestsms-pdf',
                                'label'         => __('File', 'fl-builder'),
                                'show_remove'	=> false
                        ),
                    )
                ),
                'link'       => array(
                    'title'         => '',
                    'fields'        => array(
						'cb_link_link' => array(
							'type'          => 'link',
							'label'         => __('Link', 'fl-builder')
						),
                    )
                ),
            )
        ),
        'settings'      => array(
            'title'         => __('Settings', 'fl-builder'),
            'sections'      => array(
                'general'       => array(
                    'title'         => '',
                    'fields'        => array(
						'cb_link_icon_color'         => array(
							'type'          => 'color',
							'label'         => __('Icon Color', 'fl-builder'),
							'show_reset'    => true
						),
						'cb_link_icon_hover_color' => array(
							'type'          => 'color',
							'label'         => __('Icon Hover Color', 'fl-builder'),
							'show_reset'    => true,
							'preview'       => array(
								'type'          => 'none'
							)
						),	
						'cb_link_icon_bg_color'         => array(
							'type'          => 'color',
							'label'         => __('Icon Background Color', 'fl-builder'),
							'show_reset'    => true
						),
						'cb_link_icon_bg_hover_color' => array(
							'type'          => 'color',
							'label'         => __('Icon Hover Background Color', 'fl-builder'),
							'show_reset'    => true,
							'preview'       => array(
								'type'          => 'none'
							)
						),
						'cb_link_font_color'      => array(
							'type'          => 'color',
							'label'         => __('Font Color', 'fl-builder'),
							'show_reset'    => true
						),
						'cb_link_font_hover_color' => array(
							'type'          => 'color',
							'label'         => __('Font Hover Color', 'fl-builder'),
							'show_reset'    => true,
							'preview'       => array(
								'type'          => 'none'
							)
						),
						'cb_link_filesize_color'      => array(
							'type'          => 'color',
							'label'         => __('Filesize Color', 'fl-builder'),
							'show_reset'    => true
						),
						'cb_link_filesize_hover_color' => array(
							'type'          => 'color',
							'label'         => __('Filesize Hover Color', 'fl-builder'),
							'show_reset'    => true,
							'preview'       => array(
								'type'          => 'none'
							)
						),
                    )
                ),
            )
        )
    )
));
<?php

/**
 * This is an example module with only the basic
 * setup necessary to get it working.
 *
 * @class CBCustomButtonListModule
 */
class CBCustomButtonListModule extends FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Button List', 'fl-builder'),
            'description'   => __('Create a list of buttons linking to URLs or any file from your Media Library.', 'fl-builder'),
            'category'		=> __('CB Custom Modules', 'fl-builder'),
            'dir'           => CB_CUSTOM_MODULE_DIR . 'cb-button-list/',
            'url'           => CB_CUSTOM_MODULE_URL . 'cb-button-list/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
//						'partial_refresh' => true,
        ));
    }
	
	
	
	/**
	 * Return the correct value
	 */
	
	
	public function filter_value($button, $field){
		
		if( !empty( $button->$field ) ) {
			return $button->$field;
		}
		
		if( !empty( $this->settings->$field ) ) {
			return $this->settings->$field;
		}
		
		return $button->$field;
		
	}

}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('CBCustomButtonListModule', array(
    'general'       => array( // Tab
        'title'         => __('Assets', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'design'       => array( // Section
                'title'         => __('', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
					'cb_button_list_form_field_repeater' => array(
							'type'          => 'form',
							'label'         => __('Button', 'fl-builder'),
							'form'          => 'cb_button_list_form_field', // ID of a registered form.
							'preview_text'  => 'button_text', // ID of a field to use for the preview text.
							'multiple' 			=> true,
					),
                )
            ),
        )
    ),

		'button'      => array(
			'title'         => __('Defaults', 'fl-builder'),
			'sections'      => array(
				'btn_colors'     => array(
					'title'         => __('Button Colors', 'fl-builder'),
					'fields'        => array(
						'btn_bg_color'  => array(
							'type'          => 'color',
							'label'         => __('Background Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true
						),
						'btn_bg_hover_color' => array(
							'type'          => 'color',
							'label'         => __('Background Hover Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true,
						),
						'btn_text_color' => array(
							'type'          => 'color',
							'label'         => __('Text Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true
						),
						'btn_text_hover_color' => array(
							'type'          => 'color',
							'label'         => __('Text Hover Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true,
						)
					)
				),
				'btn_style'     => array(
					'title'         => __('Button Style', 'fl-builder'),
					'fields'        => array(
						'btn_style'     => array(
							'type'          => 'select',
							'label'         => __('Style', 'fl-builder'),
							'default'       => 'flat',
							'options'       => array(
								'flat'          => __('Flat', 'fl-builder'),
								'gradient'      => __('Gradient', 'fl-builder'),
								'transparent'   => __('Transparent', 'fl-builder')
							),
							'toggle'        => array(
								'transparent'   => array(
									'fields'        => array('btn_bg_opacity', 'btn_bg_hover_opacity', 'btn_border_size')
								)
							)
						),
						'btn_border_size' => array(
							'type'          => 'text',
							'label'         => __('Border Size', 'fl-builder'),
							'default'       => '2',
							'description'   => 'px',
							'maxlength'     => '3',
							'size'          => '5',
							'placeholder'   => '0'
						),
						'btn_bg_opacity' => array(
							'type'          => 'text',
							'label'         => __('Background Opacity', 'fl-builder'),
							'default'       => '0',
							'description'   => '%',
							'maxlength'     => '3',
							'size'          => '5',
							'placeholder'   => '0'
						),
						'btn_bg_hover_opacity' => array(
						'type'          => 'text',
						'label'         => __('Background Hover Opacity', 'fl-builder'),
						'default'       => '0',
						'description'   => '%',
						'maxlength'     => '3',
						'size'          => '5',
						'placeholder'   => '0'
						),
						'btn_button_transition' => array(
							'type'          => 'select',
							'label'         => __('Transition', 'fl-builder'),
							'default'       => 'disable',
							'options'       => array(
								'disable'        => __('Disabled', 'fl-builder'),
								'enable'         => __('Enabled', 'fl-builder')
							)
						)
					)
				),
				'btn_structure' => array(
					'title'         => __('Button Structure', 'fl-builder'),
					'fields'        => array(
						'btn_width'     => array(
							'type'          => 'select',
							'label'         => __('Width', 'fl-builder'),
							'default'       => 'full',
							'options'       => array(
								'auto'          => _x( 'Auto', 'Width.', 'fl-builder' ),
								'full'          => __('Full Width', 'fl-builder')
							)
						),
						'btn_align'    	=> array(
							'type'          => 'select',
							'label'         => __('Alignment', 'fl-builder'),
							'default'       => 'center',
							'options'       => array(
								'left'          => __('Left', 'fl-builder'),
								'center'		=> __('Center', 'fl-builder'),
								'right'         => __('Right', 'fl-builder'),
							),
							'preview'       => array(
								'type'          => 'none'
							)
						),
						'btn_font_size' => array(
							'type'          => 'text',
							'label'         => __('Font Size', 'fl-builder'),
							'default'       => '16',
							'maxlength'     => '3',
							'size'          => '4',
							'description'   => 'px'
						),
						'btn_padding'   => array(
							'type'          => 'text',
							'label'         => __('Padding', 'fl-builder'),
							'default'       => '12',
							'maxlength'     => '3',
							'size'          => '4',
							'description'   => 'px'
						),
						'btn_border_radius' => array(
							'type'          => 'text',
							'label'         => __('Round Corners', 'fl-builder'),
							'default'       => '4',
							'maxlength'     => '3',
							'size'          => '4',
							'description'   => 'px'
						)
					)
				)
			)
		),
));

/**
 * Register form
 */
FLBuilder::register_settings_form('cb_button_list_form_field', array(
    'title' => __('New Button Link', 'fl-builder'),
    'tabs'  => array(
        'file'      => array(
            'title'         => __('Link', 'fl-builder'),
            'sections'      => array(
				'default'   => array(
					'title'         => '',
					'fields'        => array(
						'button_text'   => array(
							'type'          => 'text',
							'label'         => __('Button Text', 'fl-builder'),
							'default'       => __('Get Started', 'fl-builder'),
						),
						'btn_link_target'    	=> array(
							'type'          => 'select',
							'label'         => __('Link Target', 'fl-builder'),
							'default'       => '_self',
							'options'       => array(
								'_self'         => __('Same Window', 'fl-builder'),
								'_blank'        => __('New Window', 'fl-builder')
							),
							'preview'       => array(
								'type'          => 'none'
							)
						),
						'btn_link_nofollow' => array(
							'type'          	=> 'select',
							'label' 	        => __('Link No Follow', 'fl-builder'),
							'default'       => 'no',
							'options' 			=> array(
								'yes' 				=> __('Yes', 'fl-builder'),
								'no' 				=> __('No', 'fl-builder'),
							),
							'preview'       	=> array(
								'type'          	=> 'none'
							)
						),
						'btn_icon'      => array(
							'type'          => 'icon',
							'label'         => __('Button Icon', 'fl-builder'),
							'show_remove'   => true
						),
						'btn_icon_position' => array(
							'type'          => 'select',
							'label'         => __('Button Icon Position', 'fl-builder'),
							'default'       => 'before',
							'options'       => array(
								'before'        => __('Before Text', 'fl-builder'),
								'after'         => __('After Text', 'fl-builder')
							)
						),
						'btn_icon_animation' => array(
							'type'          => 'select',
							'label'         => __('Icon Visibility', 'fl-builder'),
							'default'       => 'disable',
							'options'       => array(
								'disable'        => __('Always Visible', 'fl-builder'),
								'enable'         => __('Fade In On Hover', 'fl-builder')
							)
						)
					)
				),
                'type'       => array(
                    'title'         => 'Link',
                    'fields'        => array(
						'cb_link_type' => array(
							'type'          => 'select',
							'label'         => __( 'Link Type', 'fl-builder' ),
							'default'       => 'link',
							'options'       => array(
								'link'      => __( 'URL', 'fl-builder' ),
								'file'      => __( 'Media Library', 'fl-builder' )
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

		'button'      => array(
			'title'         => __('Colors', 'fl-builder'),
			'sections'      => array(
				'btn_colors'     => array(
					'title'         => __('', 'fl-builder'),
					'fields'        => array(
						'btn_bg_color'  => array(
							'type'          => 'color',
							'label'         => __('Background Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true
						),
						'btn_bg_hover_color' => array(
							'type'          => 'color',
							'label'         => __('Background Hover Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true,
						),
						'btn_text_color' => array(
							'type'          => 'color',
							'label'         => __('Text Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true
						),
						'btn_text_hover_color' => array(
							'type'          => 'color',
							'label'         => __('Text Hover Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true,
						)
					)
				),
			)
		),
    )
));
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
            'name'          => __('Button List', 'cb-custom-modules'),
            'description'   => __('Create a list of buttons linking to URLs or any file from your Media Library.', 'cb-custom-modules'),
            'group'		=> __('CB Custom Modules', 'cb-custom-modules'),
            'category'		=> __('Info Lists', 'cb-custom-modules'),
            'icon'      => 'button.svg',
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


	public function filter_btn_value($button, $field){
		if( !empty( $button->$field ) ) {
			return $button->$field;
		}
		if( !empty( $this->settings->$field ) ) {
			return $this->settings->$field;
		}
  	return $this->settings->$field;

	}

}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('CBCustomButtonListModule', array(
    'general'       => array( // Tab
        'title'         => __('Assets', 'cb-custom-modules'), // Tab title
        'sections'      => array( // Tab Sections
            'design'       => array( // Section
                'title'         => __('', 'cb-custom-modules'), // Section Title
                'fields'        => array( // Section Fields
					'cb_button_list_form_field_repeater' => array(
							'type'          => 'form',
							'label'         => __('Button', 'cb-custom-modules'),
							'form'          => 'cb_button_list_form_field', // ID of a registered form.
							'preview_text'  => 'button_text', // ID of a field to use for the preview text.
							'multiple' 			=> true,
					),
                )
            ),
        )
    ),

		'button'      => array(
			'title'         => __('Defaults', 'cb-custom-modules'),
			'sections'      => array(
				'btn_colors'     => array(
					'title'         => __('Button Colors', 'cb-custom-modules'),
					'fields'        => array(
						'btn_bg_color'  => array(
							'type'          => 'color',
							'label'         => __('Background Color', 'cb-custom-modules'),
							'default'       => '',
							'show_reset'    => true
						),
						'btn_bg_hover_color' => array(
							'type'          => 'color',
							'label'         => __('Background Hover Color', 'cb-custom-modules'),
							'default'       => '',
							'show_reset'    => true,
						),
						'btn_text_color' => array(
							'type'          => 'color',
							'label'         => __('Text Color', 'cb-custom-modules'),
							'default'       => '',
							'show_reset'    => true
						),
						'btn_text_hover_color' => array(
							'type'          => 'color',
							'label'         => __('Text Hover Color', 'cb-custom-modules'),
							'default'       => '',
							'show_reset'    => true,
						)
					)
				),
				'btn_style'     => array(
					'title'         => __('Button Style', 'cb-custom-modules'),
					'fields'        => array(
						'btn_style'     => array(
							'type'          => 'select',
							'label'         => __('Style', 'cb-custom-modules'),
							'default'       => 'flat',
							'options'       => array(
								'flat'          => __('Flat', 'cb-custom-modules'),
								'gradient'      => __('Gradient', 'cb-custom-modules'),
								'transparent'   => __('Transparent', 'cb-custom-modules')
							),
							'toggle'        => array(
								'transparent'   => array(
									'fields'        => array('btn_bg_opacity', 'btn_bg_hover_opacity', 'btn_border_size')
								)
							)
						),
						'btn_border_size' => array(
							'type'          => 'text',
							'label'         => __('Border Size', 'cb-custom-modules'),
							'default'       => '2',
							'description'   => 'px',
							'maxlength'     => '3',
							'size'          => '5',
							'placeholder'   => '0'
						),
						'btn_bg_opacity' => array(
							'type'          => 'text',
							'label'         => __('Background Opacity', 'cb-custom-modules'),
							'default'       => '0',
							'description'   => '%',
							'maxlength'     => '3',
							'size'          => '5',
							'placeholder'   => '0'
						),
						'btn_bg_hover_opacity' => array(
						'type'          => 'text',
						'label'         => __('Background Hover Opacity', 'cb-custom-modules'),
						'default'       => '0',
						'description'   => '%',
						'maxlength'     => '3',
						'size'          => '5',
						'placeholder'   => '0'
						),
						'btn_button_transition' => array(
							'type'          => 'select',
							'label'         => __('Transition', 'cb-custom-modules'),
							'default'       => 'disable',
							'options'       => array(
								'disable'        => __('Disabled', 'cb-custom-modules'),
								'enable'         => __('Enabled', 'cb-custom-modules')
							)
						)
					)
				),
				'btn_structure' => array(
					'title'         => __('Button Structure', 'cb-custom-modules'),
					'fields'        => array(
						'btn_width'     => array(
							'type'          => 'select',
							'label'         => __('Width', 'cb-custom-modules'),
							'default'       => 'full',
							'options'       => array(
								'auto'          => _x( 'Auto', 'Width.', 'cb-custom-modules' ),
								'full'          => __('Full Width', 'cb-custom-modules')
							)
						),
						'btn_align'    	=> array(
							'type'          => 'select',
							'label'         => __('Alignment', 'cb-custom-modules'),
							'default'       => 'center',
							'options'       => array(
								'left'          => __('Left', 'cb-custom-modules'),
								'center'		=> __('Center', 'cb-custom-modules'),
								'right'         => __('Right', 'cb-custom-modules'),
							),
							'preview'       => array(
								'type'          => 'none'
							)
						),
						'btn_font_size' => array(
							'type'          => 'unit',
							'label'         => __('Font Size', 'cb-custom-modules'),
							'default'       => '16',
							'description'   => 'px'
						),
						'btn_padding'   => array(
							'type'          => 'unit',
							'label'         => __('Padding', 'cb-custom-modules'),
							'default'       => '12',
							'description'   => 'px'
						),
						'btn_border_radius' => array(
							'type'          => 'unit',
							'label'         => __('Round Corners', 'cb-custom-modules'),
							'default'       => '4',
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
    'title' => __('New Button Link', 'cb-custom-modules'),
    'tabs'  => array(
        'file'      => array(
            'title'         => __('Link', 'cb-custom-modules'),
            'sections'      => array(
				'default'   => array(
					'title'         => '',
					'fields'        => array(
						'button_text'   => array(
							'type'          => 'text',
							'label'         => __('Button Text', 'cb-custom-modules'),
							'default'       => __('Get Started', 'cb-custom-modules'),
							'connections'   => array( 'string' )
						),
						'btn_link_target'    	=> array(
							'type'          => 'select',
							'label'         => __('Link Target', 'cb-custom-modules'),
							'default'       => '_self',
							'options'       => array(
								'_self'         => __('Same Window', 'cb-custom-modules'),
								'_blank'        => __('New Window', 'cb-custom-modules')
							),
							'preview'       => array(
								'type'          => 'none'
							)
						),
						'btn_link_nofollow' => array(
							'type'          	=> 'select',
							'label' 	        => __('Link No Follow', 'cb-custom-modules'),
							'default'       => 'no',
							'options' 			=> array(
								'yes' 				=> __('Yes', 'cb-custom-modules'),
								'no' 				=> __('No', 'cb-custom-modules'),
							),
							'preview'       	=> array(
								'type'          	=> 'none'
							)
						),
						'btn_icon'      => array(
							'type'          => 'icon',
							'label'         => __('Button Icon', 'cb-custom-modules'),
							'show_remove'   => true
						),
						'btn_icon_position' => array(
							'type'          => 'select',
							'label'         => __('Button Icon Position', 'cb-custom-modules'),
							'default'       => 'before',
							'options'       => array(
								'before'        => __('Before Text', 'cb-custom-modules'),
								'after'         => __('After Text', 'cb-custom-modules')
							)
						),
						'btn_icon_animation' => array(
							'type'          => 'select',
							'label'         => __('Icon Visibility', 'cb-custom-modules'),
							'default'       => 'disable',
							'options'       => array(
								'disable'        => __('Always Visible', 'cb-custom-modules'),
								'enable'         => __('Fade In On Hover', 'cb-custom-modules')
							)
						)
					)
				),
                'type'       => array(
                    'title'         => 'Link',
                    'fields'        => array(
						'cb_link_type' => array(
							'type'          => 'select',
							'label'         => __( 'Link Type', 'cb-custom-modules' ),
							'default'       => 'link',
							'options'       => array(
								'link'      => __( 'URL', 'cb-custom-modules' ),
								'file'      => __( 'Media Library', 'cb-custom-modules' )
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
                                'type'          => 'zestsms-file',
                                'label'         => __('File', 'cb-custom-modules'),
                                'show_remove'	=> false
                        ),
                    )
                ),
                'link'       => array(
                    'title'         => '',
                    'fields'        => array(
						'cb_link_link' => array(
							'type'          => 'link',
							'label'         => __('Link', 'cb-custom-modules'),
							'connections'   => array( 'url' )
						),
                    )
                ),
            )
        ),

		'button'      => array(
			'title'         => __('Colors', 'cb-custom-modules'),
			'sections'      => array(
				'btn_colors'     => array(
					'title'         => __('', 'cb-custom-modules'),
					'fields'        => array(
						'btn_bg_color'  => array(
							'type'          => 'color',
							'label'         => __('Background Color', 'cb-custom-modules'),
							'default'       => '',
							'show_reset'    => true
						),
						'btn_bg_hover_color' => array(
							'type'          => 'color',
							'label'         => __('Background Hover Color', 'cb-custom-modules'),
							'default'       => '',
							'show_reset'    => true,
						),
						'btn_text_color' => array(
							'type'          => 'color',
							'label'         => __('Text Color', 'cb-custom-modules'),
							'default'       => '',
							'show_reset'    => true
						),
						'btn_text_hover_color' => array(
							'type'          => 'color',
							'label'         => __('Text Hover Color', 'cb-custom-modules'),
							'default'       => '',
							'show_reset'    => true,
						)
					)
				),
			)
		),
    )
));

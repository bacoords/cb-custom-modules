<?php

/**
 * This is an example module with only the basic
 * setup necessary to get it working.
 *
 * @class CBCustomSliceModule
 */
class CBCustomSliceModule extends FLBuilderModule {

    /**
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Slice', 'cb-custom-modules'),
            'description'   => __('Display a gallery.', 'cb-custom-modules'),
            'group'		=> __('CB Custom Modules', 'cb-custom-modules'),
            'category'		=> __('Galleries', 'cb-custom-modules'),
            'icon'      => 'format-gallery.svg',
            'dir'           => CB_CUSTOM_MODULE_DIR . 'cb-slice/',
            'url'           => CB_CUSTOM_MODULE_URL . 'cb-slice/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
//						'partial_refresh' => true,
        ));
        $this->add_js( 'jquery-magnificpopup' );
        $this->add_css( 'jquery-magnificpopup' );
    }


    public function responsive_breakpoint()
    {
      $settings = FLBuilderModel::get_global_settings();
      return $settings->responsive_breakpoint;
    }

}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('CBCustomSliceModule', array(
    'general'       => array( // Tab
        'title'         => __('General', 'cb-custom-modules'), // Tab title
        'sections'      => array( // Tab Sections
            'options'       => array( // Section
                'title'         => __('Design', 'cb-custom-modules'), // Section Title
                'fields'        => array( // Section Fields
										'cb_slice_bg_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Divider Color', 'cb-custom-modules' ),
                        'default'       => 'ffffff',
                        'show_reset'    => true
										),
                  'cb_slice_row_limit' => array(
                      'type'          => 'text',
                      'label'         => __( 'Images Per Row', 'cb-custom-modules' ),
                      'default'       => '',
                      'maxlength'     => '2',
                      'size'          => '3',
                      'placeholder'   => __( '', 'cb-custom-modules' ),
                      'description'   => __( 'images', 'cb-custom-modules' ),
                      'help'          => __( 'If left blank or set to zero, there will be no limit.', 'cb-custom-modules' )
                  ),
                )
            ),
            'photos'       => array( // Section
                'title'         => __('Select Photos', 'cb-custom-modules'), // Section Title
                'fields'        => array( // Section Fields
					'cb_slice_multiple_photos_field' => array(
							'type'          => 'multiple-photos',
							'label'         => __( 'Select all photos', 'cb-custom-modules' ),
							'connections'   => array( 'multiple-photos' )
					),
                )
            )
        )
    )
));

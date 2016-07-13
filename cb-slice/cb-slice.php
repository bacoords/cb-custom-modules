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
            'name'          => __('Slice', 'fl-builder'),
            'description'   => __('Display a gallery.', 'fl-builder'),
            'category'		=> __('CB Custom Modules', 'fl-builder'),
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
        'title'         => __('General', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'options'       => array( // Section
                'title'         => __('Design', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
										'cb_slice_bg_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Divider Color', 'fl-builder' ),
                        'default'       => 'ffffff',
                        'show_reset'    => true
										),
                  'cb_slice_row_limit' => array(
                      'type'          => 'text',
                      'label'         => __( 'Images Per Row', 'fl-builder' ),
                      'default'       => '',
                      'maxlength'     => '2',
                      'size'          => '3',
                      'placeholder'   => __( '', 'fl-builder' ),
                      'description'   => __( 'images', 'fl-builder' ),
                      'help'          => __( 'If left blank or set to zero, there will be no limit.', 'fl-builder' )
                  ),
                )
            ),
            'photos'       => array( // Section
                'title'         => __('Select Photos', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
										'cb_slice_multiple_photos_field' => array(
												'type'          => 'multiple-photos',
												'label'         => __( 'Select all photos', 'fl-builder' )
										),
                )
            )
        )
    )
));

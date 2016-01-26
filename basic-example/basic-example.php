<?php

/**
 * This is an example module with only the basic
 * setup necessary to get it working.
 *
 * @class FLBasicExampleModule
 */
class FLBasicExampleModule extends FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Basic Example', 'fl-builder'),
            'description'   => __('An basic example for coding new modules.', 'fl-builder'),
            'category'		=> __('Advanced Modules', 'fl-builder'),
            'dir'           => FL_MODULE_EXAMPLES_DIR . 'basic-example/',
            'url'           => FL_MODULE_EXAMPLES_URL . 'basic-example/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('FLBasicExampleModule', array(
    'general'       => array( // Tab
        'title'         => __('General', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('Section Title', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'text_field'     => array(
                        'type'          => 'text',
                        'label'         => __('Text Field', 'fl-builder'),
                        'default'       => '',
                        'maxlength'     => '2',
                        'size'          => '3',
                        'placeholder'   => '10',
                        'class'         => 'my-css-class',
                        'description'   => 'px',
                        'help'          => 'Cingebant haec pressa dei quisquis quia mentisque mutastis terris longo fixo ille tum sponte volucres ignea boreas origo satus.',
                        'preview'         => array(
                            'type'             => 'css',
                            'selector'         => '.fl-example-text',
                            'property'         => 'font-size',
                            'unit'             => 'px'
                        )
                    ),
                    'textarea_field' => array(
                        'type'          => 'textarea',
                        'label'         => __('Textarea Field', 'fl-builder'),
                        'default'       => '',
                        'placeholder'   => __('Placeholder Text', 'fl-builder'),
                        'rows'          => '6',
                        'preview'         => array(
                            'type'             => 'text',
                            'selector'         => '.fl-example-text'  
                        )
                    ),
                    'color_field'    => array(
                        'type'          => 'color',
                        'label'         => __('Color Picker', 'fl-builder'),
                        'default'       => '333333',
                        'show_reset'    => true,
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.fl-example-text',
                            'property'        => 'color'
                        )
                    ),
                    'custom_field_example' => array(
                        'type'          => 'my-custom-field',
                        'label'         => __('Custom Field Example', 'fl-builder'),
                        'default'       => ''
                    ),
                )
            )
        )
    )
));
<?php

/**
 * @class FLExampleModule
 */
class FLExampleModule extends FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Example', 'fl-builder'),
            'description'   => __('An example for coding new modules.', 'fl-builder'),
            'category'		=> __('Advanced Modules', 'fl-builder'),
            'dir'           => FL_MODULE_EXAMPLES_DIR . 'example/',
            'url'           => FL_MODULE_EXAMPLES_URL . 'example/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
        
        /** 
         * Use these methods to enqueue css and js already
         * registered or to register and enqueue your own.
         */
        // Already registered
        $this->add_css('font-awesome');
        $this->add_js('jquery-bxslider');
        
        // Register and enqueue your own
        $this->add_css('example-lib', $this->url . 'css/example-lib.css');
        $this->add_js('example-lib', $this->url . 'js/example-lib.js', array(), '', true);
    }

    /** 
     * Use this method to work with settings data before 
     * it is saved. You must return the settings object. 
     *
     * @method update
     * @param $settings {object}
     */      
    public function update($settings)
    {
        $settings->textarea_field .= ' - this text was appended in the update method.';
        
        return $settings;
    }

    /** 
     * This method will be called by the builder
     * right before the module is deleted. 
     *
     * @method delete
     */      
    public function delete()
    {
    
    }

    /** 
     * Add additional methods to this class for use in the 
     * other module files such as preview.php, frontend.php
     * and frontend.css.php.
     * 
     *
     * @method example_method
     */   
    public function example_method()
    {
    
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('FLExampleModule', array(
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
                    'select_field'   => array(
                        'type'          => 'select',
                        'label'         => __('Select Field', 'fl-builder'),
                        'default'       => 'option-2',
                        'options'       => array(
                            'option-1'      => __('Option 1', 'fl-builder'),
                            'option-2'      => __('Option 2', 'fl-builder'),
                            'option-3'      => __('Option 3', 'fl-builder')
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
                    'photo_field'    => array(
                        'type'          => 'photo',
                        'label'         => __('Photo Field', 'fl-builder')
                    ),
                    'photos_field'   => array(
                        'type'          => 'multiple-photos',
                        'label'         => __('Multiple Photos Field', 'fl-builder')
                    ),
                    'video_field'    => array(
                        'type'          => 'video',
                        'label'         => __('Video Field', 'fl-builder')
                    ),
                    'icon_field'     => array(
                        'type'          => 'icon',
                        'label'         => __('Icon Field', 'fl-builder'),
                        'show_remove'   => true
                    ),
                    'link_field'     => array(
                        'type'          => 'link',
                        'label'         => __('Link Field', 'fl-builder')
                    ),
                    'form_field'     => array(
                        'type'          => 'form',
                        'label'         => __('Form Field', 'fl-builder'),
                        'form'          => 'example_settings_form', // ID from registered form below
                        'preview_text'  => 'example' // Name of a field to use for the preview text
                    ),
                    'suggest_field'  => array(
                        'type'          => 'suggest',
                        'label'         => __('Suggest Field', 'fl-builder'),
                        'action'        => 'fl_as_posts',
                        'data'          => 'post'
                    ),
                    'editor_field'   => array(
                        'type'          => 'editor',
                        'label'         => '',
                        'media_buttons' => true,
                        'rows'          => 10
                    ),
                    'custom_field_example' => array(
                        'type'          => 'my-custom-field',
                        'label'         => __('Custom Field Example', 'fl-builder'),
                        'default'       => ''
                    ),
                )
            )
        )
    ),
    'toggle'       => array( // Tab
        'title'         => __('Toggle', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('Toggle Example', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'toggle_me'     => array(
                        'type'          => 'select',
                        'label'         => __('Toggle Me!', 'fl-builder'),
                        'default'       => 'option-1',
                        'options'       => array(
                            'option-1'      => __('Option 1', 'fl-builder'),
                            'option-2'      => __('Option 2', 'fl-builder')
                        ),
                        'toggle'        => array(
                            'option-1'      => array(
                                'fields'        => array('toggle_text', 'toggle_text2'),
                                'sections'      => array('toggle_section')
                            ),
                            'option-2'      => array()
                        )
                    ),
                    'toggle_text'   => array(
                        'type'          => 'text',
                        'label'         => __('Hide Me!', 'fl-builder'),
                        'default'       => '',
                        'description'   => 'I get hidden when you toggle the select above.'
                    ),
                    'toggle_text2'   => array(
                        'type'          => 'text',
                        'label'         => __('Me Too!', 'fl-builder'),
                        'default'       => ''
                    )
                )
            ),
            'toggle_section' => array( // Section
                'title'         => __('Hide This Section!', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'some_text'     => array(
                        'type'          => 'text',
                        'label'         => __('Text', 'fl-builder'),
                        'default'       => ''
                    )
                )
            )
        )
    ),
    'multiple'      => array( // Tab
        'title'         => __('Multiple', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('Multiple Example', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'test'          => array(
                        'type'          => 'text',
                        'label'         => __('Multiple Test', 'fl-builder'),
                        'multiple'      => true // Doesn't work with editor or photo fields
                    )
                )
            )
        )
    ),
    'include'       => array( // Tab
        'title'         => __('Include', 'fl-builder'), // Tab title
        'file'          => FL_MODULE_EXAMPLES_DIR . 'example/includes/settings-example.php'
    )
));

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('example_settings_form', array(
    'title' => __('Example Form Settings', 'fl-builder'),
    'tabs'  => array(
        'general'      => array( // Tab
            'title'         => __('General', 'fl-builder'), // Tab title
            'sections'      => array( // Tab Sections
                'general'       => array( // Section
                    'title'         => '', // Section Title
                    'fields'        => array( // Section Fields
                        'example'       => array(
                            'type'          => 'text',
                            'label'         => __('Example', 'fl-builder'),
                            'default'       => 'Some example text'
                        )
                    )
                )
            )
        ),
        'another'       => array( // Tab
            'title'         => __('Another Tab', 'fl-builder'), // Tab title
            'sections'      => array( // Tab Sections
                'general'       => array( // Section
                    'title'         => '', // Section Title
                    'fields'        => array( // Section Fields
                        'another_example' => array(
                            'type'          => 'text',
                            'label'         => __('Another Example', 'fl-builder')
                        )
                    )
                )
            )
        )
    )
));
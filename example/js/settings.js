(function($){

    /**
     * Use this file to register a module helper that
     * adds additional logic to the settings form. The
     * method 'FLBuilder._registerModuleHelper' accepts
     * two parameters, the module slug (same as the folder name)
     * and an object containing the helper methods and properties.
     */
    FLBuilder._registerModuleHelper('example', {
        
        /**
         * The 'rules' property is where you setup
         * validation rules that are passed to the jQuery
         * validate plugin (http://jqueryvalidation.org).
         *
         * @property rules
         * @type object
         */
        rules: {
            text_field: {
                number: true,
                required: true
            },
            textarea_field: {
                required: true
            }
        },
        
        /**
         * The 'init' method is called by the builder when 
         * the settings form is opened.
         *
         * @method init
         */
        init: function()
        {
            
        },
        
        /**
         * The 'submit' method is called by the builder when 
         * the settings form is submitted and has passed validation.
         * You must return true for the form to submit. Return false
         * to stop the form from being submitted.
         *
         * @method submit
         */
        submit: function()
        {
            var result = confirm('Do you really want to save this module?');
            
            return result; 
        }
    });

    /**
     * Validate a nested form created with 'type' => 'form'. 
     */
    FLBuilder._registerModuleHelper('example_settings_form', {
        
        rules: {
            example: {
                required: true
            }
        },
        
        init: function()
        {

        },
        
        submit: function()
        {
            var result = confirm('Do you really want to save this form?');
            
            return result; 
        }
    });

})(jQuery);
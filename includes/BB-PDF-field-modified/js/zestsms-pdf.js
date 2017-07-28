(function($){

    ZestSMSPDFUpload = {
        _singlePDFSelector: null,

        _init: function()
        {
            $('body').delegate('.fl-pdf-field .fl-pdf-select', 'click', ZestSMSPDFUpload._selectSinglePDF);
            $('body').delegate('.fl-pdf-field .fl-pdf-replace', 'click', ZestSMSPDFUpload._selectSinglePDF);
            $('body').delegate('.fl-pdf-field .fl-pdf-remove', 'click', ZestSMSPDFUpload._removeSinglePDF);
        },

        _selectSinglePDF: function()
        { 
            if(ZestSMSPDFUpload._singlePDFSelector === null) {
            
                ZestSMSPDFUpload._singlePDFSelector = wp.media({
                    title: 'Select File',
                    button: { text: 'Select File' },
                    library : { },
                    multiple: false
                }); 
            }
            
            ZestSMSPDFUpload._singlePDFSelector.once('select', $.proxy(ZestSMSPDFUpload._singlePDFSelected, this));
            ZestSMSPDFUpload._singlePDFSelector.open();
        },

        _singlePDFSelected: function()
        {
            var pdf      = ZestSMSPDFUpload._singlePDFSelector.state().get('selection').first().toJSON(),
                wrap       = $(this).closest('.fl-pdf-field'),
                image      = wrap.find('.fl-pdf-preview-img img'),
                filename   = wrap.find('.fl-pdf-preview-filename'),
                pdfField = wrap.find('input[type=hidden]');
            
            image.attr('src', pdf.icon);
            filename.html(pdf.filename);
            wrap.removeClass('fl-pdf-empty');
            wrap.find('label.error').remove();
            pdfField.val(pdf.id).trigger('change');
        },

        _removeSinglePDF: function()
        {
            var wrap       = $(this).closest('.fl-pdf-field'),
                image      = wrap.find('.fl-pdf-preview-img img'),
                filename   = wrap.find('.fl-pdf-preview-filename'),
                pdfField = wrap.find('input[type=hidden]');
                
            image.attr('src', '');
            filename.html('');
            wrap.addClass('fl-pdf-empty');
            pdfField.val('').trigger('change');
        }

    };
    
    $(function(){
        ZestSMSPDFUpload._init();
    });
    
})(jQuery);
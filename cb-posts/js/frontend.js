(function($) {

	FLBuilderPostGrid = function(settings)
	{
		this.settings       = settings;
		this.nodeClass      = '.fl-node-' + settings.id;
		this.wrapperClass   = this.nodeClass + ' .fl-post-' + this.settings.layout;
		this.postClass      = this.wrapperClass + '-post';
		this.matchHeight	= settings.matchHeight;
		
		if(this._hasPosts()) {
			this._initLayout();
			this._initInfiniteScroll();
		}
	};

	FLBuilderPostGrid.prototype = {
	
		settings        : {},
		nodeClass       : '',
		wrapperClass    : '',
		postClass       : '',
		gallery         : null,
		
		_hasPosts: function()
		{
			return $(this.postClass).length > 0;
		},
		
		_initLayout: function()
		{
			switch(this.settings.layout) {
				
				case 'grid':
				this._gridLayout();
				break;
				
				case 'gallery':
				this._galleryLayout();
				break;
			}
			
			$(this.postClass).css('visibility', 'visible');
		},
	  
		_gridLayout: function()
		{
			var wrap = $(this.wrapperClass);
			
			wrap.masonry({
				columnWidth         : this.nodeClass + ' .fl-post-grid-sizer',
				gutter              : parseInt(this.settings.postSpacing),
				isFitWidth          : true,
				itemSelector        : this.postClass,
				transitionDuration  : 0
			});
				
			wrap.imagesLoaded( $.proxy( function() {
				this._gridLayoutMatchHeight();
				wrap.masonry();
			}, this ) );
		},
	  
		_gridLayoutMatchHeight: function()
		{
			var highestBox = 0;
			
			if ( 0 === this.matchHeight ) {
				return;
			}
			
            $(this.postClass).css('height', '').each(function(){
                
                if($(this).height() > highestBox) {
                	highestBox = $(this).height();
                }
            });
                
            $(this.postClass).height(highestBox);
		},
		
		_galleryLayout: function()
		{
			this.gallery = new FLBuilderGalleryGrid({
				'wrapSelector' : this.wrapperClass,
				'itemSelector' : '.fl-post-gallery-post'
			});
		},
	
		_initInfiniteScroll: function()
		{
			if(this.settings.pagination == 'scroll' && typeof FLBuilder === 'undefined') {
				this._infiniteScroll();
			}
		},
		
		_infiniteScroll: function(settings)
		{
			$(this.wrapperClass).infinitescroll({
				navSelector     : this.nodeClass + ' .fl-builder-pagination',
				nextSelector    : this.nodeClass + ' .fl-builder-pagination a.next',
				itemSelector    : this.postClass,
				prefill         : true,
				bufferPx        : 200,
				loading         : {
					msgText         : 'Loading',
					finishedMsg     : '',
					img             : FLBuilderLayoutConfig.paths.pluginUrl + 'img/ajax-loader-grey.gif',
					speed           : 1
				}
			}, $.proxy(this._infiniteScrollComplete, this));
			
			setTimeout(function(){
				$(window).trigger('resize');
			}, 100);
		},
		
		_infiniteScrollComplete: function(elements)
		{
			var wrap = $(this.wrapperClass);
			
			elements = $(elements);
			
			if(this.settings.layout == 'grid') {
				wrap.imagesLoaded( $.proxy( function() {
					this._gridLayoutMatchHeight();
					wrap.masonry('appended', elements);
					elements.css('visibility', 'visible');
				}, this ) );
			}
			else if(this.settings.layout == 'gallery') {
				this.gallery.resize();
				elements.css('visibility', 'visible');
			}
		}
	};

})(jQuery);
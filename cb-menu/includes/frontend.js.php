<?php

	// set defaults
	$type 				= isset( $settings->menu_layout ) ? $settings->menu_layout : 'horizontal';
	$mobile 			= isset( $settings->mobile_toggle ) ? $settings->mobile_toggle : 'expanded';
	$below_row 			= 'below' == $settings->mobile_full_width ? 'true' : 'false';
	$mobile_breakpoint 	= isset( $settings->mobile_breakpoint ) ? $settings->mobile_breakpoint : 'mobile';

	?>

(function($) {

	$(function() {

		new FLCBBuilderMenu({
			id: '<?php echo $id ?>',
			type: '<?php echo $type ?>',
			mobile: '<?php echo $mobile ?>',
			mobileBelowRow: <?php echo $below_row ?>,
			breakPoints: {
				medium: <?php echo $global_settings->medium_breakpoint ?>,
				small: <?php echo $global_settings->responsive_breakpoint ?>
			},
			mobileBreakpoint: '<?php echo $mobile_breakpoint ?>'
		});

	});

})(jQuery);

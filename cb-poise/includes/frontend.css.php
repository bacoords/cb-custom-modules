/**
 * This file should contain frontend styles that 
 * will be applied to individual module instances.
 *
 * You have access to three variables in this file: 
 * 
 * $module An instance of your module class.
 * $id The module's ID.
 * $settings The module's settings.
 *
 * Example: 
 */
@media(min-width:786px){
	<?php if($settings->cb_poise_text_field) { ?>

				.fl-node-<?php echo $id; ?> .cb-poise-col{
					width:calc(100% / <?php echo $settings->cb_poise_text_field; ?>);
					float:left;
					padding:5px;
				}

	<?php } else { ?>

				.fl-node-<?php echo $id; ?> .cb-poise-col{
					width:20%;
					float:left;
					padding:5px;
				}
	<?php } ?>
}
@media(max-width:786px){
	.fl-node-<?php echo $id; ?> .cb-poise-col{
		width:100%;
		float:left;
		padding:5px;
	}
}
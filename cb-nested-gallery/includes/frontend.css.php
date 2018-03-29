
<?php if( $font = $settings->cb_nested_gallery_font_heading ) { ?>
  .fl-node-<?php echo $id; ?> .cb-nested-gallery--heading{
    font-family: <?php echo $font['family']; ?>;
    font-weight: <?php echo $font['weight']; ?>;
  }
<?php } ?>

<?php if(  $font = $settings->cb_nested_gallery_font_content ) { ?>
  .fl-node-<?php echo $id; ?> .cb-nested-gallery--content{
    font-family: <?php echo $font['family']; ?>;
    font-weight: <?php echo $font['weight']; ?>;
  }
<?php } ?>

<?php if( $font = $settings->cb_nested_gallery_font_link) { ?>
  .fl-node-<?php echo $id; ?> .cb-nested-gallery--link{
    font-family: <?php echo $font['family']; ?>;
    font-weight: <?php echo $font['weight']; ?>;
  }
<?php } ?>

<?php if( $color = $settings->cb_nested_gallery_slider_bg) { ?>
  .fl-node-<?php echo $id; ?> .cb-nested-gallery--sub{
    background: #<?php echo $color; ?>;
  }
<?php } ?>

<?php if( $color = $settings->cb_nested_gallery_color_heading) { ?>
  .fl-node-<?php echo $id; ?> .cb-nested-gallery--heading{
    color: #<?php echo $color; ?>;
  }
<?php } ?>

<?php if( $color = $settings->cb_nested_gallery_color_content) { ?>
  .fl-node-<?php echo $id; ?> .cb-nested-gallery--content{
    color: #<?php echo $color; ?>;
  }
<?php } ?>

<?php if( $color = $settings->cb_nested_gallery_color_link) { ?>
  .fl-node-<?php echo $id; ?> .cb-nested-gallery--link,
  .fl-node-<?php echo $id; ?> .cb-nested-gallery--toggle{
    color: #<?php echo $color; ?>;
  }
<?php } ?>

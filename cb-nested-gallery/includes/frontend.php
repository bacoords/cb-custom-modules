<?php

/**
 * This file should be used to render each module instance.
 * You have access to two variables in this file:
 *
 * $module An instance of your module class.
 * $settings The module's settings.
 *
 * Example:
 */

?>
<?php // Display slideshow ?>


<?php if( $gallery = $settings->cb_nested_gallery_form_repeater ) : ?>
  <?php $index = 0; ?>
  <div class="cb-nested-gallery-container">
    <?php foreach( $gallery as $item ) : ?>
      <div class="cb-nested-gallery--item">
        <div class="cb-nested-gallery-<?php echo $index; ?> cb-nested-gallery--top">
          <a href="#" class="cb-nested-gallery--toggle" data-toggle=".cb-nested-gallery-<?php echo $index; ?>">
            <img src="<?php echo $item->cb_nested_gallery_photo_src; ?>" alt="" class="cb-nested-gallery--photo" title="<?php echo $item->cb_nested_gallery_label; ?>">
          </a>
        </div>
        <div class="cb-nested-gallery-<?php echo $index; ?> cb-nested-gallery--sub">
          <div class="row">
            <div class="col-sm-12">
              <div class="text-right">
                <a href="#" class="cb-nested-gallery--toggle" data-toggle=".cb-nested-gallery-<?php echo $index; ?>">
                  &times;
                </a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <?php if( $item_gallery = json_decode( $item->cb_nested_gallery_gallery) ) : ?>
                <div class="row cb-nested-gallery--gallery">
                  <?php foreach( $item_gallery as $photo ) : ?>
                    <div class="col-sm-6 col-md-4">
                      <?php $src = wp_get_attachment_image_src($photo, 'full'); ?>
                      <a href="<?php echo $src[0]; ?>">
                        <?php echo wp_get_attachment_image($photo, 'medium', false, array('class'=>'cb-nested-gallery--photo')); ?>
                      </a>
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            </div>
            <div class="col-sm-12 col-md-6">
              <h4 class="cb-nested-gallery--heading"><?php echo $item->cb_nested_gallery_label; ?></h4>
              <div class="cb-nested-gallery--content">
                <?php echo $item->cb_nested_gallery_content; ?>
              </div>
              <a href="<?php echo $item->cb_nested_gallery_link; ?>" class="cb-nested-gallery--link"><?php echo $item->cb_nested_gallery_link_text; ?></a>
            </div>
          </div>
        </div>

      </div>
      <?php $index++; ?>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

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
 

<?php if($settings->cb_scout_elem_bg_color){ ?>
.fl-node-<?php echo $id; ?> .cb-scout{
  background: #<?php echo $settings->cb_scout_elem_bg_color; ?>;
}
<?php } ?>

<?php if($settings->cb_scout_text_color_main){ ?>
.fl-node-<?php echo $id; ?> .cb-scout ul li a{
  color: #<?php echo $settings->cb_scout_text_color_main; ?>;
}
<?php } ?>

<?php if($settings->cb_scout_text_color_hover){ ?>
.fl-node-<?php echo $id; ?> .cb-scout ul li a:hover{
  color: #<?php echo $settings->cb_scout_text_color_hover; ?>;
}
<?php } ?>

<?php if($settings->cb_scout_bg_color_main){ ?>
.fl-node-<?php echo $id; ?> .cb-scout ul li a{
  background: #<?php echo $settings->cb_scout_bg_color_main; ?>;
}
<?php } ?>

<?php if($settings->cb_scout_bg_color_hover){ ?>
.fl-node-<?php echo $id; ?> .cb-scout ul li a:hover{
  background: #<?php echo $settings->cb_scout_bg_color_hover; ?>;
}
<?php } ?>

<?php if($settings->cb_scout_text_align == 'flex-start'){ ?>
.fl-node-<?php echo $id; ?> .cb-scout ul{
  -webkit-box-pack: start;-webkit-justify-content: flex-start;-ms-flex-pack: start;justify-content: flex-start;
}
<?php } ?>
<?php if($settings->cb_scout_text_align == 'flex-end'){ ?>
.fl-node-<?php echo $id; ?> .cb-scout ul{
  -webkit-box-pack: end; -webkit-justify-content: flex-end; -ms-flex-pack: end; justify-content: flex-end;
}
<?php } ?>

<?php if($settings->cb_scout_text_align == 'space-between'){ ?>
.fl-node-<?php echo $id; ?> .cb-scout ul li{
   -webkit-box-pack: justify;-webkit-justify-content: space-between;-ms-flex-pack: justify;justify-content: space-between;
  -webkit-box-flex: 1;-webkit-flex-grow: 1;-ms-flex-positive: 1;flex-grow: 1;
}
<?php } ?>

How to use

Upload to the php file and assets folder your custom modules folder

In bb_date_field.php change FL_MODULE_EXAMPLES_URL to the plugins url of your module as you would have defined

include( FL_MODULE_EXAMPLES_URL . '/bb_date_field.php');

To use in your modules form add your field like this

'my_date_field' => array(
	'type'          => 'date',
	'label'         => __( 'Date', 'fl-builder' ),
	'help'          => __( 'Choose your date.', 'fl-builder' )
),
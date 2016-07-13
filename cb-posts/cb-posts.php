<?php

/**
 * @class CBPostsModule
 */
class CBPostsModule extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'          	=> __('CB Posts', 'fl-builder'),
			'description'   	=> __('WordPress posts meet CB Custom Modules.', 'fl-builder'),
			'category'      	=> __('CB Custom Modules', 'fl-builder'),
      'dir'           => CB_CUSTOM_MODULE_DIR . 'cb-posts/',
      'url'           => CB_CUSTOM_MODULE_URL . 'cb-posts/',
      'partial_refresh' => true,
			'editor_export' 	=> false,
			'partial_refresh'	=> true
		));
	}

	/**
	 * @method enqueue_scripts
	 */
	public function enqueue_scripts()
	{
		if(FLBuilderModel::is_builder_active() || $this->settings->layout == 'shade') {
			$this->add_js('jquery-masonry');
		}
//		if(FLBuilderModel::is_builder_active() || $this->settings->layout == 'gallery') {
//			$this->add_js('fl-gallery-grid');
//		}
//		if(FLBuilderModel::is_builder_active() || $this->settings->pagination == 'scroll') {
//			$this->add_js('jquery-infinitescroll');
//		}
	}

	/**
	 * Renders the schema structured data for the current
	 * post in the loop.
	 *
	 * @since 1.7.4
	 * @return void
	 */
	static public function schema_meta()
	{
		// General Schema Meta
		echo '<meta itemscope itemprop="mainEntityOfPage" itemid="' . get_permalink() . '" />';
		echo '<meta itemprop="datePublished" content="' . get_the_time('Y-m-d') . '" />';
		echo '<meta itemprop="dateModified" content="' . get_the_modified_date('Y-m-d') . '" />';
		
		// Publisher Schema Meta
		echo '<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">';
		echo '<meta itemprop="name" content="' . get_bloginfo( 'name' ) . '">';
		
		if ( class_exists( 'FLTheme' ) && 'image' == FLTheme::get_setting( 'fl-logo-type' ) ) {
			echo '<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">';
			echo '<meta itemprop="url" content="' . FLTheme::get_setting( 'fl-logo-image' ) . '">';
			echo '</div>';
		}
		
		echo '</div>';
		
		// Author Schema Meta
		echo '<div itemscope itemprop="author" itemtype="http://schema.org/Person">';
		echo '<meta itemprop="url" content="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" />';
		echo '<meta itemprop="name" content="' . get_the_author_meta( 'display_name', get_the_author_meta( 'ID' ) ) . '" />';
		echo '</div>';
		
		// Image Schema Meta
		if(has_post_thumbnail()) {
			
			$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
			
			if ( is_array( $image ) ) {
				echo '<div itemscope itemprop="image" itemtype="http://schema.org/ImageObject">';
				echo '<meta itemprop="url" content="' . $image[0] . '" />';
				echo '<meta itemprop="width" content="' . $image[1] . '" />';
				echo '<meta itemprop="height" content="' . $image[2] . '" />';
				echo '</div>';
			}
		}
		
		// Comment Schema Meta
		echo '<div itemprop="interactionStatistic" itemscope itemtype="http://schema.org/InteractionCounter">';
		echo '<meta itemprop="interactionType" content="http://schema.org/CommentAction" />';
		echo '<meta itemprop="userInteractionCount" content="' . wp_count_comments(get_the_ID())->approved . '" />';
		echo '</div>';
	}

	/**
	 * Renders the schema itemtype for the current
	 * post in the loop.
	 *
	 * @since 1.7.4
	 * @return void
	 */
	static public function schema_itemtype()
	{
		global $post;
		
		if ( ! is_object( $post ) || ! isset( $post->post_type ) || 'post' != $post->post_type ) {
			echo 'http://schema.org/CreativeWork';
		}
		else {
			echo 'http://schema.org/BlogPosting';
		}
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('CBPostsModule', array(
	'layout'        => array(
		'title'         => __('Layout', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'layout'        => array(
						'type'          => 'select',
						'label'         => __('Layout Style', 'fl-builder'),
						'default'       => 'grid',
						'options'       => array(
							'shade'          => __('Shade', 'fl-builder'),
//							'gallery'       => __('Gallery', 'fl-builder'),
//							'feed'          => __('Feed', 'fl-builder'),
						),
						'toggle'        => array(
							'grid'          => array(
								'sections'      => array('grid', 'image', 'content'),
								'fields'        => array('show_author', 'match_height')
							),
							'feed'          => array(
								'sections'      => array('image', 'content'),
								'fields'        => array('image_position', 'show_author', 'show_comments', 'content_type')
							),
							'gallery'		=> array(
								'tabs'			=> array( 'style' )
							)
						)
					),
					'match_height'  => array(
						'type'          => 'select',
						'label'         => __('Equal Heights', 'fl-builder'),
						'default'       => '0',
						'options'       => array(
							'1'             => __('Yes', 'fl-builder'),
							'0'             => __('No', 'fl-builder')
						)
					),
					'pagination'     => array(
						'type'          => 'select',
						'label'         => __('Pagination Style', 'fl-builder'),
						'default'       => 'numbers',
						'options'       => array(
							'numbers'       => __('Numbers', 'fl-builder'),
							'scroll'        => __('Scroll', 'fl-builder'),
							'none'          => _x( 'None', 'Pagination style.', 'fl-builder' ),
						)
					),
					'posts_per_page' => array(
						'type'          => 'text',
						'label'         => __('Posts Per Page', 'fl-builder'),
						'default'       => '10',
						'size'          => '4'
					),
					'no_results_message' => array(
						'type' 				=> 'text',
						'label'				=> __('No Results Message', 'fl-builder'),
						'default'			=> __('No Posts Found.', 'fl-builder')
					)
				)
			),
			'grid'          => array(
				'title'         => __('Grid', 'fl-builder'),
				'fields'        => array(
					'post_width'    => array(
						'type'          => 'text',
						'label'         => __('Post Width', 'fl-builder'),
						'default'       => '300',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'post_spacing'  => array(
						'type'          => 'text',
						'label'         => __('Post Spacing', 'fl-builder'),
						'default'       => '60',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
				)
			),
			'image'        => array(
				'title'         => __( 'Featured Image', 'fl-builder' ),
				'fields'        => array(
					'show_image'    => array(
						'type'          => 'select',
						'label'         => __('Image', 'fl-builder'),
						'default'       => '1',
						'options'       => array(
							'1'             => __('Show', 'fl-builder'),
							'0'             => __('Hide', 'fl-builder')
						),
						'toggle'        => array(
							'1'             => array(
								'fields'        => array('image_size')
							)
						)
					),
					'image_position' => array(
						'type'          => 'select',
						'label'         => __('Position', 'fl-builder'),
						'default'       => 'above',
						'options'       => array(
							'above-title'   => __('Above Title', 'fl-builder'),
							'above'         => __('Above Text', 'fl-builder'),
							'beside'        => __('Beside Text', 'fl-builder')
						)
					),
					'image_size'    => array(
						'type'          => 'photo-sizes',
						'label'         => __('Size', 'fl-builder'),
						'default'       => 'medium'
					),
				)
			),
			'info'          => array(
				'title'         => __( 'Post Info', 'fl-builder' ),
				'fields'        => array(
					'show_author'   => array(
						'type'          => 'select',
						'label'         => __('Author', 'fl-builder'),
						'default'       => '1',
						'options'       => array(
							'1'             => __('Show', 'fl-builder'),
							'0'             => __('Hide', 'fl-builder')
						)
					),
					'show_date'     => array(
						'type'          => 'select',
						'label'         => __('Date', 'fl-builder'),
						'default'       => '1',
						'options'       => array(
							'1'             => __('Show', 'fl-builder'),
							'0'             => __('Hide', 'fl-builder')
						),
						'toggle'        => array(
							'1'             => array(
								'fields'        => array('date_format')
							)
						)
					),
					'date_format'   => array(
						'type'          => 'select',
						'label'         => __('Date Format', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'		=> __('Default', 'fl-builder'),
							'M j, Y'        => date('M j, Y'),
							'F j, Y'        => date('F j, Y'),
							'm/d/Y'         => date('m/d/Y'),
							'm-d-Y'         => date('m-d-Y'),
							'd M Y'         => date('d M Y'),
							'd F Y'         => date('d F Y'),
							'Y-m-d'         => date('Y-m-d'),
							'Y/m/d'         => date('Y/m/d'),
						)
					),
					'show_comments' => array(
						'type'          => 'select',
						'label'         => __('Comments', 'fl-builder'),
						'default'       => '1',
						'options'       => array(
							'1'             => __('Show', 'fl-builder'),
							'0'             => __('Hide', 'fl-builder')
						)
					),
				)
			),
			'content'       => array(
				'title'         => __( 'Content', 'fl-builder' ),
				'fields'        => array(
					'show_content'  => array(
						'type'          => 'select',
						'label'         => __('Content', 'fl-builder'),
						'default'       => '1',
						'options'       => array(
							'1'             => __('Show', 'fl-builder'),
							'0'             => __('Hide', 'fl-builder')
						)
					),
					'content_type'  => array(
						'type'          => 'select',
						'label'         => __('Content Type', 'fl-builder'),
						'default'       => 'excerpt',
						'options'       => array(
							'excerpt'        => __('Excerpt', 'fl-builder'),
							'full'           => __('Full Text', 'fl-builder')
						)
					),
					'show_more_link' => array(
						'type'          => 'select',
						'label'         => __('More Link', 'fl-builder'),
						'default'       => '0',
						'options'       => array(
							'1'             => __('Show', 'fl-builder'),
							'0'             => __('Hide', 'fl-builder')
						)
					),
					'more_link_text' => array(
						'type'          => 'text',
						'label'         => __('More Link Text', 'fl-builder'),
						'default'       => __('Read More', 'fl-builder'),
					),
				)
			)
		)
	),
	'style'         => array( // Tab
		'title'         => __('Style', 'fl-builder'), // Tab title
		'sections'      => array( // Tab Sections
			'gallery_general'          => array(
				'title'         => '',
				'fields'        => array(
					'hover_transition'   => array(
						'type'          => 'select',
						'label'         => __('Hover Transition', 'fl-builder'),
						'default'       => 'fade',
						'options'       => array(
							'fade'			=> __('Fade', 'fl-builder'),
							'slide-up'     	=> __('Slide Up', 'fl-builder'),
							'slide-down'   	=> __('Slide Down', 'fl-builder'),
							'scale-up'   	=> __('Scale Up', 'fl-builder'),
							'scale-down'   	=> __('Scale Down', 'fl-builder'),
						)
					),
				)
			),
			'icons'          => array(
				'title'         => __('Icons', 'fl-builder'),
				'fields'        => array(
					'has_icon'   => array(
						'type'          => 'select',
						'label'         => __('Use Icon for Posts', 'fl-builder'),
						'default'       => 'no',
						'options'       => array(
							'yes'			=> __('Yes', 'fl-builder'),
							'no' 	      	=> __('No', 'fl-builder'),
						),
						'toggle'		=> array(
							'yes'			=> array(
								'fields'		=> array( 'icon', 'icon_position', 'icon_color', 'icon_size' )
							)
						),
					),
					'icon'  => array(
						'type'          => 'icon',
						'label'         => __('Post Icon', 'fl-builder'),
					),
					'icon_position'   => array(
						'type'          => 'select',
						'label'         => __('Post Icon Position', 'fl-builder'),
						'default'       => 'above',
						'options'       => array(
							'above'			=> __('Above Text', 'fl-builder'),
							'below'       	=> __('Below Text', 'fl-builder'),
						)
					),
					'icon_size'  => array(
						'type'          => 'text',
						'label'         => __('Post Icon Size', 'fl-builder'),
						'default'       => '24',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
				)
			),
			'text_style'    => array(
				'title'         => __('Colors', 'fl-builder'),
				'fields'        => array(
					'text_color'    => array(
						'type'          => 'color',
						'label'         => __('Text Color', 'fl-builder'),
						'default'       => 'ffffff',
						'show_reset'    => true
					),
					'icon_color' => array(
						'type'          => 'color',
						'label'         => __('Post Icon Color', 'fl-builder'),
						'show_reset'    => true
					),
					'text_bg_color' => array(
						'type'          => 'color',
						'label'         => __('Text Background Color', 'fl-builder'),
						'default'       => '333333',
						'help'          => __('The color applies to the overlay behind text over the background selections.', 'fl-builder'),
						'show_reset'    => true
					),
					'text_bg_opacity' => array(
						'type'          => 'text',
						'label'         => __('Text Background Opacity', 'fl-builder'),
						'default'       => '50',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => '%'
					),
				)
			),
		)
	),
	'content'   => array(
		'title'         => __('Content', 'fl-builder'),
		'file'          => FL_BUILDER_DIR . 'includes/loop-settings.php',
	)
));
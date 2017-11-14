<?php 


function cvcard_setup() {

	if ( ! isset( $content_width ) )
	$content_width = 663;
	
	load_theme_textdomain( 'cvcard', get_template_directory() . '/lang' );
	
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );	

	add_theme_support('custom-background');

	add_theme_support( 'post-thumbnails',array('post','portfolio'));
	


	register_nav_menus(array(
		'top-menu' => __( 'Top Menu', 'cvcard' ),		
		));
	
}
add_action( 'after_setup_theme', 'cvcard_setup' );

/* Redux Framework and TGM */
require get_template_directory() . '/admin/admin-init.php';


function cvcard_scripts_styles() {
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

		
	wp_enqueue_script('masonry');

	wp_enqueue_script('bootstrap',get_template_directory_uri().'/js/bootstrap.js',array('jquery'),'',true);	


	wp_enqueue_script('imagesloaded',get_template_directory_uri().'/js/imagesloaded.js',array('jquery'),'',true);	

	wp_enqueue_script('GoogleMaps','https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false',array('jquery'),'',true);		
	
	wp_enqueue_script('smoothscroll',get_template_directory_uri().'/js/smooth-scroll.js',array('jquery'),'',true);	

	wp_enqueue_script('fitvids',get_template_directory_uri().'/js/fitvids.js',array('jquery'),'',true);			

	wp_enqueue_script('cvcard-custom',get_template_directory_uri().'/js/cvcard-custom.js',array('jquery'),'',true);


	wp_enqueue_style( 'cvcard-style', get_stylesheet_uri(), array(), '' );


	wp_register_style('googleFontsRoboto','//fonts.googleapis.com/css?family=Lato:300,400,700,900');
    wp_enqueue_style( 'googleFontsRoboto'); 
	
}
add_action( 'wp_enqueue_scripts', 'cvcard_scripts_styles' );




function cvcard_title($title){

	$name=get_bloginfo('title');

	$desc=get_bloginfo('description');

	$title.=$name.' | '.$desc;

	return $title;

}

add_filter('wp_title','cvcard_title');



function cvcard_menu(){ ?>

	<ul class="nav navbar-nav">
		<?php wp_list_pages(array('title_li' => '','depth' => 1)); ?>
	</ul>

<?php }



function cvcard_custom_comment_form($defaults) {
	
	
	$defaults['comment_notes_before'] = '';	
	$defaults['id_form'] = 'comment-form';
	$defaults['comment_field'] = '<p><textarea name="comment" id="comment" class="form-control" rows="6"></textarea></p>';

	return $defaults;
}

add_filter('comment_form_defaults', 'cvcard_custom_comment_form');

function cvcard_custom_comment_fields() {
	$commenter = wp_get_current_commenter();
	$req = get_option('require_name_email');
	$aria_req = ($req ? " aria-required='true'" : '');
	
	$fields = array(
		'author' => '<p>' . 
						'<input id="author" name="author" type="text" class="form-control" placeholder="Name ( required )" value="' . esc_attr($commenter['comment_author']) . '" ' . $aria_req . ' />' .
						
		            '</p>',
		'email' => '<p>' . 
						'<input id="email" name="email" type="text" class="form-control" placeholder="Email ( required )" value="' . esc_attr($commenter['comment_author_email']) . '" ' . $aria_req . ' />'  .
		            '</p>',
		'url' => '<p>' . 
						'<input id="url" name="url" type="text" class="form-control" placeholder="Website" value="' . esc_attr($commenter['comment_author_url']) . '" />'  .
		            '</p>'
	);

	return $fields;
}

add_filter('comment_form_default_fields', 'cvcard_custom_comment_fields');



function cvcard_head(){ 

	global $cvcard;

	if(isset($cvcard['favicon']['url'])){
		echo '<link rel="shortcut icon" href="'.$cvcard['favicon']['url'].'">';	
	}

	if(isset($cvcard['opt-css'])){
		echo '<style>'.$cvcard['opt-css'].'</style>';
	}

 }


add_action('wp_head','cvcard_head');



function cvcard_footer(){

	global $cvcard;

	if(isset($cvcard['opt-js'])){
		echo '<script>'.$cvcard['opt-js'].'</script>';
	}

}

add_action('wp_footer','cvcard_footer',20);



define('ACF_LITE',true);




if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_add-a-map',
		'title' => 'Add a Map',
		'fields' => array (
			array (
				'key' => 'field_53d29eff9aa6b',
				'label' => 'Google Map',
				'name' => 'google_map',
				'type' => 'google_map',
				'instructions' => 'Add the location where you are',
				'center_lat' => 39,
				'center_lng' => 35,
				'zoom' => 6,
				'height' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-contact.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	
	register_field_group(array (
		'id' => 'acf_portfolio-content',
		'title' => 'Portfolio Content',
		'fields' => array (
			array (
				'key' => 'field_53d39b03635f3',
				'label' => 'Image',
				'name' => 'portfolio_image',
				'type' => 'image',
				'instructions' => 'Upload an image for portfolio content. ',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'portfolio',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_skills-2',
		'title' => 'Skills 2',
		'fields' => array (
			array (
				'key' => 'field_541df3b787daa',
				'label' => 'Area Title',
				'name' => 'area_title_two',
				'type' => 'text',
				'instructions' => 'Give a title for this area',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => 100,
			),
			array (
				'key' => 'field_541de1963ffbb',
				'label' => 'Area 1',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_541de2753ffbc',
				'label' => 'Progress Bar Title',
				'name' => 'progress_bar_title_five',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_541de2923ffbd',
				'label' => 'Progress Bar Percent',
				'name' => 'progress_bar_percent_five',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 5,
				'max' => 100,
				'step' => 5,
			),
			array (
				'key' => 'field_541de2d43ffbe',
				'label' => 'Area 2',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_541de2de3ffbf',
				'label' => 'Progress Bar Title',
				'name' => 'progress_bar_title_six',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_541de2ff3ffc0',
				'label' => 'Progress Bar Percent',
				'name' => 'progress_bar_percent_six',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 5,
				'max' => 100,
				'step' => 5,
			),
			array (
				'key' => 'field_541de3173ffc1',
				'label' => 'Area 3',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_541de35f3ffc4',
				'label' => 'Progress Bar Title',
				'name' => 'progress_bar_title_seven',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_541de3473ffc3',
				'label' => 'Progress Bar Percent',
				'name' => 'progress_bar_percent_seven',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 5,
				'max' => 100,
				'step' => 5,
			),
			array (
				'key' => 'field_541de3783ffc5',
				'label' => 'Area 4',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_541de38f3ffc6',
				'label' => 'Progress Bar Title',
				'name' => 'progress_bar_title_eight',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_541de39f3ffc7',
				'label' => 'Progress Bar Percent',
				'name' => 'progress_bar_percent_eight',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 5,
				'max' => 100,
				'step' => 5,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-resume.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

	register_field_group(array (
		'id' => 'acf_skills-3',
		'title' => 'Skills 3',
		'fields' => array (
			array (
				'key' => 'field_54383bb43044c',
				'label' => 'Area Title',
				'name' => 'area_title_3',
				'type' => 'text',
				'instructions' => 'Give a title for this area',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54383bf83044d',
				'label' => 'Area 1',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54383c083044e',
				'label' => 'Progress Bar Title',
				'name' => 'progress_bar_title_nine',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54383c213044f',
				'label' => 'Progress Bar Percent',
				'name' => 'progress_bar_percent_nine',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 5,
				'max' => 100,
				'step' => 5,
			),
			array (
				'key' => 'field_54383c4330450',
				'label' => 'Area 2',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54383c5a30452',
				'label' => 'Progress Bar Title',
				'name' => 'progress_bar_title_ten',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54383c6d30453',
				'label' => 'Progress Bar Percent',
				'name' => 'progress_bar_percent_ten',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 5,
				'max' => 100,
				'step' => 5,
			),
			array (
				'key' => 'field_54383c8930454',
				'label' => 'Area 3',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54383c9b30455',
				'label' => 'Progress Bar Title',
				'name' => 'progress_bar_title_eleven',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54383cba30456',
				'label' => 'Progress Bar Percent',
				'name' => 'progress_bar_percent_eleven',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 5,
				'max' => 100,
				'step' => 5,
			),
			array (
				'key' => 'field_54383cd530457',
				'label' => 'Area 4',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54383ce230458',
				'label' => 'Progress Bar Title',
				'name' => 'progress_bar_title_twelve',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54383d0130459',
				'label' => 'Progress Bar Percent',
				'name' => 'progress_bar_percent_twelve',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 5,
				'max' => 100,
				'step' => 5,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-resume.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_skills-4',
		'title' => 'Skills 4',
		'fields' => array (
			array (
				'key' => 'field_54383d90d0b36',
				'label' => 'Area Title',
				'name' => 'area_title_4',
				'type' => 'text',
				'instructions' => 'Give a title for this area',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54383db1d0b37',
				'label' => 'Area 1',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54383dbad0b38',
				'label' => 'Progress Bar Title',
				'name' => 'progress_bar_title_thirteen',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_543840a8d0b39',
				'label' => 'Progress Bar Percent',
				'name' => 'progress_bar_percent_thirteen',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 5,
				'max' => 100,
				'step' => 5,
			),
			array (
				'key' => 'field_543840c5d0b3a',
				'label' => 'Area 2',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_543840d2d0b3b',
				'label' => 'Progress Bar Title',
				'name' => 'progress_bar_title_fourteen',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_543840e7d0b3c',
				'label' => 'Progress Bar Percent',
				'name' => 'progress_bar_percent_fourteen',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 5,
				'max' => 100,
				'step' => 5,
			),
			array (
				'key' => 'field_54384104d0b3d',
				'label' => 'Area 3',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_5438410fd0b3e',
				'label' => 'Progress Bar Title',
				'name' => 'progress_bar_title_fifteen',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54384128d0b3f',
				'label' => 'Progress Bar Percent',
				'name' => 'progress_bar_percent_fifteen',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 5,
				'max' => 100,
				'step' => 5,
			),
			array (
				'key' => 'field_54384140d0b40',
				'label' => 'Area 4',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54384149d0b41',
				'label' => 'Progress Bar Title',
				'name' => 'progress_bar_title_sixteen',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5438415ed0b42',
				'label' => 'Progress Bar Percent',
				'name' => 'progress_bar_percent_sixteen',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 5,
				'max' => 100,
				'step' => 5,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-resume.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

	register_field_group(array (
		'id' => 'acf_skills-5',
		'title' => 'Skills 5',
		'fields' => array (
			array (
				'key' => 'field_543841b3d3e29',
				'label' => 'Area Title',
				'name' => 'area_title_5',
				'type' => 'text',
				'instructions' => 'Give a title for this area',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_543841cad3e2a',
				'label' => 'Area 1',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_543841d6d3e2b',
				'label' => 'Progress Bar Title',
				'name' => 'progress_bar_title_seventeen',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_543841e9d3e2c',
				'label' => 'Progress Bar Percent',
				'name' => 'progress_bar_percent_seventeen',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 5,
				'max' => 100,
				'step' => 5,
			),
			array (
				'key' => 'field_543841ffd3e2d',
				'label' => 'Area 2',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54384207d3e2e',
				'label' => 'Progress Bar Title',
				'name' => 'progress_bar_title_eighteen',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5438421bd3e2f',
				'label' => 'Progress Bar Percent',
				'name' => 'progress_bar_percent_eighteen',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 5,
				'max' => 100,
				'step' => 5,
			),
			array (
				'key' => 'field_54384239d3e30',
				'label' => 'Area 3',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54384244d3e31',
				'label' => 'Progress Bar Title',
				'name' => 'progress_bar_title_nineteen',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54384259d3e32',
				'label' => 'Progress Bar Percent',
				'name' => 'progress_bar_percent_nineteen',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 5,
				'max' => 100,
				'step' => 5,
			),
			array (
				'key' => 'field_54384271d3e33',
				'label' => 'Area 4',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_5438427ad3e34',
				'label' => 'Progress Bar Title',
				'name' => 'progress_bar_title_twenty',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54384287d3e35',
				'label' => 'Progress Bar Percent',
				'name' => 'progress_bar_percent_twenty',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 5,
				'max' => 100,
				'step' => 5,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-resume.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	

register_field_group(array (
		'id' => 'acf_skills',
		'title' => 'Skills 1',
		'fields' => array (
			array (
				'key' => 'field_541df18224c09a',
				'label' => 'Area Title',
				'name' => 'area_title_one',
				'type' => 'text',
				'instructions' => 'Give a title for this area.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => 100,
			),
			array (
				'key' => 'field_53d377dff8b8f',
				'label' => 'Area 1',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_53d36873f6921',
				'label' => 'Progress Bar Title',
				'name' => 'progress_bar_title_one',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d36909f6922',
				'label' => 'Progress Bar Percent',
				'name' => 'progress_bar_percent_one',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 5,
				'max' => 100,
				'step' => 5,
			),
			array (
				'key' => 'field_53d377f1f8b90',
				'label' => 'Area 2',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_53d36b12f6923',
				'label' => 'Progress Bar Title',
				'name' => 'progress_bar_title_two',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d36b25f6924',
				'label' => 'Progress Bar Percent',
				'name' => 'progress_bar_percent_two',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 5,
				'max' => 100,
				'step' => 5,
			),
			array (
				'key' => 'field_53d377fcf8b91',
				'label' => 'Area 3',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_53d36b61f6925',
				'label' => 'Progress Bar Title',
				'name' => 'progress_bar_title_three',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d36b7ff6926',
				'label' => 'Progress Bar Percent',
				'name' => 'progress_bar_percent_three',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 5,
				'max' => 100,
				'step' => 5,
			),
			array (
				'key' => 'field_53d37806f8b92',
				'label' => 'Area 4',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_53d36bd7f6927',
				'label' => 'Progress Bar Title',
				'name' => 'progress_bar_title_four',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d36bebf6928',
				'label' => 'Progress Bar Percent',
				'name' => 'progress_bar_percent_four',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 5,
				'max' => 100,
				'step' => 5,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-resume.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 0,
	));


	register_field_group(array (
		'id' => 'acf_social-media',
		'title' => 'Social Media',
		'fields' => array (
			array (
				'key' => 'field_53d378cb2cb1b',
				'label' => 'Facebook',
				'name' => 'facebook',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'ex : https://www.facebook.com/WordPress',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d378fb2cb1c',
				'label' => 'Twitter',
				'name' => 'twitter',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d379022cb1d',
				'label' => 'LinkedIn',
				'name' => 'linkedin',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d379132cb1e',
				'label' => 'Github',
				'name' => 'github',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d379242cb1f',
				'label' => 'Behance',
				'name' => 'behance',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d379342cb20',
				'label' => 'Google Plus',
				'name' => 'google_plus',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d379482cb21',
				'label' => 'Pinterest',
				'name' => 'pinterest',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d379512cb22',
				'label' => 'Instagram',
				'name' => 'instagram',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d3796c2cb23',
				'label' => 'WordPress',
				'name' => 'wordpress',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d379792cb24',
				'label' => 'Youtube',
				'name' => 'youtube',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d379822cb25',
				'label' => 'Vine',
				'name' => 'vine',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d3798c2cb26',
				'label' => 'Rss',
				'name' => 'rss',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d379a62cb27',
				'label' => 'Digg',
				'name' => 'digg',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d379ba2cb28',
				'label' => 'Dribbble',
				'name' => 'dribbble',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d379c52cb29',
				'label' => 'Flickr',
				'name' => 'flickr',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-contact.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
register_field_group(array (
		'id' => 'acf_experience-2',
		'title' => 'Experience 2',
		'fields' => array (
			array (
				'key' => 'field_541df18224c09',
				'label' => 'Area Title',
				'name' => 'area_title_four',
				'type' => 'text',
				'instructions' => 'Give a title for this area.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => 100,
			),
			array (
				'key' => 'field_541dd9e102095',
				'label' => 'Area 1',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_541dda1002096',
				'label' => 'Experience Name',
				'name' => 'experience_name_five',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_541dda4302097',
				'label' => 'Start Date',
				'name' => 'start_date_five',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_541dda6602098',
				'label' => 'Leave Date',
				'name' => 'leave_date_five',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_541dda9a02099',
				'label' => 'Affiliation',
				'name' => 'affiliation_five',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_541ddab70209a',
				'label' => 'Experience Summary',
				'name' => 'experience_summary_five',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 8,
				'formatting' => 'none',
			),
			array (
				'key' => 'field_541ddb56c74a0',
				'label' => 'Area 2',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_541ddb69c74a1',
				'label' => 'Experience Name',
				'name' => 'experience_name_six',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_541ddb85c74a2',
				'label' => 'Start Date',
				'name' => 'start_date_six',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_541ddba8c74a3',
				'label' => 'Leave Date',
				'name' => 'leave_date_six',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_541ddbc0c74a4',
				'label' => 'Affiliation',
				'name' => 'affiliation_six',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_541ddbdbc74a5',
				'label' => 'Experience Summary',
				'name' => 'experience_summary_six',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 8,
				'formatting' => 'none',
			),
			array (
				'key' => 'field_541ddc193b660',
				'label' => 'Area 3',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_541ddc263b661',
				'label' => 'Experience Name',
				'name' => 'experience_name_seven',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_541ddc3e3b662',
				'label' => 'Start Date',
				'name' => 'start_date_seven',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_541ddc533b663',
				'label' => 'Leave Date',
				'name' => 'leave_date_seven',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_541ddc663b664',
				'label' => 'Affiliation',
				'name' => 'affiliation_seven',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_541ddc873b665',
				'label' => 'Experience Summary',
				'name' => 'experience_summary_seven',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 8,
				'formatting' => 'none',
			),
			array (
				'key' => 'field_541ddcad3b666',
				'label' => 'Area 4',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_541dddbc3b667',
				'label' => 'Experience Name',
				'name' => 'experience_name_eight',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_541dde053b668',
				'label' => 'Start Date',
				'name' => 'start_date_eight',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_541dde193b669',
				'label' => 'Leave Date',
				'name' => 'leave_date_eight',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_541dde293b66a',
				'label' => 'Affiliation',
				'name' => 'affiliation_eight',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_541dde433b66b',
				'label' => 'Experience Summary',
				'name' => 'experience_summary_eight',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 8,
				'formatting' => 'none',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-resume.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	
register_field_group(array (
		'id' => 'acf_experience',
		'title' => 'Experience 1',
		'fields' => array (
			array (
				'key' => 'field_541df3b787daab',
				'label' => 'Area Title',
				'name' => 'area_title_three',
				'type' => 'text',
				'instructions' => 'Give a title for this area',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => 100,
			),
			array (
				'key' => 'field_53d370f66391d',
				'label' => 'Area 1',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_53d3700763917',
				'label' => 'Experience Name',
				'name' => 'experience_name_one',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d3705e63918',
				'label' => 'Start Date',
				'name' => 'start_date_one',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d3707263919',
				'label' => 'Leave Date',
				'name' => 'leave_date_one',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d370976391a',
				'label' => 'Affiliation',
				'name' => 'affiliation_one',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d370c36391b',
				'label' => 'Experience Summary',
				'name' => 'experience_summary_one',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'none',
			),
			array (
				'key' => 'field_53d37156abb74',
				'label' => 'Area 2',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_53d3711c6391f',
				'label' => 'Experience Name',
				'name' => 'experience_name_two',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d3754561c0d',
				'label' => 'Start Date',
				'name' => 'start_date_two',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d3756b61c0e',
				'label' => 'Leave Date',
				'name' => 'leave_date_two',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d3758461c0f',
				'label' => 'Affiliation',
				'name' => 'affiliation_two',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d375b661c10',
				'label' => 'Experience Summary',
				'name' => 'experience_summary_two',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'none',
			),
			array (
				'key' => 'field_53d375ca61c11',
				'label' => 'Area 3',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_53d375f461c12',
				'label' => 'Experience Name',
				'name' => 'experience_name_three',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d3760161c13',
				'label' => 'Start Date',
				'name' => 'start_date_three',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d3760b61c14',
				'label' => 'Leave Date',
				'name' => 'leave_date_three',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d3761361c15',
				'label' => 'Affiliation ',
				'name' => 'affiliation_three',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d3761d61c16',
				'label' => 'Experience Summary',
				'name' => 'experience_summary_three',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'none',
			),
			array (
				'key' => 'field_53d3768061c17',
				'label' => 'Area 4',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_53d376c361c18',
				'label' => 'Experience Name',
				'name' => 'experience_name_four',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d376c861c19',
				'label' => 'Start Date',
				'name' => 'start_date_four',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d376cd61c1a',
				'label' => 'Leave Date',
				'name' => 'leave_date_four',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d376d361c1b',
				'label' => 'Affiliation',
				'name' => 'affiliation_four',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53d376d861c1c',
				'label' => 'Experience Summary',
				'name' => 'experience_summary_four',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'none',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-resume.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 0,
	));
}
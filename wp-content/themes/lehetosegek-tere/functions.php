<?php

/**
 * Theme setup.
 */
function tailpress_setup()
{
	add_theme_support('title-tag');

	register_nav_menus(
		array(
			'primary' => __('Primary Menu', 'tailpress'),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	add_theme_support('custom-logo');
	add_theme_support('post-thumbnails');

	add_theme_support('align-wide');
	add_theme_support('wp-block-styles');

	add_theme_support('editor-styles');
	add_editor_style('css/editor-style.css');
}

add_action('after_setup_theme', 'tailpress_setup');

/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts()
{
	$theme = wp_get_theme();

	wp_enqueue_style('tailpress', tailpress_asset('css/app.css'), array(), $theme->get('Version'));
	wp_enqueue_script('tailpress', tailpress_asset('js/app.js'), array(), $theme->get('Version'));
}

add_action('wp_enqueue_scripts', 'tailpress_enqueue_scripts');
add_action('admin_enqueue_scripts', 'tailpress_enqueue_scripts');

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function tailpress_asset($path)
{
	if (wp_get_environment_type() === 'production') {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg('time', time(), get_stylesheet_directory_uri() . '/' . $path);
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_li_class($classes, $item, $args, $depth)
{
	if (isset($args->li_class)) {
		$classes[] = $args->li_class;
	}

	if (isset($args->{"li_class_$depth"})) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter('nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4);

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_submenu_class($classes, $args, $depth)
{
	if (isset($args->submenu_class)) {
		$classes[] = $args->submenu_class;
	}

	if (isset($args->{"submenu_class_$depth"})) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter('nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3);


// Pretty dump for debug
function pretty_dump($data)
{
	highlight_string("<?php\n\$data =\n" . var_export($data, true) . ";\n?>");
};

// Custom events filter
function filter_events()
{
	$postType = $_POST['type'];
	$catSlug = $_POST['category'];
	$keyword = $_POST['keyword'];
	$after = $_POST['after'];
	$before = $_POST['before'];

	$acf_after = date('Y-m-d H:i:s', strtotime($_POST['after']));
	$acf_before = date('Y-m-d H:i:s', strtotime($_POST['before']));

	$ajaxposts = new WP_Query([
		'post_type' => $postType,
		'posts_per_page' => -1,
		'category_name' => $catSlug,
		'order_by' => 'date',
		'order' => 'desc',
		's' => $keyword,
		'meta_query' => [
			'relation' => 'AND',
			[
				'relation' => 'OR',
				[
					'key' => 'date_start',
					'value' => $acf_after,
					'compare' => '>=',
					'type' => 'DATE',
				],
				[
					'key' => 'date_end',
					'value' => $acf_after,
					'compare' => '>=',
					'type' => 'DATE',
				]
			],
			[
				'relation' => 'OR',
				[
					'key' => 'date_start',
					'value' => $acf_before,
					'compare' => '<=',
					'type' => 'DATE',
				],
				[
					'key' => 'date_end',
					'value' => $acf_before,
					'compare' => '<=',
					'type' => 'DATE',
				]
			]
		],
	]);
	$response = '';

	if ($ajaxposts->have_posts()) :
		while ($ajaxposts->have_posts()):
			$ajaxposts->the_post();
			ob_start(); // start output buffering

			include('template-parts/event-card.php');

			$response .= ob_get_clean(); // Clean the output buffer and return it as a string, then concatenate to response.

		endwhile;

	else: 
		$response = 'empty';
	endif;

	echo $response;
	die();
}
add_action('wp_ajax_filter_events', 'filter_events');
add_action('wp_ajax_nopriv_filter_events', 'filter_events');


// Get Event by Id
function get_event_cpt()
{
	// Get the event ID from the AJAX request
	$event_id = isset($_POST['event_id']) ? intval($_POST['event_id']) : 0;
	// Get the custom post type event
	$event = get_post($event_id);

	// Check if the event exists
	if ($event) {
		// The ID of the featured image of the event
		$featured_image_id = get_post_thumbnail_id($event_id);

		// Array to store the URLs of the featured image in different sizes
		$featured_image_urls = array();

		// Get all the registered image sizes
		$image_sizes = get_intermediate_image_sizes();

		foreach ($image_sizes as $size) {
			// Get the URL of the featured image in the current size
			$image_src = wp_get_attachment_image_src($featured_image_id, $size);
		
			// If the size is valid, add it to the array
			if ($image_src) {
				$featured_image_urls[$size] = array(
								 'url'   => $image_src[0],
								 'width'  => $image_src[1],
								 'height' => $image_src[2]
						);
			}
		}

		// Prepare the event data
		$event_data = array(
			'ID' => $event->ID,
			'title' => $event->post_title,
			'content' => $event->post_content,
			'excerpt' => $event->post_excerpt,
			'status' => $event->post_status,
			'name' => $event->post_name,
			'type' => $event->post_type,
			'date' => $event->post_date,
			'date_start' => get_field('date_start', $event_id),
			'date_end' => get_field('date_end', $event_id),
			'location' => get_field('location', $event_id),
			'categories' => wp_get_post_terms($event_id, 'category', array('fields' => 'names')),
			'featured_image' => $featured_image_urls
		);
		// Send the event data back as a response
		wp_send_json($event_data);
	} else {
		wp_send_json(array('error' => 'No event found'));
	}
	// You do not need to use wp_die() when using wp_send_json() 

	// Always die in functions echoing AJAX content
	wp_die();
}

add_action('wp_ajax_nopriv_get_event_cpt', 'get_event_cpt');
add_action('wp_ajax_get_event_cpt', 'get_event_cpt');

// Google Maps api
function my_acf_init()
{

	acf_update_setting('google_api_key', 'AIzaSyDeP4ryFQciimjVom6oct41S9WjrMUYV3o');
}

add_action('acf/init', 'my_acf_init');

// Disable Block editor on specified post types
function my_disable_gutenberg( $current_status, $post_type ) {

	// Disabled post types
	$disabled_post_types = array( 'staff', 'gallery', 'publication', 'founder' );

	// Change $can_edit to false for any post types in the disabled post types array
	if ( in_array( $post_type, $disabled_post_types, true ) ) {
			$current_status = false;
	}

	return $current_status;
}
add_filter( 'use_block_editor_for_post_type', 'my_disable_gutenberg', 10, 2 );


// Register string for Polylang
if(function_exists('pll_register_string')) {
	pll_register_string( 'cpttitles', 'Partnereink' );
	pll_register_string( 'cpttitles', 'Stáb' );
	pll_register_string( 'cpttitles', 'Galéria' );
	pll_register_string( 'cpttitles', 'Kiadványaink' );
	pll_register_string( 'cpttitles', 'Alapító Tagok' );
	pll_register_string( 'sectiontitles', 'Iratkozz fel a
	programajánlónk' );
	pll_register_string( 'sectiontitles', 'Rólunk mondták' );
	pll_register_string( 'partners', 'A Lehetőségek Tere a tranzit.hu kezdeményezése. A tranzit.hu fő partnere az erste alapítvány.' );
	pll_register_string( 'random', 'elérhető' );
	pll_register_string( 'footer', 'Kövessetek bennünket!' );
	pll_register_string( 'footer', 'Partnerek' );
	pll_register_string( 'footer', 'Kapcsolat' );
}

/**
 * We use WordPress's init hook to make sure
 * our blocks are registered early in the loading
 * process.
 *
 * @link https://developer.wordpress.org/reference/hooks/init/
 */

function fz_register_acf_blocks() {
	/**
	 * We register our block's with WordPress's handy
	 * register_block_type();
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_block_type/
	 */
	register_block_type( __DIR__ . '/blocks/testimonial' );
	register_block_type( __DIR__ . '/blocks/big-carousel' );
	register_block_type( __DIR__ . '/blocks/big-carousel-alt' );
	register_block_type( __DIR__ . '/blocks/card-grid' );
	register_block_type( __DIR__ . '/blocks/partners' );
}
// Here we call our fz_register_acf_block() function on init.
add_action( 'init', 'fz_register_acf_blocks' );
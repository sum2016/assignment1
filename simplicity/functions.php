<?php
/**
 * simplicity functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package simplicity
 */

if ( ! function_exists( 'simplicity_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function simplicity_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on simplicity, use a find and replace
	 * to change 'simplicity' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'simplicity', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'simplicity' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'simplicity_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'simplicity_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function simplicity_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'simplicity_content_width', 640 );
}
add_action( 'after_setup_theme', 'simplicity_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function simplicity_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'simplicity' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'simplicity' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'simplicity_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function simplicity_scripts() {
	wp_enqueue_style( 'simplicity-style', get_stylesheet_uri() );

	wp_enqueue_script( 'simplicity-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'simplicity-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'simplicity_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/** MY CODES
*
**/

/**
* Enquire Google Fonts
*/
function googlefonts() {
	$query_args = array(
		'family' => 'Prompt:400|Marcellus+SC:400'
	);
	wp_register_style( 'googlefonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
	wp_enqueue_style('googlefonts');
}   
add_action('wp_enqueue_scripts', 'googlefonts');

/**
* Register New Menus
*/
register_nav_menus( array(
	'menufoot' => ('Footer Menu')
));

/**
* Customizes Gravatar
*/
//**Reference** line 28-33 from Code Play Love link: http://codeplaylove.com/add-custom-gravatar/
function custom_gravatar ($avatar_defaults) {
    $myavatar = get_stylesheet_directory_uri() . '/img/logo.png'; //**Reference** Image Created by Hyue Lin Kang
    $avatar_defaults[$myavatar] = __( 'Simplicity Gravatar', 'simplicity' );
    return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'custom_gravatar' );

/**
* Header Image
*/
$headimg=array('default-image'=>get_template_directory_uri() . '/img/hlogo.png');
add_theme_support ('custom-header', $headimg);

/**
* The Theme Options
*/

require get_stylesheet_directory() . '/inc/options.php';

/**
* Custom Post Types
* Reference from Codex: https://codex.wordpress.org/Post_Types & https://codex.wordpress.org/Function_Reference/register_post_type
*/

function portfolio_post_type() {
  register_post_type( 'portfolio',
    array(
    	'labels' => array( //customize label texts
    		'name' => 'Portfolio',
    		'singular_name' => 'Portfolio',
    		'add_new' => 'Add Portfolio',
    		'add_new_item' => 'Add New Portfolio',
      		'edit_item' => 'Edit Portfolio',
      		'new_item' => 'New Portfolio',
      		'view_item' => 'View Portfolio',
      		'search_items' => 'Search Portfolio',
      		'not_found' => 'No Portfolio Found',
      		'not_found_in_trash' => 'No Portfolio has been trashed',
      		'parent_item_colon' => 'Parent Portfolio',
      		'all_items' => 'All Portfolio'
      	),
      	'public' => true, //controls visibility
      	'menu_position' => 4, //menu position - 5 sets it below posts
      	'menu_icon' => 'dashicons-portfolio', //change menu icon to home icon & Reference: https://developer.wordpress.org/resource/dashicons/#portfolio
      	'has_archive' => true, //Enables post type archives
      	'can_export' => false //Disable post export
	)  
  );
}
add_action( 'init', 'portfolio_post_type' );

/**
* Custom Meta Box
* Reference from Codex: https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes & http://www.talkofweb.com/wordpress-meta-box-add-extra-input-fields-post/
*/

//Create Meta Box
function link_meta_box() {  
    add_meta_box(
    	'link_meta_box_id', //set ID
    	'Link of the Advertisment', //title to display at the top of the meta box
    	'link_metabox', //function for render
    	'portfolio', //where to display the meta box
    	'normal',	//set location to display the meta box
    	'default'	//set location to play the meta box
    );  
}  
add_action( 'add_meta_boxes', 'link_meta_box' );  

//Meta Box Content
function link_metabox() {
    wp_nonce_field( basename( __FILE__ ), 'link_meta_box_nonce' );
    $address = get_post_meta(get_the_ID(), 'link_key', true);
    $infodp = '<label>Link: </label><input type="text" name="link" value="'.$address.'"/>';
    echo $infodp;
}

//Save Information Inputted Into Meta Box
function link_meta_box_save( $post_id ){   
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
    if ( !isset( $_POST['link_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['link_meta_box_nonce'], basename( __FILE__ ) ) ) return;
    if( !current_user_can( 'edit_post' ) ) return;  
    if( isset( $_POST['link'] ) )  
        update_post_meta( $post_id, 'link_key', esc_attr( $_POST['link'], $allowed ) );
}
add_action( 'save_post', 'link_meta_box_save' ); 
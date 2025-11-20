<?php
/**
 * rosebudthornjd functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rosebudthornjd
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rosebudthornjd_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on rosebudthornjd, use a find and replace
		* to change 'rosebudthornjd' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'rosebudthornjd', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'rosebudthornjd' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'rosebudthornjd_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'rosebudthornjd_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rosebudthornjd_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rosebudthornjd_content_width', 640 );
}
add_action( 'after_setup_theme', 'rosebudthornjd_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rosebudthornjd_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'rosebudthornjd' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'rosebudthornjd' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'rosebudthornjd_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rosebudthornjd_scripts() {
	wp_enqueue_style( 'rosebudthornjd-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'rosebudthornjd-style', 'rtl', 'replace' );

	wp_enqueue_script( 'rosebudthornjd-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rosebudthornjd_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Register Rose Bud Thorn Entry CPT
function rbt_register_entry_cpt() {
    $labels = array(
        'name'               => 'RBT Entries',
        'singular_name'      => 'RBT Entry',
        'add_new'            => 'Add New Entry',
        'add_new_item'       => 'Add New RBT Entry',
        'edit_item'          => 'Edit RBT Entry',
        'new_item'           => 'New RBT Entry',
        'view_item'          => 'View RBT Entry',
        'search_items'       => 'Search RBT Entries',
        'not_found'          => 'No entries found',
        'not_found_in_trash' => 'No entries found in Trash',
        'menu_name'          => 'Rose Bud Thorn'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_rest'       => true,
        'supports'           => array( 'title' ),
        'has_archive'        => true,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-heart',

		// 🔒 Extra privacy
		'exclude_from_search' => true,      // don't show in WP search
		'publicly_queryable'  => true,      // still allow front-end views (we lock them ourselves)
		'show_in_nav_menus'   => false,     // can't accidentally add to menus
    );
    register_post_type( 'rbt_entry', $args );
}
add_action( 'init', 'rbt_register_entry_cpt' );

//function handles page-RBT New Entry
function rbt_handle_new_entry_form() {
	if (
		$_SERVER['REQUEST_METHOD'] === 'POST'
		&& isset($_POST['rbt_form_nonce'])
		&& wp_verify_nonce($_POST['rbt_form_nonce'], 'rbt_new_entry')
	) {
		$rose   = isset($_POST['rbt_rose']) ? sanitize_textarea_field($_POST['rbt_rose']) : '';
		$bud    = isset($_POST['rbt_bud']) ? sanitize_textarea_field($_POST['rbt_bud']) : '';
		$thorn  = isset($_POST['rbt_thorn']) ? sanitize_textarea_field($_POST['rbt_thorn']) : '';
		$stage  = isset($_POST['rbt_stage']) ? sanitize_text_field($_POST['rbt_stage']) : '';
		$action = isset($_POST['rbt_suggested_action']) ? sanitize_textarea_field($_POST['rbt_suggested_action']) : '';

		// Basic guard: don't save completely empty entries
		if ( $rose || $bud || $thorn ) {
			$timestamp = current_time('timestamp'); // raw Unix timestamp
			
			// Create the RBT entry post
			$post_id = wp_insert_post(array(
				'post_type'   => 'rbt_entry',
				'post_status' => 'publish',
				'post_title'  => 'RBT Entry ' . wp_date('M-j, Y H:i', $timestamp),
    			'post_date'   => wp_date('Y-m-d H:i', $timestamp),
			));


			if ( ! is_wp_error($post_id) ) {
				// ACF fields (using FIELD NAMES from your ACF group)
				update_field('rose', $rose, $post_id);
				update_field('bud', $bud, $post_id);
				update_field('thorn', $thorn, $post_id);
				update_field('stage', $stage, $post_id);
				update_field('suggested_action', $action, $post_id);
				// Save ACF timestamp field
				update_field('rbt_timestamp', $timestamp, $post_id);

				// Redirect to avoid resubmission on refresh
				wp_redirect( add_query_arg('rbt_saved', '1', get_permalink()) );
				exit;
			}
		}
	}
}
rbt_handle_new_entry_form();

//PRIVACY function handles privacy for all entries "lock the RBT area" 
function rbt_restrict_rbt_content() {
    // Don't interfere with wp-admin
    if ( is_admin() ) {
        return;
    }

    // Slugs of your RBT pages – adjust if different
    $protected_pages = array(
        'rbt-dashboard',   // your dashboard page slug
        'rbt-new-entry',   // your new entry page slug
    );

    $is_rbt_page =
        is_page( $protected_pages ) ||
        is_singular( 'rbt_entry' ) ||          // single RBT entries
        is_post_type_archive( 'rbt_entry' );   // if you ever use an archive

    if ( $is_rbt_page && ! is_user_logged_in() ) {
        // Sends user to login and then back to the page they tried to access
        auth_redirect();
    }
}
add_action( 'template_redirect', 'rbt_restrict_rbt_content' );

//PRIVACY Add noindex meta tags for RBT pages + entries
function rbt_noindex_private_pages() {
    if ( is_admin() ) {
        return;
    }

    // Same slugs you used in rbt_restrict_rbt_content()
    $protected_pages = array(
        'rbt-dashboard',
        'rbt-new-entry',
    );

    if (
        is_page( $protected_pages ) ||
        is_singular( 'rbt_entry' ) ||
        is_post_type_archive( 'rbt_entry' )
    ) {
        echo '<meta name="robots" content="noindex, nofollow" />' . "\n";
    }
}
add_action( 'wp_head', 'rbt_noindex_private_pages' );

//PRIVACY Lock the REST API for RBT entries (logged-in only)
function rbt_lock_rest_rbt_entries( $result, $server, $request ) {
    $route = $request->get_route();

    // Only care about rbt_entry routes
    if ( strpos( $route, '/wp/v2/rbt_entry' ) !== false ) {
        if ( ! is_user_logged_in() ) {
            return new WP_Error(
                'rest_forbidden',
                __( 'You are not allowed to access RBT entries.', 'rbt' ),
                array( 'status' => 401 )
            );
        }
    }

    return $result;
}
add_filter( 'rest_pre_dispatch', 'rbt_lock_rest_rbt_entries', 10, 3 );
<?php
/**
 * architecture functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package architecture
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.2' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function architecture_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on architecture, use a find and replace
		* to change 'architecture' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'architecture', get_template_directory() . '/languages' );

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
			'menu-main' => esc_html__( 'Main', 'architecture' ),
            'menu-footer-1' => esc_html__( 'Footer 1', 'architecture' ),
            'menu-footer-2' => esc_html__( 'Footer 2', 'architecture' ),
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
			'architecture_custom_background_args',
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
			'height'      => 39,
			'width'       => 39,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'architecture_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function architecture_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'architecture_content_width', 640 );
}
add_action( 'after_setup_theme', 'architecture_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function architecture_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'architecture' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'architecture' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'architecture_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function architecture_scripts() {
	//wp_enqueue_style( 'architecture-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_enqueue_style( 'architecture-style', get_template_directory_uri() . '/assets/css/styles.css', array(), _S_VERSION );

	wp_style_add_data( 'architecture-style', 'rtl', 'replace' );

	//wp_enqueue_script( 'architecture-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'architecture_scripts' );

function architecture_scripts_footer() {

    wp_enqueue_style( 'architecture-modal', get_template_directory_uri() . '/assets/css/modal.css', array() );
    wp_enqueue_style( 'architecture-fullpage', get_template_directory_uri() . '/assets/css/fullpage.css', array() );
    wp_enqueue_style( 'architecture-slick', get_template_directory_uri() . '/assets/js/slick/slick.css', array() );
    wp_enqueue_style( 'architecture-slick-theme', get_template_directory_uri() . '/assets/js/slick/slick-theme.css', array() );
    wp_enqueue_style( 'architecture-fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.css', array() );
    wp_enqueue_style( 'architecture-slick-theme', get_template_directory_uri() . '/assets/js/slick/slick-theme.css', array() );

    wp_enqueue_script( 'architecture-jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '', true );
    wp_enqueue_script( 'architecture-modal', get_template_directory_uri() . '/assets/js/modal.js', array(), '', true );
    wp_enqueue_script( 'architecture-scrolloverflow', get_template_directory_uri() . '/assets/js/scrolloverflow.min.js', array(), '', true );
    wp_enqueue_script( 'architecture-fullpage-scrolloverflow-reset', get_template_directory_uri() . '/assets/js/fullpage.scrollOverflowReset.limited.min.js', array(), '', true );
    wp_enqueue_script( 'architecture-fullpage', get_template_directory_uri() . '/assets/js/fullpage.js', array(), '', true );
    wp_enqueue_script( 'architecture-fullpage-extensions', get_template_directory_uri() . '/assets/js/fullpage.extensions.min.js', array(), '', true );
    wp_enqueue_script( 'architecture-slick', get_template_directory_uri() . '/assets/js/slick/slick.js', array(), '', true );
    wp_enqueue_script( 'architecture-fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox.min.js', array(), '', true );
    wp_enqueue_script( 'architecture-nicescroll', get_template_directory_uri() . '/assets/js/jquery.nicescroll.min.js', array(), '', true );
    wp_enqueue_script( 'architecture-count-up', get_template_directory_uri() . '/assets/js/countUp.js', array(), '', true );
    wp_enqueue_script( 'architecture-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), '', true );
}

add_action( 'wp_footer', 'architecture_scripts_footer' );

function enable_svg_upload( $upload_mimes ) {
    $upload_mimes['svg'] = 'image/svg+xml';
    $upload_mimes['svgz'] = 'image/svg+xml';
    return $upload_mimes;
}
add_filter( 'upload_mimes', 'enable_svg_upload', 10, 1 );


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

add_image_size( 'project-thumb', 1100, 685, true );

add_image_size( 'project-thumb-vertical', 685, 1100,true );

/**
 * get html template part
 *
 * @param String $template_part
 * @param Array $plural
 *
 * @return String
 */
function getHtmlTemplatePart($template_part, $args = array())
{
    ob_start();
    get_template_part($template_part, null, $args);
    $html = ob_get_contents();
    ob_end_clean();
    return $html;
}

/**
 * get projects by taxonomy id with pagination
 *
 *
 * @return String
 */
function getProjects(){

    $posts_per_page = $_POST["posts_per_page"];
    $taxonomyId = $_POST["taxonomyId"];
    $paged = $_POST["page"];
    $taxonomy = $_POST["taxonomy"];
    $posts = "";
    $posts_on_page = true;

    if ($taxonomyId === 'all') {
        $args = array(
            'post_type'         => 'projects',
            'posts_per_page'    => $posts_per_page,
            'paged' 		    => $paged,
            'meta_key'			=> 'acf_project-sort',
            'orderby'			=> 'meta_value_num',
            'order'			    => 'ASC',
        );

        $allPostsCount = count( get_posts( [
            'post_type'         => 'projects',
            'posts_per_page'    => -1
        ]) );
    }
    else {
        $args = array(
            'post_type'              => 'projects',
            'posts_per_page'         => $posts_per_page,
            'paged' 				 => $paged,
            'tax_query'              => array(
                array(
                    'taxonomy'   => $taxonomy,
                    'field'      => 'term_id',
                    'terms'      => $taxonomyId
                )
            ),
            'meta_key'			     => 'acf_project-sort',
            'orderby'			     => 'meta_value_num',
            'order'				     => 'ASC'
        );

        $term = get_term( $taxonomyId , $taxonomy );
        $allPostsCount = $term->count;

    }

    $posts_on_page = $posts_per_page * $paged;

    $last = ($allPostsCount <= $posts_on_page) ? true : false;

    $_query = new WP_Query( $args );
    ob_start();

    if($_query->have_posts() ){
        while($_query->have_posts()){
            $_query->the_post();
            $post_id = get_the_ID();

            $args = array(
                'posts_count'   => count($_query->posts),
                'cat_id'        => $taxonomyId
            );

            $posts = $posts . getHtmlTemplatePart('/template-parts/content-projects-item', $args);
            //get_template_part( '/theme-parts/archive/loop' );
        }
        wp_reset_postdata();
    }

    wp_send_json( array(
        "posts" => $posts,
        "last" => $last,
        "count"=> $allPostsCount,
        "postsNow"=> $posts_on_page

    ));

    ob_end_flush();

    die();
}

add_action('wp_ajax_nopriv_get-projects','getProjects');
add_action('wp_ajax_get-projects','getProjects');

function explodeMoreText($text = '', $class = '') {

    $returnText = '';
    $explodeMoreText = explode("<!--more-->", $text);


    if ( count($explodeMoreText) > 2) {
        $returnText .= '<div class="text ' . $class . '">' . array_shift($explodeMoreText) . '<div class="more-text">' . implode(" ", $explodeMoreText) . '</div></div>';
    }
    else if (count($explodeMoreText) == 2) {
        $returnText .= '<div class="text ' . $class . '">' . $explodeMoreText[0] . '<div class="more-text">' . $explodeMoreText[1] . '</div></div>';
    }
    else {
        $returnText .= '<div class="text ' . $class . '">' . get_sub_field('acf_questions-text') . '</div>';
    }

    if ( count(explode("<!--more-->", $text)) >= 2 ) {
        $returnText .= '<div class="show_hide_text" data-alt_text="weniger">mehr</div>';
    }

    return $returnText;
}

function html5_search_form( $form ) {
    $form = '<section class="search_form"><form role="search" method="get" id="search-form" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __('',  'domain') . '</label>
     <input type="search" value="' . get_search_query() . '" name="s" id="s" placeholder="SUCHE" />
     <button type="submit" id="searchsubmit"></button>
     </form></section>';
    return $form;
}

add_filter( 'get_search_form', 'html5_search_form' );

function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


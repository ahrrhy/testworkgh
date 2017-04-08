<?php
/**
 * testworkgh functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package testworkgh
 */

if ( ! function_exists( 'testworkgh_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function testworkgh_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on testworkgh, use a find and replace
	 * to change 'testworkgh' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'testworkgh', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

    /**
     *  Adding post format support
     */
    add_theme_support( 'post-formats', array('aside', 'gallery', 'link'));


    /**
     *  Adding active class to Navigation
     */

    add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

    function special_nav_class ($classes, $item) {
        if (in_array('current-menu-item', $classes) ){
            $classes[] = 'active ';
        }
        return $classes;
    }
    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'testworkgh' ),
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
	add_theme_support( 'custom-background', apply_filters( 'testworkgh_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
    /**
     * my scripts
     */
// Disable jQuery WordPress
    function jquery_another_version() {
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', get_stylesheet_directory_uri() .'/libs/jquery/dist/jquery.min.js', array(), '');
    }
    add_action( 'wp_enqueue_scripts', 'jquery_another_version' );

    /**
     *  Adding font awesome
     */
    function font_awesome() {
        if (!is_admin()) {
            wp_register_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css');
            wp_enqueue_style('font-awesome');
        }
    }
    add_action('wp_enqueue_scripts', 'font_awesome');

// .my scripts

endif;
add_action( 'after_setup_theme', 'testworkgh_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function testworkgh_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'testworkgh_content_width', 640 );
}
add_action( 'after_setup_theme', 'testworkgh_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function testworkgh_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'testworkgh' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'testworkgh' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'testworkgh_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function testworkgh_scripts() {
	wp_enqueue_style( 'testworkgh-style', get_stylesheet_uri() );

	wp_enqueue_script( 'testworkgh-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'testworkgh-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/**
     * Adding my scripts
     */

    // my scripts
    wp_enqueue_script('jq-js', get_template_directory_uri().'/libs/jquery/dist/jquery.min.js');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/libs/bootstrap/dist/js/bootstrap.min.js');
    wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/libs/bootstrap/dist/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-themes-css', get_template_directory_uri().'/libs/bootstrap/dist/css/bootstrap-theme.min.css');


    wp_enqueue_style('my-style', get_template_directory_uri().'/stylesheets/style.css', true);
    wp_enqueue_script('main', get_template_directory_uri().'/js/main.js');
    // .my scripts

}
add_action( 'wp_enqueue_scripts', 'testworkgh_scripts' );

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

/**
 * Load Social Icons file.
 */
require get_template_directory() . '/inc/social-icons.php';


/**
 * Add custom post type and taxonomy
 */
require get_template_directory() . '/inc/offers.php';
/**
 * Add custom post type and taxonomy
 */
require get_template_directory() . '/inc/portfolio.php';



function testworkgh_why_us_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Why Us', 'testworkgh' ),
        'id'            => 'why_us',
        'description'   => esc_html__( 'Add widgets here.', 'testworkgh' ),
        'before_widget' => '<div id="%1$s" class="col-sm-6 col-sm-push-1 widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'testworkgh_why_us_widgets_init' );

function testworkgh_welcome_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Welcome', 'testworkgh' ),
        'id'            => 'welcome',
        'description'   => esc_html__( 'Add widgets here.', 'testworkgh' ),
        'before_widget' => '<div id="%1$s" class="col-sm-6 col-sm-push-1 widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'testworkgh_welcome_widgets_init' );

function testworkgh_footer_contact_form_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Contact Us', 'testworkgh' ),
        'id'            => 'footer-contact-us',
        'description'   => esc_html__( 'Add widgets here.', 'testworkgh' ),
        'before_widget' => '<div id="%1$s" class="col-sm-6 footer-contact-us widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'testworkgh_footer_contact_form_widgets_init' );

function my_pagenavi() {
    global $wp_query;
    $big = 999999999; // уникальное число для замены
    $args = array(
        'base'    => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format'  => '',
        'current' => max( 1, get_query_var('paged') ),
        'total'   => $wp_query->max_num_pages,
        'type' => 'list',
        'prev_text' => 'Prev',
        'next_text' => 'Next',
        'end_size' => 1,
        'mid_size' => 2
    );
    $result = paginate_links( $args );
    // удаляем добавку к пагинации для первой страницы
    $result = str_replace( '/page/1/', '', $result );

    echo $result;
}
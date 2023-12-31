<?php
/**
 * Theme functions and definitions
 *
 * @package Xmag
 * @since Xmag 1.0
 */


if ( ! function_exists( 'xmag_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function xmag_setup() {

	// Make theme available for translation. Translations can be filed in the /languages/ directory.
	load_theme_textdomain( 'xmag', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnail.
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'xmag-thumb', 1200, 520, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 740;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main_navigation'   => __( 'Main Menu', 'xmag' ),
		'top_navigation'    => __( 'Top Menu', 'xmag' ),
		'footer_navigation' => __( 'Footer Menu', 'xmag' ),
		'social_navigation' => __( 'Social Menu', 'xmag' ),
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// Add AMP support
	add_theme_support( 'amp' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array( 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'audio', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );

	// Set up the WordPress Custom Background Feature.
	$defaults = array(
		'default-color' => 'ffffff',
		'default-image' => '',
	);
	add_theme_support( 'custom-background', $defaults );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'inc/css/editor-style.css', xmag_fonts_url() ) );

	// Load regular editor styles into the new block-based editor.
	add_theme_support( 'editor-styles' );

	// Add custom editor font sizes.
	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name' => __( 'Small', 'xmag' ),
				'size' => 14,
				'slug' => 'small',
			),
			array(
				'name' => __( 'Normal', 'xmag' ),
				'size' => 16,
				'slug' => 'normal',
			),
			array(
				'name' => __( 'Large', 'xmag' ),
				'size' => 24,
				'slug' => 'large',
			),
			array(
				'name' => __( 'Huge', 'xmag' ),
				'size' => 32,
				'slug' => 'huge',
			),
		)
	);

	// Add support for custom color scheme.
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Dark Gray', 'xmag' ),
			'slug'  => 'dark-gray',
			'color' => '#222222',
		),
		array(
			'name'  => __( 'Medium Gray', 'xmag' ),
			'slug'  => 'medium-gray',
			'color' => '#333333',
		),
		array(
			'name'  => __( 'Gray', 'xmag' ),
			'slug'  => 'gray',
			'color' => '#555555',
		),
		array(
			'name'  => __( 'Light Gray', 'xmag' ),
			'slug'  => 'light-gray',
			'color' => '#999999',
		),
		array(
			'name'  => __( 'White', 'xmag' ),
			'slug'  => 'white',
			'color' => '#ffffff',
		),
		array(
			'name'  => __( 'Accent Color', 'xmag' ),
			'slug'  => 'accent',
			'color' => esc_attr( get_option( 'accent_color', '#e54e53' ) ),
		),
	) );

}
endif; // xmag_setup
add_action( 'after_setup_theme', 'xmag_setup' );


if ( ! function_exists( 'xmag_fonts_url' ) ) :
/**
 * Register Google fonts.
 *
 * @return string Google fonts URL for the theme.
 */
function xmag_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans: on or off', 'xmag' ) ) {
		$fonts[] = 'Open Sans:400,700,300,400italic,700italic';
	}

	/* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto: on or off', 'xmag' ) ) {
		$fonts[] = 'Roboto:400,700,300';
	}

	/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'xmag' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family'  => urlencode( implode( '|', $fonts ) ),
			'subset'  => urlencode( $subsets ),
			'display' => 'swap',
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;


/**
 * Add preconnect for Google Fonts.
 *
 * @since Xmag 1.3.3
 *
 * @param array  $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed.
 * @return array URLs to print for resource hints.
 */
function xmag_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'xmag-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'xmag_resource_hints', 10, 2 );


/**
 * Enqueues scripts and styles.
 */
function xmag_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'xmag-fonts', xmag_fonts_url(), array(), null );

	// Add Icons font, used in the main stylesheet.
	wp_enqueue_style( 'xmag-icons', get_template_directory_uri() . '/assets/css/simple-line-icons.min.css', array(), '2.3.3' );

	// Main stylesheet.
	$theme_version = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'xmag-style', get_stylesheet_uri(), array(), $theme_version );

	if( ! xmag_is_amp() ) {
		// Main js.
		wp_enqueue_script( 'xmag-script', get_template_directory_uri() . '/assets/js/script.js', array(), '20210930', true );
		// Comment reply script.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'xmag_scripts' );


/**
 * Register widget area
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function xmag_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'xmag' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your Sidebar.', 'xmag' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area Left', 'xmag' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area Center', 'xmag' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area Right', 'xmag' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
}
add_action( 'widgets_init', 'xmag_widgets_init' );


/**
 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
 */
if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}


/**
 * Include a skip to content link at the top of the page so that users can bypass the menu.
 */
function xmag_skip_link() {
	echo '<a class="skip-link screen-reader-text" href="#content">' . __( 'Skip to content', 'xmag' ) . '</a>';
}
add_action( 'wp_body_open', 'xmag_skip_link', 5 );


/**
 * Determine whether the current response being served as AMP.
 */
function xmag_is_amp() {
	return function_exists( 'is_amp_endpoint' ) && is_amp_endpoint();
}


/**
 * Adds a Sub Nav Toggle to the Mobile Menu.
 */
function xmag_add_sub_menu_toggles( $output, $item, $depth, $args ) {
	if( ! xmag_is_amp() ) {
		if ( isset( $args->show_sub_menu_toggles ) && $args->show_sub_menu_toggles && in_array( 'menu-item-has-children', $item->classes, true ) ) {
			$output = $output . '<button class="dropdown-toggle" aria-expanded="false"><span class="screen-reader-text">' . __( 'Show sub menu', 'xmag' ) . '</span>' . '</button>';
		}
	} else {
		if ( isset( $args->show_sub_menu_toggles ) && $args->show_sub_menu_toggles && in_array( 'menu-item-has-children', $item->classes, true ) ) {
			$output = $output . '<button data-amp-bind-class="visible' . $item->ID . ' ? \'dropdown-toggle is-open\' : \'dropdown-toggle is-closed\'" on="tap:AMP.setState({visible' . $item->ID . ': !visible' . $item->ID . '})" class="dropdown-toggle" aria-expanded="false"><span class="screen-reader-text">' . __( 'Show sub menu', 'xmag' ) . '</span>' . '</button>';
		}
	}
	return $output;
}
add_filter( 'walker_nav_menu_start_el', 'xmag_add_sub_menu_toggles', 10, 4 );


/**
 * Implement the WordPress Custom Header Feature.
 */
require get_template_directory() . '/inc/custom-header.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/customizer-css.php';


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 *  Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Main Menu Fallback.
 */
function xmag_fallback_menu() {
	echo '<ul class="main-menu">';
	wp_list_pages( 'title_li=' );
	echo '</ul>';
}


/*
 * Site Logo
 */
function xmag_site_logo() {

	$logo_url    = esc_url( get_theme_mod( 'xmag_logo' ) );
	$logo_height = absint ( get_theme_mod( 'xmag_logo_height', 40 ) );
	if ( ! empty( $logo_height ) ) {
		$logo_size = $logo_height . 'px';
	} else {
		$logo_size = '40px';
	}

	$logo_img = sprintf(
		'<img src="%s" style="max-height:%s" alt="%s">',
		$logo_url,
		$logo_size,
		get_bloginfo('name')
	);

	$link = sprintf(
		'<a href="%s" rel="home">%s</a>',
		esc_url(home_url('/')),
		$logo_img
	);

	if (is_front_page() || is_home()) {
		$logo_title = '<h1 id="logo">' . $link . '</h1>';
	} else {
		$logo_title = '<p id="logo">' . $link . '</p>';
	}

	echo $logo_title;
}


/**
 * Filter the except length.
 */
function xmag_custom_excerpt_length( $length ) {

	if ( is_home() ) {
		$excerpt_length = get_theme_mod( 'xmag_excerpt_size', 25 );
	} elseif ( is_archive() || is_search() ) {
		$excerpt_length = get_theme_mod( 'xmag_archive_excerpt_size', 25 );
	} else {
		$excerpt_length = 30;
	}
	return intval($excerpt_length);
}
add_filter( 'excerpt_length', 'xmag_custom_excerpt_length', 999 );


/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function xmag_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'xmag_excerpt_more' );


/**
 * Thumb size for Layout 1 and 2
 */
function xmag_thumb_size() {
	if ( is_home() ) {
		if ( get_theme_mod( 'xmag_blog', 'layout2' ) == 'layout1' ) {
			$thumb_size = 'thumbnail';
		} else {
			$thumb_size = 'medium';
		}
	} else {
		if ( get_theme_mod( 'xmag_archive', 'layout2' ) == 'layout1' ) {
			$thumb_size = 'thumbnail';
		} else {
			$thumb_size = 'medium';
		}
	}
	return esc_attr( $thumb_size );
}


/**
 * Add specific CSS class by filter.
 */
function xmag_custom_classes( $classes ) {
	// add 'class-name' to the $classes array
	$classes[] = get_option( 'xmag_layout_style', 'site-fullwidth' );

	// Adds a class to Homepage
	if ( is_home() ) {
		$classes[] = get_theme_mod( 'xmag_blog', 'layout2' );
	}

	// Adds a class to Archive and Search Pages
	if ( is_archive() || is_search() ) {
		$classes[] = get_theme_mod( 'xmag_archive', 'layout2' );
	}

	// return the $classes array
	return $classes;
}
add_filter( 'body_class', 'xmag_custom_classes' );


/*
 * Widget Style
 */
function xmag_widget_style() {
	$xmag_widget = get_theme_mod( 'xmag_widget_style', 'grey' );
	echo esc_attr( 'widget-' . $xmag_widget );
}


/**
 * Display Header Image.
 */
function xmag_header_image() {
	if ( get_theme_mod( 'xmag_show_header_image', 1 ) ) {

		if ( is_home() || is_front_page() ) { ?>
			<figure class="header-image">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
				</a>
			</figure>
		<?php }

	} else { ?>

		<figure class="header-image">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
			</a>
		</figure>

	<?php }
}


/**
 * Blog: Posts Templates
 */
function xmag_blog_post_template() {

	$blog_type = get_theme_mod( 'xmag_blog', 'layout2' );

	if ( $blog_type == 'layout3' || $blog_type == 'layout11' ) {
		// Layout 3,11
		$blog_template = 'content-large';
	} else {
		// Layout 1,2
		$blog_template = 'content';
	}
	return sanitize_file_name($blog_template);
}


/**
 * Archives: Posts Templates
 */
function xmag_archive_post_template() {

	$archive_type = get_theme_mod( 'xmag_archive', 'layout2' );

	if ( $archive_type == 'layout3' ) {
		// Layout 3
		$archive_template = 'content-large';
	} else {
		// Layout 1,2
		if ( is_search() ) {
			$archive_template = 'content-search';
		} else {
			$archive_template = 'content';
		}
	}
	return sanitize_file_name($archive_template);
}


/**
 * Prints Credits in the Footer
 */
function xmag_credits() {
	$website_credits = '';
	$website_author = get_bloginfo('name');
	$website_date = date_i18n(__( 'Y', 'xmag' ) );
	$website_credits = '&copy; ' . $website_date . ' ' . $website_author;
	echo esc_html( $website_credits );
}


/**
 * WooCommerce
 */

// Query WooCommerce activation
function xmag_is_woocommerce_active() {
	return class_exists( 'woocommerce' ) ? true : false;
}

if ( xmag_is_woocommerce_active() ) {

	// Declare WooCommerce support.
	function woocommerce_support() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	}
	add_action( 'after_setup_theme', 'woocommerce_support' );

	// WooCommerce Hooks.
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

	add_action('woocommerce_before_main_content', 'xmag_wrapper_start', 10);
	add_action('woocommerce_after_main_content', 'xmag_wrapper_end', 10);

	function xmag_wrapper_start() {
	echo '<div id="primary" class="content-area"><main id="main" class="site-main" role="main"><div class="woocommerce-content">';
	}

	function xmag_wrapper_end() {
	echo '</div></main></div>';
	}
}


/**
 * Add About page class
 */
require_once get_template_directory() . '/inc/about-page/class-xmag-about-page.php';


/*
* Add About page instance
*/
$my_theme = wp_get_theme();
if ( is_child_theme() ) {
	$my_theme_name = $my_theme->parent()->get( 'Name' );
	$my_theme_slug = $my_theme->parent()->get_template();
} else {
	$my_theme_name = $my_theme->get( 'Name' );
	$my_theme_slug = $my_theme->get_template();
}

$config = array(
	// Pro Theme Name
	'theme_pro_name'  => $my_theme_name . ' Plus',
	// Pro Theme slug
	'theme_pro_slug'  => $my_theme_slug . '-plus',
	// Main welcome title
	'welcome_title'   => sprintf( __( 'Welcome to %s!', 'xmag' ), $my_theme_name ),
	// Main welcome sub title
	'welcome_content' => sprintf( __( 'You have successfully installed the %s WordPress theme.', 'xmag' ), $my_theme_name ),
	// Notification
	'notification'    => '<h2 class="welcome-title">' . sprintf( __( 'Welcome! Thank you for choosing %s', 'xmag' ), $my_theme_name ) . '</h2><p>To fully take advantage of the best our theme can offer please visit our Welcome Page.</p><p><a href="' . esc_url( admin_url( 'themes.php?page=' . $my_theme_slug . '-welcome' ) ) . '" class="button button-primary">' . sprintf( __( 'Get started with %s', 'xmag' ), $my_theme_name ) . '</a></p>',
	// Tabs
	'tabs'            => array(
		'getting_started' => __( 'Getting Started', 'xmag' ),
		'free_pro'        => __( 'Free vs Pro', 'xmag' ),
	),
	'utm'             => '?utm_source=WordPress&utm_medium=about_page&utm_campaign=' . $my_theme_slug . '_upsell',
);
Xmag_About_Page::init( $config );


/**
 * Add Upsell "pro" link to the customizer
 */
require_once( trailingslashit( get_template_directory() ) . '/inc/customize-pro/class-customize.php' );

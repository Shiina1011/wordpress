<?php 
require get_template_directory() . '/inc/comments-helper.php';
function animegames_adv_theme_support(){
register_nav_menus(array('primary' =>  __('Primary Menu','anime-games'), 'footer' => __('Footer Menu','anime-games')));
add_image_size( 'animegames_post', 530, 353, true );
add_theme_support( 'starter-content');
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( "wp-block-styles" );
add_theme_support( "responsive-embeds" );
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
add_theme_support( "custom-header" );
add_theme_support( "custom-background");
add_theme_support( "align-wide" );
}

add_action('after_setup_theme','animegames_adv_theme_support');

function animegames_set_excerpt_length($length){
    if ( is_admin() ) return $length;
    return 10;
}

function animegames_the_category_list( $categories, $post_id ) {
    return array_slice( $categories, 0, 2, true );
}
add_filter( 'the_category_list', 'animegames_the_category_list', 10, 2 );
add_filter('excerpt_length','animegames_set_excerpt_length');


function animegames_LoadScripts(){
    wp_enqueue_style("tailwindcss",get_template_directory_uri()."/style.css");
    wp_enqueue_style("animegames_customcss",get_template_directory_uri()."/custom.css");
    wp_enqueue_script('animegames_hamburger',get_template_directory_uri().'/src/scripts/script.js',array(),'1.0.0',true);
}

add_action('wp_enqueue_scripts','animegames_LoadScripts');



function animegames_setTimeFrame(){
    
    echo ('<p
    class="text-center mt-1  hover:underline focus:underline"
    style="color: #e4572e; font-family: Permanent Marker"
  >
    ' .'<a href="https://jrpg.com/anime-games-theme"> '. esc_html__("Anime Games | Powered by: Wordpress","anime-games") . "</a>".
  '</p>');
}



function animegames_enqueue_comments_reply() {
	if( get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
	}
	}
	add_action( 'comment_form_before', 'animegames_enqueue_comments_reply' );

	
<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

// News category
function wpb_postsbycategorynews() {
    // the query
    $the_query = new WP_Query( array( 
        'category_name' => 'news', 
        'posts_per_page' => 3 
    ) ); 
      
    // The Loop
    if ( $the_query->have_posts() ) {
        $string .= '<ul class="postsbycategory widget_recent_entries">';
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
                if ( has_post_thumbnail() ) {
                $string .= '<li>';
                } else { 
                // if no featured image is found
                $string .= '<li><a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_title() .'</a> <span class="post-date">' . get_the_date() . '</span></li>';
                }
                }
        } else {
        // no posts found
    }
    $string .= '</ul>';
      
    return $string;
      
    /* Restore original Post Data */
    wp_reset_postdata();
    }
    // Add a shortcode
    add_shortcode('categorypostsnews', 'wpb_postsbycategorynews');


// Events category
function wpb_postsbycategoryevents() {
    // the query
    $the_query = new WP_Query( array( 
        'category_name' => 'events', 
        'posts_per_page' => 3 
    ) ); 
      
    // The Loop
    if ( $the_query->have_posts() ) {
        $string .= '<ul class="postsbycategory widget_recent_entries">';
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
                if ( has_post_thumbnail() ) {
                $string .= '<li>';
                } else { 
                // if no featured image is found
                $string .= '<li><a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_title() .'</a> <span class="post-date">' . get_the_date() . '</span></li>';
                }
                }
        } else {
        // no posts found
    }
    $string .= '</ul>';
      
    return $string;
      
    /* Restore original Post Data */
    wp_reset_postdata();
    }
    // Add a shortcode
    add_shortcode('categorypostsevents', 'wpb_postsbycategoryevents');
?>
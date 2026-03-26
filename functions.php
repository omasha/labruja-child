<?php
/**
 * La Bruja Child Theme functions and definitions
 */

function labruja_child_enqueue_styles() {
    // Enqueue parent theme stylesheet
    wp_enqueue_style( 'twentyseventeen-style', get_template_directory_uri() . '/style.css' );

    // Enqueue child theme stylesheet with timestamp for cache busting
    wp_enqueue_style( 'labruja-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'twentyseventeen-style' ),
        filemtime( get_stylesheet_directory() . '/style.css' )
    );
}
add_action( 'wp_enqueue_scripts', 'labruja_child_enqueue_styles' );


/**
 * Unregister parent theme footer widget areas and register new ones
 */
function labruja_child_widgets_init() {
    // Unregister parent theme footer widget areas
    unregister_sidebar( 'sidebar-2' );
    unregister_sidebar( 'sidebar-3' );

    // Homepage Sidebar Widget Area
    register_sidebar( array(
        'name'          => __( 'Homepage Sidebar', 'labruja-child' ),
        'id'            => 'homepage-sidebar',
        'description'   => __( 'Appears next to content on homepage (desktop only).', 'labruja-child' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    // Homepage Footer Widget Area
    register_sidebar( array(
        'name'          => __( 'Homepage Footer', 'labruja-child' ),
        'id'            => 'homepage-footer',
        'description'   => __( 'Appears in footer area on homepage only.', 'labruja-child' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    // Site Footer Widget Area (for all pages)
    register_sidebar( array(
        'name'          => __( 'Site Footer', 'labruja-child' ),
        'id'            => 'site-footer',
        'description'   => __( 'Appears in the footer area on all pages.', 'labruja-child' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'labruja_child_widgets_init', 11 );

/**
 * Add has-sidebar class to body on homepage
 */
function labruja_child_body_classes( $classes ) {
    if ( is_front_page() && is_active_sidebar( 'homepage-sidebar' ) ) {
        $classes[] = 'has-sidebar';
    }
    return $classes;
}
add_filter( 'body_class', 'labruja_child_body_classes' );

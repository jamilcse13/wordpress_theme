<?php

//Load Stylesheet
function load_css()
{
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false,
     'all');
    wp_enqueue_style('bootstrap');
    
    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false,
     'all');
    wp_enqueue_style('main');
    
    // wp_register_style('magnific', get_template_directory_uri() . '/css/magnific-popup.css', array(), false,
    //  'all');
    // wp_enqueue_style('magnific');
}

add_action('wp_enqueue_scripts', 'load_css');

//Load Javascript
function load_js()
{
    // wp_enqueue_script('jquery');

    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery',
    false, true);
    wp_enqueue_script('bootstrap');
    
    // wp_register_script('custom', get_template_directory_uri() . '/js/custom.js', 'jquery',
    // false, true);
    // wp_enqueue_script('custom');
}

add_action('wp_enqueue_scripts', 'load_js');

//Theme Options
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');



//Menus
register_nav_menus(

    array (
        'top_menu' => 'Top Menu Location',
        'mobile_menu' => 'Mobile Menu Location',
        'footer_menu' => 'Footer Menu Location',
    )

);



// Custom image sizes
add_image_size('blog-large', 800, 400, true);
add_image_size('blog-small', 300, 200, true);



// Register sidebars
function my_sidebars()
{
    register_sidebar(
        array(
            'name' => 'Page Sidebar',
            'id' => 'page-sidebar',
            'before_title' => '<h4 class="widget-title>',
            'after_title' => '</h4>'
        )
    );

    register_sidebar(
        array(
            'name' => 'Blog Sidebar',
            'id' => 'blog-sidebar',
            'before_title' => '<h4 class="widget-title>',
            'after_title' => '</h4>'
        )
    );
}

add_action('widgets_init', 'my_sidebars');



function my_first_post_type()
{

    $args = array(

        'labels' => array(
            'name' => 'Cars',
            'singular_name' => 'Car',
        ),
        'hierarchical' => true,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),

    );

    register_post_type('cars', $args);

}

add_action('init', 'my_first_post_type');




function my_first_taxonomy()
{

    $args =array(

        'labels' => array(
            'name' => 'Brands',
            'singular_name' => 'Brand',
        ),
        'public' => true,
        'hierarchical' => true,

    );

    register_taxonomy('brands', array('cars'), $args);

}
add_action('init', 'my_first_taxonomy');
<?php

    DEFINE('sand_ROOT', get_stylesheet_directory().'/');

    DEFINE('sand_URL', get_stylesheet_directory_uri().'/');

    DEFINE('sand_ADMIN', admin_url());

    DEFINE('sand_BlogUrl', get_bloginfo('url'));



    require_once( sand_ROOT. 'lib/sand_enqueue_scripts.php' );

    require_once( sand_ROOT. 'lib/sand_theme_init.php' );

    require_once( sand_ROOT. 'lib/sand_meta.php' );

    require_once( sand_ROOT. 'lib/sand_functions.php' );

    require_once( sand_ROOT. 'lib/sand_ajax_functions.php' );

    require_once( sand_ROOT. 'lib/sand_mail_functions.php' );

    require_once( sand_ROOT. 'lib/sand_taxonomy.php' );

    require_once( sand_ROOT. 'lib/sand_shortcode.php' );

    require_once( sand_ROOT. 'lib/wp_bootstrap_navwalker.php' );

    /**

     * Filter the translation url of the current page before Polylang caches it.

     *

     * @param null|string $url The translation url, null if none was found.

     */

    function sand_url_query_string( $url ) {

        if ( ! empty( $_SERVER['QUERY_STRING'] ) ) {

            return $url . '?' . $_SERVER['QUERY_STRING'];

        }

        return $url;

    }

    add_filter( 'pll_the_language_link', 'sand_url_query_string' );



    add_action( 'after_setup_theme', 'sand_thumbnails' );

    function sand_thumbnails() {

        add_theme_support('post-thumbnails');

        add_image_size( 'testimonial-profile-size', 77, 76,array('center','center') );

        add_image_size( 'home-feature-property-thumbnail-size', 656, 490,array('center','center') );

        add_image_size( 'home-latest-property-thumbnail-size', 356, 195.8,array('center','center') );

        add_image_size( 'home-locations', 289, 370,array('center','center') );

        add_image_size( 'property_arch_thumb', 416, 305,array('center','center') );

        add_image_size( 'property-gallery-thumb', 87, 70,array('center','center') );

        add_image_size( 'project_thumb', 355, 266 ,array('center','center') );

        // add_image_size( 'breadcrumb-size', 1920, 1082,array('center','center') );

    }



    add_action('after_setup_theme', 'sand_load_theme_textdomain');

    function sand_load_theme_textdomain()

    {

        load_theme_textdomain('sand', get_template_directory() . '/languages');

    }



    if ( ! function_exists( 'wp_generate_attachment_metadata' ) ) {

        include( ABSPATH . 'wp-admin/includes/image.php' );

    }



    function sand_menu() {

        wp_nav_menu(

            array(

            'menu'              => 'Main Menu',

            'container'         => '',

            'theme_location'    => 'main-menu',

            'menu_class'        => 'nav-menu',

            'depth'             => 3,

            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',

            'walker'            => new wp_bootstrap_navwalker()

            )

        );

    }

        function sand_menu_ar() {

        wp_nav_menu(

            array(

            'menu'              => 'Main Menu Arabic',

            'container'         => '',

            'theme_location'    => 'main-menu',

            'menu_class'        => 'nav-menu',

            'depth'             => 3,

            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',

            'walker'            => new wp_bootstrap_navwalker()

            )

        );

    }



    function sand_footerNav() {

        wp_nav_menu(

            array(

            'menu'              => 'Footer Menu',

            'container'         => '',

            'theme_location'    => 'footer-menu',

            'menu_class'        => 'footer-content',

            'depth'             => 3

            )

        );

    }



add_filter( 'the_content', 'wti_remove_autop_for_image', 0 );

function wti_remove_autop_for_image( $content )

{

    global $post;

    // Check for single page and image post type and remove

    if ( is_single() && $post->post_type == 'slider' )

        remove_filter('the_content', 'wpautop');

    return $content;

}

remove_filter( 'the_content', 'wpautop' );

remove_filter( 'the_excerpt', 'wpautop' );



/*Add Footer Widget*/



function sand_widgets_init() {

    register_sidebar( array(

        'name'          => 'First Sidebar Column',

        'id'            => 'first_sidebar',

        'before_widget' => '',

        'after_widget'  => '',

        )

    );

}

add_action( 'widgets_init', 'sand_widgets_init' );



function sand_second_widgets_init() {

    register_sidebar( array(

        'name'          => 'Second Sidebar Column',

        'id'            => 'second_sidebar',

        'before_widget' => '',

        'after_widget'  => '',

        )

    );

}

add_action( 'widgets_init', 'sand_second_widgets_init' );


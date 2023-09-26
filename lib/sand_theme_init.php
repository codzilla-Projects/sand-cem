<?php

    add_action('init', 'sand_custom_post_types');
    function sand_custom_post_types() {

        $cpts = [

            array(
                'single'   => 'Slider',
                'plural'   => 'Slider',
                'cptname'  => 'slider',
                'icon'     => 'dashicons-slides',
                'supports' => ["title", "editor", "thumbnail", "excerpt"],
                'show_in_menu' => true,
                'position' => 3
            ),

            array(
                'single'   => 'Property',
                'plural'   => 'Properties',
                'cptname'  => 'property',
                'icon'     => 'dashicons-admin-home',
                'supports' => ["title", "editor", "thumbnail", "excerpt","author"],
                'show_in_menu' => true,
                'position' => 4
            ),
            array(
                'single'   => 'Project',
                'plural'   => 'Projects',
                'cptname'  => 'project',
                'icon'     => 'dashicons-admin-multisite',
                'supports' => ["title", "editor", "thumbnail", "excerpt"],
                'show_in_menu' => true,
                'position' => 5
            ),
            array(
                'single'   => 'Team',
                'plural'   => 'Team',
                'cptname'  => 'team',
                'icon'     => 'dashicons-groups',
                'supports' => ["title","thumbnail"],
                'show_in_menu'=> true,
                'position' => 6
            ),
            array(
                'single'   => 'Testimonial',
                'plural'   => 'Testimonials',
                'cptname'  => 'testimonial',
                'icon'     => 'dashicons-heart',
                'supports' => ["title","editor","thumbnail","excerpt"],
                'show_in_menu'=> true,
                'position' => 7
            ),

        ];

        foreach ($cpts as $cpt) :

            $labels = array(
                'name'                  => _x($cpt['single'], 'Post Type General Name', 'sand'),
                'singular_name'         => _x($cpt['single'], 'Post Type Singular Name', 'sand'),
                'menu_name'             => __($cpt['plural'], 'sand'),
                'all_items'             => __('All ' . $cpt['plural'], 'sand'),
                'add_new_item'          => __('Add New ' . $cpt['single'], 'sand'),
                'add_new'               => __('Add New', 'sand'),
                'new_item'              => __('New ' . $cpt['single'], 'sand'),
                'edit_item'             => __('Edit ' . $cpt['single'], 'sand'),
                'update_item'           => __('Update ' . $cpt['single'], 'sand'),
                'view_item'             => __('View ' . $cpt['single'], 'sand'),
                'search_items'          => __('Search ' . $cpt['plural'], 'sand'),
                'not_found'             => __('Not found', 'sand'),
                'not_found_in_trash'    => __('Not found in Trash', 'sand'),
                'featured_image'        => __('Featured Image', 'sand'),
                'set_featured_image'    => __('Set featured image', 'sand'),
                'remove_featured_image' => __('Remove featured image', 'sand'),
                'use_featured_image'    => __('Use as featured image', 'sand'),
            );
            $args = array(
                'label'                 => __($cpt['plural'], 'sand'),
                'description'           => __($cpt['plural'] . ' Description', 'sand'),
                'labels'                => $labels,
                'supports'              => $cpt['supports'],
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => $cpt['show_in_menu'],
                'menu_position'         => $cpt['position'],
                'menu_icon'             => $cpt['icon'],
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'rewrite'               => true,
                'capability_type'       => 'post',

            );

            // Register Custom Post Type
            register_post_type($cpt['cptname'], $args);

        endforeach;

    }

    register_nav_menus(
        array(
            'main-menu'               => __('Main Menu', 'sand'),
            'footer-menu'             => __('Footer Menu', 'sand')
        )
    );
    add_filter( 'nav_menu_link_attributes', 'add_specific_menu_location_atts', 10, 3 );
    function add_specific_menu_location_atts( $atts, $item, $args ) {
        // check if the item is in the primary menu
        if( $args->theme_location == 'main-menu' ) {
          // add the desired attributes:
          $atts['class'] = 'nav-link menu-title';
        }
        return $atts;
    }

    //region Theme options
    add_action('admin_menu', 'sand_register_custom_menu_pages');
    function sand_register_custom_menu_pages() {

        add_menu_page(
            __('Website options', 'sand'),     // page_title
            __('Theme Options','sand'),      // menu_title
            'manage_options',                   // capability
            'theme-option',                     // menu_slug
            'sand_theme_options_callback',   // callback
            'dashicons-admin-generic',          // icon
            2                                   // position
        );

        add_submenu_page(
            'theme-option', // parent slug
            __('Home options', 'sand'), //page title
            __('Home Page Options', 'sand'), //menu title
            'manage_options', // capability
            'home-page-content', //menu_slug
            'home_options_callback' //callback
        );

        add_submenu_page(
            'theme-option', // parent slug
            __('About us options', 'sand'), //page title
            __('About Page Options', 'sand'), //menu title
            'manage_options', // capability
            'aboutUs-page-content', //menu_slug
            'aboutUs_options_callback' //callback
        );

        add_submenu_page(
            'theme-option', // parent slug
            __('Contact us options', 'sand'), //page title
            __('Contact Page Options', 'sand'), //menu title
            'manage_options', // capability
            'contactUs-page-content', //menu_slug
            'contactUs_options_callback' //callback
        );

    }

    require_once(sand_ROOT.'/theme_options/theme_option.php');
    require_once(sand_ROOT.'/theme_options/aboutUs_page_options.php');
    require_once(sand_ROOT.'/theme_options/contactUs_page_options.php');
    require_once(sand_ROOT.'/theme_options/home_page_options.php');

    //endregion Theme options




    add_filter('rwmb_meta_boxes', 'sand_add_gallery_images_to_portfolio');

    function sand_add_gallery_images_to_portfolio($meta_boxes)
    {
        $meta_boxes[] = array(
            'title'      => __('Gallery Images', 'sand'),
            'post_types' => array('property','project'),
            'fields'     => array(
                array(
                    'name' => esc_html__('Upload Images'),
                    'id'   => "thumbnail_id",
                    'type' => 'image_advanced',
                ),
            ),
        );

        return $meta_boxes;
    }
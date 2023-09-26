<?php


add_action('init', 'create_prop_type_taxonomies', 0);

function create_prop_type_taxonomies()
{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x('Types', 'taxonomy general name', 'sand'),
        'singular_name'     => _x('Type', 'taxonomy singular name', 'sand'),
        'search_items'      => __('Search Types', 'sand'),
        'all_items'         => __('All Types', 'sand'),
        'parent_item'       => __('Parent Type', 'sand'),
        'parent_item_colon' => __('Parent Type:', 'sand'),
        'edit_item'         => __('Edit Type', 'sand'),
        'update_item'       => __('Update Type', 'sand'),
        'add_new_item'      => __('Add New Type', 'sand'),
        'new_item_name'     => __('New Type Name', 'sand'),
        'menu_name'         => __('Type', 'sand'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'type'),
    );

    register_taxonomy('type', array('property'), $args);


    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'                       => _x('Location', 'taxonomy general name', 'sand'),
        'singular_name'              => _x('Location', 'taxonomy singular name', 'sand'),
        'search_items'               => __('Search Locations', 'sand'),
        'popular_items'              => __('Popular Locations', 'sand'),
        'all_items'                  => __('All Locations', 'sand'),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __('Edit Location', 'sand'),
        'update_item'                => __('Update Location', 'sand'),
        'add_new_item'               => __('Add New Location', 'sand'),
        'new_item_name'              => __('New Location Name', 'sand'),
        'separate_items_with_commas' => __('Separate Locations with commas', 'sand'),
        'add_or_remove_items'        => __('Add or remove Locations', 'sand'),
        'choose_from_most_used'      => __('Choose from the most used Locations', 'sand'),
        'not_found'                  => __('No Locations found.', 'sand'),
        'menu_name'                  => __('Locations', 'sand'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'location'),
    );

    register_taxonomy('location', 'property', $args);


    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'                       => _x('Location', 'taxonomy general name', 'sand'),
        'singular_name'              => _x('Location', 'taxonomy singular name', 'sand'),
        'search_items'               => __('Search Locations', 'sand'),
        'popular_items'              => __('Popular Locations', 'sand'),
        'all_items'                  => __('All Locations', 'sand'),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __('Edit Location', 'sand'),
        'update_item'                => __('Update Location', 'sand'),
        'add_new_item'               => __('Add New Location', 'sand'),
        'new_item_name'              => __('New Location Name', 'sand'),
        'separate_items_with_commas' => __('Separate Locations with commas', 'sand'),
        'add_or_remove_items'        => __('Add or remove Locations', 'sand'),
        'choose_from_most_used'      => __('Choose from the most used Locations', 'sand'),
        'not_found'                  => __('No Classifications found.', 'sand'),
        'menu_name'                  => __('Locations', 'sand'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'project-location'),
    );

    register_taxonomy('project_location', 'project', $args);

}


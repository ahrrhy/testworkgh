<?php

// Register Offers Post Type

add_action('init', 'register_offers_post_types');
function register_offers_post_types(){
    register_post_type('offers', array(
        'labels' => array(
            'name'               => 'Offers', // plural post name
            'singular_name'      => 'Offer', // single post name of this time
            'add_new'            => 'Add new',
            'add_new_item'       => 'Add new Offers',
            'edit_item'          => 'Edit Offers',
            'new_item'           => 'New Offers',
            'view_item'          => '',
        ),
        'description'        => '',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'rewrite'          => true,
        'menu_icon'          => 'dashicons-products',
        'supports'           => array(
            'title',
            'editor',
            'thumbnail',
            'custom-fields',
            'revisions',
            'page-attributes',
            'post-formats'),
        'taxonomies'         => array('offers-type'),
        'has_archive'        => true
    ) );
}

// register offers-type Taxonomy
add_action('init', 'create_offers_type_taxonomy');
function create_offers_type_taxonomy(){
// Labels
// list: http://wp-kama.ru/function/get_taxonomy_labels
    $labels = array(
        'name'              => 'Offers Types',
        'singular_name'     => 'Offers Type',
        'search_items'      => 'Search Offers Types',
        'all_items'         => 'All Offers Types',
        'edit_item'         => 'Edit Offers Type',
        'update_item'       => 'Update Offers Type',
        'add_new_item'      => 'Add New Offers Type',
        'new_item_name'     => 'New Offers Type Name',
        'menu_name'         => 'Offers Types',
        'parent_item'       => null,
        'parent_item_colon' => null,
    );
// parameters
    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'show_tagcloud'         => false, // равен аргументу show_ui
        'hierarchical'          => true,
        'update_count_callback' => '',
        'capabilities'          => array(),
        'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
        '_builtin'              => false,
        'query_var'             => true, // название параметра запроса
        'rewrite'               => true,
    );
    register_taxonomy('offers-type', array('offers'), $args );
}

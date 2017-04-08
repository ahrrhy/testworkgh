<?php

// Register Video Post Type

add_action('init', 'register_works_post_types');
function register_works_post_types(){
    register_post_type('works', array(
        'labels' => array(
            'name'               => 'Works', // plural post name
            'singular_name'      => 'Works', // single post name of this time
            'add_new'            => 'Add new',
            'add_new_item'       => 'Add new Work',
            'edit_item'          => 'Edit Work',
            'new_item'           => 'New Work',
            'view_item'          => '',
        ),
        'description'        => '',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'rewrite'          => true,
        'menu_icon'          => 'dashicons-art',
        'supports'           => array(
            'title',
            'editor',
            'thumbnail',
            'custom-fields',
            'revisions',
            'page-attributes',
            'post-formats'),
        'taxonomies'         => array('portfolio'),
        'has_archive'        => true
    ) );
}

// register Directors Taxonomy
add_action('init', 'create_portfolio_taxonomy');
function create_portfolio_taxonomy(){
// Labels
// list: http://wp-kama.ru/function/get_taxonomy_labels
    $labels = array(
        'name'              => 'Portfolio',
        'singular_name'     => 'Portfolio',
        'search_items'      => 'Search Portfolio',
        'all_items'         => 'All Portfolio',
        'edit_item'         => 'Edit Portfolio',
        'update_item'       => 'Update Portfolio',
        'add_new_item'      => 'Add New Portfolio',
        'new_item_name'     => 'New Portfolio Name',
        'menu_name'         => 'Portfolio',
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
    register_taxonomy('portfolio', array('works'), $args );
}

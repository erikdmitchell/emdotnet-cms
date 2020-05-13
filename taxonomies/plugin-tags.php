<?php
/**
 * Plugin tags taxonomy.
 *
 * @package EMdotNet_CMS
 * @since   0.1.0
 */

/**
 * Plugin tags taxonomy.
 *
 * @access public
 * @return void
 */
function plugin_tags_init() {
    register_taxonomy(
        'plugin-tags',
        array( 'plugins' ),
        array(
            'hierarchical'      => true,
            'public'            => true,
            'show_in_nav_menus' => false,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => true,
            'labels'            => array(
                'name'                       => __( 'Tags', 'emdotnet-cms' ),
                'singular_name'              => _x( 'Tag', 'taxonomy general name', 'emdotnet-cms' ),
                'search_items'               => __( 'Search Tags', 'emdotnet-cms' ),
                'popular_items'              => __( 'Popular Tags', 'emdotnet-cms' ),
                'all_items'                  => __( 'All Tags', 'emdotnet-cms' ),
                'parent_item'                => __( 'Parent Tag', 'emdotnet-cms' ),
                'parent_item_colon'          => __( 'Parent Tag:', 'emdotnet-cms' ),
                'edit_item'                  => __( 'Edit Tag', 'emdotnet-cms' ),
                'update_item'                => __( 'Update Tag', 'emdotnet-cms' ),
                'add_new_item'               => __( 'New Tag', 'emdotnet-cms' ),
                'new_item_name'              => __( 'New Tag', 'emdotnet-cms' ),
                'separate_items_with_commas' => __( 'Separate Tags with commas', 'emdotnet-cms' ),
                'add_or_remove_items'        => __( 'Add or remove Tags', 'emdotnet-cms' ),
                'choose_from_most_used'      => __( 'Choose from the most used Tags', 'emdotnet-cms' ),
                'not_found'                  => __( 'No Tags found.', 'emdotnet-cms' ),
                'menu_name'                  => __( 'Tags', 'emdotnet-cms' ),
            ),
            'rewrite' => array( 'slug' => 'plugin-tags' ),
            'show_in_rest'      => true,
            'rest_base'         => 'plugin-tags',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
        )
    );

}
add_action( 'init', 'plugin_tags_init' );

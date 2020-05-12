<?php
/**
 * Project services taxonomy.
 *
 * @package EMdotNet_CMS
 * @since   0.1.0
 */

/**
 * Project services taxonomy.
 *
 * @access public
 * @return void
 */
function project_services_init() {
    register_taxonomy(
        'services',
        array( 'projects' ),
        array(
            'hierarchical'      => true,
            'public'            => true,
            'show_in_nav_menus' => false,
            'show_ui'           => true,
            'show_admin_column' => false,
            'query_var'         => true,
            'rewrite'           => true,
            'labels'            => array(
                'name'                       => __( 'Services', 'emdotnet-cms' ),
                'singular_name'              => _x( 'Service', 'taxonomy general name', 'emdotnet-cms' ),
                'search_items'               => __( 'Search Services', 'emdotnet-cms' ),
                'popular_items'              => __( 'Popular Services', 'emdotnet-cms' ),
                'all_items'                  => __( 'All Services', 'emdotnet-cms' ),
                'parent_item'                => __( 'Parent Service', 'emdotnet-cms' ),
                'parent_item_colon'          => __( 'Parent Service:', 'emdotnet-cms' ),
                'edit_item'                  => __( 'Edit Service', 'emdotnet-cms' ),
                'update_item'                => __( 'Update Service', 'emdotnet-cms' ),
                'add_new_item'               => __( 'New Service', 'emdotnet-cms' ),
                'new_item_name'              => __( 'New Service', 'emdotnet-cms' ),
                'separate_items_with_commas' => __( 'Separate Services with commas', 'emdotnet-cms' ),
                'add_or_remove_items'        => __( 'Add or remove Services', 'emdotnet-cms' ),
                'choose_from_most_used'      => __( 'Choose from the most used Services', 'emdotnet-cms' ),
                'not_found'                  => __( 'No Services found.', 'emdotnet-cms' ),
                'menu_name'                  => __( 'Services', 'emdotnet-cms' ),
            ),
            'rewrite' => array( 'slug' => 'Services' ),
            'show_in_rest'      => true,
            'rest_base'         => 'Services',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
        )
    );

}
add_action( 'init', 'project_services_init' );

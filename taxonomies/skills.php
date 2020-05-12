<?php
/**
 * Project skills taxonomy.
 *
 * @package EMdotNet_CMS
 * @since   0.1.0
 */

/**
 * Project skills taxonomy.
 *
 * @access public
 * @return void
 */
function project_skills_init() {
    register_taxonomy(
        'skills',
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
                'name'                       => __( 'Skills', 'emdotnet-cms' ),
                'singular_name'              => _x( 'Skill', 'taxonomy general name', 'emdotnet-cms' ),
                'search_items'               => __( 'Search Skills', 'emdotnet-cms' ),
                'popular_items'              => __( 'Popular Skills', 'emdotnet-cms' ),
                'all_items'                  => __( 'All Skills', 'emdotnet-cms' ),
                'parent_item'                => __( 'Parent Skill', 'emdotnet-cms' ),
                'parent_item_colon'          => __( 'Parent Skill:', 'emdotnet-cms' ),
                'edit_item'                  => __( 'Edit Skill', 'emdotnet-cms' ),
                'update_item'                => __( 'Update Skill', 'emdotnet-cms' ),
                'add_new_item'               => __( 'New Skill', 'emdotnet-cms' ),
                'new_item_name'              => __( 'New Skill', 'emdotnet-cms' ),
                'separate_items_with_commas' => __( 'Separate Skills with commas', 'emdotnet-cms' ),
                'add_or_remove_items'        => __( 'Add or remove Skills', 'emdotnet-cms' ),
                'choose_from_most_used'      => __( 'Choose from the most used Skills', 'emdotnet-cms' ),
                'not_found'                  => __( 'No Skills found.', 'emdotnet-cms' ),
                'menu_name'                  => __( 'Skills', 'emdotnet-cms' ),
            ),
            'rewrite' => array( 'slug' => 'skills' ),
            'show_in_rest'      => true,
            'rest_base'         => 'skills',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
        )
    );

}
add_action( 'init', 'project_skills_init' );

<?php

/**
 * Registers the `projects` post type.
 */
function projects_init() {
	register_post_type( 'projects', array(
		'labels'                => array(
			'name'                  => __( 'Projects', 'emdotnet' ),
			'singular_name'         => __( 'Projects', 'emdotnet' ),
			'all_items'             => __( 'All Projects', 'emdotnet' ),
			'archives'              => __( 'Projects Archives', 'emdotnet' ),
			'attributes'            => __( 'Projects Attributes', 'emdotnet' ),
			'insert_into_item'      => __( 'Insert into projects', 'emdotnet' ),
			'uploaded_to_this_item' => __( 'Uploaded to this projects', 'emdotnet' ),
			'featured_image'        => _x( 'Featured Image', 'projects', 'emdotnet' ),
			'set_featured_image'    => _x( 'Set featured image', 'projects', 'emdotnet' ),
			'remove_featured_image' => _x( 'Remove featured image', 'projects', 'emdotnet' ),
			'use_featured_image'    => _x( 'Use as featured image', 'projects', 'emdotnet' ),
			'filter_items_list'     => __( 'Filter projects list', 'emdotnet' ),
			'items_list_navigation' => __( 'Projects list navigation', 'emdotnet' ),
			'items_list'            => __( 'Projects list', 'emdotnet' ),
			'new_item'              => __( 'New Projects', 'emdotnet' ),
			'add_new'               => __( 'Add New', 'emdotnet' ),
			'add_new_item'          => __( 'Add New Projects', 'emdotnet' ),
			'edit_item'             => __( 'Edit Projects', 'emdotnet' ),
			'view_item'             => __( 'View Projects', 'emdotnet' ),
			'view_items'            => __( 'View Projects', 'emdotnet' ),
			'search_items'          => __( 'Search projects', 'emdotnet' ),
			'not_found'             => __( 'No projects found', 'emdotnet' ),
			'not_found_in_trash'    => __( 'No projects found in trash', 'emdotnet' ),
			'parent_item_colon'     => __( 'Parent Projects:', 'emdotnet' ),
			'menu_name'             => __( 'Projects', 'emdotnet' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor' ),
		'has_archive'           => false,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => 6,
		'menu_icon'             => 'dashicons-analytics',
		'show_in_rest'          => true,
		'rest_base'             => 'projects',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'projects_init' );

/**
 * Sets the post updated messages for the `projects` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `projects` post type.
 */
function projects_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['projects'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Projects updated. <a target="_blank" href="%s">View projects</a>', 'emdotnet' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'emdotnet' ),
		3  => __( 'Custom field deleted.', 'emdotnet' ),
		4  => __( 'Projects updated.', 'emdotnet' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Projects restored to revision from %s', 'emdotnet' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Projects published. <a href="%s">View projects</a>', 'emdotnet' ), esc_url( $permalink ) ),
		7  => __( 'Projects saved.', 'emdotnet' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Projects submitted. <a target="_blank" href="%s">Preview projects</a>', 'emdotnet' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Projects scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview projects</a>', 'emdotnet' ),
		date_i18n( __( 'M j, Y @ G:i', 'emdotnet' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Projects draft updated. <a target="_blank" href="%s">Preview projects</a>', 'emdotnet' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'projects_updated_messages' );
<?php

/**
 * Registers the `themes` post type.
 */
function themes_init() {
	register_post_type( 'themes', array(
		'labels'                => array(
			'name'                  => __( 'Themes', 'emdotnet' ),
			'singular_name'         => __( 'Themes', 'emdotnet' ),
			'all_items'             => __( 'All Themes', 'emdotnet' ),
			'archives'              => __( 'Themes Archives', 'emdotnet' ),
			'attributes'            => __( 'Themes Attributes', 'emdotnet' ),
			'insert_into_item'      => __( 'Insert into Themes', 'emdotnet' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Themes', 'emdotnet' ),
			'featured_image'        => _x( 'Featured Image', 'Themes', 'emdotnet' ),
			'set_featured_image'    => _x( 'Set featured image', 'Themes', 'emdotnet' ),
			'remove_featured_image' => _x( 'Remove featured image', 'Themes', 'emdotnet' ),
			'use_featured_image'    => _x( 'Use as featured image', 'Themes', 'emdotnet' ),
			'filter_items_list'     => __( 'Filter Themes list', 'emdotnet' ),
			'items_list_navigation' => __( 'Themes list navigation', 'emdotnet' ),
			'items_list'            => __( 'Themes list', 'emdotnet' ),
			'new_item'              => __( 'New Themes', 'emdotnet' ),
			'add_new'               => __( 'Add New', 'emdotnet' ),
			'add_new_item'          => __( 'Add New Themes', 'emdotnet' ),
			'edit_item'             => __( 'Edit Themes', 'emdotnet' ),
			'view_item'             => __( 'View Themes', 'emdotnet' ),
			'view_items'            => __( 'View Themes', 'emdotnet' ),
			'search_items'          => __( 'Search Themes', 'emdotnet' ),
			'not_found'             => __( 'No Themes found', 'emdotnet' ),
			'not_found_in_trash'    => __( 'No Themes found in trash', 'emdotnet' ),
			'parent_item_colon'     => __( 'Parent Themes:', 'emdotnet' ),
			'menu_name'             => __( 'Themes', 'emdotnet' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor' ),
		'has_archive'           => false,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => 8,
		'menu_icon'             => 'dashicons-welcome-widgets-menus',
		'show_in_rest'          => true,
		'rest_base'             => 'themes',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'themes_init' );

/**
 * Sets the post updated messages for the `themes` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `themes` post type.
 */
function themes_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['Themes'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Themes updated. <a target="_blank" href="%s">View Themes</a>', 'emdotnet' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'emdotnet' ),
		3  => __( 'Custom field deleted.', 'emdotnet' ),
		4  => __( 'Themes updated.', 'emdotnet' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Themes restored to revision from %s', 'emdotnet' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Themes published. <a href="%s">View Themes</a>', 'emdotnet' ), esc_url( $permalink ) ),
		7  => __( 'Themes saved.', 'emdotnet' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Themes submitted. <a target="_blank" href="%s">Preview Themes</a>', 'emdotnet' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Themes scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Themes</a>', 'emdotnet' ),
		date_i18n( __( 'M j, Y @ G:i', 'emdotnet' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Themes draft updated. <a target="_blank" href="%s">Preview Themes</a>', 'emdotnet' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'themes_updated_messages' );
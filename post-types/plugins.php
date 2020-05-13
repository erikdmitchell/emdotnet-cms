<?php

/**
 * Registers the `plugins` post type.
 */
function plugins_init() {
	register_post_type( 'plugins', array(
		'labels'                => array(
			'name'                  => __( 'Plugins', 'emdotnet' ),
			'singular_name'         => __( 'Plugins', 'emdotnet' ),
			'all_items'             => __( 'All Plugins', 'emdotnet' ),
			'archives'              => __( 'Plugins Archives', 'emdotnet' ),
			'attributes'            => __( 'Plugins Attributes', 'emdotnet' ),
			'insert_into_item'      => __( 'Insert into Plugins', 'emdotnet' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Plugins', 'emdotnet' ),
			'featured_image'        => _x( 'Featured Image', 'Plugins', 'emdotnet' ),
			'set_featured_image'    => _x( 'Set featured image', 'Plugins', 'emdotnet' ),
			'remove_featured_image' => _x( 'Remove featured image', 'Plugins', 'emdotnet' ),
			'use_featured_image'    => _x( 'Use as featured image', 'Plugins', 'emdotnet' ),
			'filter_items_list'     => __( 'Filter Plugins list', 'emdotnet' ),
			'items_list_navigation' => __( 'Plugins list navigation', 'emdotnet' ),
			'items_list'            => __( 'Plugins list', 'emdotnet' ),
			'new_item'              => __( 'New Plugins', 'emdotnet' ),
			'add_new'               => __( 'Add New', 'emdotnet' ),
			'add_new_item'          => __( 'Add New Plugins', 'emdotnet' ),
			'edit_item'             => __( 'Edit Plugins', 'emdotnet' ),
			'view_item'             => __( 'View Plugins', 'emdotnet' ),
			'view_items'            => __( 'View Plugins', 'emdotnet' ),
			'search_items'          => __( 'Search Plugins', 'emdotnet' ),
			'not_found'             => __( 'No Plugins found', 'emdotnet' ),
			'not_found_in_trash'    => __( 'No Plugins found in trash', 'emdotnet' ),
			'parent_item_colon'     => __( 'Parent Plugins:', 'emdotnet' ),
			'menu_name'             => __( 'Plugins', 'emdotnet' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor' ),
		'has_archive'           => false,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => 7,
		'menu_icon'             => 'dashicons-plugins-checked',
		'show_in_rest'          => true,
		'rest_base'             => 'plugins',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'plugins_init' );

/**
 * Sets the post updated messages for the `plugins` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `plugins` post type.
 */
function plugins_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['Plugins'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Plugins updated. <a target="_blank" href="%s">View Plugins</a>', 'emdotnet' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'emdotnet' ),
		3  => __( 'Custom field deleted.', 'emdotnet' ),
		4  => __( 'Plugins updated.', 'emdotnet' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Plugins restored to revision from %s', 'emdotnet' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Plugins published. <a href="%s">View Plugins</a>', 'emdotnet' ), esc_url( $permalink ) ),
		7  => __( 'Plugins saved.', 'emdotnet' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Plugins submitted. <a target="_blank" href="%s">Preview Plugins</a>', 'emdotnet' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Plugins scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Plugins</a>', 'emdotnet' ),
		date_i18n( __( 'M j, Y @ G:i', 'emdotnet' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Plugins draft updated. <a target="_blank" href="%s">Preview Plugins</a>', 'emdotnet' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'plugins_updated_messages' );
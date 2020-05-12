<?php

/**
 * Registers the `blog` post type.
 */
function blog_init() {
	register_post_type( 'blog', array(
		'labels'                => array(
			'name'                  => __( 'Blog', 'emdotnet' ),
			'singular_name'         => __( 'Blog', 'emdotnet' ),
			'all_items'             => __( 'All Blog', 'emdotnet' ),
			'archives'              => __( 'Blog Archives', 'emdotnet' ),
			'attributes'            => __( 'Blog Attributes', 'emdotnet' ),
			'insert_into_item'      => __( 'Insert into Blog', 'emdotnet' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Blog', 'emdotnet' ),
			'featured_image'        => _x( 'Featured Image', 'Blog', 'emdotnet' ),
			'set_featured_image'    => _x( 'Set featured image', 'Blog', 'emdotnet' ),
			'remove_featured_image' => _x( 'Remove featured image', 'Blog', 'emdotnet' ),
			'use_featured_image'    => _x( 'Use as featured image', 'Blog', 'emdotnet' ),
			'filter_items_list'     => __( 'Filter Blog list', 'emdotnet' ),
			'items_list_navigation' => __( 'Blog list navigation', 'emdotnet' ),
			'items_list'            => __( 'Blog list', 'emdotnet' ),
			'new_item'              => __( 'New Blog', 'emdotnet' ),
			'add_new'               => __( 'Add New', 'emdotnet' ),
			'add_new_item'          => __( 'Add New Blog', 'emdotnet' ),
			'edit_item'             => __( 'Edit Blog', 'emdotnet' ),
			'view_item'             => __( 'View Blog', 'emdotnet' ),
			'view_items'            => __( 'View Blog', 'emdotnet' ),
			'search_items'          => __( 'Search Blog', 'emdotnet' ),
			'not_found'             => __( 'No Blog found', 'emdotnet' ),
			'not_found_in_trash'    => __( 'No Blog found in trash', 'emdotnet' ),
			'parent_item_colon'     => __( 'Parent Blog:', 'emdotnet' ),
			'menu_name'             => __( 'Blog', 'emdotnet' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => 9,
		'menu_icon'             => 'dashicons-edit-large',
		'show_in_rest'          => true,
		'rest_base'             => 'blog',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'taxonomies'            => array( 'post_tag' ), 
	) );

}
add_action( 'init', 'blog_init' );

/**
 * Sets the post updated messages for the `blog` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `blog` post type.
 */
function blog_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['Blog'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Blog updated. <a target="_blank" href="%s">View Blog</a>', 'emdotnet' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'emdotnet' ),
		3  => __( 'Custom field deleted.', 'emdotnet' ),
		4  => __( 'Blog updated.', 'emdotnet' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Blog restored to revision from %s', 'emdotnet' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Blog published. <a href="%s">View Blog</a>', 'emdotnet' ), esc_url( $permalink ) ),
		7  => __( 'Blog saved.', 'emdotnet' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Blog submitted. <a target="_blank" href="%s">Preview Blog</a>', 'emdotnet' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Blog scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Blog</a>', 'emdotnet' ),
		date_i18n( __( 'M j, Y @ G:i', 'emdotnet' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Blog draft updated. <a target="_blank" href="%s">Preview Blog</a>', 'emdotnet' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'blog_updated_messages' );
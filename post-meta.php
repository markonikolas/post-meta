<?php
/**
 * Plugin Name:       Post Meta
 * Description:       Post meta block that displays artist profile information.
 * Requires at least: 6.6
 * Requires PHP:      7.2
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       post-meta
 *
 * @package Markonikolas
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function markonikolas_post_meta_block_init() {
	register_block_type( __DIR__ . '/build' );

	// register dummy post meta
	register_post_meta( 'post', '_post_stats_likes', [
		'type' => 'number',
		'single' => true,
		'auth_callback' => '__return_true',
		'sanitize_callback' => 'wp_kses_post',
		'show_in_rest' => true,
	] );


	// register dummy post meta
	register_post_meta( 'post', '_post_stats_views', [
		'type' => 'number',
		'single' => true,
		'auth_callback' => '__return_true',
		'sanitize_callback' => 'wp_kses_post',
		'show_in_rest' => true,
	] );

	// register dummy post meta
	register_post_meta( 'post', '_post_stats_dislikes', [
		'type' => 'number',
		'single' => true,
		'auth_callback' => '__return_true',
		'sanitize_callback' => 'wp_kses_post',
		'show_in_rest' => true,
	] );
}
add_action( 'init', 'markonikolas_post_meta_block_init' );

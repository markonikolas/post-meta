<?php
/**
 * @var $attributes - block attributes.
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

global $post;

?>
<div <?php echo get_block_wrapper_attributes(); ?>>
	<?php echo get_post_meta( $post->ID, $attributes['selectedMeta'], true ); ?>
</div>

<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

        <?php the_first_post_category('category'); ?>

        <?php
        the_title(
            sprintf( '<h2 class="title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
            '</a></h2>'
        );
        ?>

        <?php if ( 'post' === get_post_type() ) : ?>
            <?php understrap_posted_on_custom(); ?>
        <?php endif; ?>

	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

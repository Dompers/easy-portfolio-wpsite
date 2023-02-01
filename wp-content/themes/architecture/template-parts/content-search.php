<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package architecture
 */

?>

<div id="post-<?php the_ID(); ?>" class="article_item">
    <?php architecture_posted_on(); ?>
    <?php the_title( '<a href="' . esc_url( get_permalink() ) . '" class="h2" rel="bookmark">', '</a>' ); ?>
    <?php architecture_posted_by(); ?>
    <div class="article-content"><?php the_excerpt(); ?></div>
    <?php architecture_more(); ?>
</div>

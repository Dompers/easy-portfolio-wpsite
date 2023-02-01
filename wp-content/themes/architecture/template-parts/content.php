<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package architecture
 */

?>
<?php if ( is_singular() ) : ?>
    <div id="post-<?php the_ID(); ?>" class="article_item">
        <div id="post-<?php the_ID(); ?>" class="article-content"><?php the_content(); ?></div>
    </div>
<?php else : ?>
    <div id="post-<?php the_ID(); ?>" class="article_item">
        <?php architecture_posted_on(); ?>
        <?php the_title( '<a href="' . esc_url( get_permalink() ) . '" class="h2" rel="bookmark">', '</a>' ); ?>
        <?php architecture_posted_by(); ?>
        <div class="article-content"><?php the_excerpt(); ?></div>
        <?php architecture_more(); ?>
    </div>
<?php endif; ?>
<article >

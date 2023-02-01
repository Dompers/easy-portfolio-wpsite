<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package architecture
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php //the_title( '<h1 style="margin-bottom: 64px; text-transform: uppercase"><b>', '</b></h1>' ); ?>

	<?php //architecture_post_thumbnail(); ?>

	<div class="article-content"><?php the_content(); ?></div><!-- .entry-content -->

</div><!-- #post-<?php the_ID(); ?> -->

<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kpd-portfolio
 */

get_header();
?>
    <main>
        <?php
            get_template_part( 'template-parts/single/content');
            get_template_part( 'template-parts/single/related-posts');
        ?>
    </main>
<?php
get_footer();

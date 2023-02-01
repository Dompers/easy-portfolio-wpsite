<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kpd-portfolio
 */

get_header();
?>

<main>
    <div class="block block-posts">
        <div class="posts-wrapper">
            <div class="posts">
                <?php the_title( '<h1 class="posts-title">', '</h1>' ); ?>
                <div class="posts-description"><?php the_content( ); ?>
                <div class="posts-list">

                    <?php
                    if (have_posts()) :

                        while ( have_posts() ) :
                            the_post();

                            get_template_part( 'template-parts/posts/post-item');

                        endwhile;

                        the_posts_navigation();

                    else :

                        get_template_part( 'template-parts/content', 'none' );

                    endif;
                    ?>

                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>

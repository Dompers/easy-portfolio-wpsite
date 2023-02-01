<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kpd-portfolio
 */

get_header();
?>

<?php
$category = get_the_category();
$current_category = $category[0];
$current_category_title = $current_category->name;
?>
<main>
    <div class="block block-posts">
        <div class="posts-wrapper">
            <div class="posts">
                <h1 class="posts-title"><?= $current_category_title ?></h1>
                <?php the_archive_description( '<div class="posts-description">', '</div>' ); ?>
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

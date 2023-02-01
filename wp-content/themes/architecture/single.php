<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package architecture
 */

get_header();
?>

<?php
$currentFrontPage = get_queried_object();
$post_id = $currentFrontPage->ID;
$featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
?>
    <div class="section article_image full_height black_bg" <?php if ($featured_img_url) : ?> style="background-image: url('<?php echo $featured_img_url; ?>');" <?php endif; ?>>
        <?php the_title('<div class="h1">','</div>', $post_id); ?>
    </div>

    <div class="section section_newspaper">
        <div class="content_container">
            <div class="wrapper">
                <div class="content">
                    <div class="article">
                        <?php
                        while ( have_posts() ) :
                            the_post();

                            get_template_part( 'template-parts/content', get_post_type() );


                        endwhile; // End of the loop.
                        ?>

                        <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="under_portfolio_text">Alle artikel</a>
                    </div>
                </div>
                <div class="sidebar">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>

    </div>
    <div class="section section_newspaper section_footer">

        <?php

        get_template_part( 'template-parts/footer', 'contact-form' );
        get_template_part( 'template-parts/footer' );

        ?>
    </div>

<?php
get_footer();

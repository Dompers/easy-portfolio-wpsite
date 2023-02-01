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
 * @package architecture
 */

get_header();
?>

<?php
$currentFrontPage = get_queried_object();
$post_id = $currentFrontPage->ID;
$featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
?>

    <div class="section section_1 full_height">

        <div class="service_slide_item">
            <div class="container_for_bg" style="background-image: url('<?php echo $featured_img_url; ?>');">

            </div>
            <div class="wrapper">
                <div class="service_slide_item_head_part" >
                    <div class="service_slide_item_head_part_header"><?php echo $currentFrontPage->post_name; ?></div>
                    <div class="service_slide_item_head_part_subheader"><?php the_field('acf_blog_subtitle', $post_id); ?></div>
                </div>
                <div class="service_slide_item_bottom_part"><?php the_field('acf_blog_info', $post_id); ?></div>
            </div>
        </div>

    </div>

    <div class="section section_newspaper">

        <div class="content_container">
            <div class="wrapper">
                <div class="content">
                    <?php
                    if ( have_posts() ) :

                        if ( is_home() && ! is_front_page() ) :
                            ?>
                            <header>
                                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                            </header>
                        <?php
                        endif;

                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post();

                            /*
                             * Include the Post-Type-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', get_post_type() );

                        endwhile;

                        the_posts_navigation();

                    else :

                        get_template_part( 'template-parts/content', 'none' );

                    endif;
                    ?>
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

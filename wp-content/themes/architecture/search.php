<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package architecture
 */

get_header();
?>

    <div class="section section_1 full_height">

        <div class="service_slide_item">
            <div class="container_for_bg" style="background-image: url('<?php echo  get_template_directory_uri(); ?>/assets/images/blog_bg.jpg')">

            </div>
            <div class="wrapper">
                <div class="service_slide_item_head_part">
                    <div class="service_slide_item_head_part_header">SUCHE</div>
                    <div class="service_slide_item_head_part_subheader">Suchergebnisse für '<?php the_search_query(); ?>'</div>
                </div>
                <div class="service_slide_item_bottom_part"><?php
                    global $wp_query;
                    if($wp_query->found_posts < 2) {
                        $result = "ergebnis";
                    } else {
                        $result = "ergebnisse";
                    }
                    echo $wp_query->found_posts . " " . $result . " gefunden.";
                    ?>
                </div>
            </div>
        </div>

    </div>

    <div class="section section_newspaper">

        <div class="content_container">
            <div class="wrapper">
                <div class="content">

                    <?php if ( have_posts() ) : ?>

                        <?php
                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post();

                            /**
                             * Run the loop for the search to output the results.
                             * If you want to overload this in a child theme then include a file
                             * called content-search.php and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', 'search' );

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

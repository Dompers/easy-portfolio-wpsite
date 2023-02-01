<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package kpd-portfolio
 */

get_header();
?>
    <header class="page-header">
        <br>
        <h1 class="page-title">
            <?php
            /* translators: %s: search query. */
            printf( esc_html__( 'Search Results for: %s', 'kpd-portfolio' ), '<span>' . get_search_query() . '</span>' );
            ?>
        </h1>
        <br>
    </header><!-- .page-header -->
    <main>
        <div class="block block-posts">
            <div class="posts-wrapper">
                <div class="posts">
                    <div class="posts-list">
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

<?php get_footer(); ?>

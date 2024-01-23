<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
$news_args = array(
    'post_type'         => 'news',
    'posts_per_page'    => 3,
);

$news = new WP_Query( $news_args );
$news_param = [
        'news' => $news,
        'container' => $container
    ];

if($news->have_posts() ) :
    while ( $news->have_posts() ) :
        $news->the_post();

    endwhile;
    wp_reset_postdata();
else:
endif;
?>

<?php if($news->have_posts() ) : ?>
    <?php get_template_part( 'global-templates/banner', 'carousel', $news_param ); ?>
<?php endif; ?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<?php
			// Do the left sidebar check and open div#primary.
			get_template_part( 'global-templates/left-sidebar-check' );
			?>

			<main class="site-main site-main-posts" id="main">

				<?php
				if ( have_posts() ) {
					// Start the Loop.
					while ( have_posts() ) {
						the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', get_post_format() );
					}
				} else {
					get_template_part( 'loop-templates/content', 'none' );
				}
				?>

			</main>

			<?php
			// Display the pagination component.
            $prev_arr = '<svg xmlns="http://www.w3.org/2000/svg" width="6" height="10" viewBox="0 0 6 10" fill="none">
                            <path opacity="0.4" d="M5 1L1 5L5 9" stroke="#171717" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>';
            $next_arr = '<svg xmlns="http://www.w3.org/2000/svg" width="6" height="10" viewBox="0 0 6 10" fill="none">
                          <path opacity="0.4" d="M1 1L5 5L1 9" stroke="#171717" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>';
            $pag_args = array(
                'end_size'           => 1,
                'mid_size'           => 1,
                'prev_next'          => true,
                'prev_text'          => _x( $prev_arr . 'OLDER POST', 'previous set of posts', 'understrap' ),
                'next_text'          => _x( 'NEXT POST' . $next_arr, 'next set of posts', 'understrap' ),
                'current'            => max( 1, get_query_var( 'paged' ) ),
                'screen_reader_text' => __( 'Posts navigation', 'understrap' ),
            );
			understrap_pagination($pag_args);

			// Do the right sidebar check and close div#primary.
			get_template_part( 'global-templates/right-sidebar-check' );
			?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php
get_footer();

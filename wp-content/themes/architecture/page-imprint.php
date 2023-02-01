<?php
/**
 * Template Name: Imprint
 * Template Post Type: page
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 *
 * @package architecture
 */

get_header();
?>

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

                    </div>
                </div>
                <div class="sidebar">
                    <?php while( the_repeater_field('acf-sidebar-info') ): ?>
                        <div class="sidebar_info">
                            <h3 class="h3"><?php the_sub_field('acf-sidebar-info-title'); ?></h3>
                            <div><?php the_sub_field('acf-sidebar-info-text'); ?></div>
                        </div>
                    <?php endwhile; ?>
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

<?php
/**
 * Template Name: Portfolio
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


        <?php

        $gallery_args = [
            "title"  => "Portfolio" ,
            "subtitle" => "ANWENDUNG VON VIRTUELLEN" ,
        ];
        get_template_part( 'template-parts/block', 'gallery', $gallery_args);
        ?>


        <?php

        if (!empty( get_the_content())) : ?>

            <div class="regular_text_block">
                <div class="text_block_content">
                    <?php the_content(); ?>
                </div>
            </div>

        <?php endif; ?>

    </div>
    <div class="section section_newspaper section_footer">

        <?php

        get_template_part( 'template-parts/footer', 'contact-form' );
        get_template_part( 'template-parts/footer' );

        ?>
    </div>
<?php
get_footer();
?>
<?php



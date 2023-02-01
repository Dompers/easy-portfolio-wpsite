<?php
/**
 * Template Name: Prices
 * Template Post Type: page
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 *
 * @package architecture
 */

get_header();

?>

    <?php if( get_field('acf_sliders') ): ?>
        <div class="section section_1 full_height black_bg">
            <div class="services_main_slider">
                <?php while( the_repeater_field('acf_sliders') ): ?>
                    <div class="service_slide_item">
                        <div class="container_for_bg" <?php  if (get_sub_field('acf_bg-image')) : ?> style="background-image: url(<?php the_sub_field('acf_bg-image') ?>)"<?php endif; ?>>
                            <?php  if (get_sub_field('acf_bg-video')) : ?>
                                <video loop="" muted="" playsinline="" data-autoplay="" id="stVideo">
                                    <source src="<?php the_sub_field('acf_bg-video') ?>" type="video/mp4">
                                </video>
                            <?php endif; ?>
                        </div>
                        <div class="wrapper">
                            <div class="service_slide_item_head_part">
                                <?php  if (get_sub_field('acf_header')) : ?><div class="service_slide_item_head_part_header"><?php the_sub_field('acf_header') ?></div><?php endif; ?>
                                <?php  if (get_sub_field('acf_subheader')) : ?><div class="service_slide_item_head_part_subheader"><?php the_sub_field('acf_subheader') ?></div><?php endif; ?>
                                <?php if( get_sub_field('acf_link') ): ?><a href="<?php echo get_sub_field('acf_link')['url'] ?>" class="service_slide_item_head_part_link"><?php echo get_sub_field('acf_link')['title'] ?></a><?php endif; ?>
                            </div>
                            <?php  if (get_sub_field('acf_text')) : ?>
                                <div class="service_slide_item_bottom_part">
                                    <p>
                                        <?php the_sub_field('acf_text') ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if( get_field('acf_info-image') && (get_field('acf_info-title') || get_field('acf_info-subtitle') || get_field('acf_info-text')) ): ?>
        <div class="section section_5 section_1 service_section service_section_white full_height" style="background-image: url('<?php the_field('acf_info-image') ?>')">
            <div class="box_5">
                <div class="half_part-image">
                    <?php if( get_field('acf_info-image') ) : ?>
                        <img src="<?php the_field('acf_info-image') ?>" alt="">
                    <?php endif; ?>
                </div>
                <div class="half_part">
                    <div class="subtitle"><?php the_field('acf_info-subtitle') ?></div>
                    <div class="h2"><?php the_field('acf_info-title') ?></div>
                    <div class="block_text_container">
                        <?php the_field('acf_info-text') ?>
                    </div>
                    <?php if( get_field('acf_info-link') ): ?>
                        <div class="bottom_link"><a href="<?php echo get_field('acf_info-link')['url'] ?>"><?php echo get_field('acf_info-link')['title'] ?></a></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if( get_field('acf_text-text') ): ?>
        <div class="section section_preise_text">
            <div class="regular_text_block regular_text_block_grey">
                <div class="text_block_header"><span class="h3"><?php the_field('acf_text-title'); ?></span></div>
                <div class="text_block_content">
                    <?php the_field('acf_text-text') ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if ( get_field('acf_before-after-before' ) && get_field('acf_before-after-after' ) ) : ?>
        <div class="section before_after_block">
            <div class="twentytwenty-container">
                <div><img src="<?php the_field('acf_before-after-before' ) ?>" alt="before"></div>
                <div><img src="<?php the_field('acf_before-after-after' ) ?>" alt="after"></div>
            </div>
        </div>
    <?php endif; ?>

    <div class="section section_newspaper section_footer">

            <?php

                get_template_part( 'template-parts/footer', 'contact-form' );
                get_template_part( 'template-parts/footer' );

            ?>
        </div>

<?php
get_footer();
?>
    <script src='https://unpkg.com/spritespin@x.x.x/release/spritespin.js' type='text/javascript'></script>

    <link href="<?php echo  get_template_directory_uri(); ?>/assets/js/twentytwenty-master/twentytwenty-master/css/twentytwenty.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo  get_template_directory_uri(); ?>/assets/js/twentytwenty-master/twentytwenty-master/js/jquery.event.move.js"></script>
    <script src="<?php echo  get_template_directory_uri(); ?>/assets/js/twentytwenty-master/twentytwenty-master/js/jquery.twentytwenty.js"></script>
    <script>
        $(function(){
            $(".twentytwenty-container").twentytwenty();
        });
    </script>
<?php



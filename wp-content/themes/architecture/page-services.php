<?php
/**
 * Template Name: Services
 * Template Post Type: page
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 *
 * @package architecture
 */

get_header();

?>
    <div id="fullpage">

        <!--fp-noscroll-->

        <?php if( get_field('acf_sliders') ): ?>
            <div class="section section_1 black_bg">
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

        <?php if( get_field('acf_how-do-we-work-list') ): ?>
            <div class="section how_we_work how_we_work_step_nums">
                <div class="subtitle"><?php the_field('acf_how-do-we-work-subtitle') ?></div>
                <div class="h2"><?php the_field('acf_how-do-we-work-title') ?></div>

                <div class="how_we_work_features how_we_work_features_steps">
                    <?php $hdww_counter = 0; ?>
                    <?php while( the_repeater_field('acf_how-do-we-work-list') ): ?>
                        <?php $hdww_counter += 1; ?>
                        <div class="how_we_work_feature">
                            <div class="feature_layer_3">
                                <div class="step_number"><?php echo $hdww_counter; ?></div>
                                <span><?php the_sub_field('acf_how-do-we-work-subtitle'); ?></span>
                                <strong><?php the_sub_field('acf_how-do-we-work-title'); ?></strong>
                            </div>
                            <div class="feature_layer_2">
                                <span><?php the_sub_field('acf_how-do-we-work-title'); ?></span>
                                <p><?php the_sub_field('acf_how-do-we-work-text'); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if( get_field('acf_services') ): ?>
            <?php while( the_repeater_field('acf_services') ): ?>
                <div class="section section_5 service_section <?php the_sub_field( 'acf_service-color' ) ?>  <?php if ( get_sub_field( 'acf_service-color' ) === "service_section_black" ) : echo 'black_bg'; endif;  ?>" style="background-image: url('<?php the_sub_field('acf_service-image') ?>')">
                    <div class="box_5">
                        <div class="half_part-image ">
                            <?php if( get_sub_field('acf_service-image') ): ?>
                                <img src="<?php the_sub_field('acf_service-image') ?>" alt="">
                            <?php endif; ?>
                            <?php if ( get_sub_field('acf_service-video') ): ?>
                                <video loop="" muted="" playsinline="" data-autoplay="" id="stVideo">
                                    <source src="<?php the_sub_field('acf_service-video') ?>" type="video/mp4">
                                </video>
                            <?php endif; ?>
                        </div>
                        <div class="half_part fade_from_bottom">
                            <div class="subtitle"><?php the_sub_field('acf_service-subtitle') ?></div>
                            <div class="h2"><?php the_sub_field('acf_service-title') ?></div>
                            <div class="block_text_container">
                                <?php the_sub_field('acf_service-text') ?>
                            </div>
                            <?php if( get_sub_field('acf_service-link') ): ?>
                                <div class="bottom_link"><a href="<?php echo get_sub_field('acf_service-link')['url'] ?>"><?php echo get_sub_field('acf_service-link')['title'] ?></a></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>

        <div class="section section_newspaper">

            <?php

            $gallery_args = [
                "title"  => get_field('acf_portfolio-title') ,
                "subtitle" => get_field('acf_portfolio-subtitle') ,
            ];
                get_template_part( 'template-parts/block', 'gallery', $gallery_args );

            ?>
            <?php if( get_field('acf_bottom-text-text') ): ?>
                <div class="regular_text_block">
                    <div class="text_block_header"><span class="h3"><?php the_field('acf_bottom-text-title'); ?></span></div>
                    <div class="text_block_content">
                        <?php the_field('acf_bottom-text-text') ?>
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
    </div>
<?php
get_footer();
?>
    <script type="text/javascript">


        $(document).ready(function () {


            if ($(window).width() > '1040') {
                $('#fullpage').fullpage({
                    //options here
                    licenseKey: '0ACD7F28-33A0438C-BE2DBE67-0E446D9D',
                    autoScrolling: true,
                    scrollHorizontally: false,
                    lockAnchors: false,
                    scrollOverflow: true,
                    navigation: true,
                    //scrollOverflowReset: true,
                    paddingBottom: '0px',
                    normalScrollElements: '.box_4 .block_text_container',
                    onLeave: function(origin, destination, direction){
                        $.map( origin.item.classList, function( val, i ) {
                            if(val == "section_5"){
                                setTimeout(function (){$(origin.item).find(".half_part").removeClass("fade_from_bottom")}, 1000);
                            }
                        });

                        $(".fixed_header").removeClass("show_menu");
                        $(".fixed_header .navigation").removeClass("active");

                        if(destination.index == 0){
                            $(".fixed_header .navigation").addClass("active");
                            $('#nav-icon-2').removeClass("active");
                        } else {
                            $('#nav-icon-2').addClass("active");
                        }

                        if(!$(destination.item).hasClass('black_bg')){
                            $("body").addClass("layer_white");
                            $("body").removeClass("layer_dark");
                        } else {
                            $("body").removeClass("layer_white");
                            $("body").addClass("layer_dark");
                        }
                    },
                });
            } else {
                $('#fullpage').fullpage({
                    //options here
                    licenseKey: '0ACD7F28-33A0438C-BE2DBE67-0E446D9D',
                    autoScrolling: true,
                    scrollHorizontally: false,
                    lockAnchors: false,
                    scrollOverflow: true,
                    navigation: true,
                    //scrollOverflowReset: true,
                    paddingBottom: '0px',
                    //normalScrollElements: '.block_text_container'
                    //normalScrollElements: '.section_5 .half_part',
                    onLeave: function(origin, destination, direction){
                        $.map( origin.item.classList, function( val, i ) {
                            if(val == "section_5"){
                                setTimeout(function (){$(origin.item).find(".half_part").removeClass("fade_from_bottom")}, 1000);
                                setTimeout(function (){$(origin.item).find(".half_part").addClass("fixed_padding")}, 1000);
                                setTimeout(function (){$(origin.item).find(".box_5").addClass("set_100_height")}, 1000);
                                setTimeout(function (){fullpage_api.reBuild()}, 1100);
                            }
                        });

                        $(".fixed_header").removeClass("show_menu");
                        $(".fixed_header .navigation").removeClass("active");

                        if(!$(destination.item).hasClass('black_bg')){
                            $("body").addClass("layer_white");
                            $("body").removeClass("layer_dark");
                        } else {
                            $("body").removeClass("layer_white");
                            $("body").addClass("layer_dark");
                        }
                    }
                });
            }
        });

    </script>
<?php



<?php
/**
 * Template Name: Homepage
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

        <?php if( get_field('acf_sliders', 28) ): ?>
            <div class="section section_1 black_bg">
                <div class="services_main_slider">
                    <?php while( the_repeater_field('acf_sliders', 28) ): ?>
                        <div class="service_slide_item">
                            <div class="container_for_bg" <?php if (get_sub_field('acf_bg-image')) : ?> style="background-image: url(<?php the_sub_field('acf_bg-image') ?>)"<?php endif; ?>>
                                <?php if (get_sub_field('acf_bg-video')) : ?>
                                    <video loop="" muted="" playsinline="" data-autoplay="" id="stVideo">
                                        <source src="<?php the_sub_field('acf_bg-video') ?>" type="video/mp4">
                                    </video>
                                <?php endif; ?>
                            </div>
                            <div class="wrapper">
                                <div class="service_slide_item_head_part">
                                    <?php if (get_sub_field('acf_header')) : ?><div class="service_slide_item_head_part_header"><?php the_sub_field('acf_header') ?></div><?php endif; ?>
                                    <?php if (get_sub_field('acf_subheader')) : ?><div class="service_slide_item_head_part_subheader"><?php the_sub_field('acf_subheader') ?></div><?php endif; ?>
                                    <?php if( get_sub_field('acf_link') ): ?><a href="<?php echo get_sub_field('acf_link')['url'] ?>" class="service_slide_item_head_part_link"><?php echo get_sub_field('acf_link')['title'] ?></a><?php endif; ?>
                                </div>
                                <?php if (get_sub_field('acf_text')) : ?>
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

        <div class="section padding_full section_2" id="section_2">

            <div class="box_2">
                <?php if( get_field('acf_benefits-slogan') ): ?>
                    <div class="left_part fade_from_left">
                        <?php the_field('acf_benefits-slogan') ?>
                    </div>
                <?php endif; ?>
                <?php if( get_field('acf_benefits-list') ): ?>
                    <div class="right_part">
                        <div class="subtitle"><?php the_field('acf_benefits-subtitle') ?></div>
                        <div class="h2"><?php the_field('acf_benefits-title') ?></div>
                        <div class="list_text">
                            <?php the_field('acf_benefits-list') ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if( get_field('acf_benefits-link') ): ?>
                    <div class="right_bottom_text"><a href="<?php echo get_field('acf_benefits-link')['url'] ?>"><?php echo get_field('acf_benefits-link')['title'] ?></a></div>
                <?php endif; ?>
            </div>
        </div>

        <?php if( get_field('acf_services-portfolio') ): ?>

            <div class="section section_3">

                <div class="box_3">
                    <div class="absolute_block_header">
                        <div class="subtitle"><?php the_field('acf_services-subtitle') ?></div>
                        <div class="h2"><?php the_field('acf_services-title') ?></div>
                    </div>


                    <div class="portfolio_box fade_from_bottom">
                        <?php while( the_repeater_field('acf_services-portfolio') ): ?>
                            <a href="<?php the_sub_field('acf_services-portfolio-href'); ?>" class="portfolio_item">
                                <div class="portfolio_item_img">
                                    <img src="<?php the_sub_field('acf_services-portfolio-image'); ?>" alt=""/>
                                </div>
                                <div class="portfolio_item_text">
                                    <div class="item_header"><?php the_sub_field('acf_services-portfolio-title'); ?></div>
                                    <div class="item_subheader"><?php the_sub_field('acf_services-portfolio-subtitle'); ?></div>
                                </div>
                            </a>
                        <?php endwhile; ?>
                    </div>
                </div>

            </div>

        <?php endif; ?>

        <?php if( (get_field('acf_about-us-video') || get_field('acf_about-us-image')) && ((get_field('acf_about-us-title') || get_field('acf_about-us-subtitle') || get_field('acf_about-us-text'))) ): ?>
            <div class="section section_4">
                <div class="box_4">
                    <div class="left_part fade_from_left">
                        <div class="image" <?php if (get_field('acf_about-us-image')) : ?> style="background-image: url(<?php the_field('acf_about-us-image') ?>)"<?php endif; ?>>
                            <?php if( get_field('acf_about-us-video') ) : ?>
                                <video loop="" muted="" playsinline="" data-autoplay="" id="about-us-stVideo">
                                    <source src="<?php the_field('acf_about-us-video') ?>" type="video/mp4">
                                </video>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="right_part fade_from_right">
                        <div class="subtitle"><?php the_field('acf_about-us-subtitle') ?></div>
                        <div class="h2"><?php the_field('acf_about-us-title') ?></div>
                        <div class="block_text_container">
                            <?php the_field('acf_about-us-text') ?>
                        </div>
                        <div class="bottom_digits_parts">
                            <?php if (get_field('acf_about-us-projects')) : ?><div><b id="myTargetElement"><?php the_field('acf_about-us-projects') ?></b> <span>REALISIERTE PROJEKTE</span></div><?php endif; ?>
                            <?php if (get_field('acf_about-us-years')) : ?><div><b id="myTargetElement_2"><?php the_field('acf_about-us-years') ?></b> <span>JAHREN AUF DER MARKT</span></div><?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if( get_field('acf_apartament-image') && (get_field('acf_apartament-title') || get_field('acf_apartament-subtitle') || get_field('acf_apartament-text')) ): ?>
            <div class="section section_5 black_bg" style="background-image: url('<?php the_field('acf_apartament-image') ?>')">
                <div class="box_5">
                    <div class="half_part-image">
                        <?php if( get_field('acf_apartament-image') ) : ?>
                            <img src="<?php the_field('acf_apartament-image') ?>" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="half_part fade_from_bottom">
                        <div class="subtitle"><?php the_field('acf_apartament-subtitle') ?></div>
                        <div class="h2"><?php the_field('acf_apartament-title') ?></div>
                        <div class="block_text_container">
                            <?php the_field('acf_apartament-text') ?>
                        </div>
                        <?php if( get_field('acf_apartament-link') ): ?>
                            <div class="bottom_link"><a href="<?php echo get_field('acf_apartament-link')['url'] ?>"><?php echo get_field('acf_apartament-link')['title'] ?></a></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if( get_field('acf_3d-visualization-list') ): ?>
            <div class="section section_6">
                <div class="box_6">

                    <div class="subtitle"><?php the_field('acf_3d-visualization-subtitle') ?></div>
                    <div class="h2"><?php the_field('acf_3d-visualization-title') ?></div>

                    <div class="three_text_blocks">
                        <?php while( the_repeater_field('acf_3d-visualization-list') ): ?>
                            <div class="three_text_blocks_item">
                                <span class="title"><?php the_sub_field('acf_3d-visualization-title'); ?></span>
                                <p class="text"><?php the_sub_field('acf_3d-visualization-text'); ?></p>
                            </div>
                        <?php endwhile; ?>
                    </div>

                </div>
            </div>
        <?php endif; ?>

        <div class="section section_newspaper">

            <?php

            $gallery_args = [
                "title"  => get_field('acf_portfolio-title') ,
                "subtitle" => get_field('acf_portfolio-subtitle') ,
            ];
            get_template_part( 'template-parts/block', 'gallery', $gallery_args);
            ?>

            <?php if( get_field('acf_questions-list') ): ?>
                <div class="newspaper_text_block">
                    <div class="box_6">

                        <div class="subtitle"><?php the_field('acf_questions-title') ?></div>
                        <div class="h2"><?php the_field('acf_questions-subtitle') ?></div>

                        <div class="three_text_blocks">
                            <?php while( the_repeater_field('acf_questions-list') ): ?>
                                <div class="three_text_blocks_item">
                                    <span class="title"><?php the_sub_field('acf_questions-title'); ?></span>
                                    <?php echo explodeMoreText(get_sub_field('acf_questions-text')); ?>
                                </div>
                            <?php endwhile; ?>
                        </div>

                    </div>
                </div>
            <?php endif; ?>

            <?php if( get_field('acf_how-do-we-work-list') ): ?>
                <div class="how_we_work" id="test">
                    <div class="subtitle"><?php the_field('acf_how-do-we-work-subtitle') ?></div>
                    <div class="h2"><?php the_field('acf_how-do-we-work-title') ?></div>

                    <div class="how_we_work_features">
                        <?php while( the_repeater_field('acf_how-do-we-work-list') ): ?>
                            <div class="how_we_work_feature">
                                <div class="feature_layer_1">
                                    <img src="<?php the_sub_field('acf_how-do-we-work-image'); ?>" alt="">
                                    <span><?php the_sub_field('acf_how-do-we-work-title'); ?></span>
                                </div>
                                <div class="feature_layer_2">
                                    <span><?php the_sub_field('acf_how-do-we-work-subtitle'); ?></span>
                                    <p><?php the_sub_field('acf_how-do-we-work-text'); ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if( get_field('acf_expertise-text') ): ?>
            <div class="regular_text_block">
                <div class="text_block_header"><span class="h3"><?php the_field('acf_expertise-title'); ?></span></div>
                <div class="text_block_content">
                    <?php the_field('acf_expertise-text') ?>
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
            var options = {
                useEasing : true,
                useGrouping : true,
                separator : ',',
                decimal : '.',
                prefix : '',
                suffix : ''
            };

            if (0 !== $("#myTargetElement").length ) {
                var demo_1 = new CountUp("myTargetElement", 0, parseInt($("#myTargetElement").text()), 0, 3, options);

                let number1 = demo_1.endVal;

                if(number1 < 10) {
                    $("#myTargetElement").closest('div').prepend('0');
                }
            }
            if (0 !== $("#myTargetElement_2").length ) {
                var demo_2 = new CountUp("myTargetElement_2", 0, parseInt($("#myTargetElement_2").text()), 0, 4, options);
                let number2 = demo_2.endVal;

                if(number2 < 10) {
                    $("#myTargetElement_2").closest('div').prepend('0');
                }
            }

            if ($(window).width() > '1100') {
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
                        $.map( destination.item.classList, function( val, i ) {
                            if(val == "section_2"){
                                setTimeout(function (){$(destination.item).find(".list_text ul li").addClass("right_0")}, 1000);
                                setTimeout(function (){$(destination.item).find(".left_part").removeClass("fade_from_left")}, 1000);
                            }
                            if(val == "section_3"){
                                setTimeout(function (){$(destination.item).find(".portfolio_box").removeClass("fade_from_bottom")}, 1000);
                            }
                            if(val == "section_4"){
                                setTimeout(function (){$(destination.item).find(".left_part").removeClass("fade_from_left")}, 1000);
                                setTimeout(function (){$(destination.item).find(".right_part").removeClass("fade_from_right")}, 1000);
                            }
                            if(val == "section_5"){
                                setTimeout(function (){$(destination.item).find(".half_part").removeClass("fade_from_bottom")}, 1000);
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

                        if( 0 !== $(destination.item).find('#myTargetElement').length && 0 !== $(destination.item).find('#myTargetElement_2').length){

                            if (demo_1 && demo_2) {
                                demo_1.start();
                                demo_2.start();
                            }
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
                        $.map( destination.item.classList, function( val, i ) {
                            if(val == "section_2"){
                                setTimeout(function (){$(destination.item).find(".list_text ul li").addClass("right_0")}, 1000);
                                setTimeout(function (){$(destination.item).find(".left_part").removeClass("fade_from_left")}, 1000);
                            }
                            if(val == "section_3"){
                                setTimeout(function (){$(destination.item).find(".portfolio_box").removeClass("fade_from_bottom")}, 1000);
                            }
                            if(val == "section_4"){
                                setTimeout(function (){$(destination.item).find(".left_part").removeClass("fade_from_left")}, 1000);
                                setTimeout(function (){$(destination.item).find(".right_part").removeClass("fade_from_right")}, 1000);
                            }
                            if(val == "section_5"){
                                setTimeout(function (){$(destination.item).find(".half_part").removeClass("fade_from_bottom")}, 1000);
                            }
                        });

                        $.map( origin.item.classList, function( val, i ) {
                            if(val == "section_5"){
                                setTimeout(function (){$(origin.item).find(".half_part").addClass("fixed_padding")}, 1000);
                                setTimeout(function (){$(origin.item).find(".box_5").addClass("set_100_height")}, 1000);
                                setTimeout(function (){fullpage_api.reBuild()}, 1100);
                            }
                        });

                        $(".fixed_header").removeClass("show_menu");
                        $(".fixed_header .navigation").removeClass("active");
                        //$('#nav-icon-2').addClass("active");

                        if( 0 !== $(destination.item).find('#myTargetElement').length && 0 !== $(destination.item).find('#myTargetElement_2').length){

                            if (demo_1 && demo_2) {
                                demo_1.start();
                                demo_2.start();
                            }
                        }

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

            $('.portfolio_box').slick({
                dots: false,
                infinite: true,
                speed: 1000,
                slidesToShow: 3,
                arrows: true,
                draggable: true,
                swipeToSlide: true,
                autoplay: true,
                autoplaySpeed: 6000,
                responsive: [
                    {
                        breakpoint: 1000,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '150px',
                            slidesToShow: 2,
                            infinite: true
                        }
                    },
                    {
                        breakpoint: 870,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '200px',
                            slidesToShow: 1,
                            infinite: true
                        }
                    },
                    {
                        breakpoint: 780,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '150px',
                            slidesToShow: 1,
                            infinite: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '50px',
                            slidesToShow: 1,
                            infinite: true
                        }
                    },
                    {
                        breakpoint: 500,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '25px',
                            slidesToShow: 1,
                            infinite: true
                        }
                    }
                ]
            });
        });

    </script>
<?php



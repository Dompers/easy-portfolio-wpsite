<?php

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

        <?php if((get_field('acf_info-title') || get_field('acf_info-subtitle') || get_field('acf_info-text')) ): ?>
            <div class="section text_section">
                <div class="text_section_container">
                    <div class="header_part">
                        <div class="subtitle"><?php the_field('acf_info-subtitle'); ?></div>
                        <div class="h2"><?php the_field('acf_info-title'); ?></div>
                    </div>
                    <div class="text_part">
                        <div class="left">
                            <?php the_field('acf_info-text'); ?>
                        </div>
                        <div class="right">
                            <?php the_field('acf_info-text-right'); ?>
                            <div class="bottom_digits_parts">
                                <div><b id="myTargetElement"><?php the_field('acf_info-projects'); ?></b> <span>REALISIERTE PROJEKTE</span></div>
                                <div>0<b id="myTargetElement_2"><?php the_field('acf_info-years'); ?></b> <span>JAHREN AUF DER MARKT</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="section section_newspaper">

            <?php
            $taxonomy = 'projects_cat';
            $term_id = get_field('acf_portfolio-id');
            $count = count(get_posts([
                'post_type' => 'projects',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => $taxonomy,
                        'field' => 'term_id',
                        'terms' => $term_id
                    )
                )
            ]));

            $gallery_args = [
                "termId" => $term_id,
                "title"  => get_field('acf_portfolio-title'),
                "subtitle" => get_field('acf_portfolio-subtitle'),
            ];

            if ($count > 0) :
                get_template_part( 'template-parts/block', 'gallery-single', $gallery_args );
            endif;
            ?>
            <?php if( get_field('acf_bottom-white-text') ): ?>
                <div class="regular_text_block no_pt">
                    <div class="text_block_header"><span class="h3"><?php the_field('acf_bottom-white-title'); ?></span></div>
                    <div class="text_block_content">
                        <?php the_field('acf_bottom-white-text') ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if( get_field('acf_bottom-grey-text') ): ?>
                <div class="regular_text_block regular_text_block_grey mb200">
                    <div class="text_block_header"><span class="h3"><?php the_field('acf_bottom-grey-title'); ?></span></div>
                    <div class="text_block_content">
                        <?php the_field('acf_bottom-grey-text') ?>
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



<?php
/**
 * Template Name: Project
 * Template Post Type: page
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 *
 * @package architecture
 */

get_header();

?>

<?php
$post_id = get_the_ID();
$featured_img_url = get_the_post_thumbnail_url($post_id,'full');
$terms = get_the_terms( $post_id, 'projects_cat' );
$term_id = $terms ? $terms[0]->term_id : false;
?>

<div class="section static_first_screen black_bg" style="background-image: url('<?php echo $featured_img_url; ?>');">
    <?php the_title( '<div class="h2">', '</div>' ); ?>
    <!--div class="h2">Architekturvisualisierung</div-->
    <?php if ( get_field('acf_project-geo' )) : ?>
        <div class="subtitle"><?php the_field('acf_project-geo' ) ?></div>
    <?php endif; ?>
</div>
<?php if ( get_field('acf_project-main-info-title' ) || get_field('acf_project-main-info-text' ) || get_field('acf_project-gallery' )) : ?>
    <div class="section project_item_description black_bg">
        <div class="project_item_description_container">
            <?php if ( get_field('acf_project-gallery' )) : ?>
                <div class="left">
                    <div class="project_item_photo_slider-container">
                        <div class="project_item_photo_slider">
                            <?php while( the_repeater_field('acf_project-gallery') ) : ?>
                                <div class="slide_item">
                                    <a href="<?php echo get_sub_field('acf_project-image'); ?>" data-fancybox="gallery"></a>
                                    <img src="<?php echo get_sub_field('acf_project-image'); ?>" alt=""  />
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="project_item_photo_slider_zoom_icon">
                            <a href="#">
                                <img src="<?php echo  get_template_directory_uri(); ?>/assets/images/zoom_ico.svg" alt=""/>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="right">
                <?php if ( get_field('acf_project-main-info-subtitle' )) : ?>
                    <div class="subtitle"><?php the_field('acf_project-main-info-subtitle' ); ?></div>
                <?php endif; ?>
                <?php if ( get_field('acf_project-main-info-title' )) : ?>
                    <div class="h2"><?php the_field('acf_project-main-info-title' ); ?></div>
                <?php endif; ?>
                <?php if ( get_field('acf_project-main-info-text' )) : ?>
                    <div class="block_text_container">
                        <?php the_field('acf_project-main-info-text' ); ?>
                    </div>
                <?php endif; ?>
                <?php if ( get_field('acf_project-main-info-place' ) || get_field('acf_project-main-info-term' )) : ?>
                <div class="projects_meta_data">
                    <?php if ( get_field('acf_project-main-info-term' )) : ?>
                        <div class="calendar_data"><?php the_field('acf_project-main-info-term' ); ?></div>
                    <?php endif; ?>
                    <?php if ( get_field('acf_project-main-info-place' )) : ?>
                        <div class="location_data"><?php the_field('acf_project-main-info-place' ); ?></div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if ( get_field('acf_media-title' ) || get_field('acf_media-text' )) : ?>
    <div class="section project_item_description white_bg">
        <div class="project_item_description_container">
            <div class="left">
                <?php if ( get_field('acf_media-type') == 'image' && get_field('acf_media-image' )) : ?>
                    <div class="project_item_media-container">
                        <img src="<?php the_field('acf_media-image') ?>">
                    </div>
                <?php endif; ?>
                <?php if ( get_field('acf_media-type') == 'gallery' && get_field('acf_media-gallery' )) : ?>
                    <div class="project_item_photo_slider-container">
                        <div class="project_item_photo_slider">
                            <?php while( the_repeater_field('acf_media-gallery') ) : ?>
                                <div class="slide_item">
                                    <a href="<?php echo get_sub_field('acf_media-image'); ?>" data-fancybox="media-gallery"></a>
                                    <img src="<?php echo get_sub_field('acf_media-image'); ?>" alt=""  />
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="project_item_photo_slider_zoom_icon">
                            <a href="#">
                                <img src="<?php echo  get_template_directory_uri(); ?>/assets/images/zoom_ico.svg" alt=""/>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ( get_field('acf_media-type') == 'video' && get_field('acf_media-video' )) : ?>
                    <div class="project_item_media-container">
                        <video loop muted playsinline="" autoplay="autoplay" id="media-stVideo">
                            <source src="<?php the_field('acf_media-video') ?>" type="video/mp4">
                        </video>
                    </div>
                <?php endif; ?>
                <?php if (get_field('acf_media-type') == 'youtube' && get_field('acf_media-youtube' )) : ?>
                    <div class="project_item_media-container">
                        <img src="https://i.ytimg.com/vi/<?php the_field('acf_media-youtube'); ?>/maxresdefault.jpg" alt="">
                        <a href="#" class="modal-btn youtube-open" data-modal="media-video">
                            <svg xmlns="http://www.w3.org/2000/svg" height="800" width="1200" viewBox="-35.20005 -41.33325 305.0671 247.9995"><path d="M229.763 25.817c-2.699-10.162-10.65-18.165-20.748-20.881C190.716 0 117.333 0 117.333 0S43.951 0 25.651 4.936C15.553 7.652 7.6 15.655 4.903 25.817 0 44.236 0 82.667 0 82.667s0 38.429 4.903 56.85C7.6 149.68 15.553 157.681 25.65 160.4c18.3 4.934 91.682 4.934 91.682 4.934s73.383 0 91.682-4.934c10.098-2.718 18.049-10.72 20.748-20.882 4.904-18.421 4.904-56.85 4.904-56.85s0-38.431-4.904-56.85" fill="red"/><path d="M93.333 117.559l61.333-34.89-61.333-34.894z" fill="#fff"/></svg>
                        </a>
                        <!--iframe width="560" height="315" src="https://www.youtube.com/embed/<?php the_field('acf_media-youtube'); ?>?rel=0&modestbranding=0&autoplay=1&loop=1&playlist=<?php the_field('acf_media-youtube'); ?>" frameborder="0" allowfullscreen></iframe-->
                    </div>
                <?php endif; ?>
                <?php if ( get_field('acf_media-type') == '360deg' && get_field('acf_media-360-deg-gallery' )) : ?>
                    <div class="project_item_media-container">
                        <div id="myMediaSpriteSpinList">
                            <?php while( the_repeater_field('acf_media-360-deg-gallery') ) : ?>

                                <div data-image-src="<?php echo get_sub_field('acf_360-deg-image'); ?>"></div>

                            <?php endwhile; ?>
                        </div>
                        <div class="myMediaSpriteSpin-container">
                            <div id='myMediaSpriteSpin'></div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="right">
                <?php if ( get_field('acf_media-title' )) : ?>
                    <div class="h2"><?php the_field('acf_media-title' ); ?></div>
                <?php endif; ?>
                <?php if ( get_field('acf_media-text' )) : ?>
                    <div class="block_text_container">
                        <?php the_field('acf_media-text' ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="section">
    <?php if ( get_field('acf_360-deg-title' ) || get_field('acf_360-deg-text' ) || get_field('acf_360-deg-gallery' )) : ?>
        <div class="text_and_graphic">
            <?php if ( "" !== get_field('acf_360-deg-title' ) || "" !== get_field('acf_360-deg-text' )) : ?>
                <div class="regular_text_block regular_text_block_grey">
                    <?php if ( get_field('acf_360-deg-title' ) ) : ?>
                        <div class="text_block_header"><span class="h3"><?php the_field('acf_360-deg-title' ) ?></span></div>
                    <?php endif; ?>
                    <?php if ( get_field('acf_360-deg-text' ) ) : ?>
                        <div class="text_block_content"><?php the_field('acf_360-deg-text' ) ?> </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if ( get_field('acf_360-deg-gallery' ) ) : ?>
                <div class="big_single_graphic_block">
                    <div id="mySpriteSpinList">
                        <?php while( the_repeater_field('acf_360-deg-gallery') ) : ?>

                            <div data-image-src="<?php echo get_sub_field('acf_360-deg-image'); ?>"></div>

                        <?php endwhile; ?>
                    </div>
                    <div class="mySpriteSpin-container">
                        <div id='mySpriteSpin'></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php if ( get_field('acf_panorama-title' ) || get_field('acf_panorama-text' )) : ?>
        <div class=" panorama_block_with_before_after black_bg">
            <?php if ( get_field('acf_panorama-title' ) || get_field('acf_panorama-text' ) ) : ?>
                <div class="regular_text_block regular_text_block_black black_bg">
                    <?php if ( get_field('acf_panorama-title' ) ) : ?>
                        <div class="text_block_header"><span class="h3"><?php the_field('acf_panorama-title' ) ?></span></div>
                    <?php endif; ?>
                    <?php if ( get_field('acf_panorama-text' ) ) : ?>
                        <div class="text_block_content"><?php the_field('acf_panorama-text' ) ?></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php if (get_field('acf_panorama-subdir' )) : ?>
        <div class=" panorama_block_with_before_after black_bg">
            <?php if ( get_field('acf_panorama-subdir' ) ) : ?>
                <div class="panorama_block">
                    <div class="panorama_block-overlay">
                        <div class="panorama_block-overlay-header">
                            <img class="info" src="<?php echo  get_template_directory_uri(); ?>/assets/images/360-panorama.svg" alt=""/>
                            <a href="#" class="stop"><img src="<?php echo  get_template_directory_uri(); ?>/assets/images/close-panorama.svg" alt=""/></a>
                        </div>
                        <div class="panorama_block-overlay-body">
                            <a href="#" class="play"><img src="<?php echo  get_template_directory_uri(); ?>/assets/images/play-panorama.svg" class="contact_us" alt=""/></a>
                        </div>
                    </div>
                    <?php $upload_dir = wp_get_upload_dir(); ?>
                    <iframe src="<?php echo $upload_dir['baseurl'] .'/panorama/'. get_field('acf_panorama-subdir') . '/index.html';?>" > allowfullscreen></iframe>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php if( get_field('acf_before-after-title') || get_field('acf_before-after-text') ): ?>
        <div class="section_newspaper">
            <div class="regular_text_block regular_text_block_grey">
                <?php if ( get_field('acf_before-after-title') ) :  ?>
                    <div class="text_block_header">
                        <span class="h3"><?php the_field('acf_before-after-title'); ?></span>
                    </div>
                <?php endif; ?>
                <?php if ( get_field('acf_before-after-text') ) :  ?>
                    <div class="text_block_content">
                        <?php the_field('acf_before-after-text') ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if ( get_field('acf_before-after-before' ) && get_field('acf_before-after-after' ) ) : ?>
        <div class=" before_after_block">
            <div class="twentytwenty-container">
                <div><img src="<?php the_field('acf_before-after-before' ) ?>" alt="before"></div>
                <div><img src="<?php the_field('acf_before-after-after' ) ?>" alt="after"></div>
            </div>
        </div>
    <?php endif; ?>
</div>
<div class="section section_newspaper">
    <?php

    $gallery_args = [
        "termId" => $term_id,
        "title"  => get_field('acf_portfolio-title') ,
        "subtitle" => get_field('acf_portfolio-subtitle') ,
    ];
    get_template_part( 'template-parts/block', 'gallery-single', $gallery_args );

    ?>

</div>
<div class="section section_newspaper section_footer">

            <?php

                get_template_part( 'template-parts/footer', 'contact-form' );
                get_template_part( 'template-parts/footer' );

            ?>
        </div>

<?php if (get_field('acf_media-type') == 'youtube' && get_field('acf_media-youtube' )) : ?>
<div class="modal" id="media-video">
    <div class="modal-overlay"></div>
    <div class="modal-close">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 10.6L6.6 5.2 5.2 6.6l5.4 5.4-5.4 5.4 1.4 1.4 5.4-5.4 5.4 5.4 1.4-1.4-5.4-5.4 5.4-5.4-1.4-1.4-5.4 5.4z"></path></svg>
    </div>
    <div class="modal-wrapper">
        <div class="modal-body">
            <iframe width="560" height="315" src="" data-src="https://www.youtube.com/embed/<?php the_field('acf_media-youtube'); ?>?autoplay=1&mute=1&rel=0&modestbranding=0&loop=1&playlist=<?php the_field('acf_media-youtube'); ?>" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</div>
<?php endif; ?>
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

    <script type='text/javascript'>

        if ( 0 !== $("#mySpriteSpinList div").length ) {

            if ($(window).width() > '1100') {

                var galleryXs = [];
                let spriteSpinLength = $("#mySpriteSpinList div").length;

                $("#mySpriteSpinList div").each(function (i, el) {
                    galleryXs.push($(el).data('imageSrc'));
                });

                $("#mySpriteSpin").spritespin({
                    // path to the source images.
                    source: galleryXs,
                    animate: true,
                    frameTime: 700,
                    frames: spriteSpinLength,
                    width: $(window).width(),  // width in pixels of the window/frame
                    //height: $(window).height(),  // height in pixels of the window/frame
                    height: $(window).width() * 0.562,
                });
            } else {
                var galleryMd = [];
                let spriteSpinLength = $("#mySpriteSpinList div").length;

                $("#mySpriteSpinList div").each(function (i, el) {
                    galleryMd.push($(el).data('imageSrc'));
                });

                $("#mySpriteSpin").spritespin({
                    // path to the source images.
                    source: galleryMd,
                    animate: true,
                    frameTime: 700,
                    frames: spriteSpinLength,
                    width: $(window).width(),  // width in pixels of the window/frame
                    height: $(window).width() * 0.562,  // height in pixels of the window/frame
                });
            }
        }

        if ( 0 !== $("#myMediaSpriteSpinList div").length ) {

            if ($(window).width() > '1100') {

                var galleryMediaXs = [];
                let spriteSpinLength = $("#myMediaSpriteSpinList div").length;

                $("#myMediaSpriteSpinList div").each(function (i, el) {
                    galleryMediaXs.push($(el).data('imageSrc'));
                });

                $("#myMediaSpriteSpin").spritespin({
                    // path to the source images.
                    source: galleryMediaXs,
                    animate: true,
                    frameTime: 700,
                    frames: spriteSpinLength,
                    width: ($(window).height() / 56.2) * 100,  // width in pixels of the window/frame
                    height: $(window).height(),  // height in pixels of the window/frame
                });
            } else {
                var galleryMediaMd = [];
                let spriteSpinLength = $("#myMediaSpriteSpinList div").length;

                $("#myMediaSpriteSpinList div").each(function (i, el) {
                    galleryMediaMd.push($(el).data('imageSrc'));
                });

                $("#myMediaSpriteSpin").spritespin({
                    // path to the source images.
                    source: galleryMediaMd,
                    animate: true,
                    frameTime: 700,
                    frames: spriteSpinLength,
                    width: ($(window).width() / 56.2) * 100,  // width in pixels of the window/frame
                    height: $(window).width(),  // height in pixels of the window/frame
                });
            }
        }

    </script>

<?php



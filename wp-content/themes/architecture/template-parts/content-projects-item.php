<?php
/**
 * Template part for displaying project content in list of progects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package architecture
 */

?>


<?php
    $post_id = get_the_ID();
    $featured_img_url = get_the_post_thumbnail_url($post_id,'full');
    $featured_img_id = get_post_thumbnail_id($post_id);
    $featured_img_project_thumb_url = wp_get_attachment_image_src( $featured_img_id, 'project-thumb' );
?>

<div class="portfolio_item">

    <img src="<?php echo $featured_img_project_thumb_url[0]; ?>" alt=""/>
    <div class="absolute_container">
        <div class="portfolio_item_info">
            <?php the_title( '<div class="portfolio_item_info_title">', '</div>' ); ?>
            <?php if ( get_field('acf_project-geo', $post_id )) : ?>
                <div class="portfolio_item_info_geo"><?php the_field('acf_project-geo', $post_id ) ?></div>
            <?php endif; ?>
            <div class="portfolio_item_info_buttons">
                <div class="zoom_item" data-fancybox="gallery-<?php echo $post_id; ?>" data-src="<?php echo $featured_img_url; ?>"><img src="<?php echo  get_template_directory_uri(); ?>/assets/images/zoom_ico.svg" alt=""/></div>
                <div class="go-to-project"><a href="<?php echo esc_url( get_permalink() ) ?>"><img src="<?php echo  get_template_directory_uri(); ?>/assets/images/link_icon.svg" alt=""/></a></div>
            </div>
        </div>
    </div>
    <div class="portfolio_item_gallery">
        <?php while( the_repeater_field('acf_project-gallery') ): ?>
            <div data-fancybox="gallery-<?php echo $post_id; ?>" data-src="<?php the_sub_field('acf_project-image'); ?>"></div>
        <?php endwhile; ?>
    </div>
</div>

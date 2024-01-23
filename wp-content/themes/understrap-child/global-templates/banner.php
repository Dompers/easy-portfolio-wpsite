<?php $container = get_theme_mod( 'understrap_container_type' ); ?>

<div class="banner">
    <div class="banner-item" style="background-image: url('<?= get_the_post_thumbnail_url(); ?>')">
        <div class="banner-item-inner">
            <div class="<?php echo esc_attr( $container ); ?>">
                <?php the_first_post_category('banner-category'); ?>
                <div class="banner-title"><?php the_title(); ?></div>
                <div class="banner-posted_on"><?php understrap_posted_on_custom(); ?></div>
            </div>
        </div>
    </div>
</div>

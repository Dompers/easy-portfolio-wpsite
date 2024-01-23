<?php
    $news = $args['news'];
    $container = $args['container'];
?>

<div class="wrapper pt-0 pb-0" id="banner-wrapper">
    <div class="banner">
        <?php while ( $news->have_posts() ) : $news->the_post(); ?>
            <div class="banner-item" style="background-image: url('<?= get_the_post_thumbnail_url(); ?>')">
                <div class="banner-item-inner">
                    <div class="<?php echo esc_attr( $container ); ?>">
                        <?php $link = get_permalink(); ?>
                        <div class="banner-title"><a href="<?= $link; ?>"><?php the_title(); ?></a></div>
                        <div class="banner-posted_on"><?php understrap_posted_on_custom(); ?></div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php
    $featured_img_url = get_the_post_thumbnail_url(get_the_ID());
?>
<div class="post-item">
    <a class="post-item-image" href="<?php the_permalink(); ?>">
        <div class="post-item-image-inner"><img class="image" src="<?php echo $featured_img_url; ?>"></div>
    </a>
    <div class="post-item-content"><a class="post-item-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
</div>

<?php
$related_posts = new WP_Query(
    array(
        'category__in'   => wp_get_post_categories( get_the_ID() ),
        'posts_per_page' => 5,
        'post__not_in'   => array( get_the_ID() )
    )
);

if( $related_posts->have_posts() ) {
    ?>
    <div class="block block-posts">
        <div class="posts-wrapper">
            <div class="posts">
                <div class="posts-title">
                    <h2 class="h1">Similar emails</h2>
                </div>
                <div class="posts-list">
                    <?php
                    while( $related_posts->have_posts() ) {
                        $related_posts->the_post();

                        get_template_part( 'template-parts/posts/post-item');
                    }
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>

<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package architecture
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">

    <?php //get_search_form(); ?>
    <?php
    global $more; $more = false; # some wordpress wtf logic
    $posts = get_posts(array(
        'post_type' => 'post',
        //'nopaging' => true,
        'orderby' => 'date',
        'order' => 'DSC',
        'posts_per_page'   => 10,
    ));

    $month = null;

    if (count($posts) > 0) : ?>

        <div class="blog_feed_container">
            <div class="blog_feed_header subtitle">BLOG</div>
            <div class="blog_feed">

            <?php foreach($posts as $post):

                $post_id = $post->ID;
                setup_postdata($post); //enables the_title() etc. without specifying a post ID
                $postMonth =  date('FY',strtotime($post->post_date));?>

                <div class="blog_feed_item">
                    <?php
                    if($month!=$postMonth){
                        echo '<span class="subtitle date">'.date('F Y',strtotime($post->post_date)).'</span>';
                        $month =$postMonth;
                    } ?>
                    <div><a href="<?php echo get_permalink($post_id) ?>"><?php the_title();?></a></div>
                </div>
                <?php wp_reset_postdata();
            endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->

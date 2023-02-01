<?php
/**
 * Template part for displaying home content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kpd-portfolio
 */

?>

<?php

$uncategorized_id = get_cat_ID( 'Uncategorized' );
$excludeCategoriesId = [$uncategorized_id];

$categories = get_categories([
        'taxonomy'              => 'category',
        'parent'                => '',
        'hide_empty'            => 0,
        'hieraarchical'         => 1,
        'show_option_all'       => 'Все',
        'number'                => 0,
        'exclude'               => $excludeCategoriesId
    ]
);

?>
<div class="block block-tabs">
    <div class="tabs-wrapper">
        <div class="tabs stickied w-100" id="categories">
            <div class="tab-panel hide-scr">
                <div class="tab-panel-inner">
                    <span class="tab-panel-item active" data-tab-id="all"><a class="btn btn-secondary title" href="/">All Emails</a></span>
                    <?php
                    if($categories) {
                        foreach ($categories as $category){
                            ?>
                            <span class="tab-panel-item" data-tab-id="<?php echo $category->term_id; ?>"><a class="btn btn-secondary title" href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a></span>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-content-item go-to-post-nav active" id="all">
                    <div class="block block-posts">
                        <div class="posts-wrapper">
                            <div class="posts">
                                <div class="posts-list">
                                    <?php
                                    $posts = new WP_Query(array(
                                        'post_type'         => 'post',
                                        'posts_per_page'    => -1,
                                        'category__not_in'  => $excludeCategoriesId
                                    ));

                                    if($posts->have_posts()){

                                        while($posts->have_posts()){

                                            $posts->the_post();

                                            get_template_part( 'template-parts/posts/post-item');
                                        }
                                        wp_reset_postdata();
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                foreach($categories as $category){
                    ?>
                        <div class="tab-content-item go-to-post-nav" id="<?php echo $category->cat_ID; ?>">
                            <div class="block block-posts">
                                <div class="posts-wrapper">
                                    <div class="posts">
                                        <div class="posts-list"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

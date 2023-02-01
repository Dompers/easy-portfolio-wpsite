<?php
    $term_id = array_key_exists("termId", $args) && $args["termId"] !== "" ? $args["termId"] : "all" ;
    $term_title = array_key_exists("title", $args) && $args["title"] !== "" ? $args["title"] : "" ;
    $term_subtitle = array_key_exists("subtitle", $args) && $args["subtitle"] !== "" ? $args["subtitle"] : "" ;
    $posts_per_page = 2;
    $taxonomy = 'projects_cat';
?>

<div class="portfolio_block tabs-toggle">

    <?php if ("" !== $term_subtitle) : ?><div class="subtitle"><?php echo $term_subtitle; ?></div><?php endif;?>
    <?php if ("" !== $term_title) : ?><div class="h2"><span><?php echo $term_title; ?></span></div><?php endif;?>

    <div class="tabs-toggle-buttons portfolio_category_buttons">
        <div class="under_portfolio_text show_portfolio_categories"><span data-change_word="ausblenden">KATEGORIEN</span></div>
        <div class="portfolio_head_categories_container">
            <div class="portfolio_head_categories">

                <?php
                $categories = get_categories([
                        'taxonomy'              => 'projects_cat',
                        //'child_of'              => $mainCategory,
                        'parent'                => '',
                        'type'                  => 'projects',
                        'hide_empty'            => 0,
                        'hieraarchical'         => 1,
                        'show_option_all'       => 'Alle',
                        'number'                => 0,
                        //'exclude'               => $excludeCategoriesId
                    ]
                );
                ?>
                <div class="tabs-toggle-button cat-item-all portfolio_category <?php if ($term_id === "all") { echo 'current-cat';} ?>" data-post-type="all">Alle</div>
                <?php
                if($categories) {
                    foreach ($categories as $category){
                        ?>
                        <div class="tabs-toggle-button cat-item cat-item-<?php echo $category->term_id; ?> portfolio_category <?php if ($category->term_id === $term_id) { echo 'current-cat';} ?>" data-post-type="<?php echo $category->term_id; ?>"  data-posts-per-page="<?php echo $posts_per_page; ?>"><?php echo $category->name; ?></div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="tabs-toggle-content portfolio_items-content">
        <div class="tabs-toggle-item <?php if ($term_id === "all") { echo 'current-cat';} ?>" data-post-type="all" data-page="1" data-posts-per-page="<?php echo $posts_per_page; ?>">
            <div class="items portfolio_items">
                <?php
                    if ($term_id === "all") {
                        $posts = new WP_Query(array(
                            'post_type'         => 'projects',
                            'posts_per_page'    => $posts_per_page,
                            'meta_key'			=> 'acf_project-sort',
                            'orderby'			=> 'meta_value_num',
                            'order'				     => 'ASC',
                        ));

                        if ($posts->have_posts()) {

                            while ($posts->have_posts()) {

                                $posts->the_post();

                                get_template_part('template-parts/content', 'projects-item');
                            }
                            wp_reset_postdata();
                        }
                    }
                ?>
            </div>
            <?php
                $count = count(get_posts([
                    'post_type' => 'projects',
                    'posts_per_page' => -1,
                    'meta_key'			=> 'acf_project-sort',
                    'orderby'			=> 'meta_value_num',
                    'order'				     => 'ASC',
                ]));
            ?>
            <?php if ($count > 1) : ?>
                <div class="under_portfolio_text"><span>MEHR BILDER ZEIGEN</span></div>
            <?php endif;  ?>
        </div>

        <?php
        foreach($categories as $category){
            ?>
            <div class="tabs-toggle-item <?php if ($category->cat_ID === $term_id) { echo 'current-cat';} ?>" data-post-type="<?php echo $category->cat_ID; ?>"  data-page="1" data-posts-per-page="<?php echo $posts_per_page; ?>">
                <div class="items portfolio_items">
                    <?php
                        if ($category->category_count > 0 && $category->cat_ID === $term_id) {
                            $args = array(
                                'post_type' => 'projects',
                                'posts_per_page' => $posts_per_page,
                                'paged' => 1,
                                'meta_key'			=> 'acf_project-sort',
                                'orderby'			=> 'meta_value_num',
                                'order'				     => 'ASC',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => $taxonomy,
                                        'field' => 'term_id',
                                        'terms' => $term_id
                                    )
                                )
                            );

                            $posts = new WP_Query($args);

                            while($posts->have_posts()){

                                $posts->the_post();

                                get_template_part( 'template-parts/content', 'projects-item');
                            }

                            wp_reset_postdata();
                        }
                    ?></div>
                <?php if ($category->category_count > $posts_per_page) : ?>
                    <div class="under_portfolio_text"><span>MEHR BILDER ZEIGEN</span></div>
                <?php endif;  ?>
            </div>
            <?php
        }
        ?>
    </div>
</div>

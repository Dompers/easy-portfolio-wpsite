<?php
    $term_id = array_key_exists("termId", $args) && $args["termId"] !== "" ? $args["termId"] : "all" ;
    $term_title = array_key_exists("title", $args) && $args["title"] !== "" ? $args["title"] : "" ;
    $term_subtitle = array_key_exists("subtitle", $args) && $args["subtitle"] !== "" ? $args["subtitle"] : "" ;
    $posts_per_page = 2;
    $taxonomy = 'projects_cat';

    if ($term_id === "all") {

        $terms = get_terms( $taxonomy );
        $term_ids = wp_list_pluck( $terms, 'term_id' );
    }
    else {
        $term_ids = $term_id;
    }

    $post_args = array(
        'post_type' => 'projects',
        'posts_per_page' => $posts_per_page,
        'paged' => 1,
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,
                'field' => 'term_id',
                'terms' => $term_ids
            )
        ),
        'meta_key'			=> 'acf_project-sort',
        'orderby'			=> 'meta_value_num',
        'order'				=> 'ASC'
    );

    $posts = new WP_Query($post_args);

    $count = count(get_posts([
        'post_type' => 'projects',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,
                'field' => 'term_id',
                'terms' => $term_ids
            )
        ),
        'meta_key'			=> 'acf_project-sort',
        'orderby'			=> 'meta_value_num',
        'order'				     => 'ASC'
    ]));
?>

<?php if ( $count > 0) : ?>
    <div class="portfolio_block tabs-toggle single">

        <?php if ("" !== $term_subtitle && !empty($term_subtitle)) : ?><div class="subtitle"><?php echo $term_subtitle; ?></div><?php endif;?>
        <?php if ("" !== $term_title && !empty($term_title)) : ?><div class="h2"><span><?php echo $term_title; ?></span></div><?php endif;?>

        <div class="portfolio_items-content tabs-toggle-content">
            <div class="tabs-toggle-item current-cat" data-post-type="<?php echo $term_id; ?>" data-page="1" data-posts-per-page="<?php echo $posts_per_page; ?>">
                <div class="items portfolio_items">
                    <?php

                        while($posts->have_posts()){

                            $posts->the_post();

                            get_template_part( 'template-parts/content', 'projects-item');
                        }

                        wp_reset_postdata();
                    ?>
                </div>
                <?php
                ?>
                <?php if ($count > $posts_per_page) : ?>
                    <div class="under_portfolio_text"><span>MEHR BILDER ZEIGEN</span></div>
                <?php endif;  ?>
            </div>
        </div>
    </div>
<?php endif; ?>

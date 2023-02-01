<?php
/**
 * Template Name: 404
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
    $args = array (
        'post_type'          => 'page',
        'name'               => '404',
    );

    $posts = new WP_Query( $args );

    $error_page = get_page_by_title( '404', $output = OBJECT, $post_type = 'page' );
    $error_page_id = $error_page->ID;

    if( is_null(get_post($error_page_id))){

        ?>
        <div class="container_404">
            <div class="header_404">404</div>
            <h2 class="h2">Es wurde nichts gefunden </h2>
            <p>Vielleicht hilft die Suche oder folgenden Links</p>
            <a href="/">ZURÜCK ZUR STARTSEITE</a>
        </div>
        <?php

    } else {

        $title = get_field('acf_title', $error_page_id) ? get_field('acf_title', $error_page_id) : "Es wurde nichts gefunden";
        $text = get_field('acf_text', $error_page_id) ? get_field('acf_text', $error_page_id) : "Vielleicht hilft die Suche oder folgenden Links";
        $link = get_field('link', $error_page_id);

        ?>

        <div class="container_404">
            <div class="header_404">404</div>
            <h2 class="h2"><?php echo $title; ?></h2>
            <p><?php echo $text; ?></p>

            <?php
            if( $link ) {
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php
            } else { ?>
                <a href="/">ZURÜCK ZUR STARTSEITE</a>
            <?php   } ?>
        </div>
    <?php
    }

?>

<?php
get_footer();

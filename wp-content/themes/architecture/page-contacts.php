<?php
/**
 * Template Name: Contacts
 * Template Post Type: page
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 *
 * @package architecture
 */

get_header();

?>

    <div class="contact_block">
        <div class="left">
            <?php the_title('<h2 class="h2">','</h2>'); ?>
            <?php the_content(); ?>
        </div>
        <div class="right">
            <?php if (get_field('acf_phone')) : ?><a href="tel:<?php the_field('acf_phone') ?>"><?php the_field('acf_phone') ?></a><?php endif; ?>
            <?php if (get_field('acf_email')) : ?><a href="mailto:<?php the_field('acf_email') ?>"><?php the_field('acf_email') ?></a><?php endif; ?>

            <?php if (get_field('acf_social')) : ?>
                <div class="social_links">
                    <?php while( the_repeater_field('acf_social') ): ?>
                        <?php
                            $link = get_sub_field('acf_link');
                            if( $link ):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_blank';
                                ?>
                                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="section section_newspaper section_footer">

        <?php

        get_template_part( 'template-parts/footer', 'contact-form' );
        get_template_part( 'template-parts/footer' );

        ?>
    </div>
<?php
get_footer();
?>
<?php



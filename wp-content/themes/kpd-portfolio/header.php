<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kpd-portfolio
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="main-wrapper">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'kpd-portfolio' ); ?></a>

        <?php
            if ( is_front_page() && is_home() ) :
                get_template_part( 'template-parts/header/header', 'home' );
            elseif (is_single()) :
                get_template_part( 'template-parts/header/header', 'post' );
            else :
                get_template_part( 'template-parts/header/header' );
            endif;
        ?>

        <main class="block block-main">
            <form name="goToPost" action="" method='post'>
                <input type="hidden" name="categoryId" value=""/>
            </form>

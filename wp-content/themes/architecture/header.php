<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package architecture
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&display=swap"
          rel="stylesheet">

	<?php wp_head(); ?>
</head>

<?php

$body_classes = array();

if ( (is_home() || is_search() || is_page()) && !is_front_page() && !is_page_template()) {
    $body_classes[] = 'blog_page layer_white';
}

if ( is_404() ) {
    $body_classes[] = 'layer_white';
}

if ( is_front_page() ) {
    $body_classes[] = 'main_page';
}

if ( is_page_template( 'page-imprint.php') ) {
    $body_classes[] = 'blog_page layer_white';
}

if ( is_page_template( 'page-services.php') || is_page_template( 'page-service.php') || is_tax( 'projects_cat' )) {
    $body_classes[] = "services_page";
}
if ( is_singular( 'projects' )
) {
    $body_classes[] = "start_black_bg";
}

if ( is_page_template( 'page-contacts.php') || is_page_template( 'page-about-us.php') || is_page_template( 'page-portfolio.php') ) {
    $body_classes[] = "layer_white";
}

if ( is_page_template( 'page-prices.php') || is_page_template( 'page-about-us.php') ) {
    $body_classes[] = "services_page";
    $body_classes[] = "preise_page";
    $body_classes[] = "start_black_bg";
}
?>



<body <?php body_class($body_classes); ?>>
<?php wp_body_open(); ?>

<?php if ( !is_404() ) { ?>
    <a href="#contact-form" class="quick_contact_us">
        <img src="<?php echo  get_template_directory_uri(); ?>/assets/images/mail_icon.svg" class="contact_us" alt=""/>
        <img src="<?php echo  get_template_directory_uri(); ?>/assets/images/arrow_top.svg" class="go_up" alt=""/>
    </a>
<?php } ?>

<header class="fixed_header">
    <a href="/" class="logo">
        <svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M19.2009 0.000106812C8.59644 0.000106812 0 8.59654 0 19.2009C0 29.8053 8.59644 38.4017 19.2009 38.4017C29.8052 38.4017 38.4017 29.8053 38.4017 19.2009C38.4017 8.59654 29.8052 0.000106812 19.2009 0.000106812ZM19.2009 34.1118C10.9658 34.1118 4.29011 27.436 4.29011 19.2011C4.29011 10.966 10.9658 4.29032 19.2009 4.29032C20.4596 4.29032 21.6818 4.44706 22.8495 4.74078C23.7081 4.45031 24.6269 4.29032 25.5837 4.29032C30.2935 4.29032 34.1116 8.10831 34.1116 12.8182C34.1116 13.775 33.9517 14.6937 33.6611 15.5524C33.9549 16.72 34.1116 17.9422 34.1116 19.2011C34.1116 27.436 27.4358 34.1118 19.2009 34.1118Z" fill="white"/>
            <path d="M17.0558 12.8182C17.0558 17.528 20.8738 21.3461 25.5837 21.3461C29.3367 21.3461 32.5213 18.9205 33.6611 15.5524C32.3271 10.249 28.1527 6.07479 22.8495 4.74077C19.4814 5.88058 17.0558 9.0651 17.0558 12.8182Z" fill="white"/>
        </svg>
    </a>
    <div class="navigation active">

        <div class="menu">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-main',
                    'menu_id'        => 'main_menu',
                    'menu_class'     => 'main_menu',
                    'container_class'=> '',
                )
            );
            ?>
            <div id="nav-icon">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="additional_buttons">
            <a href="#">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_173_3022)">
                        <path d="M2.57351 4C1.16247 4 0 5.16272 0 6.57352V18.0118C0 19.4227 1.16272 20.5853 2.57351 20.5853H21.4467C22.8577 20.5853 24.0202 19.4226 24.0202 18.0118V6.57352C24.0202 5.16267 22.8575 4 21.4467 4H2.57351ZM2.76121 5.71585H21.2683L12.5374 13.5082C12.2045 13.8054 11.8344 13.8056 11.5007 13.5082L2.76116 5.71534L2.76121 5.71585ZM1.71558 7.08298L7.59557 12.3283L1.71558 17.9759V7.08298ZM22.3045 7.08298V17.9672L16.4424 12.3196L22.3045 7.08298ZM15.1556 13.4721L20.7588 18.8695H3.26179L8.88238 13.4813L10.3568 14.795C11.2941 15.6308 12.7437 15.632 13.6812 14.795L15.1559 13.4723L15.1556 13.4721Z" fill="white"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_173_3022">
                            <rect width="24" height="24" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </a>
            <a href="#">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.99 2C6.47 2 2 6.48 2 12C2 17.52 6.47 22 11.99 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 11.99 2ZM18.92 8H15.97C15.65 6.75 15.19 5.55 14.59 4.44C16.43 5.07 17.96 6.35 18.92 8ZM12 4.04C12.83 5.24 13.48 6.57 13.91 8H10.09C10.52 6.57 11.17 5.24 12 4.04ZM4.26 14C4.1 13.36 4 12.69 4 12C4 11.31 4.1 10.64 4.26 10H7.64C7.56 10.66 7.5 11.32 7.5 12C7.5 12.68 7.56 13.34 7.64 14H4.26ZM5.08 16H8.03C8.35 17.25 8.81 18.45 9.41 19.56C7.57 18.93 6.04 17.66 5.08 16ZM8.03 8H5.08C6.04 6.34 7.57 5.07 9.41 4.44C8.81 5.55 8.35 6.75 8.03 8ZM12 19.96C11.17 18.76 10.52 17.43 10.09 16H13.91C13.48 17.43 12.83 18.76 12 19.96ZM14.34 14H9.66C9.57 13.34 9.5 12.68 9.5 12C9.5 11.32 9.57 10.65 9.66 10H14.34C14.43 10.65 14.5 11.32 14.5 12C14.5 12.68 14.43 13.34 14.34 14ZM14.59 19.56C15.19 18.45 15.65 17.25 15.97 16H18.92C17.96 17.65 16.43 18.93 14.59 19.56ZM16.36 14C16.44 13.34 16.5 12.68 16.5 12C16.5 11.32 16.44 10.66 16.36 10H19.74C19.9 10.64 20 11.31 20 12C20 12.69 19.9 13.36 19.74 14H16.36Z" fill="white"/>
                </svg>
            </a>
            <!--a href="#">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.5 14H14.71L14.43 13.73C15.41 12.59 16 11.11 16 9.5C16 5.91 13.09 3 9.5 3C5.91 3 3 5.91 3 9.5C3 13.09 5.91 16 9.5 16C11.11 16 12.59 15.41 13.73 14.43L14 14.71V15.5L19 20.49L20.49 19L15.5 14ZM9.5 14C7.01 14 5 11.99 5 9.5C5 7.01 7.01 5 9.5 5C11.99 5 14 7.01 14 9.5C14 11.99 11.99 14 9.5 14Z" fill="white"/>
                </svg>
            </a-->
        </div>
    </div>
    <div id="nav-icon-2">
        <span></span>
        <span></span>
        <span></span>
    </div>
</header>

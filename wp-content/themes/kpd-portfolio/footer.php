<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kpd-portfolio
 */

?>

    <footer class="block block-footer second blue">
        <div class="footer-wrapper">
            <div class="footer"><a class="footer-scroll-to-top" href="#" id="scroll-to-top"><img src=<?php echo get_template_directory_uri() . "/assets/img/icons/up.svg" ?>  alt=""></a>
                <div class="footer-copyright">© 2022 kpdmedia</div>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

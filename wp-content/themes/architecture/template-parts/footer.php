<footer>
    <div class="footer_container">
        <div class="footer_contact">
            <span>KONTAKT</span>
            <?php
            $contactMenu = array(
                'theme_location' => 'menu-footer-1',
                'container'       => false,
                'echo'            => false,
                'items_wrap'      => '%3$s',
                'depth'           => 1,
            );

            echo strip_tags(wp_nav_menu( $contactMenu ), '<a>' );

            ?>
        </div>
        <div class="footer_socials">
            <span>Socials</span>
            <?php
            $socialMenu = array(
                'theme_location' => 'menu-footer-2',
                'container'       => false,
                'echo'            => false,
                'items_wrap'      => '%3$s',
                'depth'           => 1,
            );

            echo strip_tags(wp_nav_menu( $socialMenu ), '<a>' );

            ?>
        </div>
        <div class="footer_menu">
            <span>Menu</span>
            <?php
            $footerMenu = array(
                'theme_location' => 'menu-main',
                'container'       => false,
                'echo'            => false,
                'items_wrap'      => '%3$s',
                'depth'           => 1,
            );

            echo strip_tags(wp_nav_menu( $footerMenu ), '<a>' );
            ?>
        </div>
    </div>
    <?php
    function currentYear(){
        return date('Y');
    }
    ?>
    <p class="copyright">&copy; 2013-<?php echo currentYear(); ?> E40 design</p>
</footer>

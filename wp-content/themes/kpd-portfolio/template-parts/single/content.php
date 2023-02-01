<div class="block block-post">
    <div class="post-wrapper">
        <div class="post">
            <div class="post-header">
                <div class="fx-column fx-1 fx-justify-center fx-align-start post-title">
                    <h1 class="title"><?php the_title() ?></h1>
                </div>
                <div class="fx-column fx-1 fx-justify-center fx-align-end post-service-logo"><img class="service-logo" src="<?php the_field('acf_service-icon'); ?>" alt=""></div>
            </div>
            <div class="post-content" style="background: <?php the_field('acf_contents-color') ?>">
                <?php if (get_field('acf_main-image')) : ?>
                    <img src="<?php the_field('acf_main-image'); ?>" alt="<?php the_title() ?>">
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

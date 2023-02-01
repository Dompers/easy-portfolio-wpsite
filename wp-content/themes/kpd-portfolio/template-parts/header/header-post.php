<header class="block block-header post">
    <div class="fx-row fx-md-row header-wrapper">
        <div class="header w-100">
            <div class="fx-column fx-1 fx-justify-center fx-align-start w-100 header-gallery"><a class="btn btn-primary" href="/">Gallery</a></div>
            <div class="fx-column fx-1 fx-justify-center fx-align-end w-100 header-nav">
                <div class="fx-row fx-md-row nav go-to-post-nav" id="<?php if ($_POST['categoryId']) : echo $_POST['categoryId']; else : the_ID(); endif;?>">

                    <?php
                        if ( $_POST['categoryId'] == 'all') :
                            next_post_link( '%link', '<span class="btn btn-secondary"><img class="icon icon-arrow" src="' . get_template_directory_uri() . '/assets/img/icons/arrow.svg" alt=""><span class="hidden-mobile">Previous Email</span></span>' );
                            previous_post_link( '%link', '<span class="btn btn-secondary"><span class="hidden-mobile">Next Email</span><img class="icon icon-arrow" src="'. get_template_directory_uri() . '/assets/img/icons/arrow.svg" alt=""></span>' );
                        else :
                            next_post_link( '%link', '<span class="btn btn-secondary"><img class="icon icon-arrow" src="' . get_template_directory_uri() . '/assets/img/icons/arrow.svg" alt=""><span class="hidden-mobile">Previous Email</span></span>', true );
                            previous_post_link( '%link', '<span class="btn btn-secondary"><span class="hidden-mobile">Next Email</span><img class="icon icon-arrow" src="'. get_template_directory_uri() . '/assets/img/icons/arrow.svg" alt=""></span>', true );
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</header>

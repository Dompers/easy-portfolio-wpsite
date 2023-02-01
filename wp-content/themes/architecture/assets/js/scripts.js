var setActiveTabsToggleButton = function(tabsToggleBlock, postType) {

    let tabsToggleButtons = $(tabsToggleBlock).find(".tabs-toggle-buttons");
    let tabsToggleContent = $(tabsToggleBlock).find(".tabs-toggle-content");

    if (0 !== $(tabsToggleButtons).length) {

        $(tabsToggleButtons).find(".tabs-toggle-button").removeClass('current-cat');
        $(tabsToggleButtons).find(".tabs-toggle-button[data-post-type='" + postType + "']").addClass('current-cat');
    }

    if (0 !== $(tabsToggleContent).length) {

        $(tabsToggleContent).find(".tabs-toggle-item").removeClass('current-cat');
        $(tabsToggleContent).find(".tabs-toggle-item[data-post-type='" + postType + "']").addClass('current-cat');
    }
}

var staticFirstScreenHeight = function () {

    $(".preise_page .full_height," +
        ".preise_page .full_height .box_5," +
        ".preise_page .full_height .services_main_slider," +
        ".preise_page .full_height .services_main_slider .slick-list," +
        ".preise_page .full_height .services_main_slider .slick-list .slick-track," +
        ".preise_page .full_height .services_main_slider .slick-list .slick-track .slick-slide," +
        ".preise_page .full_height .services_main_slider .slick-list .slick-track .slick-slide > div .service_slide_item").css("min-height", `${window.innerHeight}px`);

    $('.static_first_screen').attr('style', $('.static_first_screen').attr('style') + 'min-height: ' + window.innerHeight + 'px; height: ' + window.innerHeight + 'px !important');
}

$(document).on('click','.portfolio_category_buttons .tabs-toggle-button',function(e) {
    e.preventDefault();

    let btn = $(this);
    let tabsToggleBlock = $(btn).closest(".tabs-toggle");
    let tabsToggleContent = $(tabsToggleBlock).find(".tabs-toggle-content");
    let postType = btn.data("postType");
    let postsPerPage = btn.data("postsPerPage");
    let currentTabsToggleItem = $(tabsToggleContent).find(".tabs-toggle-item[data-post-type='" + postType + "']");
    let loadingBlock = 0 !== $(currentTabsToggleItem).find(".portfolio_items").length ? $(currentTabsToggleItem).find(".portfolio_items") : currentTabsToggleItem;

    if (0 !== $(tabsToggleContent).length) {

        setActiveTabsToggleButton(tabsToggleBlock, postType);

        if (0 !== $(currentTabsToggleItem).length && $(loadingBlock).text().replace(/\s+/g, '') === "") {

            $.ajax({

                url: "/wp-admin/admin-ajax.php",
                data: {
                    'action':'get-projects',
                    'posts_per_page': postsPerPage,
                    'taxonomyId': postType,
                    'page': 1,
                    'taxonomy': 'projects_cat'
                },
                type: "post",
                beforeSend: function () {
                    //console.log("ajax_start");
                    $(loadingBlock).addClass('processed');
                },
                success: function (response) {
                    //console.log("ajax_success");

                    $(loadingBlock).append(response.posts);

                    $(loadingBlock).removeClass('processed');
                },
                error: function(xhr, textStatus, error) {
                    $(loadingBlock).removeClass('processed');
                }
            });
        }
    }
});

$(document).on('click','.tabs-toggle-item .under_portfolio_text',function(e) {
    e.preventDefault();

    var btn = $(this);
    var tabsToggleBlock = $(btn).closest(".tabs-toggle-item");
    let tabsToggleContent = $(tabsToggleBlock).closest(".tabs-toggle-content");
    let postType = $(tabsToggleBlock).data("postType");
    let page = $(tabsToggleBlock).data("page");
    let postsPerPage = $(tabsToggleBlock).data("postsPerPage");
    let loadingBlock = 0 !== $(tabsToggleBlock).find(".portfolio_items").length ? $(tabsToggleBlock).find(".portfolio_items") : tabsToggleBlock;

    if (0 !== $(tabsToggleContent).length) {

        $.ajax({

            url: "/wp-admin/admin-ajax.php",
            data: {
                'action':'get-projects',
                'posts_per_page': postsPerPage,
                'taxonomyId': postType,
                'page': page + 1,
                'taxonomy': 'projects_cat'
            },
            type: "post",
            beforeSend: function () {
                //console.log("ajax_start");
                $(loadingBlock).addClass('processed');
            },
            success: function (response) {
                //console.log("ajax_success");

                $(loadingBlock).append(response.posts);

                $(loadingBlock).removeClass('processed');

                $(tabsToggleBlock).data("page", page + 1);

                if (response.last) {
                    $(btn).hide();
                }

                $.fn.fullpage.reBuild();
            },
            error: function(xhr, textStatus, error) {
                $(loadingBlock).removeClass('processed');
            }
        });
    }
});

$(document).ready(function () {

    var projSliderParam = {
        dots: true,
        infinite: true,
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 6000,
        rows: 0
    }
    let if_was_black_bg = $("body").hasClass("start_black_bg");
    let startValue = 0;

    setTimeout(staticFirstScreenHeight, 100);

    $(window).resize(staticFirstScreenHeight);

    function wheelListerner() {

        if($("html").hasClass("fp-enabled")){
            let section = $('#contact-form').closest('.section');
            let sectionIndex = $(section).index();

            if($("body").hasClass("fp-viewing-" + sectionIndex)){
                let position = $(".contact_form_box").position();
                let data_contact_from = parseInt($(".section_footer .fp-scroller").css('transform').split(',')[5]);

                if(data_contact_from != undefined) {
                    if(data_contact_from <= startValue){
                        $(".fixed_header").removeClass("show_menu");
                        $(".fixed_header .navigation").removeClass("active");
                    }
                    startValue = data_contact_from;
                }

                data_contact_from = Math.abs(data_contact_from);
                if(data_contact_from >= position.top){
                    $("body").addClass("go_up_active");
                } else {
                    $("body").removeClass("go_up_active");
                }
            }
            else {
                $("body").removeClass("go_up_active");
            }
        }
    }

    document.addEventListener("wheel", wheelListerner);

    $('.project_item_photo_slider').each(function (){
        $(this).slick(projSliderParam);
    });

    $('#nav-icon-2').click(function(){
        $(this).toggleClass('active');
        $(".fixed_header .navigation").toggleClass("active");
        $(".fixed_header").toggleClass("show_menu");
    });

    $('.show_portfolio_categories').click(function(){
        let change_word = $(this).find("span").data("change_word");
        let original_word = $(this).find("span").text();
        $(this).find("span").text(change_word);
        $(this).find("span").data("change_word", original_word);

        $(".portfolio_head_categories").toggleClass("active");
        $(".portfolio_head_categories_container").slideToggle();
    });

    if ($(window).width() < '1000'){
        $('.steps_container').slick({
            dots: true,
            infinite: false,
            speed: 1000,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            //autoplay: true,
        });
    }

    if ($(window).width() < '860'){
        $('.how_we_work_features').slick({
            dots: true,
            infinite: false,
            speed: 1000,
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: false,
            adaptiveHeight: false,
            responsive: [
                {
                    breakpoint: 680,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    }

    if ( 0 !== $('.section_6 .three_text_blocks').length ) {

        $('.section_6 .three_text_blocks').slick({
            dots: true,
            infinite: false,
            speed: 1000,
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: false,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 660,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
            //autoplay: true,
            //autoplaySpeed: 10000
        });
    }

    $(".show_hide_text").click(function (){
        $(this).toggleClass("active");
        $(this).parent().find(".text").toggleClass("active");
    });

    $(".agree_box").click(function (){
        $(this).toggleClass("active");
    });

    if ( 0 !== $(".block_text_container").length) $(".block_text_container").niceScroll();
    if ( 0 !== $(".box_4 .block_text_container").length) $(".box_4 .block_text_container").niceScroll();
    if ( 0 !== $(".project_item_description_white .text_block_content").length) $(".project_item_description_white .text_block_content").niceScroll();


    $('#nav-icon').click(function(){
        $(this).toggleClass('open');
        $(".main_menu").toggleClass("open_menu");
    });

    $('.has_child').click(function(e){
        e.preventDefault();
        $(this).find("ul").slideToggle();
    });

    $('.slide_right').click(function(e){
        $(".services_main_slider").slick('slickNext');
    });

    if ( 0 !== $('.services_main_slider').length) {

        $('.services_main_slider').on('init afterChange', function(event, slick, currentSlide, nextSlide){


            let slider = $(slick)[0].currentTarget;
            let slide = $(slick.$slides.get(currentSlide));

            if ( 0 === $(slider).closest('#fullpage').length && 0 !== $(slide).find('video').length) {
                $(slide).find('video')[0].play();
            }
        });
        $('.services_main_slider').slick({
            dots: true,
            infinite: false,
            speed: 1000,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 6000
        });
    }

    let blackGb_Arr = [];
    var scrolledGlobEl = $(window);

    $(".black_bg").each(function (){
        let offset = $(this).offset();
        let element_height = $(this).outerHeight(false);
        let temp_array = {"offset": offset.top, "height": element_height}
        blackGb_Arr.push(temp_array);
    });

    scrolledGlobEl.scroll(function() {
        if($(window).width() > 1100){
            let anchor = false;
            let user_scrolled = scrolledGlobEl.scrollTop();
            if (blackGb_Arr.length != 0) {
                $.map( blackGb_Arr, function( val, i ) {
                    if(user_scrolled > val.offset && user_scrolled < (val.offset + val.height)) {
                        anchor = true;
                        $("body").removeClass("layer_white").addClass("layer_dark");
                        $('#nav-icon-2').addClass("active");
                        $(".fixed_header .navigation").removeClass("active");
                        $(".fixed_header").removeClass("show_menu");
                    } else if (user_scrolled == 0) {
                        $("body").removeClass("layer_white").addClass("layer_dark");
                        $(".navigation").addClass("active");
                        $('#nav-icon-2').removeClass("active");
                        $(".fixed_header").removeClass("show_menu");
                    } else {
                        $('#nav-icon-2').addClass("active");
                        $(".fixed_header .navigation").removeClass("active");
                        $(".fixed_header").removeClass("show_menu");
                        if(anchor == false) {
                            $("body").removeClass("layer_dark").addClass("layer_white");
                        }
                    }
                });
            } else {
                if (user_scrolled == 0) {
                    $(".navigation").addClass("active");
                    $('#nav-icon-2').removeClass("active");
                } else {
                    $('#nav-icon-2').addClass("active");
                    $(".fixed_header .navigation").removeClass("active")
                    $(".fixed_header").removeClass("show_menu")
                }
            }
        }

        if(!$("html").hasClass("fp-enabled")){
            let user_scrolled = scrolledGlobEl.scrollTop();
            let wh = scrolledGlobEl.outerHeight();
            let offset = $("footer").offset();

            if ( undefined !== offset && user_scrolled >= (offset.top - wh)){
                $("body").addClass("go_up_active");
            } else {
                $("body").removeClass("go_up_active");
            }

            if(if_was_black_bg){
                if(user_scrolled > 50){
                    $(".fixed_header").addClass("white_bg");
                    $("body").removeClass("start_black_bg");
                } else {
                    $(".fixed_header").removeClass("white_bg");
                    $("body").addClass("start_black_bg");
                }
            } else {
                if(user_scrolled > 50){
                    $(".fixed_header").addClass("white_bg");
                } else {
                    $(".fixed_header").removeClass("white_bg");
                }
            }
        }
    });

    if ( 0 !== $("[data-fancybox]").length ) {

        var scrollTopPos = 0;
        $("[data-fancybox]").fancybox({
            infinite: false,
            buttons: [
                //'slideShow',
                //'fullScreen',
                //'thumbs',
                //'share',
                //'download',
                //'zoom',
                'close'
            ],
            animationEffect: "fade",
            animationDuration: 500,
            btnTpl: {
                arrowLeft:
                    '<button data-fancybox-prev class="custom_fancybox-button fancybox-button fancybox-button--arrow_left"><div><svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 2L2 10L10 18" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg></div></button>',
                arrowRight:
                    '<button data-fancybox-next class="custom_fancybox-button fancybox-button fancybox-button--arrow_right"><div><svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 18L10 10L2 2" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>\n</div></button>',
            },
            //transitionEffect : "fade",
            //zoomOpacity : "auto",
            //animationEffect: false,
            //animated: false,
            beforeClose: function() {
                let index = $(this)[0].index;
                $('.project_item_photo_slider').slick('unslick');
                $('.project_item_photo_slider').slick(projSliderParam);
                $('.project_item_photo_slider').slick('slickGoTo', index, false);
            },
        })
    }

    $('.contact_form_box .contact_form .field_container textarea').on('keyup keypress', function() {
        $(this).height(0);
        $(this).height(this.scrollHeight);
    });

    $('.panorama_block-overlay-body .play').on('click', function (e) {
       e.preventDefault();

       $(this).closest('.panorama_block-overlay').addClass('playing');

    });

    $('.panorama_block-overlay-header .stop').on('click', function (e) {
        e.preventDefault();

        $(this).closest('.panorama_block-overlay').removeClass('playing');
    });
});

$(document).on('click', '.quick_contact_us', function(e){
    e.preventDefault();

    if( 0 !== $(this).closest(".go_up_active").length ) {

        if ($("html").hasClass("fp-enabled")) {
            fullpage_api.moveTo(1);
        } else {
            $("html").animate({scrollTop: 0}, "slow");
        }
        $("body").removeClass("go_up_active");
    }
    else {
        if ($("html").hasClass("fp-enabled")) {
            let section = $('#contact-form').closest('.section');
            fullpage_api.moveTo($(section).index() + 1);
        } else {
            $("html").animate({scrollTop: $('#contact-form').position().top - 100}, "slow");
        }
    }
});

$(document).on('click', '.go-to-project', function (e) {
    e.preventDefault();

    let link = $(this).find('a').attr('href');

    window.open(link, '_blank');
})

$(document).on('click', '.project_item_photo_slider_zoom_icon', function (e) {

    e.preventDefault();

    $(this).closest('.project_item_photo_slider-container').find('.slick-list .slick-track .slick-slide.slick-active a').trigger('click');

});





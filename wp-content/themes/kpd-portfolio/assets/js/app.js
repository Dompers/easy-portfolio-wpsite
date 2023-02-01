var env_data = {};(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
    "use strict";

    $(document).ready(function () {
      var catTabPan = 0 !== $('#categories .tab-panel').length ? $('#categories .tab-panel').parent().position().top + parseInt($('#categories .tab-panel').parent().css('padding-top')) : 0;
      var headerNextP = $('.block-header:not(.home)').next().css('padding-top');
      $(window).scroll(function () {
        if ($(this).scrollTop() > catTabPan) {
          if (0 !== $('#categories .tab-panel').length) {
            $('#categories .tab-panel').addClass('sticky');
          } else {
            $('.block-header:not(.home)').addClass('sticky');
            $('.block-header:not(.home)').next().css('padding-top', $('.block-header:not(.home)').innerHeight());
          }
        } else {
          if (0 !== $('#categories .tab-panel').length) {
            $('#categories .tab-panel').removeClass('sticky');
          } else {
            $('.block-header:not(.home)').removeClass('sticky');
            $('.block-header:not(.home)').next().css('padding-top', headerNextP);
          }
        }

        if ($(this).scrollTop() > 300) {
          $('#scroll-to-top').fadeIn();
        } else {
          $('#scroll-to-top').fadeOut();
        }
      });
      $('#scroll-to-top').click(function () {
        $('html, body').animate({
          scrollTop: 0
        }, 1800);
        return false;
      });
    });

    require('./tabs');

  },{"./tabs":2}],2:[function(require,module,exports){
    "use strict";

    $('.tab-panel-item').click(function (e) {
      e.preventDefault();
      var tab = this;
      var panel = $(tab).closest('.tabs').find('.tab-panel');
      var content = $(tab).closest('.tabs').find('.tab-content');
      var tabActiveId = $(tab).attr('data-tab-id');
      let loadingBlock = 0 !== $('#' + tabActiveId).find(".posts-list").length ? $('#' + tabActiveId).find(".posts-list") : $('#' + tabActiveId);

      if (0 !== $(panel).length) {
        $(panel).find('.tab-panel-item').each(function (i, el) {
          $(el).removeClass('active');
        });
      }

      if (0 !== $(content).length) {
        $(content).find('.tab-content-item').each(function (i, el) {
          $(el).removeClass('active');
        });
      }

      if (0 !== $('.tab-panel-item[data-tab-id="' + tabActiveId + '"]').length && 0 !== $(loadingBlock).length && $(loadingBlock).text().replace(/\s+/g, '') === "") {

        $.ajax({

          url: "/wp-admin/admin-ajax.php",
          data: {
            'action':'get-posts',
            'posts_per_page': -1,
            'category': tabActiveId
          },
          type: "post",
          beforeSend: function () {
            $(loadingBlock).addClass('processed');
          },
          success: function (response) {

            $(loadingBlock).append(response.posts);

            $(loadingBlock).removeClass('processed');
          },
          error: function(xhr, textStatus, error) {
            $(loadingBlock).removeClass('processed');
          }
        });
      }

      $('.tab-panel-item[data-tab-id="' + tabActiveId + '"]').addClass('active');
      $('#' + tabActiveId).addClass('active');
    });

  },{}]},{},[1]);

//# sourceMappingURL=app.min.js.map

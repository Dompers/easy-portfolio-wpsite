$('.modal-btn').on('click', function (e) {
    e.preventDefault();
    let attr = $(this).attr('data-modal');
    let $modal = $("#" + attr);

    if ( 0 !== $modal.length ) {
        $('body').addClass('open-modal');
        $modal.addClass('show');

        if ( attr === 'media-video' ) {
            $modal.find('iframe').attr('src', $modal.find('iframe').data('src'));
        }
    }
});
$('.modal .modal-overlay, .modal .modal-close').on('click', function (e) {
    e.preventDefault();

    let $modal = $(this).closest('.modal');

    if ( $modal.attr('id') === 'media-video' ) {
        let iframeSrc = $modal.find('iframe').attr('src');
        $modal.find('iframe').attr('src', '');
    }

    $(this).closest('.modal').removeClass('show');
    $('body').removeClass('open-modal');
});

var addEvent = function addEvent(obj, evt, fn) {
    if (obj.addEventListener) {
        obj.addEventListener(evt, fn, false);
    } else if (obj.attachEvent) {
        obj.attachEvent("on" + evt, fn);
    }
};

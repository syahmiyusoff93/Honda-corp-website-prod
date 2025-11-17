// require jquery

/*
//smoothscroll
var scrolling_action_enabled = true;

$('.modal-landing-dropdown a[href^="#"]').on('click', function (e) {
    e.preventDefault();
    $(document).off("scroll");

    $('a').each(function () {
        $(this).removeClass('active');
    })
    $(this).addClass('active');

    var target = this.hash,
        menu = target;
    $target = $(target);
    scrolling_action_enabled = false;
    $('html, body').stop().animate({
        'scrollTop': $target.offset().top+200
    }, 500, 'swing', function () {
        window.location.hash = target;
        $(document).on("scroll", onScroll);
        scrolling_action_enabled = true;
    });
});// end smoothscroll

function onScroll(event){
    var scrollPos = $(document).scrollTop();
    $('.modal-landing-dropdown a').each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('.modal-landing-dropdown ul li a').removeClass("active");
            currLink.addClass("active");
        }
        else{
            currLink.removeClass("active");
        }
    });
}

/* ON SCROLL HIGHLIGHT BLACK MENU
$(document).on("scroll", onScroll);*/

$(function () {
    // declare variable
    var scrollTop = $('.scrollTop');

    $(window).scroll(function () {
        // declare variable
        var topPos = $(this).scrollTop();

        // if user scrolls down - show scroll to top button
        if (topPos > 100) {
            $(scrollTop).addClass('appear');

        } else {
            $(scrollTop).removeClass('appear');
        }

    }); // scroll END

    //Click event to scroll to top
    $(scrollTop).click(function () {
        $('body').addClass('scroll');
        
        $('html, body').animate({
            scrollTop: 0
        }, 800, function(){
            $('body').removeClass('scroll');
            setTimeout(function() {
                enableScroll();
            }, 333);
        });

        
        return false;
    }); // click() scroll top EMD 
});
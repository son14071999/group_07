(function($) {
    "use strict";
    // window scroll function    

    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    // scroll top click function
    $('.scrollup').on('click', function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    // left  sidebar close function
    $('.library-menu').on('click', function(e) {
        $(this).toggleClass("active");
        $('body').toggleClass('page-sidebar-closed');
        e.preventDefault();
    });

    // left sidebar togal
    $('.nav-link').on('click', function() {
        if ($(this).parent("li").hasClass('open')) {
            $(this).parent("li").removeClass('open');
        } else {
            $('.nav-item').removeClass('open');
            $(this).parents("li").addClass('open');
        }
    });    

    $('.menu-toggler.sidebar-toggler').on('click', function() {
        $('body').toggleClass('page-sidebar-closed');
    });
})(jQuery);



 
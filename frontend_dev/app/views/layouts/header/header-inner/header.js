$(function (e) {
    var windowWidth = $(window).width();

    //open mobile menu
    var menuOpen = $(".button-burger");
    menuOpen.on("click", function (e){
        var windowScrollTop = $(window).scrollTop();
        var htmlElement = $("html");
        var menu = $(".header__nav-bar");

        if ( menuOpen.hasClass('button-burger_active') ) {

            htmlElement.on('scroll touchmove mousewheel');
            htmlElement.removeClass("stop-scrolling").css("top", "auto").animate({scrollTop: windowScrollTop}, 0);
            menuOpen.removeClass("button-burger_active");
            menu.removeClass("header__nav-bar_active");
        }
        else {
            htmlElement.off('scroll touchmove mousewheel');
            htmlElement.addClass("stop-scrolling").css("top", "-" + windowScrollTop + "px");
            menuOpen.addClass("button-burger_active");
            menu.addClass("header__nav-bar_active");
        }
    });


    //show menu dropDown
    var headerItem = $(".menu>.menu__item");
    if ( windowWidth > 1199 ) {

        headerItem.hover(
            function (e) {
                $(this).find(".menu__children").stop().show().animate({
                    top: ['72px', 'swing'],
                    opacity: '1'
                }, 150);
            },
            function (e) {
                headerItem.find(".menu__children").hide().removeAttr("style");
            }
        );
    }
    else {
        $(".menu>.menu__item>.menu__link").on("click", function (e) {

            var childrenList = $(this).closest(".menu__item").find(".menu__children");

            if ( childrenList.length ) {
                e.preventDefault();

                childrenList.stop(true,true).slideToggle();
            }
        });
    }



    //show header if scroll to top
    var FIRST_SCROLL_OVERSTEP = 428;
    var currentScrollPosition = 0;

    if ( windowWidth > 1199 ) {
        var documentElement = $(document);
        documentElement.on('scroll', function(e) {
            var headerElement = $(".header");
            var nextScrollPosition = $(this).scrollTop();

            if  ( nextScrollPosition > FIRST_SCROLL_OVERSTEP )  {
                if ( nextScrollPosition < currentScrollPosition ) {

                    headerElement.show().addClass("header_fixed");
                    headerElement.removeClass("header_hidden");
                }
                else  {
                    headerElement.hide().addClass("header_hidden");
                    headerElement.removeClass("header_fixed");
                }
            }
            else  {
                headerElement.removeClass("header_fixed");
                headerElement.removeClass("header_hidden");
            }

            //update scroll position
            currentScrollPosition = nextScrollPosition;
        });
    }

});


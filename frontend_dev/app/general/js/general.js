// var j$ = jQuery;
// j$.exists = function (selector) {
//     return (j$(selector).length > 0);
// }
// j$.noConflict();
//"use strict";

$(function (e) {




    if ( ($.cookie('soursecurrent') == null) || ($.cookie('soursecurrent') == "") ) {

        var cookieValue = "";

        var lochref = decodeURI(window.location.href);

        if ( lochref.indexOf('utm_medium') != -1
            && lochref.indexOf('search') != -1 ) {

            if ( lochref.indexOf('yandex') != -1 ) {
                cookieValue = 'yandex-search';
            }
            else if ( lochref.indexOf('google') != -1 ) {
                cookieValue = 'google-search';
            }
        }
        else {
            var referrer = document.referrer;

            if ( referrer.indexOf('yandex') != -1 ) {

                cookieValue = 'yandex-org';
            }
            else if ( referrer.indexOf('google') != -1 ) {

                cookieValue = 'google-org';
            }
            else if ( ( referrer == "" ) || ( referrer.indexOf('laval-online') != -1 ) ) {
                cookieValue = 'direct';
            }
        }

        if( cookieValue !== null ) {

            var date = new Date();
            date.setTime(date.getTime() + (60 * 1000));
            $.cookie('soursecurrent', cookieValue, { expires: date,  path: '/' });
        }
    }

    //anchor link smooth scroll
    var paddingTopBody = 88;
    var anchorLink = $("a.anchor-link");
    anchorLink.on("click",function(e){
        e.preventDefault();

        $("html, body").animate({
            scrollTop: $( $(this).attr("href") ).offset().top - paddingTopBody
        }, 800);
    });

    //close modals
    var modalHeading = $(".modal__heading");
    var modalContent = $(".modal__content");
    var modalDesc = $(".modal__desc");
    var htmlElement = $("html");

    var modalSuccess = $(".modal");
    modalSuccess.bind("mousedown", function (e) {

        if ( $(e.target).attr("class") === "modal__container" ) {

            $(this).fadeOut("fast");
            $(this).removeAttr("style");
            htmlElement.removeClass("stop-scrolling");
            modalHeading.html('');
            modalContent.html('');
            modalDesc.html('');

            htmlElement.animate({
                scrollTop: windowOldScrollPos
            }, 0);
        }
    });

    var modalCloseButton = $(".modal__close");
    modalCloseButton.on("click", function (e){

        modalSuccess.fadeOut("fast");
        modalSuccess.removeAttr("style");
        htmlElement.removeClass("stop-scrolling");
        modalHeading.html('');
        modalContent.html('');
        modalDesc.html('');

        htmlElement.animate({
            scrollTop: windowOldScrollPos
        }, 0);
    });
});


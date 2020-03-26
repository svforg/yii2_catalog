$(function (e) {
    var windowWidth = $(window).width();

    //show email copy-btn
    if ( windowWidth > 1183 ) {
        var topBarParent = $(".top-bar__item_parent");
        var topBarDropDown = $(".top-bar__dropdown");

        topBarParent.hover(
            function (e) {
                $(this).find(topBarDropDown).stop(true, true).css('display', 'flex').animate({
                    top: ['40px', 'swing'],
                    opacity: '1'
                }, 150);
            },
            function (e) {
                $(this).find(topBarDropDown).stop(true, true).hide().removeAttr("style");
            }
        );
    }


    //copy email to clipboard
    var copyBtn = $(".top-bar__copy-btn");
    copyBtn.on("click", function() {

        var copyText = $(".top-bar__copy-text");
        var copySuccess = $(".top-bar__success");

        function copyToClipboard(copyText) {

            copyText.select();
            document.execCommand("copy");
            return copyText.val();
        }
        copyToClipboard(copyText);
        copySuccess.addClass("top-bar__success_active");
    });





    //show search form
    var documentElement = $(document);
    documentElement.on('click', '.search-block__button, .search-block__close', function() {
        $(this)
            .closest('.search-block__form')
            .toggleClass('is-active');
    });
});


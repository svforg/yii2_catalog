$(function (e) {
    var windowWidth = $(window).width();
    var htmlElement = $("html");
    var modalSuccess = $(".modal");
    var modalHeading = $(".modal__heading");
    var modalContent = $(".modal__content");

    var inputName = "input[name='name']";
    var inputEmail = "input[name='email']";
    var inputPhone = "input[name='phone']";


    //single-page-about__form
    var singleProductForm = $(".single-page-about__form");
    singleProductForm.find(inputPhone).mask("+7(999) 999-99-99");
    singleProductForm.find(inputEmail).on("keyup blur", function (e) {
        var mailData = $(this).val();

        if ( !mailData || mailData === '') {

            $(this).css("box-shadow", "inset 0 0 1px 1px red;");

            $(this).closest(".form").find(".form__button").attr("disabled", true);
        }
        else if ((mailData.match(/.+?\@.+/g) || []).length !== 1) {

            $(this).css("box-shadow", "inset 0 0 1px 1px red;");

            $(this).closest(".form").find(".form__button").attr("disabled", true);
        }
        else {
            $(this).closest(".form").find(".form__button").removeAttr("disabled");
        }
    });
    singleProductForm.on("submit", function (e) {
        e.preventDefault();

        var nameVal = $(this).find(inputName);
        var emailVal = $(this).find(inputEmail);
        var phoneVal = $(this).find(inputPhone);
        var productName =  $(this).closest(".single-page-about").find(".single-page-about__headline").text();
        var formName = "Заказ с сайта laval-online.ru";

        var datasendform = new FormData();

        datasendform.append('formName', formName);
        datasendform.append('productName', productName);
        datasendform.append('name', nameVal.val());
        datasendform.append('email', emailVal.val());
        datasendform.append('phone', phoneVal.val());
        datasendform.append('action', 'main_page_banner');

        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: datasendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {
                //preloader.removeClass("form__loader_hidden");
            },
            success: function (data) {
                yaCounter57487423.reachGoal('order');
                //preloader.addClass("form__loader_hidden");

                nameVal.val('');
                emailVal.val('');

                modalHeading.html("Спасибо");
                modalContent.html("Ваша заявка на консультацию успешно отправлена. Наши специалисты с Вами свяжутся в ближайшее время");
                modalSuccess
                    .fadeIn({queue: false, duration: 'fast'})
                    .animate({
                        top: ['-30px', 'swing'],
                        opacity: '1'
                    }, 200);

                windowOldScrollPos = $(window).scrollTop();

                htmlElement.addClass("stop-scrolling").css("top", "-" + windowOldScrollPos + "px");
            },
            error: function (xhr, str) {
                modalHeading.html("Ошибка");

                modalContent.html("К сожалению Ваша заявка на консультацию не отправлена. Просьба связаться с нами по телефону");

                modalSuccess
                    .fadeIn({queue: false, duration: 'fast'})
                    .animate({
                        top: ['-30px', 'swing'],
                        opacity: '1'
                    }, 200);

                windowOldScrollPos = $(window).scrollTop();

                htmlElement.addClass("stop-scrolling").css("top", "-" + windowOldScrollPos + "px");
            }
        });
    });

    //show quick call modal
    var topBarPhone = $(".top-bar__link-phone");
    topBarPhone.on("click", function (e) {

        if ( windowWidth > 991 ) {
            e.preventDefault();

            var modalHeading = $(".modal__heading");
            modalHeading.html("Могу ли я помочь?");

            var formQuickCallClone = $(".hidden-elements__form-quick-call form").clone();
            var modalContent = $(".modal__content");
            modalContent.append(formQuickCallClone);

            var modalSuccess = $(".modal");
            modalSuccess
                .fadeIn({queue: false, duration: 'fast'})
                .animate({
                    top: ['-30px', 'swing'],
                    opacity: '1'
                }, 200);

            var windowScrollTop = $(window).scrollTop();
            var htmlElement = $("html");
            htmlElement.addClass("stop-scrolling").css("top", "-" + windowScrollTop + "px");

            var inputQuickCall = $(".quick-call .quick-call__field");
            inputQuickCall.mask("+7(999) 999-99-99", {completed:function(){
                    var inputData = $(this).val();
                    var buttonSend = $(this).closest(".quick-call").find(".quick-call__submit");

                    if ( !inputData || inputData === '') {

                        buttonSend.attr("disabled", true);
                    }
                    else {
                        buttonSend.removeAttr("disabled");
                    }
                }});

            var quickCallForm = $(".modal .quick-call");
            quickCallForm.on("submit", function (e) {

                var preloader = $(".modal .modal__preloader");

                var inputData = $(this).find(".quick-call__field").val();
                var buttonSend = $(this).closest(".quick-call").find(".quick-call__submit");

                if ( !inputData || inputData === '') {

                    buttonSend.attr("disabled", true);
                    return false;
                }
                else {
                    buttonSend.removeAttr("disabled");
                }


                e.preventDefault();

                var formName = "Заказ звонка.";

                var phoneVal = $(this).find(inputPhone);
                var datasendform = new FormData();


                datasendform.append('phone', phoneVal.val());
                datasendform.append('formName', formName);
                datasendform.append('action', 'main_page_banner');

                $.ajax({
                    type: "POST",
                    url: ajaxurl,
                    data: datasendform,
                    cache: false,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        preloader.removeAttr("hidden");
                    },
                    success: function (data) {
                        yaCounter57487423.reachGoal('order');
                        preloader.attr("hidden", true);

                        var buttonSend = $(this).closest(".quick-call").find(".quick-call__submit");
                        buttonSend.attr("disabled", true);

                        phoneVal.val('');

                        modalHeading.html("Спасибо");
                        modalContent.html("Ваша заявка на консультацию успешно отправлена. Наши специалисты с Вами свяжутся в ближайшее время");
                        modalSuccess
                            .fadeIn({queue: false, duration: 'fast'})
                            .animate({
                                top: ['-30px', 'swing'],
                                opacity: '1'
                            }, 200);

                        windowOldScrollPos = $(window).scrollTop();

                        htmlElement.addClass("stop-scrolling").css("top", "-" + windowOldScrollPos + "px");
                    },
                    error: function (xhr, str) {
                        modalHeading.html("Ошибка");

                        modalContent.html("К сожалению Ваша заявка на консультацию не отправлена. Просьба связаться с нами по телефону");

                        modalSuccess
                            .fadeIn({queue: false, duration: 'fast'})
                            .animate({
                                top: ['-30px', 'swing'],
                                opacity: '1'
                            }, 200);

                        windowOldScrollPos = $(window).scrollTop();

                        htmlElement.addClass("stop-scrolling").css("top", "-" + windowOldScrollPos + "px");
                    }
                });
            });
        }
    });



    var footerForm = $(".footer__form ");
    footerForm.find(inputEmail).on("keyup blur", function (e) {
        var mailData = $(this).val();

        if ( !mailData || mailData === '') {

            $(this).css("box-shadow", "inset 0 0 1px 1px red;");

            $(this).closest(".form").find(".form__button").attr("disabled", true);
        }
        else if ((mailData.match(/.+?\@.+/g) || []).length !== 1) {

            $(this).css("box-shadow", "inset 0 0 1px 1px red;");

            $(this).closest(".form").find(".form__button").attr("disabled", true);
        }
        else {
            $(this).closest(".form").find(".form__button").removeAttr("disabled");
        }
    });
    footerForm.on("submit", function (e) {
        e.preventDefault();

        var nameVal = $(this).find(inputName);
        var emailVal = $(this).find(inputEmail);

        var formName = "Заявка с футера сайта laval-online.ru";


        var datasendform = new FormData();
        datasendform.append('formName', formName);
        datasendform.append('name', nameVal.val());
        datasendform.append('email', emailVal.val());
        datasendform.append('action', 'main_page_banner');

        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: datasendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {
                //preloader.removeClass("form__loader_hidden");
            },
            success: function (data) {
                yaCounter57487423.reachGoal('order');
                //preloader.addClass("form__loader_hidden");

                nameVal.val('');
                emailVal.val('');

                modalHeading.html("Спасибо");
                modalContent.html("Ваша заявка на консультацию успешно отправлена. Наши специалисты с Вами свяжутся в ближайшее время");
                modalSuccess
                    .fadeIn({queue: false, duration: 'fast'})
                    .animate({
                        top: ['-30px', 'swing'],
                        opacity: '1'
                    }, 200);

                windowOldScrollPos = $(window).scrollTop();

                htmlElement.addClass("stop-scrolling").css("top", "-" + windowOldScrollPos + "px");
            },
            error: function (xhr, str) {
                modalHeading.html("Ошибка");

                modalContent.html("К сожалению Ваша заявка на консультацию не отправлена. Просьба связаться с нами по телефону");

                modalSuccess
                    .fadeIn({queue: false, duration: 'fast'})
                    .animate({
                        top: ['-30px', 'swing'],
                        opacity: '1'
                    }, 200);

                windowOldScrollPos = $(window).scrollTop();

                htmlElement.addClass("stop-scrolling").css("top", "-" + windowOldScrollPos + "px");
            }
        });
    });



    var mainPageBannerForm = $(".main-page-banner__form");
    mainPageBannerForm.find(inputEmail).on("keyup blur", function (e) {
        var mailData = $(this).val();

        if ( !mailData || mailData === '') {

            $(this).css("box-shadow", "inset 0 0 1px 1px red;");

            $(this).closest(".form").find(".form__button").attr("disabled", true);
        }
        else if ((mailData.match(/.+?\@.+/g) || []).length !== 1) {

            $(this).css("box-shadow", "inset 0 0 1px 1px red;");

            $(this).closest(".form").find(".form__button").attr("disabled", true);
        }
        else {
            $(this).closest(".form").find(".form__button").removeAttr("disabled");
        }
    });
    mainPageBannerForm.find(inputPhone).mask("+7(999) 999-99-99", {completed:function(){

        $(this).closest(".form").find(".form__button").removeAttr("disabled");
    }});
    mainPageBannerForm.on("submit", function (e) {
        e.preventDefault();

        var nameVal = $(this).find(inputName);
        var emailVal = $(this).find(inputEmail);
        var phoneVal = $(this).find(inputPhone);

        var formName = "Заявка с лидформы главной страницы сайта laval-online.ru";

        var datasendform = new FormData();

        datasendform.append('formName', formName);
        datasendform.append('name', nameVal.val());
        datasendform.append('email', emailVal.val());
        datasendform.append('phone', phoneVal.val());
        datasendform.append('action', 'main_page_banner');

        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: datasendform,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {
                //preloader.removeClass("form__loader_hidden");
            },
            success: function (data) {
                yaCounter57487423.reachGoal('order');
                //preloader.addClass("form__loader_hidden");

                nameVal.val('');
                emailVal.val('');
                phoneVal.val('');

                modalHeading.html("Спасибо");
                modalContent.html("Ваша заявка на консультацию успешно отправлена. Наши специалисты с Вами свяжутся в ближайшее время");
                modalSuccess
                    .fadeIn({queue: false, duration: 'fast'})
                    .animate({
                        top: ['-30px', 'swing'],
                        opacity: '1'
                    }, 200);

                windowOldScrollPos = $(window).scrollTop();

                htmlElement.addClass("stop-scrolling").css("top", "-" + windowOldScrollPos + "px");
            },
            error: function (xhr, str) {
                modalHeading.html("Ошибка");

                modalContent.html("К сожалению Ваша заявка на консультацию не отправлена. Просьба связаться с нами по телефону");

                modalSuccess
                    .fadeIn({queue: false, duration: 'fast'})
                    .animate({
                        top: ['-30px', 'swing'],
                        opacity: '1'
                    }, 200);

                windowOldScrollPos = $(window).scrollTop();

                htmlElement.addClass("stop-scrolling").css("top", "-" + windowOldScrollPos + "px");
            }
        });
    });
});
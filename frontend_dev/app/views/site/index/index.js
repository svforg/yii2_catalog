$(function (e) {
    //about typing text
    var heightHeading = $(".main-page-about__article .article__headings").height();
    var typedBlock = $(".main-page-about__article .article__type");
    typedBlock.css("top", heightHeading);

    typedBlock.typed({
        // Список фраз для вывода
        strings: stringForType,
        // Альтернативный вариант указания фраз для вывода, с помощью html-элемента (каждая строка должна быть обернута в <p>)
        stringsElement: null,
        // Скорость печати текста
        typeSpeed: 100,
        // Задержка перед началом печати текста
        startDelay: 0,
        // Скорость стирания текста
        backSpeed: 0,
        // Перемещать строки
        shuffle: false,
        // Задержка перед стиранием текста
        backDelay: 500,
        // Зациклить
        loop: true,
        // Количество повторений, false — бесконечно
        loopCount: false,
        // Показать курсор
        showCursor: true,
        // Символ курсора
        cursorChar: "|",
        // Атрибут элемента, в котором будет меняться текст (null — текст элемента)
        attr: null,
        // Формат: html или text
        contentType: 'html',
        // Функция будет вызвана, после завершения печати текста
        callback: function () {},
        // Функция будет вызвана перед началом печати каждой строки
        preStringTyped: function () {},
        // Функция будет вызвана для каждой напечатанной строки
        onStringTyped: function () {},
        // Функция будет вызвана при сбросе — $(".element").typed('reset')
        resetCallback: function () {}
    });

    //show caption in grid
    var itemOpenDesc = $(".list__caption");
    itemOpenDesc.hover(
        function (e) {
            var spoilerDesc = $(this).find(".list__caption-descr");

            spoilerDesc.stop().slideToggle(200);
        },
        function (e) {
            var spoilerDesc = $(this).find(".list__caption-descr");

            spoilerDesc.stop().slideToggle(200);
        }
    );

    //slider
    var pageCarousel = $(".main-page-slider__slider");
    pageCarousel.owlCarousel({
        margin: 24,
        responsiveClass:true,
        items:1,
        slideBy:3,
        nav:false,
        dots: false,
        navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #183F93;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #183F93;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],

        responsive:{
            991:{
                items:4,
                nav:true
            },
            768:{
                items:3,
                nav:false
            },
            500:{
                items:2,
                nav:false
            },
            420:{
                items:1,
                nav:false
            }
        },
        onInitialized: function (e) {
            var carouselItems = pageCarousel.find(".slider__item");

            function equalsHeight($items) {
                var maxHeight = 0;

                $.each($items, function () {
                    var thisHeight = $(this).height();

                    if ( thisHeight > maxHeight ) {
                        maxHeight = thisHeight;
                    }
                });

                $items.height(maxHeight);
            }

            equalsHeight(carouselItems);

            setTimeout(function (e) {
                pageCarousel.trigger("refresh.owl.carousel");
            }, 1);
        }
    });
});

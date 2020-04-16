function getRandomInt(min, max) {
    return Math.random() * (max - min) + min;
}


function Quiz(options) {

    var quiz = this;
    this.currentStep = 1;

    this.stepsCounter = parseInt(options.stepsCounter) || 3;
    this.indexLockStep = options.indexLockStep || options.stepsCounter;

    this.stepElementSelector = options.stepElementSelector;

    this.stepElementSelectorHidden = options.stepElementSelectorHidden;

    this.preloader = $(options.preloader);
    this.buttonPrev = $(options.buttonPrev);
    this.buttonNext = $(options.buttonNext);

    $(quiz.stepElementSelector)
        .eq(0)
        .css("left", "0");

    this.lockStepByTrigger = function () {

        $.each( quiz.indexLockStep, function(index, value){

            if ( quiz.currentStep ===  value) {
                quiz.buttonNext.attr("disabled", true);
            }
        });
    };

    this.prevStep = function () {

        --quiz.currentStep;

        quiz.buttonNext.removeAttr("disabled");

        $(quiz.stepElementSelector).eq(quiz.currentStep).removeAttr("style").addClass(quiz.stepElementSelectorHidden);

        $(quiz.stepElementSelector)
            .eq(quiz.currentStep - 1)
            .removeClass(quiz.stepElementSelectorHidden)
            .stop(true, true)
            .animate({
                left: ['0', 'swing'],
                opacity: '1'
            }, 150);

        if (quiz.currentStep === 1) {

            quiz.buttonPrev.attr("disabled", true);
        }
        else {
            quiz.buttonPrev.removeAttr("disabled");
        }

        quiz.lockStepByTrigger();
    };

    this.nextStep  = function () {

        $(quiz.stepElementSelector)
            .eq(quiz.currentStep - 1)
            .stop(true, true)
            .animate({
                opacity: '0'
            }, 300);

        quiz.preloader.removeAttr("hidden");

        setTimeout(function (e) {

            quiz.preloader.attr("hidden", true);

            $(quiz.stepElementSelector).eq(quiz.currentStep - 1).removeAttr("style").addClass(quiz.stepElementSelectorHidden);

            quiz.buttonPrev.removeAttr("disabled");

            $(quiz.stepElementSelector)
                .eq(quiz.currentStep)
                .removeClass(quiz.stepElementSelectorHidden)
                .stop(true, true)
                .animate({
                    left: ['0', 'swing'],
                    opacity: '1'
                }, 150);

            ++quiz.currentStep;

            if ( (quiz.currentStep === quiz.stepsCounter)
                || (quiz.currentStep === quiz.indexLockStep) ) {

                quiz.buttonNext.attr("disabled", true);
            }
            else {
                quiz.buttonNext.removeAttr("disabled");
            }

            quiz.lockStepByTrigger();

        }, getRandomInt(1000, 2000));


    };

    quiz.lockStepByTrigger();

    $(quiz.buttonPrev).on("click", function () {
        quiz.prevStep();
    });

    $(quiz.buttonNext).on("click", function () {
        quiz.nextStep();
    });
}

window.onload = function() {
    AOS.init();

    $('#getAtms').on('click', function(){
        $('#loadingLogo').fadeIn();
    });


    // fix the problem of AOS when we have tabs with changable height like ABOUT page
    onElementHeightChange(document.body, function() {
        AOS.refresh();
    });


    function onElementHeightChange(elm, callback) {
        var lastHeight = elm.clientHeight
        var newHeight;

        (function run() {
            newHeight = elm.clientHeight;
            if (lastHeight !== newHeight) callback();
            lastHeight = newHeight;

            if (elm.onElementHeightChangeTimer) {
                clearTimeout(elm.onElementHeightChangeTimer);
            }

            elm.onElementHeightChangeTimer = setTimeout(run, 200);
        })();
    }

    // when click on link with class open-tab it will open the required tab in about page
    $('.open-tab').click(function(e) {
        e.preventDefault();
        var someTabTriggerEl = $($(this).attr('href'));
        someTabTriggerEl.get(0).scrollIntoView();
        someTabTriggerEl.click();

    });

    // block writing chars in phone field
    $(".only-num-field").keypress(function(e) {
        var charCode = (e.which) ? e.which : event.keyCode

        if (String.fromCharCode(charCode).match(/[^0-9+]/g))

            return false;
    });


   // readmore
   $("#toggle22").click(function() {
        var elem = $("#toggle22").text();
        if (elem == "Read More") {
        //Stuff to do when btn is in the read more state
        $("#toggle22").text("Read Less");
        $("#text22").slideDown();
        } else {
        //Stuff to do when btn is in the read less state
        $("#toggle22").text("Read More");
        $("#text22").slideUp();
        }
  });
    //  apply-now dropdown
    function addSubCats(subCats) {
        $('#sub-cat').empty();
        $(subCats).each(function() {

            $('#sub-cat').append($('<option>', {
                value: this,
                text: this
            }));
        });
    }

    $('#main-cat').on('change', function() {
        var element = $(this).find('option:selected');
        var subCats = element.attr('sub-cat').split(',');
        addSubCats(subCats);

    });




    var fullHeight = function() {


        jQuery('.js-fullheight').css('height', jQuery(window).height());
        jQuery(window).resize(function() {
            jQuery('.js-fullheight').css('height', jQuery(window).height());
        });

    };
    fullHeight();
    //............................................................ Mega menu main nav

    /////// Prevent closing from click inside dropdown
    document.querySelectorAll('.dropdown-menu').forEach(function(element) {
        element.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    })

    //......................................................................... swipper home
    const swiper = new Swiper('.swiper1', {
        // Optional parameters
     loop: true,
    speed:1000,
    direction: 'horizontal',
    effect: 'fade',
    autoplay: {
        delay:3000,
    },
        // If we need pagination

        // Navigation arrows
        navigation: {
            nextEl: '.swiper1 .swiper-button-next',
            prevEl: '.swiper1 .swiper-button-prev',
        },
        allowTouchMove:false,

    });
    const swiper3 = new Swiper('.swiper3', {
        // Options for swiper2
        loop: true,
        speed:1000,
        effect: 'cards',
        autoplay: {
            delay: 3000,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,

        },

        navigation: {
            nextEl: '.swiper1 .swiper-button-next',
            prevEl: '.swiper1 .swiper-button-prev',
        },
        allowTouchMove:false,
    });

    // .......................................................swippertwo
    var swiper2 = new Swiper('.swipper2', {
        direction: 'horizontal',
        slidesPerView: 1,
        spaceBetween: 0,
        initialSlide: 1,
        // watchOverflow: true,
        // centeredSlides: true,
        grabCursor: true,
        breakpoints: {
            480: {
                slidesPerView: 1
            },
            740: {
                slidesPerView: 2
            },
            960: {
                slidesPerView: 3
            },
            1280: {
                slidesPerView: 4
            }
        },
        // Navigation arrows
        navigation: {
            nextEl: '.swipper2 .swiper-button-next',
            prevEl: '.swipper2 .swiper-button-prev',
        },

    })



    // ...............................................collaps

    jQuery(document).ready(function($) {
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {

            this.classList.toggle("active");

                /* Toggle between hiding and showing the active panel */
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            }, {
                passive: true
            });
        }

    });
    //........................................................................... noUiSlider

    // initialize the sliders
    var noUiSliders = document.getElementsByClassName('range-slider-custom');
    for (var i = 0; i < noUiSliders.length; i++) {

        var start = parseFloat(noUiSliders[i].getAttribute("start"));
        var step = parseFloat(noUiSliders[i].getAttribute("step"));
        var min = parseFloat(noUiSliders[i].getAttribute("min"));
        var max = parseFloat(noUiSliders[i].getAttribute("max"));
        var decimals = parseFloat(noUiSliders[i].getAttribute("decimals"));
        var direction = 'ltr';
        if($('body').attr('lang')=="ar")
            direction = 'rtl';

        noUiSlider.create(noUiSliders[i], {
            start: start,
            step: step,
            connect: 'lower',
            direction:direction,
            range: {
                'min': min,
                'max': max
            },
            serialization: {
                format: {
                    decimals: decimals
                }
            }
        });

    }

    // Interest Homepage
    if ($('#a-interest-value').length > 0) {
        var aInterestRange = document.getElementById("a-interest-range"),
            aInterestValue = document.getElementById("a-interest-value");


        aInterestRange.noUiSlider.on('update', function() {
            aInterestValue.value = parseFloat(this.get());
            interestCalc();
        });

        aInterestValue.addEventListener('change', function() {
            aInterestRange.noUiSlider.set(this.value);
            interestCalc();
        });
    }

    function interestCalc() {
        let aRateValue = $('#a-interest-rate').val();
        let aDaysValue = $('#a-interest-days').val();
        let value = parseInt(aInterestRange.noUiSlider.get());
        let aInterest = $('#a-interest');
        let interest = value*aRateValue/100*(aDaysValue/360);


        $('#a-interest-num').html(value);
        aInterest.html(interest.toFixed(2));
    }



    function refreshDC() {
        var principal = parseInt(dCPrincipalRange.noUiSlider.get());
        var tenure = parseInt(dCTenureRange.noUiSlider.get());
        var sDate = new Date();
        var eDate = new Date();
        var rate = 2;
        eDate.setMonth(eDate.getMonth() + tenure);
        var Difference_In_Time = eDate.getTime() - sDate.getTime();
        var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
        var maturity = principal*rate/100*(Difference_In_Days/360);

        dCPrincipal.innerHTML = principal;
        dCTenure.innerHTML = tenure;
        dCEDate.html(eDate.toDateString());
        dCMaturityValue.html(maturity.toFixed(2));
    }


    // Commercial Loan Calc
    if ($('#a-commercial-value').length > 0) {
    var ctLLoanAmountRange = document.getElementById('a-commercial-range'),
        ctLRateRange = document.getElementById('a-commercial-rate-range'),
        ctLTenureRange = document.getElementById('a-commercial-tenure-range'),
        ctLLoanAmountValue = $('#a-commercial-value'),
        ctLRateValue = $('#a-commercial-rate-value'),
        ctLTenureValue = $('#a-commercial-tenure-value'),
        ctLLoanAmount = $('#a-commercial-num'),
        ctLRate = $('#a-commercial-rate-num'),
        ctLTenure = $('#a-commercial-tenure-num'),
        ctLRepayment = $('#a-commercial');

        ctLLoanAmountRange.noUiSlider.on('update', function () {
            ctLLoanAmountValue.val(parseFloat(this.get()));
            refreshCTL();
        });
        ctLRateRange.noUiSlider.on('update', function () {
            ctLRateValue.val(parseFloat(this.get()));
            refreshCTL();
        });
        ctLTenureRange.noUiSlider.on('update', function () {
            ctLTenureValue.val(parseFloat(this.get()));
            refreshCTL();
        });

        ctLLoanAmountValue.on('change', function(){
            ctLLoanAmountRange.noUiSlider.set(this.value);
            refreshCTL();
        });

        ctLRateValue.on('change', function(){
            ctLRateRange.noUiSlider.set(this.value);
            refreshCTL();
        });

        ctLTenureValue.on('change', function(){
            ctLTenureRange.noUiSlider.set(this.value);
            refreshCTL();
        });

        }


        function refreshCTL() {
            var loanAmount = parseInt(ctLLoanAmountRange.noUiSlider.get());
            var rate = parseFloat(ctLRateRange.noUiSlider.get());
            var tenure = parseFloat(ctLTenureRange.noUiSlider.get());
            var repayment = loanAmount*(
                (rate/100/12)*
                (
                    Math.pow(
                        1+(rate/100/12),tenure*12)
                    )/
                (
                    Math.pow(
                        1+(rate/100/12),tenure*12)-1
                    )
                );


            ctLLoanAmount.html(loanAmount);
            ctLRate.html(rate);
            ctLTenure.html(tenure);

            ctLRepayment.html(repayment.toFixed(2));
        }





    //  ajax sending emails

    $("#apply-now-form").on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            },
            type: "POST",

            data: {
                name: $("#apply-now-form #name").val(),
                phone: $("#apply-now-form #phone").val(),
                email: $("#apply-now-form #email").val(),
                location: $("#apply-now-form #location option:selected").val(),
                cat: $("#apply-now-form #main-cat").val(),
                subCat: $("#apply-now-form #sub-cat").val(),
                extCustomer: $('#apply-now-form input[name="existing-customer"]:checked').val(),
                howContact: $('#apply-now-form input[name="contact-you"]:checked').val(),
                recaptcha: $('#apply-now-form input[name="token"]').val()
            },
            beforeSend: function() {
                $("#email-response-popup").fadeIn();
            },
            success: function(data) {
                ajaxSuccess();
                $("#apply-now-form").trigger("reset");
            },

            error: function(data) {

                ajaxError();

            },
        });
    });

    $("#contact-form").on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            },
            type: "POST",

            data: {
                name: $("#contact-form #name").val(),
                phone: $("#contact-form #phone").val(),
                email: $("#contact-form #email").val(),
                location: $("#contact-form #location option:selected").val(),
                msg: $("#contact-form #msg").val(),
                subject: $('#contact-form input[name="subject"]:checked').val(),
                howContact: $('#contact-form input[name="contact-you"]:checked').val(),
                recaptcha: $('#contact-form input[name="token"]').val()
            },
            beforeSend: function() {
                $("#email-response-popup").fadeIn();
            },
            success: function(data) {
                ajaxSuccess();
                $("#alert-message").text("Thank you for submitting the form!");
                $("#contact-form").trigger("reset");

            },

            error: function(data) {

                ajaxError();

            },
        });
    });

    $(".close-response-popup").on('click', function() {
        $("#email-response-popup").fadeOut();
        $(".response-popup-corect").hide();
        $(".response-popup-error").hide();
        $(".response-popup-loader").show();
    });

    function ajaxSuccess() {
        $(".response-popup-loader").hide();
        $(".response-popup-corect").slideDown();

    }

    function ajaxError() {
        $(".response-popup-loader").hide();
        $(".response-popup-error").slideDown();
    }

    // about us with # in url
    var tab = window.location.href.split('#')[1];

    $(".about-tabs li").each(function(){
        if($(this).attr('tab') == tab)
        {

            $(this).find('button').click();
             $('html, body').animate({
                scrollTop: $(".about-tabs#pills-tab").offset().top
            }, 500);

        }
    });


    // mobile on click on login in navbar
    $(".dropdown-login").on('click mouserover',function(){
        $(this).find(".dropdown-content").slideToggle();
        $(this).toggleClass('rotate-arrow');
    });

	// Cookie Concent
	$('body').ihavecookies({

	  title: "Cookies & Privacy",
	  message: "Hotel Hub website uses necessary cookies to ensure its operability. By clicking “Accept All”, you agree to the storing of cookies on your device to enhance site navigation, analyze site usage and personalize your browsing experience. You can prevent use of cookies at any time by changing your web browser’s settings",
	  link: "/privacy-notice#cookies",
	  moreInfoLabel:  'Learn More',
	  advancedBtnLabel:'Customise',
	  uncheckBoxes: false,
	  acceptBtnLabel:'Accept All',
	  delay: 2000
	});

	$(document).on("click","#gdpr-cookie-advanced",function() {
	  $('#gdpr-cookie-types input').prop( "checked", true );
	});

}




window.tabLinks = function tabLinks(e) {
	if (!$(e).hasClass('active-link')) {
		$('.tab-contents').removeClass('active-tab');
		$('.tab-links').removeClass('active-link');
		$('.tab-links').removeClass('active-border');
		$(e).addClass('active-link');
		$(e).addClass('active-border');
		$('.tab-contents').fadeOut(0);
		$('#'+$(e).attr('id')+'-item').fadeIn(0);
	}

}

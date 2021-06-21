(function($) {
    $(document).ready(function() {

        "use strict";

        /* =================================
         ===  Border Caption                 ====
         =================================== */
        function borderCaption(element) {
            $(element).each(function(index) {
                var firstWord = $(this).text().split(' ')[0];
                var replaceWord = "<mark>" + firstWord + "</mark>";
                var newString = $(this).html().replace(firstWord, replaceWord);
                $(this).html(newString);
            }
            );
            $(element).wrapInner('<span></span>');
        }
        function borderCaptionWithDots(element) {
            $(element).append('<div class="icon-dots"></div>');
        }
        borderCaption('.border-caption');
        borderCaptionWithDots('.with-dots');

        /* =================================
         ===  Home Caption Title                 ====
         =================================== */
        $('.briefcase-icon').prepend('<div class="circle-ef"><i class="fa fa-briefcase"></i></div>');
        $('.comments-icon').prepend('<div class="circle-ef"><i class="fa fa-comments-o"></i></div>');
        $('.envelope-icon').prepend('<div class="circle-ef"><i class="fa fa-envelope"></i></div>');

        /* =================================
         ===  Minimal Menu                 ====
         =================================== */
        $('.minimal-menu').before('<label class=\"minimal-menu-button\" for=\"mobile-nav\"><span class=\"icon-bar\"></span><span class=\"icon-bar\"></span><span class=\"icon-bar\"></span></label><input class=\"minimal-menu-button\" type=\"checkbox\" id=\"mobile-nav\" name=\"mobile-nav\" />');
        $('.minimal-menu').find('ul.sub-menu').parent().addClass('submenu');
        $('.minimal-menu').find('ul.sub-menu').before('<input class=\"show-submenu\" type=\"checkbox\" />');

        /* =================================
         ===  Fancy Select                 ====
         =================================== */
        if ($('.custom-select').length) {
            var mySelect = $('.custom-select');
            mySelect.fancySelect({
                triggerTemplate: function(optionEl) {
                    var option_data = optionEl.data('icon');
                    if (typeof option_data != 'undefined') {
                        return '<div class="icon-' + optionEl.data('icon') + '"></div><p>' + optionEl.text() + '</p>';
                    }
                    else {
                        return '<p>' + optionEl.text() + '</p>';
                    }
                }
            }
            ).on('change.fs', function() {

                    var selectValue =  $('.custom-select')
                    $('#dopparamsproduct-hid').val(selectValue.val());

                var raw_val = $(this).parent().find('.options').find('.selected').attr('data-raw-value');
                $(this).find('option').removeAttr('selected').filter('[value=' + raw_val + ']').attr('selected', true);
                // var url = $(this).find('option').filter(':selected').attr('data-src');
                // window.location.replace(url);
            }
            );
        }


        //$('#dopparamsproduct-hid').val($('.custom-select').val());

        /* =================================
         ===  Fancy Box                 ====
         =================================== */
        if ($('.fancybox').length) {
            $(".fancybox").fancybox();
        }

        $("a.photo").fancybox();
        /* =================================
         ===  Slideshow                 ====
         =================================== */
        if ($('#slideshow').length) {
            $('#slideshow > div').allinone_bannerRotator({
                skin: 'universal', width: 1920, height: 600, width100Proc: true, responsive: true, thumbsWrapperMarginBottom: 5, showCircleTimer: false, showBottomNav: false, effectDuration: 0.7
            }
            );
        }

        /* =================================
         ===  Product Showcase                 ====
         =================================== */
        if ($('#product-showcase').length) {
            $('.previews a').click(function(e) {
                e.preventDefault();
                var largeImage = $(this).attr('data-full');
                $('.selected').removeClass();
                $(this).addClass('selected');
                $('.full img').hide();
                $('.full img').attr('src', largeImage);
                $('.full img').fadeIn();
            }
            );
            $('.full').click(function(e) {
                e.preventDefault();
                var modalImage = $(this).find('img').attr('src');
                $.fancybox.open(modalImage);
            }
            );
            $('.gallery .previews').perfectScrollbar({
                suppressScrollX: true
            }
            );
        }

        /* =================================
         ===  Star Rating                 ====
         =================================== */
        if ($('.star-rating').length) {
            $('.star-rating').raty({
                half: true
            }
            );
        }

        /* =================================
         ===  Accordion Menu                 ====
         =================================== */
        if ($("#accordian").length) {



             $("#accordian").on("click", ".has-child >a", function(e) {
                e.preventDefault();

                var $a = $(this);
                if ($a.next().length) {
                    $("#accordian ul ul").slideUp();
                    $("#accordian ul li").removeClass('active');
                    if (!$a.next().is(":visible")) {
                        $a.parent().addClass('active');
                        $a.next().slideDown();
                    }
                }
            }
            );
            $("#accordian .current-cat").parent().css('display', 'block');
        }

        /* =================================
         ===  Google Map                 ====
         =================================== */
        if ($('#map').length) {
            var map = new GMaps({
                el: '#map', lat: -12.043333, lng: -77.028333
            }
            );
            map.addMarker({
                lat: -12.042, lng: -77.028333, title: 'Marker with InfoWindow', infoWindow: {
                    content: '<h4>KYSBAG</h4>'
                }
            }
            );
        }

        /* =================================
         ===  Product Tabs                 ====
         =================================== */
        if ($(".product-tabs").length) {
            $('.product-tabs').responsiveTabs({
                animation: 'slide', rotate: false, startCollapsed: 'accordion', collapsible: 'accordion', setHash: true
            }
            );
        }

        /* =================================
         ===  Quantity Input                 ====
         =================================== */
        $('.minus-btn').click(function(e) {
            e.preventDefault();
            var input = $(this).parent().find('input');
            var currentVal = parseInt(input.val());
            if (currentVal > 1) {
                input.val(currentVal - 1).change();
            }
        }
        );
        $('.plus-btn').click(function(e) {
            e.preventDefault();
            var input = $(this).parent().find('input');
            var currentVal = parseInt(input.val());
            input.val(currentVal + 1).change();
        }
        );
        $('.quantity input').focusin(function() {
            $(this).data('oldValue', $(this).val());
        }
        );

        /* =================================
         ===  Price Slider                 ====
         =================================== */


            // Наполняем слайдер макс и мин ценой
            var minimum = parseInt($(".price-range").data('min'));
            var maximum = parseInt($(".price-range").data('max'));

            var valueMin = $(".price-range").data('minprice');
            var valueMax = $(".price-range").data('maxprice');



            var value;

            if(valueMin != '' && valueMax != ''){
                value = [valueMin, valueMax];
            }
            else{
                value = [minimum, maximum];
            }

        if ($("#price-slider").length) {
            $("#price-slider").slider({
                range: true, min: minimum, max: maximum, values: value, slide: function(event, ui) {
                    $("#amount").val(ui.values[ 0 ] + "-" + ui.values[ 1 ]);
                }
            }
            );
            $("#amount").val($("#price-slider").slider("values", 0) +
                    "-" + $("#price-slider").slider("values", 1));
        }

        /* =================================
         ===  Product View By                 ====
         =================================== */
        $('.bygrid').click(function(e) {
            e.preventDefault();
            if ($('.products').hasClass('listview')) {
                $('.products').removeClass('listview');
                $('.products').addClass('gridview');
            }
            else {
                $('.products').addClass('gridview');
            }
            $('.bylist').removeClass('active');
            $(this).addClass('active');
        }
        );
        $('.bylist').click(function(e) {
            e.preventDefault();
            if ($('.products').hasClass('gridview')) {
                $('.products').removeClass('gridview');
                $('.products').addClass('listview');
            }
            else {
                $('.products').addClass('listview');
            }
            $('.bygrid').removeClass('active');
            $(this).addClass('active');
        }
        );

        /* =================================
         ===  Sticky Topbar                 ====
         =================================== */
        $(".topbar").stick_in_parent();
    }
    );
}
)(window.jQuery);
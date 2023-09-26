// 01. Loader js
// 02.Tap to top
// 03.Footer js
// 04.Menu js
// 05.Image to background js
// 06.liked js
// 07.filter js
// 08.search js
// 09.responsive setting js
// 10.fixed header js
// 11.Add to wishlist
// 12. Grid Layout view
// 13. nav-menu JS



(function($) {
    "use strict";

    // Others Option For Responsive JS
    $(".color-trigger").on("click", function(){
        $(".color-palate").toggleClass("visible-palate");
    });

    $(".colors-trigger").on("click", function(){
        $(".colors-palate").toggleClass("visibles-palate");
        $(".fixed-overlay").toggleClass("full-width");
        $(".colors-trigger").hide();
    });

    $(".close").on("click", function(){
        $(".colors-palate").removeClass("visibles-palate");
        $(".fixed-overlay").removeClass("full-width");
        $(".colors-trigger").show();
    });

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    $('.like').on('click', function(e) {
        $(this).toggleClass('added');
    });

    $('button.add').on('click', function(e) {
        $('.add-more').toggleClass('open');
    });
    // Language icon
    $('.language').on('click', function() {
        $(this).toggleClass("active");
        $('.language ul.nav-submenu').toggleClass("open");
        $(".agent ul.nav-submenu").removeClass("open");
        $(".currency ul.nav-submenu").removeClass("open");
    });
    // Agent icon
    $('.agent').on('click', function() {
        $(this).toggleClass("active");
        $('.agent ul.nav-submenu').toggleClass("open");
        $(".language ul.nav-submenu").removeClass("open");
        $(".currency ul.nav-submenu").removeClass("open");
    });
    // currency icon
    $('.currency').on('click', function() {
        $(this).toggleClass("active");
        $('.currency ul.nav-submenu').toggleClass("open");
        $(".agent ul.nav-submenu").removeClass("open");
        $(".language ul.nav-submenu").removeClass("open");
    });

    /*=====================
     01. Loader js
     ==========================*/
    $(window).on('load', function() {
        setTimeout(function() {
            $('.loader-wrapper').fadeOut('slow');
            $('.box').addClass('text-affect');
        }, 1000);
        $('.loader-wrapper').remove('slow');
    });

    /*=====================
     02. Tap to Top
     ==========================*/
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 600) {
            $('.tap-top').addClass('top');
        } else {
            $('.tap-top').removeClass('top');
        }
    });

    $('.tap-top').on('click', function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });


    /*=====================
     03. Footer js
     ==========================*/


    var contentwidth = $(window).width();
    $(window).on('load', function() {
        checkPosition();

        function checkPosition() {
            if (window.matchMedia('(max-width: 767px)').matches) {
                $('.footer-title h5').append('<span class="according-menu"><i class="fas fa-chevron-down"></i></span>');
                $('.footer-title').on('click', function() {
                    $('.footer-title').removeClass('active').find('span').replaceWith('<span class="according-menu"><i class="fas fa-chevron-down"></i></span>');
                    $('.footer-content').slideUp('normal');
                    if ($(this).next().is(':hidden') == true) {
                        $(this).addClass('active');
                        $(this).find('span').replaceWith('<span class="according-menu"><i class="fas fa-chevron-up"></i></span>');
                        $(this).next().slideDown('normal');
                    } else {
                        $(this).find('span').replaceWith('<span class="according-menu"><i class="fas fa-chevron-down"></i></span>');
                    }
                });
                $('.footer-content').hide();
                $("#footer-contact-m").show();


            } else {
                $('.footer-content').show();

            }
        }
    });

    /*=====================
     04. Menu js
     ==========================*/
    $(".toggle-nav, .sidebar-toggle").on('click', function() {
        $('.nav-menu').addClass("open");
        $(".customizer-wrap").removeClass("open");
        $('.left-sidebar').css("left", "-365px").removeClass("open");
        $('.left-sidebar').removeClass("open");
        if ($('.nav-menu').hasClass("open")) {
            $('.bg-overlay').addClass("active");
        }
    });
    $(".mobile-back").on('click', function() {
        $('.nav-menu').removeClass("open");
        $('.bg-overlay').removeClass("active");
    });

    var contentwidth = $(window).width();
    if ((contentwidth) <= '1199') {
        $('<div class="bg-overlay"></div>').appendTo($('header'));
        $(".menu-item-has-children").each(function(i) {
            $(this).append('<span class="according-menu">+</span>');
        });
        $('.according-menu').on('click', function() {
            // $('.menu-title').removeClass('active').find('span').replaceWith('<span class="according-menu">+</span>');
            if ($(this).prev().is(":hidden") == true) {
                $(this).prev().slideDown('normal');
                $(this).prev().prev().addClass("active");
                $(this).replaceWith('<span class="according-menu">-</span>');
                // $(this).prev().css({ "display": "block" });
                //     $(this).next().slideDown('normal');
            } else {
                $(this).prev().slideUp('normal');
                $(this).prev().prev().removeClass("active");
                $(this).replaceWith('<span class="according-menu">+</span>');
                // $(this).prev().css({ "display": "none" });
            }
        });
        $('.menu-content').hide();
    }
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        // true for mobile device
        $('.menu-top.searchBar').attr('id', 'proj_navigation');
    }

    var contentwidth = $(window).width();
    if ((contentwidth) <= '1199') {
        $('.menu-title-level1').append('<span class="according-menu">+</span>');
        $('.menu-title-level1').on('click', function() {
            $('.menu-title-level1').removeClass('active').find('span').replaceWith('<span class="according-menu">+</span>');
            $('.level1').slideUp('normal');
            if ($(this).next().is(':hidden') == true) {
                $(this).addClass('active');
                $(this).find('span').replaceWith('<span class="according-menu">-</span>');
                $(this).next().slideDown('normal');
            } else {
                $(this).find('span').replaceWith('<span class="according-menu">+</span>');
            }
        });
        $('.nav-sub-childmenu .level1').hide();
    }

    var contentwidth = $(window).width();
    if ((contentwidth) <= '1199') {
        $('.submenu-title').append('<span class="according-menu">+</span>');
        $('.submenu-title').on('click', function() {
            $('.submenu-title').removeClass('active').find('span').replaceWith('<span class="according-menu">+</span>');
            $('.submenu-content').slideUp('normal');
            if ($(this).next().is(':hidden') == true) {
                $(this).addClass('active');
                $(this).find('span').replaceWith('<span class="according-menu">-</span>');
                $(this).next().slideDown('normal');
            } else {
                $(this).find('span').replaceWith('<span class="according-menu">+</span>');
            }
        });
        $('.submenu-content').hide();
    }

    /*=====================
     05. Image to background js
     ==========================*/
    $(".bg-top").parent().addClass('b-top');
    $(".bg-bottom").parent().addClass('b-bottom');
    $(".bg-center").parent().addClass('b-center');
    $(".bg-left").parent().addClass('b-left');
    $(".bg-right").parent().addClass('b-right');
    $(".bg_size_content").parent().addClass('b_size_content');
    $(".bg-img").parent().addClass('bg-size');
    $(".bg-img.blur-up").parent().addClass('blur-up lazyload');
    $('.bg-img').each(function() {

        var el = $(this),
            src = el.attr('src'),
            parent = el.parent();


        parent.css({
            'background-image': 'url(' + src + ')',
            'background-size': 'cover',
            'background-position': 'center',
            'background-repeat': 'no-repeat',
            'display': 'block'
        });

        el.hide();
    });

    /*=====================
    06. select
    ==========================*/
    $('.js-example-basic-multiple').select2();
    /*=====================
    06. liked js
    ==========================*/
    $(".like-bottom").on('click', function() {
        $(this).parents(".property-box").toggleClass('liked-img');
    });

    /*=====================
    07. filter js
    ==========================*/
    $(".dropdown-menu a").on('click', function() {
        var a = $(this).closest("a");
        var getSampling = a.text();
        $(this).closest(".dropdown-menu").prev('.dropdown-toggle').find('span').text(getSampling);
    });

    $('.mobile-filter').on('click', function(e) {
        $('.left-sidebar').css("left", "-1px");
        $(".customizer-wrap").removeClass("open");
        $('.nav-menu').removeClass("open");
    });
    $('.back-btn').on('click', function(e) {
        $('.left-sidebar').css("left", "-365px");
    });

    $(".view-map").on('click', function() {
        $('.onclick-map').slideToggle('show');
    });

    // advance filter js
    var width_content = $(window).width();
    if ((width_content) > '991') {

        $(".filter-bottom-title").on('click', function() {
            $(".filter-bottom-content").slideToggle("");
        });
    } else {
        $(".filter-bottom-title").on('click', function() {
            $(".filter-bottom-content").toggleClass("open");
            $(".customizer-wrap").removeClass("open");
        });
        $(".close-filter-bottom").on('click', function() {
            $(".filter-bottom-content").removeClass("open");
        });
    }


    $(".top-bar-7 .close-filter-bottom").on('click', function() {
        $(".filter-bottom-content").removeClass("open");
        $(".filter-bottom-content").slideToggle("");
    });
    /*=====================
    08. search js
    ==========================*/
    $(".search-icon").on('click', function() {
        $('.search-box').toggleClass('open');
    });

    /*=====================
    09. responsive setting js
    ==========================*/
    $(".search-sm").on('click', function() {
        $('.sm-input').toggleClass('open');
    });

    $(".top-right-toggle").on('click', function() {
        $('.top-bar-right').toggleClass('open');
    });

    /*=====================
    10. fixed header js
    ==========================*/
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 600) {
            $(".fixed-header").addClass("fixed");
        } else {
            $(".fixed-header").removeClass("fixed");
        }
    });

    $(".toggle-center").on('click', function() {
        $('.center-responsive').toggleClass('open');
    });


    /*=====================
    11. Add to wishlist
    ==========================*/
    $('.property-box .overlay-property-box .effect-round.like').on('click', function() {
        var click = $(this).data('clicks');


        if (!$(this).hasClass('added')) {
            $.notify({
                message: 'Property Successfully added in wishlist'
            }, {
                element: 'body',
                position: null,
                type: "default",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: false,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 12,
                spacing: 10,
                z_index: 1031,
                delay: 4000,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                icon_type: 'class',
                template: '<div data-notify="container" class="col-11 col-xxl-3 col-xl-4 col-md-6 col-sm-8 alert alert-{0}" role="alert">' +
                    '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                    '<span data-notify="icon"></span> ' +
                    '<span data-notify="title">{1}</span> ' +
                    '<span data-notify="message">{2}</span>' +
                    '<div class="progress" data-notify="progressbar">' +
                    '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    '</div>' +
                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
                    '</div>'
            });
        } else {
            $.notify({
                message: 'Property Successfully removed from wishlist'
            }, {
                element: 'body',
                position: null,
                type: "default",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: false,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 12,
                spacing: 10,
                z_index: 1031,
                delay: 4000,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                icon_type: 'class',
                template: '<div data-notify="container" class="col-11 col-xxl-3 col-xl-4 col-md-6 col-sm-8 alert alert-{0}" role="alert">' +
                    '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                    '<span data-notify="icon"></span> ' +
                    '<span data-notify="title">{1}</span> ' +
                    '<span data-notify="message">{2}</span>' +
                    '<div class="progress" data-notify="progressbar">' +
                    '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    '</div>' +
                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
                    '</div>'
            });
        };

    });

    $('.property-box .overlay-property-box .effect-round1').on('click', function() {

        $.notify({
            message: 'Property Successfully added in wishlist'
        }, {
            element: 'body',
            position: null,
            type: "default-2",
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: false,
            placement: {
                from: "top",
                align: "right"
            },
            offset: 12,
            spacing: 10,
            z_index: 1031,
            delay: 4000,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            icon_type: 'class',
            template: '<div data-notify="container" class="col-11 col-xxl-3 col-xl-4 col-md-6 col-sm-8 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
        });
    });

    $(".save-btn").on('click', function() {
        $('.save-btn i').toggleClass("far fa-heart").toggleClass("fas fa-heart");
    });

    $(".custom-dropdown .custom-title").on('click', function() {
        $(this).parent().find('.custom-dropdown-menu').toggleClass("show");
    });

    /*=====================
    12. Grid Layout view
    ==========================*/
    //list layout view
    $('.list-layout-view').on('click', function(e) {
        $('.collection-grid-view').css('opacity', '0');
        $(".property-wrapper-grid").css("opacity", "0.2");
        $('.property-wrapper-grid').addClass("list-view");
        $(".property-wrapper-grid").children().children().removeClass();
        $(".property-wrapper-grid").children().children().addClass("col-lg-12");
        setTimeout(function() {
            $(".property-wrapper-grid").css("opacity", "1");
        }, 500);
    });

    $('.grid-layout-view').on('click', function(e) {
        $('.collection-grid-view').css('opacity', '1');
        $('.property-wrapper-grid').removeClass("list-view");
        $(".property-wrapper-grid").children().children().removeClass();
        $(".property-wrapper-grid").children().children().addClass("col-lg-4");

    });
    $('.product-2-layout-view').on('click', function(e) {
        if ($('.property-wrapper-grid').hasClass("list-view")) {} else {
            $(".property-wrapper-grid").children().children().removeClass();
            $(".property-wrapper-grid").children().children().addClass("col-lg-6");
        }
    });
    $('.product-3-layout-view').on('click', function(e) {
        if ($('.property-wrapper-grid').hasClass("list-view")) {} else {
            $(".property-wrapper-grid").children().children().removeClass();
            $(".property-wrapper-grid").children().children().addClass("col-lg-4 col-6");
        }
    });
    $('.product-4-layout-view').on('click', function(e) {
        if ($('.property-wrapper-grid').hasClass("list-view")) {} else {
            $(".property-wrapper-grid").children().children().removeClass();
            $(".property-wrapper-grid").children().children().addClass("col-xl-3 col-6");
        }
    });

})(jQuery);

/*=====================
    13. nav-menu JS
    ==========================*/

$(document).mouseup(function(e) {
    var dropdownMenu = $(".custom-dropdown-menu");
    if (!dropdownMenu.is(e.target) &&
        dropdownMenu.has(e.target).length === 0) {
        $(".custom-dropdown-menu").removeClass("show");
    }
    var menuOutside = $(".nav-menu");
    if (!menuOutside.is(e.target) &&
        menuOutside.has(e.target).length === 0) {
        $(".nav-menu").removeClass("open");
        $(".bg-overlay").removeClass("active");
    }
});
/*=====================
    14. Other JS
    ==========================*/
$('#mapmodal').on('shown.bs.modal', function() {
    map.getViewPort().resize();
});

function readURL(uploader) {
    $('.update_img').attr('src',
        window.URL.createObjectURL(uploader.files[0]));
};

$(".agent-contact > li .label").click(function() {
    $(this).parent().toggleClass("show");
});


$(".table-wrapper").on("click", ".remove", function(event) {
    var ndx = $(this).parent().index() + 1;
    $("td , th", event.delegateTarget).remove(":nth-child(" + ndx + ")");
});

jQuery(document).ready(function($) {
    $('#add-amenity').on('click', function() {

        var repetable_amenty_item = '<tr class="repetable_tr"><td><input type="text" class="widefat answer_value" name="property_amenities[]" /></td><td><a class="button remove-row" href="#">Remove</a></td></tr>';
        $('#repeatable-amenities-one tbody').append(repetable_amenty_item);
        return false;
    });
    $('#add-amenity_ar').on('click', function() {

        var repetable_amenty_item = '<tr class="repetable_tr_ar"><td><input type="text" class="widefat answer_value" name="property_amenities_ar[]" /></td><td><a class="button remove-row" href="#">Remove</a></td></tr>';
        $('#repeatable-amenities-ar tbody').append(repetable_amenty_item);
        return false;
    });
    $(document).on('click', '.remove-row', function() {
        $(this).parents('tr').remove();
        return false;
    });
    $('#add-essential').on('click', function() {

        var repetable_essential_item = '<tr class="repetable_tr"><td><input type="text" class="widefat answer_value" name="project_essentials[]" /></td><td><a class="button remove-row" href="#">Remove</a></td></tr>';
        $('#repeatable-essentials-one tbody').append(repetable_essential_item);
        return false;
    });

    $(document).on('click', '.remove-row', function() {
        $(this).parents('tr').remove();
        return false;
    });
    $('#add-row').on('click', function() {


        var repetable_item = '<tr class="repetable_tr"><td><label >Plan Title: </label><input type="text" class="widefat answer_value" name="plan_titles[]"  /><label >Plane Percentage: </label><input type="text" class="widefat answer_value" name="plan_percentages[]"  /><label >Plan Date:</label><input type="text" class="widefat answer_value" name="plane_dates[]"  /></td><td><a class="button remove-row" href="#">Remove</a></td></tr>';
        $('#repeatable-fieldset-one tbody').append(repetable_item);
        return false;
    });

    $(document).on('change', '.form-check-input', function() {
        var ans_val = $(this).parent().find('.answer_value').val();
        $(this).val(ans_val);
        return false;
    });


    $(document).on('click', '.remove-row', function() {
        $(this).parents('tr').remove();
        return false;
    });

    $(function() {
        $("button[name='property_add']").click(function() {
            var $fileUpload = $("#property_gallery");
            // var value = tinymce.get('property_content').getContent();
            // if (value === '' || value === null) { alert('About can\'t be empty !'); return false; }
            // var arabic_ar = $('#property_title_ar').val();
            // if (arabic_ar.trim()) {
            //     var value_ar = tinymce.get('property_content_ar').getContent();
            //     if (value_ar === '' || value_ar === null) { alert('Arabic about can\'t be empty !'); return false; }
            // }
            if (parseInt($fileUpload.get(0).files.length) < 3) {
                alert("You can only upload a minimum of 3 images");
                return false;
                // $(document).on("submit", "#add_form", function(e) {
                //     e.preventDefault();
                // });
            } else if (parseInt($fileUpload.get(0).files.length) > 10) {
                alert("You can only upload a maximum of 10 images");
                // $("#add_form").submit(function(e) {
                //     e.preventDefault();
                // });
                return false;
            } //else {
            //     $("#add_form").submit(function(e) {
            //         e.preventDefault();
            //         $(this).unbind('submit').submit();
            //     });
            // }
        });
    });

    $(function() {
        $("button[name='property_edit']").click(function() {
            var $fileUpload = $("#property_gallery");
            var oldAttachments = $('.gallery_pip').length;
            $(document).on("submit", "#edit_form", function(e) {
                if ((parseInt($fileUpload.get(0).files.length) + oldAttachments) < 3) {
                    alert("Gallery can't be less than 3 images.");
                    return false;
                } else if ((parseInt($fileUpload.get(0).files.length) + oldAttachments) > 10) {
                    alert("Gallery can't be more than 10 images.");
                    return false;
                    // $("#edit_form").submit(function(e) {
                    //     e.preventDefault();
                    // });
                } //else {
                //     $("#edit_form").submit(function(e) {
                //         // e.preventDefault();
                //         //     $(this).unbind('submit').submit();
                //         //     // $("#edit_form")[0].submit();
                //         $('form').unbind('submit').submit();
                //     });
                // }
            });
        });
    });

    $(function() {
        var current = $('#property-status-container select[name="property_status"]').val();
        if (current === 'sale') {
            $("#property-status-container").attr('class', 'form-group col-sm-3');
            $("#property-price").attr('class', 'form-group col-sm-3');
            $("#property-downPay").attr('class', 'form-group col-sm-3');
            $("#rental-period").attr('style', 'display:none;');
            $("#furnishing").attr('style', 'display:none;');
            $("#has-installment-plan").attr('style', 'display: flex;align-items: center;');
        } else {
            $("#property-status-container").attr('class', 'form-group col-sm-2');
            $("#property-price").attr('class', 'form-group col-sm-2');
            $("#property-downPay").attr('class', 'form-group col-sm-2');
            $("#rental-period").attr('style', 'display:block;');
            $("#furnishing").attr('style', 'display:block;');
            $("#has-installment-plan").attr('style', 'display:none;');
        }
        $('#property-status-container select[name="property_status"]').on('change', function() {
            var current = $(this).val();
            if (current === 'sale') {
                $("#property-status-container").attr('class', 'form-group col-sm-3');
                $("#property-price").attr('class', 'form-group col-sm-3');
                $("#property-downPay").attr('class', 'form-group col-sm-3');
                $("#rental-period").attr('style', 'display:none;');
                $("#furnishing").attr('style', 'display:none;');
                $("#has-installment-plan").attr('style', 'display: flex;align-items: center;');
            } else {
                $("#property-status-container").attr('class', 'form-group col-sm-2');
                $("#property-price").attr('class', 'form-group col-sm-2');
                $("#property-downPay").attr('class', 'form-group col-sm-2');
                $("#rental-period").attr('style', 'display:block;');
                $("#furnishing").attr('style', 'display:block;');
                $("#has-installment-plan").attr('style', 'display:none;');
            }
        });
    });
});

function dtt(id) {
    const dt = new DataTransfer();
    const input = document.getElementById('gallery');
    const { files } = input;
    if (id != 0)
        end = 0;
    else
        end = 1;
    for (let i = files.length - 1; i >= end; i--) {
        const file = files[i];
        //alert('The iteration number' + i);
        if (id != i) {
            dt.items.add(file)
                //alert('The file ' + i + ' added');
        }
    }

    input.files = dt.files // Assign the updates list
}

$(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
        $("#gallery").on("change", function(e) {
            var files = e.target.files,
                filesLength = files.length;
            let x = 0;
            for (var i = 0; i < filesLength; i++) {
                var f = files[i]
                var fileReader = new FileReader();
                var iteration = -1;
                $(".gallery .pip").remove();
                fileReader.onload = (function(e) {
                    iteration = iteration + 1;
                    var file = e.target;
                    $("<span class=\"pip\" style = \" max-width:20%; position: relative;display:inline-block;margin:1% \">" +
                        "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\" id = \"" + (iteration) + "\" style = \" max-width:100%;margin:2% \" /> " +
                        "<span class=\"remove\" style = \" margin-left:2%; position: absolute; top:0;right:3%;color:white;cursor:pointer \">X</span>" +
                        "</span>").insertAfter("#gallery");
                    $(".remove").click(function() {
                        var id = $(this).prev().attr("id");
                        if (x == 0) {
                            x++;
                            //                            alert('The id is' + id);
                        } else {
                            dtt(id);
                        }
                        $(this).parent(".pip").remove();
                    });

                    // Old code here
                    /*$("<img></img>", {
                      class: "imageThumb",
                      src: e.target.result,
                      title: file.name + " | Click to remove"
                    }).insertAfter("#f_img").click(function(){$(this).remove();});*/

                });
                fileReader.readAsDataURL(f);
            }
        });
        $("#fimg").on("change", function(e) {
            var files = e.target.files,
                filesLength = files.length;
            let x = 0;
            for (var i = 0; i < filesLength; i++) {
                var f = files[i]
                var fileReader = new FileReader();
                $(".fimg .pip").remove();
                fileReader.onload = (function(e) {
                    var file = e.target;
                    $("<span class=\"pip\" style = \" max-width:20%; position: relative;display:block;margin:auto \">" +
                        "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\" style = \" max-width:100%;margin:2% \" /> " +
                        "<span class=\"remove\" style = \" margin-left:2%; position: absolute; top:0;right:3%;color:white;cursor:pointer \">X</span>" +
                        "</span>").insertAfter("#fimg");
                    $(".remove").click(function() {
                        $(this).parent(".pip").remove();
                        document.getElementById('fimg').value = null;
                    });
                });
                fileReader.readAsDataURL(f);
            }
        });
    } else {
        alert("Your browser doesn't support to File API");
    }
});


if ($("#paymentPlans").length) { var paymentStyle = $("#paymentPlans").attr("style") }
$(document).ready(function() {
    $('#proj_navigation li:first').addClass("active");
    var id = $("#proj_navigation li:first a").attr('href');
    var style = '';
    if (id === '#paymentPlans') {
        style = paymentStyle + ';display:block;';
    } else {
        style = 'display:block;';
    }
    $(id).attr('style', style);

    $("#proj_navigation li").on("click", function(e) {
        var activeID = $("#proj_navigation li.active a").attr('href');
        $("#proj_navigation li.active").removeClass('active');
        $(activeID).attr('style', 'display:none;');
        $(this).addClass('active');
        activeID = $('#proj_navigation li.active a').attr('href');
        if (activeID === '#paymentPlans') {
            style = paymentStyle + ';display:block;';
        } else {
            style = "display:block;";
        }
        $(activeID).attr('style', style);
    });
});

$(document).on('click', '.close-circle', function() {
    $(this).parent('li').remove()
});

var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.parentElement.parentElement.nextElementSibling;
        if (content.style.display === "flex") {
            content.style.display = "none";
        } else {
            content.style.display = "flex";
        }
    });
}
$(document).ready(function() {
    const loc_icon = "<i class = 'fas fa-map-marker-alt' > </i>";
    $(loc_icon).insertBefore(".property-details span.font-roboto a");
});
var contentwidth = $(window).width();
if ((contentwidth) >= '769') {
    $('.footer.footer-bg .container .row div.col-xl-4').attr('class', 'col-xl-5');
    $('.footer.footer-bg .container .row div.col-xl-8').attr('class', 'col-xl-7');
    $('.footer.footer-bg .container .row div.col-xl-7 .col-lg-3').attr('class', 'col-lg-4');
    $('.footer.footer-bg .container .row div.col-xl-7 .col-lg-4.col-md-6').attr('class', 'col-lg-3 col-md-6');
    $('.footer.footer-bg .container .row div.col-xl-7 .col-lg-3.col-md-6').attr('style', 'padding:0;');

    // $('.single-property.project #details').css('display', 'block');
    // $('.single-property.project #paymentPlans').css('display', 'block');
    // $('.single-property.project #feature').css('display', 'block');
    // $('.single-property.project #essentials').css('display', 'block');
    // $('.single-property.project #gallery').css('display', 'block');
    // $('.single-property.project #video').css('display', 'block');
    // $('.single-property.project #location-map').css('display', 'block');
}
if ((contentwidth) <= '769') {
    $("#home-tabContent .col-12.show-more #is_commerce_container").attr("class", "col-12");
    $("#home-tabContent .col-12.show-more > .col-6.text-end").attr("class", "col-12 text-end");

}
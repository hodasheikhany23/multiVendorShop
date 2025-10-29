"use strict";
// Class definition
var KTKBootstrapTouchspin = function() {

    // Private functions
    var demos = function() {
        // minimum setup
        $('#kt_touchspin_1, #kt_touchspin_2_1').TouchSpin({
            buttondown_class: 'btn btn-primary',
            buttonup_class: 'btn btn-primary',

            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
        });

        // with prefix
        $('#kt_touchspin_2, #kt_touchspin_2_2').TouchSpin({
            buttondown_class: 'btn btn-primary',
            buttonup_class: 'btn btn-primary',

            min: 0,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: 'تومان'
        });

        // vertical button alignment:
        $('#kt_touchspin_3, #kt_touchspin_2_3').TouchSpin({
            buttondown_class: 'btn btn-primary',
            buttonup_class: 'btn btn-primary',

            min: 0,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: 'تومان'
        });

        // vertical buttons with custom icons:
        $('#kt_touchspin_4, #kt_touchspin_2_4').TouchSpin({
            buttondown_class: 'btn btn-primary',
            buttonup_class: 'btn btn-primary',
            verticalbuttons: true,
            verticalup: '<i class="la la-plus text-white"></i>',
            verticaldown: '<i class="la la-minus text-white"></i>',
            min: 0,
            max: 1000000000,
        });

        // vertical buttons with custom icons:
        $('#kt_touchspin_5, #kt_touchspin_2_5').TouchSpin({
            buttondown_class: 'btn btn-primary',
            buttonup_class: 'btn btn-primary',
            verticalbuttons: true,
            verticalup: '<i class="la la-angle-up"></i>',
            verticaldown: '<i class="la la-angle-down"></i>'
        });
    }

    var validationStateDemos = function() {
        // validation state demos
        $('#kt_touchspin_1_validate').TouchSpin({
            buttondown_class: 'btn btn-primary',
            buttonup_class: 'btn btn-primary',

            min:0,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: 'تومان'
        });

        // vertical buttons with custom icons:
        $('#kt_touchspin_2_validate').TouchSpin({
            buttondown_class: 'btn btn-primary',
            buttonup_class: 'btn btn-primary',

            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
        });

        $('#kt_touchspin_3_validate').TouchSpin({
            buttondown_class: 'btn btn-primary',
            buttonup_class: 'btn btn-primary',
            verticalbuttons: true,
            verticalupclass: 'la la-plus',
            verticaldownclass: 'la la-minus'
        });
        $('#kt_touchspin_4_validate').TouchSpin({
            buttondown_class: 'btn btn-primary',
            buttonup_class: 'btn btn-primary',

            min: 0,
            max: 2000,
            step: 1,
        });
    }

    return {
        // public functions
        init: function() {
            demos();
            validationStateDemos();
        }
    };
}();

jQuery(document).ready(function() {
    KTKBootstrapTouchspin.init();
});

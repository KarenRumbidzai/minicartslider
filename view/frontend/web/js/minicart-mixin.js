define([
    'jquery',
    'mage/dropdown'
], function ($) {
    'use strict';

    return function (Component) {
        return Component.extend({

            /**
             * @override
             */
            initialize: function () {
                var self = this;

                return this._super();
            },

            closeMinicart: function () {
                $('.slider-modals-wrapper').removeClass('minicart-overlay')
                $('[data-block="minicart"]').find('[data-role="dropdownDialog"]').dropdownDialog('close');
            },
        });
    }
});
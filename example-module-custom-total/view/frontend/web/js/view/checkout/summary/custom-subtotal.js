define(
    [
        'Magento_Checkout/js/view/summary/abstract-total',
        'Magento_Checkout/js/model/quote',
        'Magento_Checkout/js/model/totals'
    ],
    function (Component, quote, totals) {
        "use strict";
        return Component.extend({
            totals: quote.getTotals(),

            isDisplayed: function () {
                return this.getPureValue() !== 0;
            },
            getValue: function () {
                return this.getFormattedPrice(this.getPureValue());
            },
            getPureValue: function () {
                var price = 0;
                if (this.totals() && totals.getSegment('custom_subtotal').value) {
                    price = totals.getSegment('custom_subtotal').value;
                }
                return price;
            }
        });
    }
);

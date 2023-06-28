/**
 * @author Vectra Team
 * @copyright Copyright © Vectra Business Technologies
 * @package Vectra_MiniCartSlider
 */

require(['jquery'], function($){

    let closeButton = '#btn-minicart-close';
    let emptyParent = '.emptyCartBlock';
    let emptyMiniCartCms = '.minicartCms';

    $(document).ready( function() {

        $('.triggerCartSlider').click(function(e) {
            e.preventDefault();
            $(closeButton).remove();
            $(emptyMiniCartCms).show();
        })

        $(emptyMiniCartCms).each(function () {
            $(this).appendTo(emptyParent);
            $(emptyMiniCartCms).css({ opacity: 1 })
        })

    });
});
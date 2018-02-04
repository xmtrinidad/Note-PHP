const $card = $('.card');
const $card_action = $('.card-action');

/**
 * On card hover add class show-action
 * to show card_action buttons
 */
$card.hover(function () {
    $(this).find($card_action).toggleClass('show-action');
});
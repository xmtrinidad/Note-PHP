/*******************************
 ******* START NOTE CARD *******
 *******************************/



 
// Card variables
const $card = $('.card');
const $card_action = $('.card-action');
const $card_title = $('.card-title');
const $card_text = $('.card-text');

// Modal variables
const $card_modal = $('.card-modal');
const $card_modal_title = $('.card-modal__title');
const $card_modal_id = $('.card-modal__id');
const $card_modal_text = $('.card-modal__text');

/**********************
*** EVENT FUNCTIONS ***
***********************/

/**
 * On card click find and set modals based on
 * the card that was clicked
 */
$card.on('click', function () {
    const $clickedElement = $(this);
    setCardId($clickedElement);
    findAndSetValue($clickedElement, $card_title, $card_modal_title);
    findAndSetValue($clickedElement, $card_text, $card_modal_text);
    Materialize.updateTextFields(); // Fixes overlapping form issues
});

/**
 * On card hover add class show-action
 * to show card_action buttons
 */
$card.hover(function () {
    $(this).find($card_action).toggleClass('show-action');
});

/********************
***** FUNCTIONS *****
*********************/

/**
 * Find an element from a clicked item and set value
 * for another item
 * @param {Element} clicked - the clicked element
 * @param {Element} elementToFind
 * @param {Element} elementToSet 
 */
function findAndSetValue(clicked, elementToFind, elementToSet) {
    const text = clicked.find(elementToFind).text();
    elementToSet.val(text);
}

function setCardId(clicked) {
    const cardId = clicked.attr('id');
    $card_modal_id.val(cardId);
}





/*******************************
 ******* END NOTE CARD *******
 *******************************/
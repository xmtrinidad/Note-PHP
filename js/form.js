/*******************************
 ******* START NOTE FORM *******
 *******************************/

// Note Form Variables
const $note_form = $('.note-form');
const $note_form_title_div = $('.note-form__title');
const $note_form_title_input = $('.note-form__title input');
const $note_form_textarea = $('.note-form__text textarea');
const $note_form_btns = $('.note-form__btns');
const $note_form_cancelBtn = $('.note-form__cancel');
const $note_form_submitBtn = $('.note-form__submit');

/**********************
*** EVENT FUNCTIONS ***
***********************/

/**
 * Show title input and form buttons when
 * note text area is focused
 */
$($note_form_textarea).on('focus', function () {
    $note_form_title_div.add($note_form_btns).show();
});

/**
 * Hide title input and form buttons when
 * cancel is clicked
 */
$note_form_cancelBtn.on('click', function () {
    $note_form_title_div.add($note_form_btns).hide();
});

/**
 * Prevent form submit if textarea is empty
 * Hide title input and form buttons
 * Reset form values
 */
$note_form_submitBtn.on('click', function () {
    if ($note_form_textarea.val().trim() === '') {
        $note_form.submit(false);
        $note_form_title_div.add($note_form_btns).hide();
        $note_form_textarea.add($note_form_title_input).val('');
    }
});



/*******************************
 ******* END NOTE FORM *******
 *******************************/



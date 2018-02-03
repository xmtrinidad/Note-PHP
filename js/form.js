/*******************************
 ******* START NOTE FORM *******
 *******************************/

// Note Form Variables
const $note_form_title = $('.note-form__title');
const $note_form_textarea = $('.note-form__text textarea');
const $note_form_btns = $('.note-form__btns');
const $note_form_cancelBtn = $('.note-form__cancel');

// Note Form Functions
$($note_form_textarea).on('focus', function () {
    $note_form_title.add($note_form_btns).show();
});

$note_form_cancelBtn.on('click', function () {
    $note_form_title.add($note_form_btns).hide();
});


/*******************************
 ******* END NOTE FORM *******
 *******************************/



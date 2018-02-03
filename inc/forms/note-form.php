<form class="form note-form">
    <div class="row">
        <div class="input-field note-form__title">
            <input placeholder="My note" id="note_title" type="text" class="validate">
            <label for="note_title">Title</label>
        </div>
        <div class="input-field note-form__text">
            <textarea id="user_note" class="materialize-textarea"></textarea>
            <label for="user_note">Take a note!</label>
        </div>
        <div class="note-form__btns">
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
            </button>
            <button class="btn waves-effect waves-light note-form__cancel" type="button">Cancel
                <i class="material-icons right">cancel</i>
            </button>
        </div>
    </div>
</form>
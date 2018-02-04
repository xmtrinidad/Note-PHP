<form 
    method="POST"
    action="config/note.config.php" 
    class="form note-form">
    <div class="row">
        <div class="input-field note-form__title">
            <input
                name="title" 
                placeholder="My note"
                id="note_title"
                type="text" 
                class="validate">
            <label for="note_title">Title</label>
        </div>
        <div class="input-field note-form__text">
            <textarea
                name="text"
                id="user_note"
                class="materialize-textarea"></textarea>
            <label for="user_note">Take a note!</label>
        </div>
        <input value="<?php echo $_SESSION['u_id']; ?>" type="hidden" name="user_id">
        <div class="note-form__btns">
            <button class="btn waves-effect waves-light note-form__submit" type="submit" name="submit">Submit
                <i class="material-icons right">send</i>
            </button>
            <button class="btn waves-effect waves-light note-form__cancel" type="button">Cancel
                <i class="material-icons right">cancel</i>
            </button>
        </div>
    </div>
</form>
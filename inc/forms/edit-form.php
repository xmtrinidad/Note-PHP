<form action="config/edit-note.config.php" method="POST" class="container">
    <div class="input-field">
        <input
            name="edit_title"
            id="edit_title"
            type="text" 
            class="validate card-modal__title">
        <label for="edit_title">Title</label>
    </div>
    <div class="input-field">
        <textarea
            name="edit_text"
            id="user_edit"
            class="materialize-textarea card-modal__text"></textarea>
        <label for="user_edit">Edit Note!</label>
    </div>
    <input type="hidden" name="note_id" class="card-modal__id">
    <div class="modal-footer">
        <button type="submit" name="submit_edit" class="modal-action modal-close waves-effect waves-green btn-flat">Done</button>
    </div>
</form>
<form method="POST" action="config/delete-note.config.php">
    <div class="modal-content">
        <h5>Delete note</h5>
        <p>Are you sure you want to delete this note?  You won't be able to restore it once it is deleted.</p>
    </div>
    <div class="modal-footer">
        <input type="hidden" name="note_id" class="card-modal__id">
        <button type="submit" name="submit_delete" class="modal-action modal-close waves-effect waves-green btn-flat red-text">Delete</button>
        <button type="button" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</button>
    </div>
</form>
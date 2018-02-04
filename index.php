<?php
    session_start();
    if (!isset($_SESSION['u_id'])) {
        header("Location: landing.php");
        exit();
    } else {
        include('config/dbh.config.php');
        $user_id = $_SESSION['u_id'];

        $sql = "SELECT * FROM notes WHERE user_id = ?;";
        // Prepared statements
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        
        $result = $stmt->get_result();
        // Put result data into $notes array
        while ($data = $result->fetch_assoc()) {
            $notes[] = $data;
        }
    }
?>

<?php include_once('inc/header.php'); ?>
        
    <main class="main container">

        <!-- Add Note Form -->

        <?php include('inc/forms/note-form.php'); ?>
        
        <!-- /Add Note Form -->

        <!-- Note Cards -->
        <div class="notes row">
            <?php foreach ($notes as $note): ?>
                <div id="<?php echo $note['note_id']; ?>" class="card blue-grey darken-1">
                    <a id="modal1" href="#card-modal" class="modal-trigger"></a>
                    <div class="card-content white-text">
                        <span class="card-title"><?php echo $note['note_title']; ?></span>
                        <p class="card-text"><?php echo $note['note_text']; ?></p>
                    </div>
                    <div class="card-action">
                        <a href="#delete-modal" class="modal-trigger">Delete</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- /Note Cards -->

        <!-- Edit Form Modal -->
        <div id="card-modal" class="modal card-modal">

            <?php include('inc/forms/edit-form.php'); ?>

        </div>
        <!-- /Edit Form Modal -->

        <!-- Delete Form Modal -->
        <div id="delete-modal" class="modal delete-modal">

            <?php include('inc/forms/delete-form.php'); ?>

        </div>
        <!-- /Delete Form Modal -->

    </main>

    
    
<?php include_once('inc/footer.php'); ?>
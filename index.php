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

    <?php include('inc/forms/note-form.php'); ?>

    <div class="notes row">
        <?php foreach ($notes as $note): ?>
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title"><?php echo $note['note_title']; ?></span>
                    <p><?php echo $note['note_text']; ?></p>
                </div>
                <div class="card-action">
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    </main>

    
    
<?php include_once('inc/footer.php'); ?>
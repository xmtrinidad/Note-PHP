<?php
    session_start();
    if (!isset($_SESSION['u_id'])) {
        header("Location: landing.php");
        exit();
    }
?>

<?php include_once('inc/header.php'); ?>
        
    <main class="main container">

    <?php include('inc/forms/note-form.php'); ?>

    </main>

    
    
<?php include_once('inc/footer.php'); ?>
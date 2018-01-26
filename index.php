<?php include_once('inc/header.php'); ?>

    <section class="container">
        <h2 class="center-align">Home</h2>
        <?php
            if (isset($_SESSION['u_id'])) {
                echo "You are logged in!";
            }
        ?>
    </section>
    
<?php include_once('inc/footer.php'); ?>
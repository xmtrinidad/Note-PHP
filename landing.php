<?php include_once('inc/header.php'); ?>

<main class="container">
    <?php if (isset($_GET['signup']) && $_GET['signup'] === 'success'): ?>
        <p class="signup-msg teal accent-2 center">Sign-up successful!  Login with your credentials to get started.</p>
    <?php endif; ?>
    <h1 class="center">PHP Note</h1>
    <p class="flow-text">A simple note taking application to practice various web development concepts.  Checkout the <a href="https://github.com/xmtrinidad/Note-PHP/blob/master/README.md">Readme</a> for development notes.</p>
    <div>
        <p class="flow-text">Login or register to get started!</p>
        <a href="#login-modal" class="modal-trigger btn"><i class="medium material-icons left">account_circle</i>Get Started</a>
    </div>
</main>


<?php include_once('inc/footer.php'); ?>
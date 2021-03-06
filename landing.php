

<?php include_once('inc/header.php'); ?>

<main class="container landing">
    <h1 class="center">PHP Note</h1>
    <p class="flow-text">A simple note taking application to practice various web development concepts.  Checkout the <a href="https://github.com/xmtrinidad/Note-PHP/blob/master/README.md">Readme</a> for development notes.</p>
    <div class="center">
        <p class="flow-text">Login or register to get started!</p>
        <a href="#login-modal" class="modal-trigger btn"><i class="medium material-icons left">account_circle</i>Get Started</a>
    </div>
    <!-- Error Message -->
    <?php if (loginMsg()): ?>
        <div class="error-msg <?php echo loginMsg()[1]; ?> white-text">
            <p><?= loginMsg()[0]; ?></p>
        </div>
    <?php endif; ?>
    <!-- /Error Message -->
    <hr>
    <!-- Note Cards -->
    <div class="notes row landing-examples">
        <?php for ($i = 1; $i <= 4; $i++): ?>
            <div class="card blue-grey darken-1">
                <a id="modal<?php echo $i; ?>" href="#card-modal" class="modal-trigger"></a>
                <div class="card-content white-text">
                    <span class="card-title">Example Note</span>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor exercitationem facere fugiat pariatur porro provident quis repellendus repudiandae sequi similique.</p>
                </div>
                <div class="card-action">
                    <a href="#delete-modal" class="modal-trigger">Delete</a>
                </div>
            </div>
        <?php endfor; ?>

    </div>
    <!-- /Note Cards -->


</main>


<?php include_once('inc/footer.php'); ?>
<?php
    $msg = '';
    if (isset($_GET['signup']) && $_GET['signup'] === 'usertaken') {
        $msg = 'Username taken.  Choose a different username.';
    } else if (isset($_GET['signup']) && $_GET['signup'] === 'empty') {
        $msg = 'Please fill in all fields.';
    } else if (isset($_GET['signup']) && $_GET['signup'] === 'email') {
        $msg = 'Invalid email';
    }
?>

<?php include_once('inc/header.php'); ?>

    <main class="container">

        <h2 class="center-align">Signup</h2>
        <?php if ($msg != ''): ?>
            <div class="error-msg red white-text">
                <p><?= $msg; ?></p>
            </div>
        <?php endif; ?>
        <form class="signup-form" action="config/signup.config.php" method="POST">
            <div class="row">
                <div class="input-field col m6 s12">
                    <input name="first" id="first_name" type="text" class="validate">
                    <label for="first_name">First Name</label>
                </div>
                <div class="input-field col m6 s12">
                    <input name="last" id="last_name" type="text" class="validate">
                    <label for="last_name">Last Name</label>
                </div>
                <div class="input-field col m6 s12">
                    <input name="email" id="email" type="text" class="validate">
                    <label for="email">E-mail</label>
                </div>
                <div class="input-field col m6 s12">
                    <input name="uid" id="username" type="text" class="validate">
                    <label for="username">Username</label>
                </div>
                <div class="input-field col offset-m3 m6 s12">
                    <input name="pwd" id="user_pw" type="password" class="validate">
                    <label for="user_pw">Password</label>
                </div>
            </div>
            <div class="center-align">
                <button class="btn waves-effect waves-light" type="submit" name="submit">Sign Up
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </main>
    
<?php include_once('inc/footer.php'); ?>
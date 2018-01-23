<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/modals.css">
    <title>Note App</title>
</head>
<body>
    <header>
        <nav>
            <div class="nav-wrapper">
                <a href="index.php" class="brand-logo left">PHP Note</a>
                <ul id="nav-mobile" class="right">
                <li><a href="#login-modal" class="modal-trigger"><i class="material-icons left">account_circle</i>Log In</a></li>
                </ul>
            </div>
        </nav>
        <!-- Login Modal -->
        <div id="login-modal" class="modal">
            <h4 class="modal__title">Login</h4>
            <form>
                <div class="modal-content">
                    <div class="input-field">
                        <input name="uid" id="username" type="text" class="validate">
                        <label for="username">Username/e-mail</label>
                    </div>
                    <div class="input-field">
                        <input name="pwd" id="username" type="password" class="validate">
                        <label for="username">Password</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">Login</button>
                    <a href="signup.php" class="modal-action modal-close waves-effect waves-green btn-flat">Sign Up</a>
                </div>
            </form>
        </div>
    </header>
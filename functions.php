<?php

function signUpMsg() {
    if (isset($_GET['signup'])) {
        $msg = $_GET['signup'];
        $msg === 'usertaken' && $msg = 'Username taken.';
        $msg === 'empty' && $msg = 'Please fill in all fields.';
        $msg === 'invalid' && $msg = 'Invalid First/Last name.  Upper and lowercase letters only.';
        $msg === 'email' && $msg = 'Invalid email.';
        return $msg;
    }
}

function loginMsg() {
    $msg = '';
    $msgColor = 'red';
    if (isset($_GET['signup'])) {
        if ($_GET['signup'] === 'success') {
            $msg = 'Sign-up successful!  Login with your credentials to get started.';
            $msgColor = 'green';
            return array($msg, $msgColor);
        }
    } else if (isset($_GET['login'])) {
        $_GET['login'] === 'empty' && $msg = 'Login unsuccessful.  Empty fields.';
        $_GET['login'] === 'error' && $msg = 'Invalid Credentials.  Please try again.';
        return array($msg, $msgColor);
    }
}
<?php

if (isset($_POST['submit'])) {
    session_start(); // required to destroy session
    session_unset(); // Unset session variables in browser 
    session_destroy();
    header("Location: ../index.php");
    exit();
}
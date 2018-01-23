<?php

if (isset($_POST['submit'])) {

    include_once('dbh.config.php');

    $first = mysqli_real_escape_string($mysqli, $_POST['first']);
    $last = mysqli_real_escape_string($mysqli, $_POST['last']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $uid = mysqli_real_escape_string($mysqli, $_POST['uid']);
    $pwd = mysqli_real_escape_string($mysqli, $_POST['pwd']);

    //Error handlers
    //Check for empty fields
    if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
        header("Location: ../signup.php?signup=empty");
        exit();
    } else {
        //Check if input characters are valid
        if (!preg_match("/^[a-zA-Z]*$", $first) || !preg_match("/^[a-zA-Z]*$", $last)) {
            header("Location: ../signup.php?signup=invalid");
            exit();
        } else {
            
        }
    }

} else {
    header("Location: ../signup.php");
    exit();
}
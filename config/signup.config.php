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
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
            header("Location: ../signup.php?signup=invalid");
            exit();
        } else {
            // Check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../signup.php?signup=email");
                exit();
            } else {
                $sql = "SELECT * FROM users WHERE user_uid = ?";

                // Prepared statements
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param('s', $uid);
                $stmt->execute();

                // Store result to get number of rows
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    header("Location: ../signup.php?signup=usertaken");
                    exit();
                } else {
                    //Hashing the password
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

                    //Insert the user into the database
                    $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, 
                    user_pwd) VALUES (?, ?, ?, ?, ?);";
                    
                    // Prepared statements
                    $stmt = $mysqli->prepare($sql);
                    $stmt->bind_param('sssss', $first, $last, $email, $uid, $hashedPwd);
                    $stmt->execute();

                    header("Location: ../landing.php?signup=success");
                    exit();
                }
            }
        }
    }

} else {
    header("Location: ../signup.php");
    exit();
}
<?php

session_start();

if (isset($_POST['submit'])) {
    include('dbh.config.php');

    $uid = htmlspecialchars($_POST['uid']);
    $pwd = htmlspecialchars($_POST['pwd']);

    //Error Handlers
    //Check if inputs are empty
    if (empty($uid) || empty($pwd)) {
        header("Location: ../landing.php?login=empty");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE user_uid = ? OR user_email = ?";

        // Prepared statements
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ss', $uid, $uid);
        $stmt->execute();

        // Store result to get number of rows
        $result = $stmt->get_result();
        if ($result->num_rows < 1) {
            header("Location: ../landing.php?login=error");
            exit();
        } else {
            if ($row = $result->fetch_assoc()) {
                //De-hashing the password
                $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
                if ($hashedPwdCheck == false) {
                    header("Location: ../landing.php?login=error");
                    exit();
                } elseif ($hashedPwdCheck == true) {
                    //Log in the user here
                    $_SESSION['u_id'] = $row['user_id'];
                    $_SESSION['u_first'] = $row['user_first'];
                    $_SESSION['u_last'] = $row['user_last'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_uid'] = $row['user_uid'];
                    header("Location: ../index.php?login=success");
                    exit();
                }
            }
        }
    }
} else {
    header("Location: ../landing.php?login=error");
    exit();
}
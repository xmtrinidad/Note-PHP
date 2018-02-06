<?php

    if (isset($_POST['submit'])) {
        include_once('dbh.config.php');
        $title = htmlspecialchars($_POST['title']);
        $text = htmlspecialchars($_POST['text']);
        $user_id = htmlspecialchars($_POST['user_id']);

        $sql = "INSERT INTO notes(note_title, note_text, user_id)
                VALUES (?, ?, ?);";

        // Prepared statements
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ssi', $title, $text, $user_id);
        $stmt->execute();
        header("Location: ../index.php");
    } else {
        header("Location: ../index.php");
        exit();
    }
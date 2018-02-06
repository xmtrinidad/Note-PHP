<?php

if (isset($_POST['submit_edit'])) {
    session_start();

    $title = htmlspecialchars($_POST['edit_title']);
    $text = htmlspecialchars($_POST['edit_text']);
    $note_id = htmlspecialchars($_POST['note_id']);
    $user_id = htmlspecialchars($_SESSION['u_id']);

    if (empty($text)) {
        header("Location: ../index.php");
        exit();
    } else {
        include_once('dbh.config.php');
        
        $sql = "UPDATE notes 
                SET 
                    note_title = ?,
                    note_text = ?,
                    user_id = ?
                WHERE note_id = ?";

        // Prepared statements
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ssii', $title, $text, $user_id, $note_id);
        $stmt->execute();
        header("Location: ../index.php");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}
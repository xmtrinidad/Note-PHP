<?php

    if (isset($_POST['submit_delete'])) {
        include_once('dbh.config.php');
        $note_id = $_POST['note_id'];

        $sql = "DELETE FROM notes WHERE note_id = ?;";

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('i', $note_id);
        $stmt->execute();
        header("Location: ../index.php");
        
    } else {
        header("Location: ../index.php");
        exit();
    }
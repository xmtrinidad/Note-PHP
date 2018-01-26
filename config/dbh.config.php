<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "cELrzWbzad3dAHot";
$dbName = "noteapp";

$mysqli = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
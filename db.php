<?php

$host = "db";
$user = "root";
$password = "root";
$database = "hr_chatbot";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Database Connection Failed");
}

?>
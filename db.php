<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "hr_chatbot";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Database Connection Failed");
}

?>
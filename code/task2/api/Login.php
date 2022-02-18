<?php

if (!isset($_POST["surname"]) || !isset($_POST["name"]) || !isset($_POST["age"])) {
    http_response_code(400);
    echo "Bad Request";
    return;
}

if (!session_start()) {
    http_response_code(500);
    echo "Internal Server Error";
    return;
}

$_SESSION["surname"] = $_POST["surname"];
$_SESSION["name"] = $_POST["name"];
$_SESSION["age"] = $_POST["age"];

header("Refresh:3; url=../login_screen.php");
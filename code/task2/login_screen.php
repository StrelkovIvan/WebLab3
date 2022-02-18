<?php

if (!session_start()) {
    http_response_code(500);
    echo "Internal Server Error";
    return;
}

if (!isset($_SESSION["surname"]) || !isset($_SESSION["name"]) || !isset($_SESSION["age"])) {
    http_response_code(401);
    echo "Unauthorized";
    return;
}


echo "Hello ".$_SESSION['age']." year's old ".$_SESSION['name']." ".$_SESSION['surname'];
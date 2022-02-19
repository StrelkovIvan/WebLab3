<?php

if (!session_start()) {
    http_response_code(500);
    echo "Internal Server Error";
    return;
}





function buildResponse(): string {
    $response = "<ul>";
    $session = $_SESSION;
    array_pop($session);
    
    foreach ($session as $k => $v)
        $response .= "<li>" . $k . "=" . $v;

    $response .= "</ul>";

    return $response;
}

echo buildResponse();

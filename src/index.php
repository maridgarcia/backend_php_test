<?php
    require("classes.php");
    require("booking.php");

    $method = $_SERVER["REQUEST_METHOD"];
    $path = $_SERVER["PATH_INFO"];

    switch ($path) {
        case '/classes':
            if ($method === 'POST') {
                createClasses();
            } else if($method === 'GET') {
                getAll();
            } else {
                respondNotFound();
            }
            break;
        case '/bookings':
            if ($method === 'POST') {
                bookClass();
            } else {
                respondNotFound();
            }
            break;

        default:
            pageNotFound();
            break;
    }

    function pageNotFound() {
        http_response_code(404);
        echo json_encode(["error" => "Page not found"]);
    }

?>
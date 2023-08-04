<?php
require("classes.php");


$method = $_SERVER["REQUEST_METHOD"];
$path = $_SERVER["PATH_INFO"];

if($path === "/classes") {
    createClasses();
} else {
    echo json_encode(["error" => "Path Not Found"]);
}
?>
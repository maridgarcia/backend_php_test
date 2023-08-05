<?php
    session_start();

    $classes = $_SESSION['classes'] ?? [];

    function createClasses() 
    {
        global $classes;
    
        $data = json_decode(file_get_contents("php://input"), true);
    
        if (empty($data["class_name"]) || empty($data["start_date"]) || empty($data["end_date"]) || empty($data["capacity"])) {
            http_response_code(400);
            echo json_encode(["error" => "Check your payload. All fields are required!"]);
            return;
        } 
    
        $classes[] = $data;
        $_SESSION['classes'] = $classes;
    
        http_response_code(201);
        echo json_encode($classes);
    }
?>
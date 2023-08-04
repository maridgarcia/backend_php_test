<?php
    $classes = [];

    function createClasses() 
    {
        global $classes;

        $data = json_decode(file_get_contents("php://input"), true);

        if(empty($data["class_name"]) || empty($data["start_date"]) || empty($data["end_date"]) || empty($data["capacity"])) {
            http_response_code(400);
            echo json_encode(["error" => "Check your payload. All fields are required!"]);
            return;
        } 
        
            http_response_code(201);
            $classes = $data;
            echo json_encode($classes);
    }
?>
<?php
    $allBookedClasses = $_SESSION['booked_classes'] ?? [];
    function findClassIndex($className, $classes) {
        foreach ($classes as $index => $class) {
            if ($class['class_name'] === $className) {
                return $index;
            }
        }
        return false;
    }

    function bookClass()
    {
        global $classes;
        $data = json_decode(file_get_contents("php://input"), true);

        if(empty($data["class_name"]) ||empty($data["name"]) || empty($data["date"])) {
            http_response_code(400);
            echo json_encode(["error" => "Check your payload. All fields are required!"]);
            return;
        }

        $className = $data["class_name"];
        $class = findClassIndex($className, $classes);

        if ($class !== false) {
            $classes[$class]['bookings'] += 1;

            $allBookedClasses[] = $data;

            $_SESSION['classes'] = $classes;
            $_SESSION['booked_classes'] = $allBookedClasses;

            http_response_code(200);
            echo json_encode(["message" => "Class booked successfully"]);
            echo json_encode($allBookedClasses);
        } else {
            http_response_code(404);
            echo json_encode(["error" => "Class not found"]);
            return;
        }

    }
?>
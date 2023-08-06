<?php
    require "./src/classes.php";
    use PHPUnit\Framework\TestCase;
    use GuzzleHttp\Client;

    class CreateClassTest extends TestCase {
        public function testCreateClasses() {
            // Prepare the input data for the test
            $data = [
                "class_name" => "yoga",
                "start_date" => "2023-08-06",
                "end_date" => "2023-08-06",
                "capacity" => 10
            ];

            // Initialize the Guzzle HTTP client
            $client = new Client();

            // Make the POST request to the API endpoint
            $response = $client->post('http://localhost:8000/classes', [
                'json' => $data
            ]);

            // Assert the HTTP status code is 201 Created
            $this->assertEquals(201, $response->getStatusCode());
        }

        // public function testCreateClassesError() {
        //     $dataMissingOneField = [
        //         "start_date" => "2023-08-06",
        //         "end_date" => "2023-08-06",
        //         "capacity" => 10
        //     ];

        //     $client = new Client();

        //     $response = $client->post('http://localhost:8000/classes', [
        //         'json' => $dataMissingOneField
        //     ]);

        //     $this->assertEquals(400, $response->getStatusCode());
        // }
    }
?>
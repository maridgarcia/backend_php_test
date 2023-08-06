<?php
    require_once "./src/booking.php";
    use PHPUnit\Framework\TestCase;
    use GuzzleHttp\Client;

    class CreateBookingTest extends TestCase {
        public function testCreateBooking() {
            $data = [
                "class_name" => "yoga",
                "date" => "2023-08-06",
                "name" => "john doe"
            ];

            $client = new Client();
 
            $response = $client->post('http://localhost:8000/bookings', [
                'json' => $data
            ]);

            $this->assertEquals(201, $response->getStatusCode());
        }
    }
?>
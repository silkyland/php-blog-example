<?php
require_once '../classes/connect.php';

class Banner
{
    function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function banners()
    {
        $banners = [];

        $sql = "SELECT * FROM banners";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $banners[] = $row;
        }

        return $this->response($banners);
    }

    private function response($data)
    {
        // response json data
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

$banner = new Banner($conn);
$banner->banners();

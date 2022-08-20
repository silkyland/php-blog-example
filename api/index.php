<?php
require_once '../classes/connect.php';

$banners = [];

$sql = "SELECT * FROM banners";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $banners[] = $row;
}

$posts = [];
$sql = "SELECT * FROM posts";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $posts[] = $row;
}


$data = [
    'banners' => $banners,
    'posts' => $posts
];


// response json data
header('Content-Type: application/json');
echo json_encode($data);

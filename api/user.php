<?php
require_once '../classes/connect.php';

function response($data)
{
    header('Content-Type: application/json');
    echo json_encode($data);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
    response($user);
    exit();
}

$users = [];
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}
response($users);


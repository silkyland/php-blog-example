<!-- store user .php -->
<?php

session_start();
require_once '../../classes/connect.php';
require_once '../../classes/core.php';

// is not admin
if ($_SESSION['user']['role'] != 'admin') {
    header('Location: /admin/user');
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

$img_name = 'https://via.placeholder.com/150';

// if avatar is not empty
if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
    $upload = new Upload('avatar');
    $img_name = $upload->upload($_FILES['avatar']);
}

$sql = "INSERT INTO users (name, email, password, role, avatar) VALUES ('$name', '$email', '$password', '$role', '$img_name')";
$result = $connect->query($sql);

if ($result) {
    // flash message
    $_SESSION['flash'] = [
        'type' => 'success',
        'message' => 'User created'
    ];
    header('Location: /admin/user');
} else {
    // flash message
    $_SESSION['flash'] = [
        'type' => 'danger',
        'message' => 'User not created'
    ];
    header('Location: /admin/user');
}

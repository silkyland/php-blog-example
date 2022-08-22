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

// if avatar is not empty
if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
    $upload = new Upload('avatar');
    $img_name = $upload->upload($_FILES['avatar']);
}



<!-- delete.php -->
<?php
session_start();
require_once '../../classes/connect.php';

// is user -> role = admin
if ($_SESSION['user']['role'] != 'admin') {
    header('Location: /admin/user');
}

// if ! get id
if (!isset($_GET['id'])) {
    header('Location: /admin/user');
}

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id = $id";
$result = $conn->query($sql);

if ($result) {
    // flash
    $_SESSION['flash'] = [
        'type' => 'success',
        'message' => 'ลบผู้ใช้งานเรียบร้อยแล้ว'
    ];
} else {
    // flash
    $_SESSION['flash'] = [
        'type' => 'danger',
        'message' => 'ไม่สามารถลบผู้ใช้งานได้'
    ];
}

header('Location: /admin/user');

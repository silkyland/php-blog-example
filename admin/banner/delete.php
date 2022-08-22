<?php
session_start();
// is admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    // clear all session
    session_unset();
    // destroy session
    session_destroy();
    header('Location: /admin/login');
    exit;
}

require_once '../../classes/core.php';

// delete banner
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM banners WHERE id = $id";
    if ($conn->query($sql)) {
        $_SESSION['flash'] = [
            'type' => 'success',
            'message' => 'ลบสำเร็จ'
        ];
    } else {
        $_SESSION['flash'] = [
            'type' => 'danger',
            'message' => 'เกิดข้อผิดพลาด' . mysqli_error($conn)
        ];
    }
    header('Location: /admin/banner');
    exit;
}

<?php
session_start();
require_once '../../classes/core.php';

// if method != post, redirect to index
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: /admin/banner');
}

$name = $_POST['name'];
$link = $_POST['link'];
$image = $_FILES['image'];

// validate image must be uploaded
if ($image['error'] === UPLOAD_ERR_OK) {
    $upload = new Upload('banner');
    $uploaded_image = $upload->upload($image);
} else {
    $_SESSION['flash'] = [
        'type' => 'danger',
        'message' => 'กรุณาเลือกรูปภาพ'
    ];
    header('Location: /admin/banner/create');
    exit;
}

// validate name must be filled
if (empty($name)) {
    $_SESSION['flash'] = [
        'type' => 'danger',
        'message' => 'กรุณากรอกชื่อ'
    ];
    header('Location: /admin/banner/create');
    exit;
}

if ($uploaded_image) {

    $sql = "INSERT INTO banners (name, link, image) VALUES ('$name', '$link', '$uploaded_image')";

    if ($conn->query($sql)) {
        $_SESSION['flash'] = [
            'type' => 'success',
            'message' => 'บันทึกสำเร็จ'
        ];

        header('Location: /admin/banner');
    } else {
        $_SESSION['flash'] = [
            'type' => 'danger',
            'message' => 'เกิดข้อผิดพลาด' . mysqli_error($conn)
        ];

        header('Location: /admin/banner/create.php');
    }
} else {
    $_SESSION['flash'] = [
        'type' => 'danger',
        'message' => 'เกิดข้อผิดพลาด'
    ];
    header('Location: /admin/banner/create');
    exit;
}

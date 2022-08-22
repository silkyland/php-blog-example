<!-- update banner -->
<?php
session_start();

require_once '../../classes/core.php';

// is not admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header('Location: /login.php');
    exit;
}

// is not $_GET['id']
if (!isset($_GET['id'])) {
    header('Location: /admin/banner/index.php');
    exit;
}

// find existing banner
$id = $_GET['id'];
$query = "SELECT * FROM banners WHERE id = $id";
$result = $conn->query($query);
$banner = $result->fetch_assoc();

$file_name = $banner['image'];

// if has file image
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $upload = new Upload('banner');
    $file_name = $upload->upload($_FILES['image']);
}


// update banner
$query = "UPDATE banners SET image = '$file_name', name = '{$_POST['name']}', link = '{$_POST['link']}' WHERE id = $id";
$result = $conn->query($query);

if ($result) {
    $_SESSION['flash'] = [
        'type' => 'success',
        'message' => 'แก้ไข banner เรียบร้อยแล้ว'
    ];
} else {
    $_SESSION['flash'] = [
        'type' => 'danger',
        'message' => 'ไม่สามารถแก้ไข banner ได้'
    ];
}

// redirect to index
header('Location: /admin/banner/index.php');

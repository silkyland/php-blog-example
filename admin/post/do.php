<?php
session_start();
require_once '../../classes/connect.php';

class PostService
{
    function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function create($post)
    {
        if (!isset($post['title']) || !isset($post['content']) || !isset($post['category_id'])) {
            $_SESSION['flash'] = [
                'type' => 'danger',
                'message' => 'กรุณากรอกข้อมูลให้ครบถ้วน'
            ];
            header('Location: /admin/post/create.php');
            exit;
        }
        $user_id = $_SESSION['user']['id'];

        $sql = "INSERT INTO posts (title, content, user_id, category_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ssii', $post['title'], $post['content'], $user_id, $post['category_id']);
        $stmt->execute();
        $stmt->close();

        $_SESSION['flash'] = [
            'type' => 'success',
            'message' => 'บันทึกข้อมูลเรียบร้อย'
        ];
        header('Location: /admin/post/index.php');
    }
}

$post = new PostService($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['create'])) {

    if (isset($_FILES['thumbnail']) && file_exists($_FILES['thumbnail']['tmp_name'])) {
        $thumbnail = $_FILES['thumbnail'];
        $thumbnail_name = $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_size = $thumbnail['size'];
        $thumbnail_error = $thumbnail['error'];
        $thumbnail_type = $thumbnail['type'];
        $thumbnail_ext = explode('.', $thumbnail_name);
        $thumbnail_ext = strtolower(end($thumbnail_ext));
        $thumbnail_allowed_ext = ['jpg', 'jpeg', 'png'];
        $thumbnail_new_name = uniqid('', true) . '.' . $thumbnail_ext;
        $thumbnail_destination = '../../uploads/' . $thumbnail_new_name;

        // upload
        if ($thumbnail_error === 0) {
            if ($thumbnail_size > 1000000) {
                $_SESSION['flash'] = [
                    'type' => 'danger',
                    'message' => 'ขนาดไฟล์ใหญ่เกินไป'
                ];
                header('Location: /admin/post/create.php');
                exit;
            }
            if (!in_array($thumbnail_ext, $thumbnail_allowed_ext)) {
                $_SESSION['flash'] = [
                    'type' => 'danger',
                    'message' => 'ชนิดไฟล์ไม่ถูกต้อง'
                ];
                header('Location: /admin/post/create.php');
                exit;
            }
            if (move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination)) {
                $thumbnail_destination = '/uploads/' . $thumbnail_new_name;
            } else {
                $_SESSION['flash'] = [
                    'type' => 'danger',
                    'message' => 'ไม่สามารถอัพโหลดไฟล์ได้'
                ];
                header('Location: /admin/post/create.php');
                exit;
            }
        } else {
            $_SESSION['flash'] = [
                'type' => 'danger',
                'message' => 'ไม่สามารถอัพโหลดไฟล์ได้'
            ];
            header('Location: /admin/post/create.php');
            exit;
        }
    }

    $post->create([
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'category_id' => $_POST['category_id'],
        'thumbnail' => $thumbnail_destination ?? null,
    ]);
}

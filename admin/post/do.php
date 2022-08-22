<?php
session_start();
require_once '../../classes/connect.php';
require_once '../../classes/upload.php';
require_once '../../classes/helper.php';

class PostService
{
    function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function create()
    {
        if (isset($_FILES['thumbnail']) && file_exists($_FILES['thumbnail']['tmp_name'])) {
            $upload = new Upload('posts');
            $file_name = $upload->upload($_FILES['thumbnail']);
            $thumbnail = $file_name;
        }
        if (
            !isset($_POST['title']) || $_POST['title'] == '' ||
            !isset($_POST['content']) || $_POST['content'] == '' ||
            !isset($_POST['category_id']) || $_POST['category_id'] == ''
        ) {

            $_SESSION['flash'] = [
                'type' => 'danger',
                'message' => 'กรุณากรอกข้อมูลให้ครบถ้วน'
            ];
            header('Location: /admin/post/create.php');
            exit;
        }
        $user_id = $_SESSION['user']['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category_id = $_POST['category_id'];
        $thumbnail = isset($thumbnail) ? $thumbnail : 'https://via.placeholder.com/600x400';

        $sql = "INSERT INTO posts (title, thumbnail, content, user_id, category_id) VALUES ('$title', '$thumbnail', '$content', $user_id, $category_id)";
        $result = $this->conn->query($sql);


        $_SESSION['flash'] = [
            'type' => 'success',
            'message' => 'บันทึกข้อมูลเรียบร้อย'
        ];
        header('Location: /admin/post/index.php');
    }

    // delete
    public function delete()
    {
        if (!isset($_GET['id'])) {
            $_SESSION['flash'] = [
                'type' => 'danger',
                'message' => 'กรุณากรอกข้อมูลให้ครบถ้วน'
            ];
            header('Location: /admin/post/index.php');
            exit;
        }
        $id = $_GET['id'];

        // delete thumbnail is not url
        $sql = "SELECT thumbnail FROM posts WHERE id = $id";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();

        $sql = "DELETE FROM posts WHERE id = $id";
        $result = $this->conn->query($sql);
        $_SESSION['flash'] = [
            'type' => 'success',
            'message' => 'ลบข้อมูลเรียบร้อย'
        ];
        header('Location: /admin/post/index.php');
    }

    // update
    public function update()
    {
        if (!isset($_GET['id'])) {
            $_SESSION['flash'] = [
                'type' => 'danger',
                'message' => 'กรุณากรอกข้อมูลให้ครบถ้วน'
            ];
            header('Location: /admin/post/index.php');
            exit;
        }
        $id = $_GET['id'];
        $sql = "SELECT * FROM posts WHERE id = $id";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $content = $row['content'];
        $category_id = $row['category_id'];
        $thumbnail = $row['thumbnail'];
        $user_id = $row['user_id'];

        // validate
        if (
            !isset($_POST['title']) || $_POST['title'] == '' ||
            !isset($_POST['content']) || $_POST['content'] == '' ||
            !isset($_POST['category_id']) || $_POST['category_id'] == ''
        ) {
            $_SESSION['flash'] = [
                'type' => 'danger',
                'message' => 'กรุณากรอกข้อมูลให้ครบถ้วน'
            ];
            header('Location: /admin/post/update.php?id=' . $id);
            exit;
        }

        if (isset($_FILES['thumbnail']) && file_exists($_FILES['thumbnail']['tmp_name'])) {
            $upload = new Upload('posts');
            $file_name = $upload->upload($_FILES['thumbnail']);
            $thumbnail = $file_name;
        }

        $sql = "UPDATE posts SET title = '$title', thumbnail = '$thumbnail', content = '$content', category_id = $category_id, user_id = $user_id, updated_at = NOW() WHERE id = $id";
        $result = $this->conn->query($sql);
        $_SESSION['flash'] = [
            'type' => 'success',
            'message' => 'อัพเดทข้อมูลเรียบร้อย'
        ];
        header('Location: /admin/post/index.php');
    }
}


$post = new PostService($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['create'])) {
    $post->create($_POST);
}

// delete
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete'])) {
    $post->delete();
}

// update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['update'])) {
    $post->update();
}

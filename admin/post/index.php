<?php
session_start();
require_once '../../classes/connect.php';
require_once '../layout/header.php';

$title = "จัดการข่าว";

?>
<div class="container">
    <div class="h-5 d-flex ps-1 align-items-center justify-content-between">
        <h1 class="text-2xl font-bold text-gray-800">
            <?php echo $title; ?>
        </h1>
        <a href="/admin/post/create.php" class="btn btn-primary ">+ เพิ่มข่าวสาร</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>หัวข้อ</th>
                <th>หมวดหมู่</th>
                <th>ผู้เขียน</th>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT *, c.name c_name, u.name u_name FROM posts p LEFT JOIN users u ON p.user_id = u.id LEFT JOIN categories c ON p.category_id = c.id";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo '<pre>';
                die(var_dump($row));
                echo '</pre>';
            ?>
                <!-- <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['c.name']; ?></td>
                    <td><?php echo $row['u.name']; ?></td>
                    <td>
                        <a href="/admin/post/edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">แก้ไข</a>
                        <a href="/admin/post/do.php?delete=1&id=<?php echo $row['id']; ?>" class="btn btn-danger">ลบ</a>
                    </td>
                </tr> -->
            <?php } ?>
        </tbody>
    </table>
</div>

<?php
require_once '../layout/footer.php';

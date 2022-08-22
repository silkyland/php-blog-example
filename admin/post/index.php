<?php
session_start();
require_once '../../classes/core.php';
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
    <!-- if has flash -->
    <?php if (isset($_SESSION['flash'])) : ?>
        <div class="alert alert-<?php echo $_SESSION['flash']['type']; ?>">
            <?php echo $_SESSION['flash']['message']; ?>
            <?php unset($_SESSION['flash']); ?>
        </div>
    <?php endif; ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>thumbnail</th>
                <th>หัวข้อ</th>
                <th>หมวดหมู่</th>
                <th>ผู้เขียน</th>
                <th class="text-end">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT p.id id, p.thumbnail, p.title, c.name category_name, u.name user_name FROM posts p LEFT JOIN users u ON p.user_id = u.id LEFT JOIN categories c ON p.category_id = c.id";
            $result = $conn->query($sql);
            $i = 1;
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td>
                        <?php if ($row['thumbnail']) : ?>
                            <img src="<?php echo isUrl($row['thumbnail']) ? $row['thumbnail'] : '/uploads/'. $row['thumbnail']; ?>" alt="<?php echo $row['title']; ?>" width="100">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['category_name']; ?></td>
                    <td><?php echo $row['user_name']; ?></td>
                    <td class="text-end">
                        <a href="/admin/post/edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">แก้ไข</a>
                        <a href="/admin/post/do.php?delete=1&id=<?php echo $row['id']; ?>" class="btn btn-danger">ลบ</a>
                    </td>
                </tr>
            <?php
                $i++;
            } ?>
        </tbody>
    </table>
</div>

<?php
require_once '../layout/footer.php';

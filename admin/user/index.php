<?php
session_start();
require_once '../../classes/core.php';


$title = "จัดการผู้ใช้งาน";
require_once '../layout/header.php';

?>
<div class="container">
    <div class="h-5 d-flex ps-1 align-items-center justify-content-between">
        <h1 class="text-2xl font-bold text-gray-800">
            <?php echo $title; ?>
        </h1>
        <a href="/admin/user/create.php" class="btn btn-primary ">+ เพิ่มผู้ใช้งาน</a>
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
                <th>ชื่อ</th>
                <th>อีเมล</th>
                <th>สถานะ</th>
                <th class="text-end">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);
            $i = 1;
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    <td class="text-end">
                        <a href="/admin/user/edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">แก้ไข</a>
                        <a href="/admin/user/do.php?delete=1&id=<?php echo $row['id']; ?>" class="btn btn-danger">ลบ</a>
                    </td>
                </tr>
            <?php
                $i++;
            } ?>
        </tbody>
    </table>
</div>

<?php require_once '../layout/footer.php'; ?>
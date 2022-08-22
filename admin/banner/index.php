<?php
session_start();

require_once '../../classes/core.php';

$title = "จัดการแบนเนอร์";

require_once '../layout/header.php';

?>

<div class="container">
    <div class="h-5 d-flex ps-1 align-items-center justify-content-between">
        <h1 class="text-2xl font-bold text-gray-800">
            <?php echo $title; ?>
        </h1>
        <a href="/admin/banner/create.php" class="btn btn-primary ">+ เพิ่ม Banner</a>
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
                <th>รูป</th>
                <th>ชื่อ</th>
                <th>ลิงค์</th>
                <th class="text-end">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM banners";
            $result = $conn->query($sql);
            $i = 1;
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td>
                        <?php if ($row['image']) : ?>
                            <img src="<?php echo isUrl($row['image']) ? $row['image'] : '/uploads/' . $row['image']; ?>" alt="<?php echo $row['title']; ?>" width="100">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['link']; ?></td>
                    <td class="text-end">
                        <a href="/admin/banner/edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">แก้ไข</a>
                        <a href="/admin/banner/delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">ลบ</a>
                    </td>
                </tr>
            <?php
                $i++;
            } ?>
            </thead>
    </table>
</div>
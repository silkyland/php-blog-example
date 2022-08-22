<?php
session_start();
require_once '../../classes/core.php';

$title = "เพิ่ม Banner";
require_once '../layout/header.php';
?>

<div class="container">
    <div class="h-5 d-flex ps-1 align-items-center justify-content-between">
        <h1 class="text-2xl font-bold text-gray-800">
            <?php echo $title; ?>
        </h1>
        <a href="/admin/post" class="btn btn-primary ">
            &lsaquo; ย้อนกลับ</a>
    </div>

    <!-- card > form input image, name, link   -->
    <div class="card">
        <div class="card-body">
            <?php if (isset($_SESSION['flash'])) : ?>
                <div class="alert alert-<?php echo $_SESSION['flash']['type']; ?>">
                    <?php echo $_SESSION['flash']['message']; ?>
                    <?php unset($_SESSION['flash']); ?>
                </div>
            <?php endif; ?>
            <form action="/admin/banner/store.php" method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label class="form-label" for="image">รูปภาพ:</label>
                    <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="name">ชื่อ: </label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="link">ลิงค์ :</label>
                    <input type="text" class="form-control" id="link" name="link">
                </div>
                <button type="submit" class="btn btn-primary" name="create">บันทึก</button>
            </form>
        </div>
    </div>
</div>

<?php
require_once '../layout/footer.php';

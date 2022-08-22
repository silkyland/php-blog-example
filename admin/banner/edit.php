<?php
session_start();
require_once '../../classes/core.php';


require_once '../layout/header.php';

// if ! get id
if (!isset($_GET['id'])) {
    header('Location: /admin/banner');
}

$id = $_GET['id'];


$query = "SELECT * FROM banners WHERE id = $id";

$result = $conn->query($query);
$banner = $result->fetch_assoc();

$title = "แก้ไข banner";

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
            <form action="/admin/banner/update.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <div class="mb-3">
                        <img src="<?php echo isUrl($banner['image']) ? $banner['image'] : '/uploads/' . $banner['image'] ?>" alt="<?php echo $banner['name'] ?>" class="img-fluid" width="250">
                    </div>
                    <label class="form-label" for="image">รูปภาพ:</label>
                    <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="name">ชื่อ: </label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $banner['name'] ?>">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="link">ลิงค์ :</label>
                    <input type="text" class="form-control" id="link" name="link" value="<?php echo $banner['link'] ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="create">บันทึก</button>
            </form>
        </div>
    </div>
</div>

<?php
require_once '../layout/footer.php';

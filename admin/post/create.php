<?php
session_start();
require_once '../../classes/connect.php';
require_once '../layout/header.php';

$title = "เพิ่มข่าวใหม่";

$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
$categories = $result->fetch_all(MYSQLI_ASSOC);

?>
<div class="container">
    <div class="h-5 d-flex ps-1 align-items-center justify-content-between">
        <h1 class="text-2xl font-bold text-gray-800">
            <?php echo $title; ?>
        </h1>
        <a href="/admin/post" class="btn btn-primary ">
            &lsaquo; ย้อนกลับ</a>
    </div>

    <!-- form input thumbnail, title, contente(text), creategory_id (dropdown) -->
    <div class="card">
        <div class="card-body">
            <!-- flash message -->
            <?php if (isset($_SESSION['flash'])) : ?>
                <div class="alert alert-<?php echo $_SESSION['flash']['type']; ?>">
                    <?php echo $_SESSION['flash']['message']; ?>
                    <?php unset($_SESSION['flash']); ?>
                </div>
            <?php endif; ?>
            <form action="/admin/post/do.php?create=1" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label" for="thumbnail">รูปประจำข่าว</label>
                    <input type="file" class="form-control-file" id="thumbnail" name="thumbnail" accept="image/*">

                </div>
                <div class="mb-3">
                    <label class="form-label" for="title">หัวข้อข่าว</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="content">รายละเอียดข่าว</label>
                    <textarea class="form-control" id="content" name="content"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="category_id">หมวดหมู่</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?php echo $category['id']; ?>">
                                <?php echo $category['name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">บันทึก</button>
            </form>
        </div>
    </div>
</div>

<?php
require_once '../layout/footer.php';

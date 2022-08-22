<?php
session_start();
require_once '../../classes/connect.php';

$title = "จัดการผู้ใช้งาน";
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

    <!-- card > form input name, email, password, avatar, role [user,admin] default user -->
    <div class="card">
        <div class="card-body">
            <form action="/admin/user/do.php" method="post">
                <div class="form-group">
                    <label class="form-label" for="avatar">รูปประจำตัว</label>
                    <input type="file" class="form-control mb-3" id="avatar" name="avatar" placeholder="รูปประจำตัว">
                </div>
                <div class="form-group">
                    <label class="form-label" for="name">ชื่อ</label>
                    <input type="text" class="form-control mb-3" id="name" name="name" placeholder="ชื่อ">
                </div>
                <div class="form-group">
                    <label class="form-label" for="email">อีเมล</label>
                    <input type="email" class="form-control mb-3" id="email" name="email" placeholder="อีเมล">
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">รหัสผ่าน</label>
                    <input type="password" class="form-control mb-3" id="password" name="password" placeholder="รหัสผ่าน">
                </div>

                <div class="form-group">
                    <label class="form-label" for="role">สถานะ</label>
                    <select class="form-control mb-3" id="role" name="role">
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">บันทึก</button>
            </form>
        </div>
    </div>
</div>

<?php
require_once '../layout/footer.php';
?>
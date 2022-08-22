<?php

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: /login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'มายเว็บไซต์' ?></title>
    <!-- bootstrap5 cdn -->
    <link href="/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/custom.css" rel="stylesheet">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">WEBSITE</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/admin/post/index.php">จัดการข่าวสาร</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/banner/index.php">จัดการแบนเนอร์</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/user/index.php">จัดการผู้ใช้งาน</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">จัดการกระดานเยี่ยมชม</a>
                        </li>
                    </ul>
                </div>
                <?php if (isset($_SESSION['user'])) : ?>
                    <div>
                        สวัสดี, <?php echo $_SESSION['user']['name']; ?> |
                        <a onclick="return confirm('แน่ใจหรือไม่ที่ต้องการออกจากระบบ');" href="logout.php" class="text-decoration-none">ออกจากระบบ</a>
                    </div>
                <?php endif; ?>
            </div>
        </nav>
    </div>
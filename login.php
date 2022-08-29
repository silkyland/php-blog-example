<?php
session_start();
ob_start();
require_once './classes/connect.php';

$title = "เข้าสู่ระบบ";
require_once './layout/header.php';

$hasError = "";

// redirect if user is already logged in
if (isset($_SESSION['user'])) {
    header('Location: /admin');
}

// if method is post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row) {
        if ($row['password'] == sha1($password)) {
            $_SESSION['user'] = $row;
            header('Location: index.php');
        } else {
            $hasError = 'อีเมลหรือรหัสผ่านไม่ถูกต้อง';
        }
    } else {
        $hasError = 'อีเมลหรือรหัสผ่านไม่ถูกต้อง';
    }
}
?>

<!-- bootstrap login form -->
<div class="container">
    <div class="row mt-4">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    เข้าสู่ระบบ
                </div>
                <div class="card-body">
                    <!-- if hasError -->
                    <?php if ($hasError) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $hasError; ?>
                        </div>
                    <?php endif; ?>
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="mt-2 btn btn-primary">Login</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php

require_once './layout/footer.php';

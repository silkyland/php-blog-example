<?php
session_start();
require_once '../classes/connect.php';
require_once './layout/header.php';

$title = "dashboard";

?>
<div class="container">
    <div class="h-5 border d-flex ps-5 align-items-center">
        <h1 class="text-2xl font-bold text-gray-800">
            <?php echo $title; ?>
        </h1>
        <!-- button float right called "add" -->
       
    </div>
    
</div>

<?php
require_once './layout/footer.php';

<?php
session_start();
require_once './classes/connect.php';

$sql = "SELECT * FROM `banners`";

$result = $conn->query($sql);

include_once './layout/header.php';
?>

<div class="container">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                if ($i == 0) {
                    echo '<div class="carousel-item active">';
                } else {
                    echo '<div class="carousel-item">';
                }
                echo '<img class="d-block w-100" src="' . $row['image'] . '" alt="' . $row['title'] . '">';
                echo '</div>';
                $i++;
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<?php
include_once './layout/footer.php';

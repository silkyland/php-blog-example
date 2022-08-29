<?php
session_start();
require_once './classes/connect.php';
require_once './classes/helper.php';

$sql = "SELECT * FROM `banners`";

$result = $conn->query($sql);
include_once './layout/header.php';
?>

<div class="container">
    <?php if ($result->num_rows > 0) { ?>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $i = 0;
                while ($row = $result->fetch_assoc()) {
                    $img = isUrl($row['image']) ? $row['image'] : '/uploads/' . $row['image'];
                    if ($i == 0) {
                        echo '<div class="carousel-item active">';
                    } else {
                        echo '<div class="carousel-item">';
                    }
                    echo '<img class="d-block w-100" src="' . $img  . '" alt="' . 's' . '">';
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
    <?php } ?>
</div>

<?php
include_once './layout/footer.php';

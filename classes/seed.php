<!-- seed 1 user to table -->
<?php
require_once './connect.php';
if (isset($_GET['user'])) {
    $sql = "INSERT INTO users 
        (avatar, role, name, email, password, created_at, updated_at)
    VALUES ('https://via.placeholder.com/150', 'admin', 'admin', 'admin@gmail.com', '" . sha1('1234') . "' ,
        CURRENT_TIMESTAMP,
        CURRENT_TIMESTAMP
    )";


    $result = $conn->query($sql);

    if ($result) {
        echo 'Inserted 1 user successfully';
    } else {
        echo 'Error: ' . $conn->error;
    }
}


if (isset($_GET['category'])) {
    $data = [
        0 =>  ['name' => 'ประชาสัมพันธ์',],
        1 =>  ['name' => 'กิจกรรม',],
    ];

    foreach ($data as $key => $value) {
        $sql = "INSERT INTO categories 
            (name, created_at, updated_at)
        VALUES ('" . $value['name'] . "', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
        $result = $conn->query($sql);
    }
}

<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = '';
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
    die('Connect Error (' . $conn->connect_errno . ') '
        . $conn->connect_error);
}

?>
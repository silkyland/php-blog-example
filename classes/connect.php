<?php
$dbhost = '127.0.0.1';
$dbuser = 'root';
$dbpass = '1234';
$port = 3306;
$dbname = 'dex';
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $port);
if ($conn->connect_error) {
    die('Connect Error (' . $conn->connect_errno . ') '
        . $conn->connect_error);
}

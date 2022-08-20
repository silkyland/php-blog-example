<?php
$dbhost = 'host.docker.internal';
$dbuser = 'root';
$dbpass = '1234';
$dbname = 'dex';
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
    die('Connect Error (' . $conn->connect_errno . ') '
        . $conn->connect_error);
}

?>
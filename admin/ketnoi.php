<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "webdienthoai";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if ($conn) {
    $setlang = mysqli_query($conn, "SET NAME 'utf8'");
} else {
    die("Kết nối thất bại" . mysqli_connect_errno());
}

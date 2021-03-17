<?php
$host = "localhost";
$user = "root";
$password = "";
$namedb = "webdienthoai";
$conn = mysqli_connect($host, $user, $password, $namedb);

if ($conn) {
    $setlang = mysqli_query($conn, "SET NAMES 'utf8'");
} else {
    die("Kết nối thất bại" . mysqli_connect_errno());
}

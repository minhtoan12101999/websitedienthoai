<?php
session_start();
$id_sp = $_GET["id_sp"];
echo "<pre>";
print_r($_SESSION["giohang"]);
echo "</pre>";
if (isset($_SESSION["giohang"])) {
    if ($_GET["page_lay"] == 0) {
        unset($_SESSION["giohang"]);
    } else {
        unset($_SESSION["giohang"]["$id_sp"]);
    }
}
header('location:home.php?page_lay=cart');

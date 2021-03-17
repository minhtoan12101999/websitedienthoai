<?php
session_start();
if ($_SESSION["email"] !== "") {
    $id_ad = $_GET["id_ad"];
    if ($_SESSION["email"] == $_SESSION["email"] && $_SESSION["mk"] == $_SESSION["mk"]) {
        include_once 'ketnoi.php';
        $sql = "DELETE FROM `vp_users` WHERE id = '$id_ad'";
        $query = mysqli_query($conn, $sql);
        header('location:home.php?lay_uot=admin');
    }
} else {
    header('location:index.php');
}

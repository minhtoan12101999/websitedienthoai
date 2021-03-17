<?php
session_start();
if ($_SESSION["email"] !== "") {
    $id_delet = $_GET["id_dm"];
    if ($_SESSION["email"] == $_SESSION["email"] && $_SESSION["mk"] == $_SESSION["mk"]) {
        include_once 'ketnoi.php';
        $sql = "DELETE FROM `vp_categories` WHERE cate_id = $id_delet";
        $query = mysqli_query($conn, $sql);
        header('location:home.php?lay_uot=category');
    }
} else {
    header('location : index.php');
}

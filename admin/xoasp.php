<?php
session_start();
if ($_SESSION["email"] !== "") {
    $id_delet = $_GET["id_sp"];
    if ($_SESSION["email"] == $_SESSION["email"] && $_SESSION["mk"] == $_SESSION["mk"]) {
        include_once 'ketnoi.php';
        $sql = "DELETE FROM `vp_products` WHERE prod_id = $id_delet";
        $query = mysqli_query($conn, $sql);
        header('location:home.php?lay_uot=product');
    }
} else {
    header('location : index.php');
}

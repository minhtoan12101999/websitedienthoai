<?php
session_start();
if ($_GET["page"] == 0) {
    unset($_SESSION["giohang"]);
}
header('location:home.php?page_lay=complete');

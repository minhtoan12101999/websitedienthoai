<?php
session_start();
include_once 'ketnoi.php';
if ($_SESSION["email"]) {
    session_destroy();
    header('location: index.php');
} else {
    header('location: index.php');
}

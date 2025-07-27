<?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header('location:index.php');
    }
    unset($_SESSION['user_id']);
    session_destroy();
    header("location:home.php");
?>
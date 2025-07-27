<?php
    $conn=mysqli_connect("localhost","root","","food_order",3307);
    $remove_id = $_GET['id'];
    session_start();
    $id=$_SESSION['user_id'];
    $g="DELETE FROM car WHERE item_id= $remove_id AND user_id=$id";
    mysqli_query($conn, $g);
    header('location:shop_cart.php');
?>
<?php
$conn=mysqli_connect("localhost","root","root","food_order");
$update_id = $_GET['id'];
$quantity=$_GET['quantity']+1;
$r="UPDATE car SET quantity = $quantity WHERE item_id = $update_id";
 $res= mysqli_query($conn,$r );
 if($res){
     header('location:shop_cart.php');
 };
?>
<?php
$conn=mysqli_connect("localhost","root","root","food_order");
$update_id = $_GET['ID'];
$d="select quantity from car where item_id=$update_id";
$ro=mysqli_query($conn,$d);
$t=mysqli_fetch_assoc($ro);
$quantity=$t['quantity']-1;
if($quantity<=0)
{
    $r="DELETE FROM car where item_id=$update_id";
    $res=mysqli_query($conn,$r);
    if($res){
        header('location:shop_cart.php');
    };
}
else{
$r="UPDATE car SET quantity = $quantity WHERE item_id = $update_id";
 $res= mysqli_query($conn,$r );
 if($res){
     header('location:shop_cart.php');
 };
}
?>
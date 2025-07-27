
<?php
session_start();
if(isset($_SESSION['user_id']))
{
 $conn=mysqli_connect("localhost","root","","food_order",3307);
    $id=$_GET['id'];
    $user=$_SESSION['user_id'];
    $sl="INSERT INTO car(item_id,quantity,user_id) VALUES($id,1,$user)";
    $r=mysqli_query($conn,$sl);
    header("location:items.php");
}
else{
   header("location:index.php");
}

 


?>
<?php
session_start();
include("ind.php");
$s="select item_id,item_name,price,image from items";
$ru=mysqli_query($conn,$s);?>   
<!Doctype html>
<html>
<head>
<title>ITEMS</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="head.css">
<style>
body{
    background-color: white;
    background-repeat:no-repeat;
    background-size:100% 100vh;
    background-attachment:fixed;
    }
    .flex
    {
        display:flex;
        flex-direction:row;
        flex-wrap:wrap;
        width:100%;
        height: 40%;
        margin-left:90px;
        align-content:space-evenly;
        margin-top:5px;
    
    }
    img
    {
        height:170px;
        width:260px;
         border-radius:0px; 
    }
    
    .flex div
    {
        padding:7px;
    }
    .flex div div
    {
        
        display:flex;
        align-items: center;
        justify-content:center;
        flex-direction:row;
        flex-wrap: wrap;
        height:80px;
        text-align:center;
        font-size:18px;
        color:rgb(7, 87, 61);
        font-weight:bold;
        line-height:19px;
        border-radius: 20px;
        background-color:white;
    }
    p
    {
        font-family:Sofia;
        font-size:20px;
        text-align:left;
    }
    .butt{
    padding-left: 10px;
    padding-bottom: 5px;
    }
    button{
        width:110px;
        height:50px;
        background-color: green;
        color:white;
    }
    #hid{
        display: none;
    }
</style>
</head>
<body>
    <?php include 'header.php'; ?>
<h1 style="font-family:Sofia;color:green;text-align:center;text-shadow:0px 0px 9px rgb(7, 87, 61);">Mathura Restaurant</h1>
<div class="flex">
    <?php 
    while($row=mysqli_fetch_assoc($ru))
    {
    $id=$row["item_id"];?>
    <div><img src="<?php echo $row["image"];?>">
<div><?php echo $row["item_name"];?><br>price:<?php echo $row["price"];?>
<span class='butt'>
<?php
if(isset($_SESSION['user_id']))
{
$u_id=$_SESSION['user_id'];
$k="select * from car where item_id=$id and user_id=$u_id";
$rh=mysqli_query($conn,$k);
if(mysqli_num_rows($rh)>0)
{?><button type='button' class='btn btn-success btn-sm' disabled>Added</button>
 <?php } 
else{ ?>
    <button type='button' class='btn btn-success btn-sm' 
onclick= "add(<?php echo $id;?>);">ADD TO CART</button>
 <?php }
}
else{?>
<button type='button' class='btn btn-success btn-sm' 
onclick= "add(<?php echo $id;?>);">ADD TO CART</button>
<?php } ?>
</span></div></div>
<?php } ?>


</div>
</body>


<script type='text/javascript'>
    function add(item)
    {
        var id=item;
        console.log(id);
        window.open("cart_add.php?id="+id,"_self");
    }
    </script>
    
     
   
</html>

<?php
include("ind.php");
session_start();
$id=$_SESSION['user_id'];
if(isset($_GET['ordernow'])){
    $si="SELECT items.item_id AS ID,items.price AS price,items.image AS imag,items.item_name AS name,car.quantity AS quan,car.user_id AS u_id FROM items INNER JOIN car ON items.item_id=car.item_id WHERE car.user_id=$id";
    $ri=mysqli_query($conn,$si);
    $data=rand();
    while($or=mysqli_fetch_assoc($ri))
    {   $n=$or['name'];
        $i=$or['ID'];
        $qu=$or['quan'];
        $pri=$qu*$or['price'];
        date_default_timezone_set("Asia/kolkata");
        $d= date('d-m-Y H:i:s');
		$u=$or['u_id'];
        $h="INSERT INTO orders(trans_id,item_name,item_id,quantity,price,status,dateTime,user_id) VALUES ($data,'$n',$i,$qu,$pri,'delivered','$d',$u)";
        mysqli_query($conn,$h);
        
    }
    mysqli_query($conn, "DELETE FROM car");
    
    
 };
 ?>

<!DOCTYPE html>
<html>
    <head>
	    <title>Success</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="common.css">
		<style>
		    body{
			    width: 100%;
                height: 100%;
			}
			#content{
				padding-top:100px;
				padding-bottom:50px;
			}
			footer {
                padding: 10px 0;
                background-color: #101010;
                color:#9d9d9d;
                bottom: 0;
                width: 100%;
            }
		</style>
	</head>
	<body>
	<?php include 'header.php'; ?>
	   
		<div class="container-fluid" id="content">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h3 align="center">Your order is confirmed. Thank you for shopping with us.</h3><hr>
                    <p align="center">Click <a href="items.php">here</a> to purchase any other item.</p>
                </div>
            </div>
        </div>
		
	</body>
</html>
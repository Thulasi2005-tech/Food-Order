<?php
session_start();
if(!isset($_SESSION['user_id'])){ 
    header('location:index.php');
}
$id=$_SESSION['user_id'];
include("ind.php");
$s="SELECT trans_id,item_id,price,quantity,item_name,dateTime,status FROM orders WHERE trans_id IN(SELECT trans_id FROM orders WHERE user_id=$id GROUP BY trans_id)";
$r=mysqli_query($conn,$s);
$arr=array();
$arr1=array();
$g="SELECT trans_id,COUNT(item_id) AS coun,SUM(price) AS amount FROM orders WHERE user_id=$id GROUP BY trans_id";
$j=mysqli_query($conn,$g);
while($rw=mysqli_fetch_assoc($j))
{
    $arr[$rw['trans_id']]=$rw['coun'];
    $arr1[$rw['trans_id']]=$rw['amount'];
}

?>
<!Doctype html>
<html>
<head>
<title>ORDERS</title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<script type="text/javascript" src="jquery.js"></script>
<link rel="stylesheet" href="common.css">
<style>
    .container{
   max-width: 1200px;
   margin:0 auto;

}
section{
   padding:32px;
}
.heading{
   text-align: center;
   font-size: 40px;
   margin-bottom: 32px;
}
.shopping-cart table{
   text-align: center;
   width: 100%;
}
.shopping-cart table thead th{
   padding:1rem;
   font-size: 25px;
   color:white;
   background-color:black;
}
.shopping-cart table tr td{
   padding:22px;
   font-size: 20px;
   color:black;
   text-align: center;
   justify-content: center;
   align-items: center;
   
}
.shopping-cart table tr{
    border:1px solid black;
    border-collapse: collapse;
    background-color:aliceblue;
}
.shopping-cart table td{
    border:1px solid black;
    border-collapse: collapse;
}



    </style>
<body>
<?php include 'header.php'; ?>
    <div class="container">
    <section class="shopping-cart">
        <h1 class="heading">MY ORDERS</h1>
    <table>
        <thead>
            <th>Order_ID</th>
            <th>items</th>
            <th>quantity</th>
            <th>price</th>
            <th>DATE</th>
            <th>Total amount</th>
            <th>status</th>
        </thead>
        <tbody>
           <?php
            
            $previous='';
        
            while($row=mysqli_fetch_assoc($r))
            {
               $total=0;
            $current=$row['trans_id'];
            if($current==$previous){
                ?>
                <tr>
    
                <td><?php echo $row['item_name'];?></td>
               <td> <?php echo $row['quantity'];?></td>
                <td><?php echo $row['price'];?></td>
            </tr>
                <?php } 
                else{  ?>
            <tr>
                <td style="padding:50px;"rowspan="<?php echo $arr[$row['trans_id']]; ?>"><?php echo $row['trans_id'];?></td>
                <td><?php echo $row['item_name'];?></td>
                <td><?php echo $row['quantity'];?></td>
                <td><?php echo $row['price'];?></td>
                <td  rowspan="<?php echo $arr[$row['trans_id']]; ?>" style="vertical-align:center"><?php echo $row['dateTime'];?></td>
                <td rowspan="<?php echo $arr[$row['trans_id']]; ?>"><?php echo $arr1[$row['trans_id']];?></td>
                <td rowspan="<?php echo $arr[$row['trans_id']]; ?>"><?php echo $row['status'];?></td>
        
        
            </tr>
            <?php } 
                
            $previous=$current;
            }
            ?>

        </tbody>
    </table>
    </section>
    </div>
</body>
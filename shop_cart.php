<?php
include("ind.php");
session_start();
if(!isset($_SESSION['user_id'])){ 
    header('location:index.php');
}
$u_id=$_SESSION['user_id'];
$s="SELECT items.item_id AS ID,items.price AS price,items.image AS imag,items.item_name AS name,car.quantity AS quan FROM items INNER JOIN car ON items.item_id=car.item_id WHERE car.user_id=$u_id";
$ru=mysqli_query($conn,$s);
?>
<!Doctype html>
<html>
<head>
<title>CART</title>
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
        min-height:100vh;
        width:100vw;
     }

    body{
        background-color:aliceblue ;
    }
.upd{
    background-color:grey;
    border-radius: 15px;
}
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
   text-transform: uppercase;
   margin-bottom: 32px;
}
.shopping-cart table{
   text-align: center;
   width: 100%;
}
.shopping-cart table thead th{
   padding:1.5rem;
   font-size: 30px;
   color:white;
   background-color:black;
}
.shopping-cart table tr td{
   border-bottom: var(--border);
   padding:22px;
   font-size: 30px;
   color:black;
}





</style>
</head>
<body>
<?php include 'header.php'; ?>
<div class="container">

<section class="shopping-cart">
        <h1 class="heading">shopping cart</h1>
        
    <table class="table table-striped">
        <thead>
            <th>image</th>
            <th>Name</th>
            <th>quantity</th>
            <th>price</th>
            <th>Action</th>
            
        </thead>
        <tbody>
        <?php
        if(mysqli_num_rows($ru)>0)
        {
        $grand_total=0;
        while($row=mysqli_fetch_assoc($ru))
        {
            $id=$row['ID'];
            $q=$row['quan'];
        
            ?>
        <tr>
            <td><img src="<?php echo $row["imag"];?>" height="120" width="170" alt=""></td>
            <td> <?php echo $row['name']; ?></td>
            <td>
                <form method="post">
                <input type="hidden" name="id_it" id="hi"  value="<?php echo $row['ID']; ?>" >
                    <button type="button" class="btn btn-dark" onclick="func(<?php echo $id; ?> )"> - </button>
                    <input type="number" id="quanti" name="update_quantity" min="1" value="<?php echo $row['quan']; ?>" style="width:90px; height:40px;" disabled >
                    <button type="button" name="update"  class="btn btn-dark" onclick= "increase(<?php echo $q;?>,<?php echo $id;?>);">+</button>
            
                </form>
            </td>
            <td id="data"><?php echo $total=  $row['quan']*$row['price'];?></td>
            <td><button type="button" class="btn btn-danger btn-lg" onclick="add(<?php echo $id;?>);"><i class="fas fa-trash"></i>remove</button></td>
        </tr>

       <?php $grand_total+=$total; } ?>
       <tr class="table-bottom">
            <td><a href="items.php" class="btn btn-success btn-lg" role="button" aria-presses="true" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="2">Total amount:</td>
            <td><?php echo $grand_total; ?>/-</td>
            <td><a href="success.php?ordernow" class="btn btn-primary btn-lg" role="button" aria-presses="true">ORDER NOW </a></td>
         </tr>


        </tbody>
        <?php }
        else{
            echo "<center><h2>Add items to the cart first!</h2></center>";

        } ?>
        </table>
</section>

<script type='text/javascript'>
    function func(id){

        window.open("quantity_decrease.php?ID="+id,"_self");
    };

    </script>
</div>
<script type='text/javascript'>
    function add(item,id)
    {
        var id=item;
        console.log(id);
        window.open("cart_remove.php?id="+id,"_self");
    }
    function increase(quan,id)
    {
        var quantity=quan;
        console.log(quantity);
        window.open("quantity_increase.php?quantity="+quantity+"&id="+id,"_self");
    }
    function decrease(item)
    {
        var quantity=quantity;
        window.open("quantity_decrease.php?ID="+item,"_self");
    }
    
   
    </script>
</body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <title>Home page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/05e66b09d3.js" crossorigin="anonymous"></script>
<style>
    *{
        text-decoration: none;
    }
        body{
    
    background: rgba(0, 0, 0, 0.7) url('images/food.jpg') center center fixed;
    background-size: cover;
    background-blend-mode: darken;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}
.container{
    display:flex;
    align-items: center;

}
.nav-contain {
    display: flex;
    justify-content:space-between;
    width: 100%;
    height:12lvh;
    
}
ul{
    list-style-type: none;
    margin-right: 220px;
    
}
ul li{
    float: left;
}
li a{
   color: white;
   text-align: center;
   padding:12px;
   font-size: 18px;
   font-weight: bolder;
   transition: 3.5s;
}
#log{
    height:55px;
    width:70px;
    border-radius: 50%;
    padding-top: 5px;
    padding-left: 7px;
}
.heading{
    color: orangered;
    margin-left:-6px;

}
.nav{
    margin-top: 10px;
}
#login{
    border-radius:0.5;
    width:100px;
    height:34px;
    background-color:orangered;
    color: white;
    font-size: 20px;
    
}
.button{
    display: flex;
    justify-content: center;
    align-items: center;
    padding:0px 10px;
    position: absolute;
    top:26px;
    right:7px;
}

.content{
    position: absolute;
    color: #fff;
    top: 40%;
    left: 30%;
}

.content h3{
    font-family: sans-serif;
    font-size: 20px;
    margin-left: 30%;
}

.content h1{
    font-size: 50px;
}

.content p{
    text-align: center;
    margin-top: 17px;
}
.nav ul li a:hover{
    box-shadow: 0 3px 50px orangered inset,0 3px 50px orangered inset,
    0 3px 50px orangered inset,0 3px 50px orangered inset;
}

        </style>
    </head>
    <body>
        <div class="container">
            <div class="nav-contain">
                <div class="logo">
                    <img id="log" src="images/logo.jpeg">
                </div>
                <div class="heading">
                    <h2>MATHURA &nbsp;&nbsp;INDIAN&nbsp;&nbsp; FOOD</h2>
                </div>
                <div class="nav">
                <ul>
                    <li><a href="home.php">HOME</a></li>
                    <li><a href="items.php">ITEMS</a></li>
                    <li><a href="shop_cart.php">CART</a></li>          
                    <li><a href="order.php">ORDERS</a></li>
                    <li><a href="aboutus.php">ABOUT US</a></li>
                </ul>
                <?php
                session_start();
                    if(isset($_SESSION['user_id'])){ ?>
                <div class="button">
                    <a href="logout.php"><button id="login" type="button" >logout</button></a>
                </div>
                <?php } 
                else {?>
                <div class="button">
                <a href="index.php"><button id="login" type="button" >login</button></a>&nbsp;&nbsp;
                    <a href="register.php"><button id="login" type="button" >Signup</button></a>
                </div>
                <?php } ?>

                </div>
               
            </div>
        </div>
        <div class="content">
            <h3>Welcome  to Rich indian cuisine</h3>
            <h1>Taty Indian Food</h1>
            <p>Rich Cuisine is a restaurant located in india.we have some amazing recipes
                and the most talented chefs in the country.</p>
        </div>
        
    </body>
</html>
<!Doctype html>
<html>
<head>
<title>ITEMS</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style>
h1{
    text-align:center;
    color:white;
    font-family: sans-serif;
}
.container{
    display:flex;
    align-items: center;
    justify-content: center;
    flex-wrap: nowrap;
    margin: auto;
    
}
.image{
    height:400px;
    width:500px;
    padding: 12px;

}
img{
    height:350px;
    width:350px;
    position: absolute;
    top: 20%;
    left: 10%;
}
.content{
    width:50%;
    height:40%;
    color: black;
    font-size: 17px;
    text-align:justify;
    position: absolute;
    top: 25%;
    left: 40%;
}

#container{
    position: absolute;
    top: 95%;
    width: 100%;
}
#more{
    display:none;
}
.nav-contain {
    display: flex;
    justify-content:space-between;
    width: 100%;
    height:12lvh;
    background-color: black;
    
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
   text-decoration: none;
}
#log{
    height:55px;
    width:70px;
    border-radius: 50%;
    padding-top: 5px;
    padding-left: 7px;
}
.heading{
    color:white;
    padding-top: 7px;
    margin-left:-15px;
    

}
.nav{
    margin-top: 10px;
    margin-right:-180px;
}

</style>

</head>
<body>
<div class="nav-contain">
                <div class="logo">
                    <img id="log" src="https://t3.ftcdn.net/jpg/05/02/23/54/360_F_502235419_AWZtQQtzEkZ0fpCgoHQODdhavwb5GlSe.jpg">
                </div>
                <div class="heading">
                    <h2>ABOUT &nbsp;&nbsp;US</h2>
                </div>
            <div class="nav">
                <ul>
                    <li><a href="home.php">HOME</a></li>
                    <li><a href="items.php">ITEMS</a></li>
                    <li><a href="shop_cart.php">CART</a></li>
                    <li><a href="order.php">ORDERS</a></li>
                    <li><a href="aboutus.php">ABOUT US</a></li>
                </ul></div>
</div>


    <div class="container">
        <div class="image">
    <img src="images/chef.jpg">
        </div>
        <div class="content">
        
      <p>  Welcome to MATHURA INDIAN FOOD your go-to destination for delicious meals delivered straight to your doorstep.
Our story began with a simple realization: in today's fast-paced world, finding time to cook a homemade meal isn't always easy. That's where we come in. We've curated a diverse selection of restaurants, cafes, and eateries, bringing their mouthwatering dishes directly to you with just a few clicks or taps.
<span id="dots">....</span>
<span id="more"> But we're more than just a delivery service. We're a team of food enthusiasts dedicated to providing you with a seamless ordering experience and exceptional customer service. Whether you're craving your favorite comfort food or eager to explore new culinary adventures, we're here to make it happen.
With Mathura food service, ordering food is not just convenient; it's an experience. Discover new flavors, support local businesses, and satisfy your cravings without ever leaving your home. Because good food should be enjoyed anytime, anywhere.
Join us on this gastronomic journey, and let's make every meal a memorable one.</span>
</p><button onclick="myFunction()" id="myBtn">Read more</button>
</div>
    </div>
    <footer >
    <div id="container" style="background-color:black;color:white; ">
        <center>
            <p style="background-color:black;">Copyright &copy; My Shop. All Rights Reserved  |  Contact Us: +91 90000 00000</p>	
        </center>
    </div>
</footer>
<script>
    function myFunction(){
        var dots=document.getElementById("dots");
        var moreText=document.getElementById("more");
        var btnText=document.getElementById("myBtn");
        if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less";
    moreText.style.display = "inline";
  }
    }
    
</script>
</body>
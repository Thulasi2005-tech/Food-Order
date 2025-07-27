<?php
            session_start();
            $conn=mysqli_connect("localhost","root","","food_order",3307);
            $msg="";
            if(isset($_POST['submit']))
            {
            $uname=$_POST["userna"];
            $pass=$_POST["passwo"];
            $sql="select * from user where username='$uname' and password='$pass'";
            $res=mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)==0)
            {

                
                $msg="NO account found.please register  ";
                
            }
            else{

                
                $row = mysqli_fetch_assoc($res);
                $_SESSION['user_name'] = $row['username'];
                $_SESSION['user_id'] = $row['id'];
                header("location:home.php");
            
            
            }
        }
            ?>



<!DOCTYPE html>
<html>
    <head>
        <title>LOGIN FORM</title>
        <style>
            .form{
                width: 30%;
                height:450px;
                padding:10px 20px;
                background:linear-gradient(to right, #ffc0cb 0%, #87ceeb 100%);
                position: absolute;
                left:30%;
                top:10%;
            }
            h2{
                color:white;
                font-weight:bolder;
                text-align:center;
            }
            input{
            border:2px solid grey;
            border-radius:10px;
            width:50%;
            height:5lvh;
        }
        #button{
            width:30%;
            height:6lvh;
            border:2px solid grey;
            border-radius:5px;
            margin-left: 100px;

        }
        #logo
        {
            width:100px;
            height:100px;
            margin-left: 125px;
            margin-top:15px;
            border-radius:50%;
    
        }
        .mess{
            color:red;
        }

        
        </style>
    </head>
    <body>
        <div class="form">
            <img id="logo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTRrS17qvXTUKG6mZfouOKvWXL6Sl6e88-wwA&usqp=CAU">
            <h2>LOGIN</h2> 
                <form id="loginForm" method="post">
                    <label for="userna">Username:</label><br>
                    <input type="text" name="userna" id="userna" required><br><br><br>
                    <label for="passwo">Password:</label><br>
                    <input type="password" name="passwo" id="password" autocomplete="off" required><br><br><br>
                    <input id="button" type="submit" name="submit" value="LOGIN">
                    
                </form>
                <span class="mess"><?php echo $msg ?></span>
                <span class="signup"><a href="register.php">Signup now</a></span>
            </div>
           
        </body>
    </html>
            
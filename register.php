<?php
include("ind.php");
$msg="";
$po="";
if(isset($_POST["submit"]))
{
    $uname=$_POST["usernam"];
    $pas=$_POST["passwor"];
    $mail=$_POST["mail"];
    $copa=$_POST["confir"];

$sql="select * from user where username='$uname' and password='$pas'";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0)
 {
    $msg="user already exists";
 
 }
 else{
    if($copa==$pas)
    {
    $sq="INSERT INTO user(username,password,mail)VALUES('$uname', '$pas', '$mail')";
    $re=mysqli_query($conn,$sq);
    $msg=" ";
    $q="select * from user where username='$uname' and password='$pas'";
    $result=mysqli_query($conn,$q);
    $row = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION['user_name'] = $row['username'];
    $_SESSION['user_id'] = $row['id'];
     
    header("location: home.php");   
    }
    else{
        $po="password confirmation didn't match";
    }
 }
    
}

?>



<!DOCTYPE html>
<html>
    <head>
        <title>SIGN UPFORM</title>
        <style>
            .register{
                width: 30%;
                height:500px;
                padding:10px 20px;
                background:linear-gradient(to right, #ffc0cb 0%, #87ceeb 100%);
                position: absolute;
                left:30%;
                top:5%;
            }
            h2{
                color:white;
                font-weight:bolder;
                text-align:center;
                font-size: 30PX;
            }
            input{
            border:2px solid grey;
            border-radius:10px;
            width:70%;
            height:5lvh;
        }
        #button{
            width:40%;
            height:6lvh;
            border:2px solid grey;
            border-radius:5px;
            position: absolute;
            left:50px;
            bottom: 14px;

        }
        #button:hover{
            background-color:gray;
            color:white;
        }
        .mess{
            color:red;
        }
       
        </style>
    </head>
    <body>
        <div class="register">
            
            <h2>SIGN UP</h2> 
                <form id="register" method="post">
                    <label for="name">Name:</label><br>
                    <input type="text" name="Name" placeholder="  Enter fullname" reqired><br><br>
                    <label for="mail">E-mail id:</label><br>
                    <input type="text" name="mail" required><br><br>
                    <label for="usern">Username:</label><br>
                    <input type="text" name="usernam" id="usernam" required><br><br>
                    <label for="passwo">Password:</label><br>
                    <input type="password" name="passwor" id="passwor" required><br><br>
                    <label for="confir"> Confirm Password:</label><br>
                    <input type="password" name="confir" id="passwor" placeholder="confirm above password" required>
                    <span class="mess"><?php echo $po; ?></span>
                    <input id="button" type="submit" name="submit" value="SIGN IN">
                    
                </form>
                <span class="mess"><?php echo $msg ?></span>
            </div>
           
        </body>
    </html>
            
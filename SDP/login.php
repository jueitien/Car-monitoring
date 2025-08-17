<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autocare Monitor</title>
    <link rel="stylesheet" href="login.css">
</head>
<body style="background-color: black;">
   <div id="logo"><img src="AutocareLogo.jpg" alt=""></div>
    <div id="logincontainer">
        <form action="" method="POST">
            <div style="text-align: center;font-size: 50px;color: aliceblue;margin-top: 50px;">LOGIN</div>
            <div style="font-size: 25px;color: aliceblue;margin-top: 40px;margin-left: 50px;">Username:</div>
            <input type="text" name="Username" style="margin-top: 5px;margin-left: 50px;width: 600px;height: 35px;">
            <div style="font-size: 25px;color: aliceblue;margin-top: 25px;margin-left: 50px;">Password:</div>
            <input type="text" name="Password" style="margin-top: 5px;margin-left: 50px;width: 600px;height: 35px;">
            <input required type="submit" value="LOGIN" style="margin-top: 40px;margin-left: 50px;width: 607.2px;height: 40.2px;">
        </form>
    </div>

</body>
</html>
<?php
session_start();
$SERVER='localhost';
$USER='root';
$DBpassword='';
$database='car registration';
$conn=mysqli_connect($SERVER,$USER,$DBpassword,$database);
if(isset($_POST['Username']) && isset($_POST["Password"])){
    $Username=$_POST['Username'];
    $Password=$_POST['Password'];
    $search="SELECT `User ID`, `Username`, `Password`, `Car Type` FROM `register`";
    $result=mysqli_query($conn,$search);
    while($row=mysqli_fetch_assoc($result)){
        if ($row["Username"]== $Username && $row["Password"]== $Password){
            echo"<script>alert('Login Successful');</script>";
            $_SESSION["Username"] = $row["Username"];
            $_SESSION["User ID"] = $row["User ID"];
            $_SESSION["Car Type"] = $row["Car Type"];
            header('refresh: 0; url=./User/User main.php');
            exit();
        }

    $search_admin="SELECT `Admin ID`, `Username`, `Password`, `Email` FROM `admin register`";
    $result_admin=mysqli_query($conn,$search_admin);
    while($row2=mysqli_fetch_assoc($result_admin)){
        if ($row2["Username"]== $Username && $row2["Password"]== $Password){
            echo"<script>alert('Login Successful');</script>";
            $_SESSION["Username_Admin"] = $row2["Username"];
            $_SESSION["User ID_Admin"] = $row2["Admin ID"];
            $_SESSION["Email_Admin"] = $row2["Email"];
            header('refresh: 0; url=./Admin/Admin.php');
            exit();
        }
    }


    };
echo"<script>alert('Incorrect Password or Username');</script>";
header('refresh: 0; url=login.php');
}






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autocare Monitor</title>
    <link rel="stylesheet" href="register.css">
</head>
<body style="background-color: black;">
    <div id="logo"><img src="AutocareLogo.jpg" alt=""></div>
    <div id="registercontainer">
        <form action="" method="POST">
            <div style="text-align: center;font-size: 50px;color: aliceblue;margin-top: 50px;">REGISTER</div>
            <div style="font-size: 25px;color: aliceblue;margin-top: 40px;margin-left: 50px;">Username:</div>
            <input type="text" name="Username" style="margin-top: 5px;margin-left: 50px;width: 600px;height: 35px;margin-bottom: 25px;">
            <label for="car" style="color: aliceblue;margin-left: 50px;font-size: 25px">Car Type:</label><br>
            <select id="cars" name="Cars" style="width: 607.2px;height: 40.2px;margin-left: 50px;margin-top: 5px;">
                <option value="Nissan Sedan">Nissan Sedan</option>
                <option value="Nissan Leaf">Nissan Leaf</option>
                <option value="Nissan Navara">Nissan Navara</option>
                <option value="Nissan Almera">Nissan Almera</option>
                <option value="Nissan X-Trail">Nissan X-Trail</option>
            </select>
            <div  style="font-size: 25px;color: aliceblue;margin-top: 25px;margin-left: 50px;">Password:</div>
            <input type="text" name="Password" style="margin-top: 5px;margin-left: 50px;width: 600px;height: 35px;">
            <div style="font-size: 25px;color: aliceblue;margin-top: 25px;margin-left: 50px;">Comfirm Password:</div>
            <input type="text" name="Comfirmpw" style="margin-top: 5px;margin-left: 50px;width: 600px;height: 35px;">
            <input required type="submit" value="REGISTER" style="margin-top: 40px;margin-left: 50px;width: 607.2px;height: 40.2px;">
    </form>
    </div>
    
</body>
<?php

if(isset($_POST["Username"]) && isset($_POST['Cars']) && isset($_POST['Password']) && isset($_POST['Comfirmpw'])){
    if($_POST["Username"]!="" && $_POST['Password']!="" && $_POST['Comfirmpw']!=""){
        if($_POST['Password'] == $_POST['Comfirmpw']){
            $SERVER='localhost';
            $USER='root';
            $DBpassword='';
            $database='car registration';
            $conn=mysqli_connect($SERVER,$USER,$DBpassword,$database);
            $Username=$_POST["Username"];
            $Cars=$_POST["Cars"];
            $Password=$_POST['Password'];
            $Insertdata="INSERT INTO `register`(`User ID`, `Username`, `Password`, `Car Type`) VALUES (0,'$Username','$Password','$Cars')";
            mysqli_query($conn,$Insertdata); 
            echo"<script>alert('Register Successful');</script>";
            header('refresh: 0.0000001; url=../login.php');
        }
        else{
            echo"<script>alert('Inconsistant Password');</script>";

        }
    

    }

}






?>
</html>
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
            <select name="cars" id="cars" style="width: 607.2px;height: 40.2px;margin-left: 50px;margin-top: 5px;">
                <option value="sedan">Sedan</option>
                <option value="nissan leaf">Nissan Leaf</option>
                <option value="nissan navara">Nissan Navara</option>
                <option value="nissan almera">Nissan Almera</option>
                <option value="nissan x-trail">Nissan X-Trail</option>
            </select>
            <div style="font-size: 25px;color: aliceblue;margin-top: 25px;margin-left: 50px;">Password:</div>
            <input type="text" style="margin-top: 5px;margin-left: 50px;width: 600px;height: 35px;">
            <div style="font-size: 25px;color: aliceblue;margin-top: 25px;margin-left: 50px;">Comfirm Password:</div>
            <input type="text" style="margin-top: 5px;margin-left: 50px;width: 600px;height: 35px;">
            <input required type="submit" value="REGISTER" style="margin-top: 40px;margin-left: 50px;width: 607.2px;height: 40.2px;">
    </form>
    </div>
    
</body>
<?php
$Username=$_POST["Username"];
echo $Username;





?>
</html>
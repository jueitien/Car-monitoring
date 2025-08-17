<?php
session_start();
if(isset($_SESSION["Username"])){
    $User_n=$_SESSION["Username"];
    $User_I=$_SESSION["User ID"];
    $User_C=$_SESSION["Car Type"];

}else{
    $User_n="";
    $User_I="";
    $User_C="";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autocare Monitor</title>
    <link rel="stylesheet" href="User main.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style="background-color: black;">
    <div id="navi">
        <img src="../AutocareLogo.png" alt="" style="height: 80px; width: 250px;margin-left: 50px; margin-top: 10px;">
        <div id="selection">
            <div id="btt1" onclick="visible()"><a >Profile</a></div>
            <div id="btt2"><a href="Appoinment.php">Book Appoinment</a></div>
            <div id="btt3"><a href="Car Status.php">Car Status</a></div>
            <div id="btt4"><a href="Service.php">Customer Service</a></div>
        </div>
    </div>
    <div id="profileContainer">
        <div style="height: fit-content;display: flex;flex-direction: row; justify-content: space-between; width: 100%;">
            <div id="Picture">
                <img src="" alt="">
            </div>
            <div id="UserInfo">
                <div>Name: <?php echo $User_n;?></div>
                <div>ID: <?php echo $User_I;?></div>
                <div>Car Type: <?php echo $User_C;?></div>
            </div>
            <div onclick="invisible()"style="color: white; right:10px;cursor: pointer;"><i class="fas fa-window-close fa-2x"></i></div>
        </div>
        <div>
            <button id="Switch" style="color: orange;border: none;padding: 0;background: black;border-radius: 3px; width: 100%; height: 40px; "><a href="..\switchacc.php" style="text-decoration: none;color: aliceblue;">Switch Account</a></button><br>
            <button id="logout" style="background-color: red;border-radius: 3px;width: 100%; height:40px"><a href="..\logout.php" style="text-decoration: none;color: aliceblue;">logout</a></button>
        </div>
    </div>
    <div style=" height: 105px;width: 100%;"></div>
    <br><br>
    <div style="display: flex; flex-direction: column; align-items: center;">
        <h1 style="color: white;">Hello <?php echo $User_n;?>, Welcome to Autocare Monitor!</h1>
        <h2 style="color: orange;">Experience the Future of Car Maintenance with Our Autocare Monitor</h2>
        <h3 style="color: white;">Cars we accept for the service</h3>
        <h4 style="color: white;">(Sedan, Almera, Leaf, Navara, X-Trail)</h4>  
        <br>
        <div>
            <img src="nissan_sedan-removebg-preview.png" alt="" style="height: 100px; width: 200px;">
            <img src="nissan_almera-removebg-preview.png" alt=""style="height: 120px; width: 200px;">
            <img src="nissan_leaf-removebg-preview.png" alt="" style="height: 100px; width: 200px;">
            <img src="nissan_navara-removebg-preview.png" alt="" style="height: 100px; width: 200px;">
            <img src="nissan_x-trail-removebg-preview.png" alt="" style="height: 100px; width: 200px;">
        </div><br>
        <div style="color: white;">Please note that our service is compatible with most makes and models produced from 2000 onwards.</div>
        <div style="color: white;">If you have any questions about whether your car is supported, feel free to contact us with your vehicle's make, model, and year.</div>
    </div>

    <h3></h3>
    <script src="User main.js"></script>
</body>
</html>
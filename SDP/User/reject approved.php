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
    <div style=" height: 105px;width: 100%;"></div><br><br><br>
    <?php
        $current_ID=$_SESSION["User ID"];
    ?>
    <div style="width: fit-content; margin: auto; display: flex; flex-direction: column; align-items: center;">
        <h1 style="color: red;">Sorry your request was rejected by the Admin</h1>
        <h2 style="color: white;">If you have any question, please click this link <a href="Service.php" style="text-decoration: none; color: yellow;" >Customer Service FAQ</a></h2><br>
        <input type="submit" value="Try Again" onclick="retry('<?php echo $current_ID?>')" style="padding: 10px 20px 10px 20px;">
    </div><br><br>
    
    
    <script src="User main.js"></script>
</body>
</html>

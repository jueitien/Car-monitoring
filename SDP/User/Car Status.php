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
    <div style=" height: 105px;width: 100%;"></div><br><br>
    <div style="width: fit-content; margin: auto;">
        <h1 style="color: orange;">Track your car status online</h1>
    </div><br><br>
    <div id="statusBar">
        <div style="width: 20%;border-right: 3px solid orange;"><a style="margin-left: 5%;">Checking the car</a></div>
        <div style="width: 35%;border-right: 3px solid orange;"><a style="margin-left: 3%;">Fixing the car</a></div>
        <div style="width: 25%;border-right: 3px solid orange;"><a style="margin-left: 3%;">Testing the car</a></div>
        <div style="width: 20%;"><a style="margin: 5px;">Your car was ready</a></div>
    </div>
    <div id="Word-Container" style="margin: auto; width: 50%;height: 100px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
    </div>
    
    <script src="User main.js"></script>
</body>
</html>
<?php

$curent_ID=$_SESSION["User ID"];
$SERVER='localhost';
$USER='root';
$DBpassword='';
$database='car registration';
$conn=mysqli_connect($SERVER,$USER,$DBpassword,$database);
$query="SELECT `User ID`,`Car Status`FROM `appoinment approved`";
$result=mysqli_query($conn, $query);
while($row=mysqli_fetch_assoc($result)){
    $ID=$row["User ID"];
    if($ID==$curent_ID){
        $status1=$row["Car Status"];?>
        <script>
            var st= '<?php echo $status1;?>'
            var list=[st];
            ProcessChangeColour(list[0])
        </script>
<?php
    
    }
}
?>


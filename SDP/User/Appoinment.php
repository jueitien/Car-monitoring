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
            <div id="btt2" style="color: orange;"><a href="Appoinment.php">Book Appoinment</a></div>
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
    <h1 style="color: white;text-align:center;"><?php echo $User_C;?></h1>
    <h2 style="color: orange;text-align:center;">Please select the problem of your car</h2><br>
    <div id="ProblemSelection"> 
        <button onclick="window.location.href='Appoinment_GB.php';">GearBox</button>
        <button onclick="window.location.href='Appoinment1_GB.php';">Car Oil</button>
        <button onclick="window.location.href='Appoinment2_GB.php';">Brake Pad</button>
        <button onclick="window.location.href='Appoinment3_GB.php';">Vehicle Battery</button>
    </div>
    <script src="User main.js"></script>
</body>
</html>
<?php
$SERVER='localhost';
$USER='root';
$DBpassword='';
$database='car registration';
$conn=mysqli_connect($SERVER,$USER,$DBpassword,$database);
$query="SELECT `User ID`,`Request status` FROM `appointment`";
$query2="SELECT  `User ID` FROM `appoinment approved`";
$result=mysqli_query($conn,$query);
$result2=mysqli_query($conn,$query2);
while($row=mysqli_fetch_assoc($result)){
    $ID=$row["User ID"];
    $User_ID=$_SESSION["User ID"];
    if($ID ==$User_ID ){
        $Status=$row["Request status"];
    }
}
while($row=mysqli_fetch_assoc($result2)){
    $ID=$row["User ID"];
    $User_ID=$_SESSION["User ID"];
    if($ID ==$User_ID ){
        $Status = "Approved";
    }

}
if(isset($Status)){
    if ($Status=="Pending") {
        header("Location:pending approved.php");
    }
    else if ($Status== "Reject") {
        header("Location:reject approved.php");
    }
    else{
        header("Location:approved.php");
    }
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autocare Monitor</title>
    <link rel="stylesheet" href="Admin.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<body style="background-color: black;">
    <div id="navi">
        <img src="../AutocareLogo.png" alt="" style="height: 80px; width: 250px;margin-left: 50px; margin-top: 10px;">
        <div id="selection">
            <div id="btt1"><a href="Admin.php">Add Admin</a></div>
            <div id="btt2"><a href="Appoinment Review.php">Appoinment Review</a></div>
            <div id="btt3"><a href="Maintenance Process.php">Car maintenance process</a></div>
            <div id="btt4"><a href="Review Customer.php">Review Customer Question</a></div>
        </div>
    </div>
    <div id="profileContainer">
        <div style="height: fit-content;display: flex;flex-direction: row; justify-content: space-between; width: 100%;">
            <div id="Picture">
                <img src="" alt="">
            </div>
            <div id="UserInfo">
                <div>Name:<?php session_start(); echo $_SESSION["Username_Admin"];?></div>
                <div>ID:<?php $_SESSION["User ID_Admin"]?> </div>
                <div>Email:<?php $_SESSION["Email_Admin"]?></div>
            </div>
            <div onclick="invisible()"style="color: white; right:10px;cursor: pointer;"><i class="fas fa-window-close fa-2x"></i></div>
        </div>
        <div>
            <button id="Switch" style="color: orange;border: none;padding: 0;background: black;border-radius: 3px; width: 100%; height: 40px; ">Switch Account</button><br>
            <button id="logout" style="background-color: red;color: aliceblue;border-radius: 3px;width: 100%; height:40px">Logout</button>
        </div>
    </div>
    <div style=" height: 105px;width: 100%;"></div>
    <div style="width: fit-content; margin: auto;">
        <h1 style="color: orange;">Appoinment Review</h1>
    </div><br><br><br>
    <div id="OuterBox3">
        <div id="appoinment_conatainner">
            <div id="UserID" style="padding-left: 8.5%;">
                <div style="text-align:center;height:30px;width:150px;border-bottom: 2px solid orange;">User ID</div>
            </div>
            <div id="Maintenance" style="padding-left: 11%;">
                <div style="text-align:center;height:30px;width:150px;border-bottom: 2px solid orange;">Maintenance</div>
            </div>
            <div id="Day" style="padding-left: 13%;">
                <div style="text-align:center;height:30px;width:150px;border-bottom: 2px solid orange;">Day</div>
            </div>
            <div id="Time" style="padding-left: 15%;">
                <div style="text-align:center;height:30px;width:150px;border-bottom: 2px solid orange;">Time</div>
            </div>
            <div id="Selection" style="padding-left: 15%;">
                <div style="text-align:center;height:30px;width:150px;border-bottom: 2px solid orange;">Selection</divstyle>
            </div>
        </div>
    </div>
    

    

    <script src="Admin.js"></script>
</body>  
</html>

<?php
$SERVER='localhost';
$USER='root';
$DBpassword='';
$database='car registration';
$conn=mysqli_connect($SERVER,$USER,$DBpassword,$database);
$query="SELECT `User ID`, `Maintenance`, `Time`, `Day` FROM `appointment` where `Request status`='Pending'";
$result =mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($result)){
    $UserID=$row["User ID"];
    $Maintenance=$row["Maintenance"];
    $Time=$row["Time"];
    $Day=$row["Day"];
    ?>
    <script>
        var UserID='<?php echo $UserID?>';
        var Maintenance='<?php echo $Maintenance?>';
        var Day='<?php echo $Day?>'
        var Time='<?php echo $Time?>';
        var list=[UserID,Maintenance,Day,Time];
        addappoinmentlist(UserID,Maintenance,Day,Time,list);


    </script>
<?php
}

?>
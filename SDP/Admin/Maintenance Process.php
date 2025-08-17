<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autocare Monitor</title>
    <link rel="stylesheet" href="Admin.css">
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
    
    <div style=" height: 105px;width: 100%;"></div>
    <div style="width: fit-content; margin: auto;">
        <h1 style="color: orange;">User car maintenance process</h1>
    </div><br><br><br>
    <div id="CarMaintenanceTitle">
        <div style="padding-left: 8.5%;">User ID</div>
        <div style="padding-left: 11%;">Name</div>
        <div style="padding-left: 13%;">Car Type</div>
        <div style="padding-left: 15%;">Problem</div>
        <div style="padding-left: 20%;">Process</div>
    </div>
    <br><br>

    <div id="OuterBox2"></div>
    <script src="Admin.js"></script>
</body> 
</html>
<?php
$SERVER='localhost';
$USER='root';
$DBpassword='';
$database='car registration';
$conn=mysqli_connect($SERVER,$USER,$DBpassword,$database);
$query="SELECT `Approved ID`, `User ID`, `Username`, `Maintenance`, `Time`, `Day`, `Car Status`, `Car Type` FROM `appoinment approved`";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($result)){
    $User_ID=$row["User ID"];
    $Maintenance=$row["Maintenance"];
    $Name=$row["Username"];
    $Car_Type=$row["Car Type"];
    ?>
    <script>
        var UserID='<?php echo $User_ID?>';
        var Maintenance='<?php echo $Maintenance?>';
        var Name='<?php echo $Name?>'
        var Car_Type='<?php echo $Car_Type?>';
        createUserCarStatus(UserID, Name, Car_Type, Maintenance);
    </script>
    
<?php
}
?>
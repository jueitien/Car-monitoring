<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autocare Monitor</title>
    <link rel="stylesheet" href="Admin.css">
<body style="background-color: black;">
    <div id="navi">
        <img src="..\AutocareLogo.png" alt="" style="height: 80px; width: 250px;margin-left: 50px; margin-top: 10px;">
        <div id="selection">
            <div id="btt1"><a href="Admin.php">Add Admin</a></div>
            <div id="btt2"><a href="Appoinment Review.php">Appoinment Review</a></div>
            <div id="btt3"><a href="Maintenance Process.php">Car maintenance process</a></div>
            <div id="btt4"><a href="Review Customer.php">Review Customer Question</a></div>
        </div>
    </div>
    
    <div style=" height: 105px;width: 100%;"></div><br><br>
    <div style="display: flex; flex-direction: column; width: 80%; height: fit-content; margin: auto; align-items: center;" id="Outline">

    </div>
    
    <script src="Admin.js"></script>
</body> 
</html>


<?php

session_start();
$SERVER='localhost';
$USER='root';
$DBpassword='';
$database='car registration';
$conn=mysqli_connect($SERVER,$USER,$DBpassword,$database);
$ID = $_GET['userID'];
$query="SELECT `Chat ID`, `User ID`, `Username`, `Car Type`, `User Chat`, `Admin ID`, `Admin Name`, `Admin Chat` FROM `chat`";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_assoc($result)){
    $Admin_ID=$_SESSION["User ID_Admin"];
    $UI = $row["User ID"];
    $UN = $row["Username"];
    $UC = $row["User Chat"];
    $Admin_N = $_SESSION["Username_Admin"];
    $AC = $row["Admin Chat"];
    $AN= $row["Admin Name"];
    ?>
    <script>console.log('<?php echo $ID?>')</script>
    <?php
    if($ID == $UI){
        echo "<script>AppendChatHistory('$ID','$UN', '$UC', '$AN', '$AC','$Admin_ID','$Admin_N');</script>";
    }
}
?>




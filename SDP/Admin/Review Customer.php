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
    <div id="UsersContainer" style="width: 80%; height: fit-content;margin: auto;display: grid;grid-template-columns: auto auto auto auto; justify-content: center;padding: 20px;border: 3px solid orange;">
    </div>
    
    <script src="Admin.js"></script>
</body> 
</html>
<?php
session_start();
$Admin_ID=$_SESSION["User ID_Admin"];
$SERVER='localhost';
$USER='root';
$DBpassword='';
$database='car registration';
$ID=$_SESSION["User ID"];
$conn=mysqli_connect($SERVER,$USER,$DBpassword,$database);
$query="SELECT DISTINCT `User ID`, `Username`, `Car Type` FROM `chat`";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_assoc($result)){
    $UN=$row["Username"];
    $CT=$row["Car Type"];
    ?>
    
    <script>
        AppendUsers('<?php echo $row["User ID"]?>','<?php echo $UN?>','<?php echo $CT?>','<?php echo $Admin_ID?>')
    </script>

<?php
}
?>
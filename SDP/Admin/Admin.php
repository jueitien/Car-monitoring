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
        <h1 style="color: orange;">Admin list</h1>
    </div><br><br>
    <div id="Title">
        <div style="padding-left: 8%;">Admin ID</div>
        <div style="padding-left: 17%;">Name</div>
        <div style="padding-left: 22%;">Email</div>
        <div style="padding-left: 23%;">Delete</div>
    </div>
    <div id="OuterBox"></div>
    <script src="Admin.js"></script>
</body> 
</html>

<?php
$SERVER='localhost';
$USER='root';
$DBpassword='';
$database='car registration';
$conn=mysqli_connect($SERVER,$USER,$DBpassword,$database);
$query="SELECT `Admin ID`, `Username`, `Password`, `Email` FROM `admin register`";
$result =mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($result)){
    $AdminID=$row["Admin ID"];
    $Username=$row["Username"];
    $Email=$row["Email"];
    ?>
    <script>
        var AdminID='<?php echo $AdminID?>';
        var Username='<?php echo $Username?>';
        var Email='<?php echo $Email?>'
        var list=[AdminID,Username,Email];
        createAdmin(AdminID,Username,Email,list);


    </script>
<?php
}

?>
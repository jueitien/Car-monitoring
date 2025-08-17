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
    <div style="display: flex; flex-direction: row; width: 100%; height: fit-content; margin-top: 50px; justify-content: space-around; align-items: center;">
        <img src="call.png" alt="" style="height: 85px; width: 100px;">   
        <div id="Text">
            <div id="c">Customer Service: 011-111-1111<br><br>Open Hours:Monday-Friday 10am-6pm <br>&emsp;&emsp;&emsp;&emsp;&emsp;Saturday-Sunday 11:00am-5pm</div>
            <div id="c2">We Assists With:<br>&#128973;Booking Appointment <br>&#128973;Service Information<br>&#128973;Comprehensive help<br>&#128973;Technical issues<br>&#128973;General inquiries</div>  
        </div>
    </div>
    <div style="display: flex; flex-direction: row; width: 100%; height: fit-content;margin-top: 50px;margin-bottom: 50px; justify-content: space-around; align-items: center;">
        <img src="conversations.png" alt="" style="height: 85px; width: 100px;"> 
        <div id="Text1">
            <div id="Title1">FAQ</div><br>
            <div class="form">
                <div style="color: white;">Please provide a question to resolve your problem.</div> <br>
                <input type="text" style="width: 100%;height: 50px;" id="textArea"> 
            </div><br>
            <input type="button" value="Submit" onclick="storeValue('<?php echo $_SESSION['User ID']?>','<?php echo $_SESSION['Username']?>','<?php echo $_SESSION['Car Type']?>')">
        </div>
    </div>
    <script src="User main.js"></script>
</body>
</html>
<?php
$SERVER='localhost';
$USER='root';
$DBpassword='';
$database='car registration';
$ID=$_SESSION["User ID"];
$conn=mysqli_connect($SERVER,$USER,$DBpassword,$database);
$query="SELECT `User ID`, `Username`, `Car Type`, `User Chat`, `Admin ID`, `Admin Name`, `Admin Chat` FROM `chat`";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($result)){
    if($row["User ID"]== "$ID"){
        $Adminname=$row["Admin Name"];
        $Username=$row["Username"];
        $UserChat=$row['User Chat'];
        $AdminChat=$row['Admin Chat'];?>
        <script>
        createTextBox('<?php echo $Adminname?>','<?php echo $Username?>','<?php echo $UserChat?>','<?php echo $AdminChat?>')
        </script>       
<?php
    }

}
?>


    
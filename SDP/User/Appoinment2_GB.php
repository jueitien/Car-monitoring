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
<?php
$SERVER='localhost';
$USER='root';
$DBpassword='';
$database='car registration';
$conn=mysqli_connect($SERVER,$USER,$DBpassword,$database);
$query="SELECT `Day` FROM `appointment` where `Maintenance`='Brake Pad'";
$query2="SELECT `Day` FROM `appoinment approved` where `Maintenance`='Brake Pad'";
$result2=mysqli_query($conn, $query2);
$result=mysqli_query($conn,$query);
$Mon_count=0;
$Tue_count=0;
$Wed_count=0;
$Thur_count=0;
$Fri_count=0;
$Sat_count=0;
$Sun_count=0;
while($row=mysqli_fetch_assoc($result)){
    if($row["Day"]== "Monday"){
        $Mon_count++;
    }
    elseif($row["Day"]== "Tuesday"){
        $Tue_count++;
    }
    elseif($row["Day"]== "Wednesday"){
        $Wed_count++;
    }
    elseif($row["Day"]== "Thursday"){
        $Thur_count++;
    }
    elseif($row["Day"]== "Friday"){
        $Fri_count++;
    }
    elseif($row["Day"]== "Saturday"){
        $Sat_count++;
    }
    elseif($row["Day"]== "Sunday"){
        $Sun_count++;
    }
}
while($row=mysqli_fetch_assoc($result2)){
    if($row["Day"]== "Monday"){
        $Mon_count++;
    }
    elseif($row["Day"]== "Tuesday"){
        $Tue_count++;
    }
    elseif($row["Day"]== "Wednesday"){
        $Wed_count++;
    }
    elseif($row["Day"]== "Thursday"){
        $Thur_count++;
    }
    elseif($row["Day"]== "Friday"){
        $Fri_count++;
    }
    elseif($row["Day"]== "Saturday"){
        $Sat_count++;
    }
    elseif($row["Day"]== "Sunday"){
        $Sun_count++;
    }
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
            <div id="btt2" ><a href="Appoinment.php">Book Appoinment</a></div>
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
    <div style="display: flex; flex-direction: column;align-items: center;">
        <h1 style="color: orange;">Select time to book an appoinment</h1>
        <h3 id='availability' style="color: red;">Availability 0/3</h3>
    </div>
    <br>
    <div id="daynavi">
        <button id="mon" onclick="changeColour(mon,'<?php echo $Mon_count?>')">Monday</button>
        <button id="tue" onclick="changeColour(tue,'<?php echo $Tue_count?>')">Tuesday</button>
        <button id="wed" onclick="changeColour(wed,'<?php echo $Wed_count?>')">Wednesday</button>
        <button id="thu" onclick="changeColour(thu,'<?php echo $Thur_count?>')">Thursday</button>
        <button id="fri" onclick="changeColour(fri,'<?php echo $Fri_count?>')">Friday</button>
        <button id="sat" onclick="changeColour(sat,'<?php echo $Sat_count?>')">Saturday</button>
        <button id="sun" onclick="changeColour(sun,'<?php echo $Sun_count?>')">Sunday</button>
    </div><br>
    <div id="timeBox">
        <button id="10">10:00 am</button>
        <button id="11">11:00 am</button>
        <button id="12">12:00 pm</button>
        <button id="13">13:00 pm</button>
        <button id="14">14:00 pm</button>
        <button id="15">15:00 pm</button>
        <button id="16">16:00 pm</button>
        <button id="17">17:00 pm</button>
    </div>
    <br>
    <form id="selectionForm" action="process_GB.php" method="POST">
        <input type="hidden" name="day" id="selectedDay">
        <input type="hidden" name="time" id="selectedTime">
        <div style="margin:auto;border: 2px solid white;border-radius: 20px; width: 100px; padding: 5px;display:flex; justify-content: center;">
            <button type="submit" style="border: none;background: none;color: orange;">Confirm</button>
        </div>
     </form>
    
    <script src="User main.js"></script>
</body>
</html>

<?php
if($Mon_count==3){?>
    <script>
        var a='<?php echo $Mon_count;?>'
        console.log(a)
        var mon=document.getElementById("mon");
        mon.disabled=true;
        mon.style.border="none";
    </script>
<?php
}
elseif($Tue_count== 3){?>
    <script>
        var b='<?php echo $Tue_count;?>'
        console.log(b)
        var tue=document.getElementById("tue");
        tue.disabled=true;
        tue.style.border="none";
    </script>
<?php
}
elseif($Wed_count== 3){?>
    <script>
        var c='<?php echo $Wed_count;?>'
        console.log(c)
        var wed=document.getElementById("wed");
        wed.disabled=true;
        wed.style.border="none";
    </script>
<?php
}
elseif($Thur_count== 3){?>
    <script>
        var d='<?php echo $Thur_count;?>'
        console.log(d)
        var thu=document.getElementById("thu");
        thu.disabled=true;
        thu.style.border="none";
    </script>

<?php
}
elseif($Fri_count== 3){?>
    <script>
        var e='<?php echo $Fri_count;?>'
        console.log(e)
        var fri=document.getElementById("fri");
        fri.disabled=true;
        fri.style.border="none";
    </script>

<?php
}
elseif($Sat_count== 3){?>
    <script>
        var f='<?php echo $Sat_count;?>'
        console.log(f)
        var sat=document.getElementById("sat");
        sat.disabled=true;
        sat.style.border="none";
    </script>

<?php
}
elseif($Sun_count== 3){?>
    <script>
        var g='<?php echo $Sun_count;?>'
        console.log(g)
        var sun=document.getElementById("sun");
        sun.disabled=true;
        sun.style.border="none";
    </script>

<?php
}
?>



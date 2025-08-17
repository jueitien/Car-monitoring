<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $day = $_POST['day'];
    $time = $_POST['time'];
    $ID=$_SESSION["User ID"];
    $Car_Type=$_SESSION["Car Type"];
    $SERVER='localhost';
    $USER='root';
    $DBpassword='';
    $database='car registration';
    $conn=mysqli_connect($SERVER,$USER,$DBpassword,$database);
    $store_appoinment="INSERT INTO `appointment`(`User ID`, `Maintenance`, `Time`, `Day`, `Request status`, `Car Type`) VALUES ('$ID','Car Oil','$time','$day','Pending','$Car_Type')";
    mysqli_query($conn,$store_appoinment); 
    echo"<script>alert('Appoinment Successful');</script>";
    header("location:pending approved.php");
}
?>
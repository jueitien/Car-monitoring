<?php
session_start();
$ID=$_SESSION["User ID"];
header("Content-Type: application/json");
$SERVER = 'localhost';
$USER = 'root';
$DBpassword = '';
$database = 'car registration';
$conn = mysqli_connect($SERVER, $USER, $DBpassword, $database);
$query='DELETE FROM `appoinment approved` WHERE `User ID`=?';
if (!$conn) {
    $response = ['status' => 'error', 'message' => 'Failed to connect to database'];
    echo json_encode($response);
    exit;
}
$stmt=$conn->prepare($query);
$stmt->bind_param('i', $ID);
$stmt->execute();
if ($stmt->affected_rows > 0) {
    $response = ['status' => 'success', 'message' => 'Record deleted successfully'];
} else {
    $response = ['status' => 'error', 'message' => 'No record found for the provided User ID'];
}
$stmt->close();
echo json_encode($response);


?>
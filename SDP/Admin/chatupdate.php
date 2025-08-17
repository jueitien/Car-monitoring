<?php
header('Content-Type: application/json');

// Start output buffering
ob_start();

$SERVER = 'localhost';
$USER = 'root';
$DBpassword = '';
$database = 'car registration';
$conn = mysqli_connect($SERVER, $USER, $DBpassword, $database);

if (!$conn) {
    $response = ['status' => 'error', 'message' => 'Failed to connect to database'];
    echo json_encode($response);
    exit;
}

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);
$output = ob_get_clean();
if (!empty($output)) {
    // If there's any unexpected output, log it or handle it as needed
    error_log("Unexpected output: " . $output);
}

$response = [];
$User_ID= $data["User_ID"];
$US_chat= $data["US_chat"];
$AD_chat= $data["AD_chat"];
$AD_ID= $data["AD_ID"];
$AD_name= $data["AD_name"];

$query="UPDATE `chat` SET `Admin ID`=?,`Admin Name`=?,`Admin Chat`=? WHERE `User ID`=? and `User Chat`=?";
$stmt=$conn->prepare($query);
$stmt->bind_param("issis",$AD_ID,$AD_name,$AD_chat,$User_ID,$US_chat);
$stmt->execute();
$stmt->close();
mysqli_close($conn);







?>
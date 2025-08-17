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

$query="DELETE FROM `admin register` WHERE `Admin ID`=?";
$stmt=$conn->prepare($query);
$stmt->bind_param("i",$data["AdminID"]);
$stmt->execute();
$stmt->close();
mysqli_close($conn);







?>
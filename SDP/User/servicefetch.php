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
$ID=$data['ID'];
$Name=$data['name'];
$car=$data['car'];
$Us_chat=$data['Qs'];

$query="INSERT INTO `chat`(`User ID`, `Username`, `Car Type`, `User Chat`) VALUES (?,?,?,?)";
$stmt=$conn->prepare($query);
$stmt->bind_param("isss",$ID,$Name,$car,$Us_chat);
$stmt->execute();
$stmt->close();
mysqli_close($conn);




?>
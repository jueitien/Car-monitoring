<?php
header('Content-Type: application/json');

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

if (isset($data["ID"]) && isset($data["text"])) {
    $ID = $data["ID"];
    $status = $data["text"];
    
    $query = "UPDATE `appoinment approved` SET `Car Status`=? WHERE `User ID`= ?";
    $stmt = $conn->prepare($query);
    
    if ($stmt) {
        $stmt->bind_param("si", $status, $ID);
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            $response = ['status' => 'success', 'message' => 'Car status updated'];
        } else {
            $response = ['status' => 'error', 'message' => 'No rows updated'];
        }
        
        $stmt->close();
    } else {
        $response = ['status' => 'error', 'message' => 'Failed to prepare statement'];
    }
} else {
    $response = ['status' => 'error', 'message' => 'Invalid input'];
}

echo json_encode($response);


mysqli_close($conn);
?>

<?php
session_start();
$Car_Type=$_SESSION["Car Type"];
$Username=$_SESSION["Username"];
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

// Get the raw POST data
$postData = file_get_contents('php://input');
$data = json_decode($postData, true);

// Clean the output buffer and fetch contents
$output = ob_get_clean();
if (!empty($output)) {
    // If there's any unexpected output, log it or handle it as needed
    error_log("Unexpected output: " . $output);
}

$response = [];

if (isset($data['UserID']) && isset($data['Maintenance']) && isset($data['Time']) && isset($data['Day'])) {
    $ID = $data['UserID'];
    $Maintenance= $data['Maintenance'];
    $Time= $data['Time'];
    $Day = $data['Day'];
    $Check="Check";
    $query = 'DELETE FROM `appointment` WHERE `User ID` = ?';
    $query2 = "INSERT INTO `appoinment approved`(`User ID`, `Username` , `Maintenance`, `Time`, `Day`, `Car Status`, `Car Type`) VALUES (?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($conn, $query);
    $stmt2 = $conn -> prepare($query2);
    $stmt2->bind_param("issdsss", $ID,$Username, $Maintenance, $Time, $Day,$Check,$Car_Type);
    $stmt2->execute();
    $stmt2->close();
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $ID);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $response = ['status' => 'success', 'message' => 'Approved', 'ID' => $ID];
        } else {
            $response = ['status' => 'error', 'message' => 'No appointment found with the provided ID'];
        }

        mysqli_stmt_close($stmt);
    } else {
        $response = ['status' => 'error', 'message' => 'Failed to prepare query'];
    }
} else {
    $ID = $data['UserID'];
    $query = 'UPDATE `appointment` SET `Request status`= ? WHERE `User ID` = ? ';
    $stmt = mysqli_prepare($conn, $query);
    $status='Reject';
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'si', $status ,$ID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location:Appoinment Review.php");
    }
}

mysqli_close($conn);
echo json_encode($response);
exit;


?>

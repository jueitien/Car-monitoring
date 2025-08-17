<?php
header('Content-Type: application/json');
$SERVER = 'localhost';
$USER = 'root';
$DBpassword = '';
$database = 'car registration';
$conn = mysqli_connect($SERVER, $USER, $DBpassword, $database);

$postdata=file_get_contents('php://input');
$data=json_decode($postdata,true);
$reject="reject";
if(isset($data['UserID'])){
    $query='DELETE FROM `appointment` WHERE  `User ID`=? AND `Request status`=?';
    $stmt=$conn->prepare($query);
    $stmt->bind_param('is',$data['UserID'],$reject);
    $stmt->execute();
    $stmt->close();
    $response = ['status' => 'success', 'message' => 'data send success'];
}
else{
    $response = ['status' => 'error', 'message' => 'Invalid input'];
}
echo json_encode($response);
?>
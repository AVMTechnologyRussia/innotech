<?php
$servername = "localhost";
$database   = "a0193618_hackathon_innotech";
$usernameBD = "a0193618_hackathon_innotech";
$passwordBD = "1234user";
$nameUE = $_REQUEST["Name"];
$theoryUE = $_REQUEST["Theory"];
$testsUE = $_REQUEST["Tests"];
$VR_ReplicasUE = $_REQUEST["VR_Replicas"];


$conn = mysqli_connect($servername, $usernameBD, $passwordBD, $database) or die("Connection failed");

$registerSQL = "INSERT INTO Lessons (Name, Theory, Tests, VR_Replicas) VALUES ('$nameUE', '$theoryUE', '$testsUE', '$VR_ReplicasUE')";
$registerResult = $conn->query($registerSQL);
$JsonErr=array('err' => 'vse okei');
echo json_encode ($JsonErr);    
mysqli_close($conn);
?>
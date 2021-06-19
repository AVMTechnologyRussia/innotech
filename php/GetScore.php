<?php
$servername = "localhost";
$database   = "a0193618_hackathon_innotech";
$usernameBD = "a0193618_hackathon_innotech";
$passwordBD = "1234user";
$usernameUE = $_REQUEST["Username"];

$conn = mysqli_connect($servername, $usernameBD, $passwordBD, $database) or die("Connection failed");

$loginSQL = "SELECT Username FROM Users WHERE Username = '$usernameUE'";

$loginResult = $conn->query($loginSQL);

while ($row = $loginResult->fetch_assoc()) {
    $login = $row["Username"];
}

if (!empty($login)) {
    $scoreSQL    = "SELECT Score FROM Users WHERE Username = '$login'";
    $scoreResult = $conn->query($scoreSQL);
    while ($row = $scoreResult->fetch_assoc()) {
        $Score = $row["Score"];
    }
    $JsonResponse=array('Score' => (int)$Score);
    echo json_encode ($JsonResponse);
}
mysqli_close($conn);
?>
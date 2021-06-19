<?php
$servername = "localhost";
$database   = "a0193618_hackathon_innotech";
$usernameBD = "a0193618_hackathon_innotech";
$passwordBD = "1234user";
$usernameUE = $_REQUEST["Username"];
$highscoreUE = $_REQUEST["Score"];

$conn = mysqli_connect($servername, $usernameBD, $passwordBD, $database) or die("Connection failed");

$loginSQL    = "SELECT Username FROM Users WHERE Username = '$usernameUE'";
$loginResult = $conn->query($loginSQL);

while ($row = $loginResult->fetch_assoc()) {
    $login = $row["Username"];
}


if (empty($login)) {
    
    $JsonErr=array('err' => 'User do not exist');
    echo json_encode ($JsonErr);
    //echo ($registerResult);
}else{
    $updateSQL = "UPDATE Users SET Score = '$highscoreUE' WHERE Username = '$usernameUE'";
    $updateResult = $conn->query($updateSQL);
    $JsonArray=array('response' => $updateResult);
    echo json_encode ($JsonArray);

}
mysqli_close($conn);
?>
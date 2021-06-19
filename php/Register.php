<?php
$servername = "localhost";
$database   = "a0193618_hackathon_innotech";
$usernameBD = "a0193618_hackathon_innotech";
$passwordBD = "1234user";
$usernameUE = $_REQUEST["Username"];
$passwordUE = $_REQUEST["Password"];
$firstnameUE = $_REQUEST["Firstname"];
$secondnameUE = $_REQUEST["Secondname"];

$conn = mysqli_connect($servername, $usernameBD, $passwordBD, $database) or die("Connection failed");

$loginSQL    = "SELECT Username FROM Users WHERE Username = '$usernameUE'";
$loginResult = $conn->query($loginSQL);

while ($row = $loginResult->fetch_assoc()) {
    $login = $row["Username"];
}

if (empty($login)) {
    $hashed_password = hash('sha512', $passwordUE);
    $registerSQL = "INSERT INTO Users (Username, Password, Firstname, Secondname) VALUES ('$usernameUE', '$hashed_password', '$firstnameUE', '$secondnameUE')";
    $registerResult = $conn->query($registerSQL);
    
    $JsonResponse=array('Username' => $usernameUE);
    echo json_encode ($JsonResponse);
}else{

    $JsonErr=array('err' => 'login already used');
    echo json_encode ($JsonErr);

}
mysqli_close($conn);
?>
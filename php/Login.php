<?php
$servername = "localhost";
$database   = "a0193618_hackathon_innotech";
$usernameBD = "a0193618_hackathon_innotech";
$passwordBD = "1234user";
$usernameUE = $_REQUEST["Username"];
$passwordUE = $_REQUEST["Password"];

$conn = mysqli_connect($servername, $usernameBD, $passwordBD, $database) or die("Connection failed");

$loginSQL    = "SELECT Username FROM Users WHERE Username = '$usernameUE'";

$loginResult = $conn->query($loginSQL);

while ($row = $loginResult->fetch_assoc()) {
    $login = $row["Username"];
}


if (!empty($login)) {
    $passwordSQL    = "SELECT * FROM Users WHERE Username = '$login'";
    $passwordResult = $conn->query($passwordSQL);
    while ($row = $passwordResult->fetch_assoc()) {
        $Password = $row["Password"];
        $Firstname = $row["Firstname"];
        $Secondname = $row["Secondname"];
        $Score = $row["Score"];
        $Radio = $row["Radio"];
        $Knowledge = $row["Knowledge"];
        $Control = $row["Control"];
        $UX = $row["UX"];
        $Law = $row["Law"];
    }
    $hashed_password = hash('sha512', $passwordUE);
    if ($Password == $hashed_password) {
        
        $JsonResponse=array('Username' => $login, 'Firstname' => $Firstname, 'Secondname' => $Secondname, 'Score' => (int)$Score, 'Radio' => (int)$Radio,'Knowledge' => (int)$Knowledge,'Control' => (int)$Control,'UX' => (int)$UX,'Law' => (int)$Law);
        echo json_encode ($JsonResponse);
        
    }else{
        $JsonErr=array('err' => 'wrong password');
        echo json_encode ($JsonErr);
        }
    }else{
        $JsonErr=array('err' => 'wrong login');
        echo json_encode ($JsonErr);
        }

mysqli_close($conn);
?>
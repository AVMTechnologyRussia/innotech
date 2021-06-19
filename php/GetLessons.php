<?php
$servername = "localhost";
$database   = "a0193618_hackathon_innotech";
$usernameBD = "a0193618_hackathon_innotech";
$passwordBD = "1234user";

$conn = mysqli_connect($servername, $usernameBD, $passwordBD, $database) or die("Connection failed");

$lessonsSQL    = "SELECT * FROM Lessons";
$lessonsResult = $conn->query($lessonsSQL);

$table_Lessons = array();
while ($row = $lessonsResult->fetch_assoc()) {
    $Name = $row["Name"];
    $Theory = $row["Theory"];
    $Tests = $row["Tests"];
    $VR_Replicas = $row["VR_Replicas"];
    $arr_Lesson = array('Name' => $Name, 'Theory' => $Theory, 'Tests' => $Tests, 'VR_Replicas' => $VR_Replicas);
    array_push($table_Lessons, $arr_Lesson);
}

$Json=array();
$JsonArray=array('Lessons' => $table_Lessons);
array_push($Json,$JsonArray);
echo json_encode ($JsonArray);

mysqli_close($conn);
?>

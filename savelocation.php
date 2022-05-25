<?php
header('Access-Control-Allow-Origin: *');
ini_set('display_errors', 1);
error_reporting(~0);
$dbconn = mysqli_connect("seniorproject.ict.sci.psu.ac.th", "snpj59_303155", "lT6QW1", "dbnme_303155");
// include("getjson.php");
// $serverName = "localhost";
// $userName = "root";
// $userPassword = "11071998";
// $dbName = "pj1";
// $table = "location";


$lat = $_POST['lat'];
$lng = $_POST['lng'];
$name = $_POST['name'];
$info = $_POST['info'];


// $conn = mysqli_connect($serverName, $userName, $userPassword, $dbName);
$sql = "INSERT INTO location ( LAT, LNG, LOC_NAME, LOC_INFO)
							VALUES ({$lat},{$lng},{$name},{$info})";

echo "INSERT INTO location ( 'LAT', 'LNG', 'LOC_NAME',LOC_INFO)
							VALUES ({$lat},{$lng},{$name},{$info})";
// $query = mysqli_query($conn,$sql);
if (mysqli_query($dbconn, $sql)) {
	echo json_encode(array("statusCode" => 200));
} else {
	echo json_encode(array("statusCode" => 201));
};
	// mysqli_close($conn);

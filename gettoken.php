<?php
header('Access-Control-Allow-Origin: *');
ini_set('display_errors', 1);
error_reporting(~0);

// $serverName = "localhost";
// $userName = "root";
// $userPassword = "11071998";
// $dbName = "pj1";
// $table = "token_ad";

// $lastname= $_POST['lastname_entered'];


// $conn = mysqli_connect($serverName, $userName, $userPassword, $dbName);
$dbconn = mysqli_connect("seniorproject.ict.sci.psu.ac.th","snpj59_303155","lT6QW1","dbnme_303155");
$sql = "SELECT * FROM token_ad";
// mysql_select_db("mostra",$connect);
$query = mysqli_query($dbconn, $sql);
if (!$query) {
	printf("Error: %s\n", $dbconn->error);
	exit();
}
$resultArray = array();
while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
	array_push($resultArray, $result);
}
mysqli_close($dbconn);
echo json_encode($resultArray);

<?php
if (!isset($_SESSION)){
  session_start();
} 
include('./project/dbconn.php');

$list = array();
$sql = "
  SELECT usr.* , ust.* , lcn.* , stm.*
  FROM users as usr
  LEFT JOIN users_stamp as ust  ON usr.user_id = ust.user_id
  LEFT JOIN location as lcn     ON ust.mark_location_lat = lcn.LAT AND ust.mark_location_lng = lcn.LNG
  LEFT JOIN stamps as stm       ON lcn.LOC_ID = stm.LOC_ID
  WHERE 1 AND
  	ust.status = 1
  ORDER BY ust.user_date DESC
";

$usr_stm = [];

$exceute = mysqli_query($dbconn , $sql);
while ($list = mysqli_fetch_array($exceute)) {
  array_push($usr_stm, $list['stamp_id']);
}

$_SESSION['usr_stm'] = $usr_stm[8];

print_r($_SESSION['usr_stm']);

// echo json_encode($list);



?>
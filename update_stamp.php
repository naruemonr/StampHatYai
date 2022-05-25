<?php
include('./project/dbconn.php');

$user_id = ($_SESSION['mem_id']!="")?$_SESSION['mem_id']:'';

if($user_id != ""){
  // work
  $mark_lat = isset($_POST['marker_lat'])?$_POST['marker_lat']:'';
  $mark_lng = isset($_POST['marker_lng'])?$_POST['marker_lng']:'';

  if($mark_lat != "" && $mark_lng!= "" ){
    $sql = "
      UPDATE users_stamp
      SET status = 1
      WHERE 1 AND
        mark_location_lat = $mark_lat AND
        mark_location_lng = $mark_lng AND
        user_id = $user_id AND
        status = 0
    ";
    $exceute = mysqli_query($dbconn , $sql);
  }

}

?>


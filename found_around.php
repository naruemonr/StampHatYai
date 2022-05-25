<?php
include('./project/dbconn.php');

// $_POST['bucket'] = '[{"distance":1307.0841315065736,"current_location_lat":7.0063073,"current_location_lng":100.49908119999999,"mark_location_lat":7.009594838339261,"mark_location_lng":100.48772424459457,"path_img":"images/castle.png","date":"20-Nov-2019","time":"0:3:33","status":0},{"distance":1935.048319848273,"current_location_lat":7.0063073,"current_location_lng":100.49908119999999,"mark_location_lat":7.005481,"mark_location_lng":100.516575,"path_img":"images/pagoda.png","date":"20-Nov-2019","time":"0:3:33","status":0},{"distance":249.78108519866853,"current_location_lat":7.0063073,"current_location_lng":100.49908119999999,"mark_location_lat":7.0075662668927885,"mark_location_lng":100.49720987677574,"path_img":"images/museum.png","date":"20-Nov-2019","time":"0:3:33","status":0},{"distance":1283.2940509810255,"current_location_lat":7.0063073,"current_location_lng":100.49908119999999,"mark_location_lat":7.0071909,"mark_location_lng":100.4875006,"path_img":"images/bigb.png","date":"20-Nov-2019","time":"0:3:33","status":0},{"distance":947.484485546313,"current_location_lat":7.0063073,"current_location_lng":100.49908119999999,"mark_location_lat":7.005444,"mark_location_lng":100.49055,"path_img":"images/temple3-90x90.png","date":"20-Nov-2019","time":"0:3:33","status":0},{"distance":200.17393409129005,"current_location_lat":7.0063073,"current_location_lng":100.49908119999999,"mark_location_lat":7.008105356622859,"mark_location_lng":100.49910351634026,"path_img":"images/pumkin90x90.png","date":"20-Nov-2019","time":"0:3:33","status":0},{"distance":12.782160816899495,"current_location_lat":7.0063073,"current_location_lng":100.49908119999999,"mark_location_lat":7.006419299999999,"mark_location_lng":100.4990557,"path_img":"images/bsc-icon90x90.png","date":"20-Nov-2019","time":"0:3:33","status":0}]';

// if (!$post = json_decode($_POST['bucket'], true)) {
//   $post = array();
// }
$post = array();
if (is_array($_POST['bucket']) && sizeof($_POST['bucket']) > 0) {
  $post = $_POST['bucket'];
}

if (is_array($post) && sizeof($post) > 0) {

  $sql_insert = '';
  foreach ($post as $k => $r) {
    $sql_insert .= '(' . $_SESSION['mem_id'] . ',' . $r['distance'] . ', ' . $r['current_location_lat'] . ',' . $r['current_location_lng'] . ' ,' . $r['mark_location_lat'] . ',' . $r['mark_location_lng'] . ',"' . $r['path_img'] . '","' . $r['date'] . '" , "' . $r['time'] . '", ' . $r['status'] . '),';
  }

  $sql_insert = substr($sql_insert, 0, -1);

  $sql = "
      INSERT INTO users_stamp(`user_id` , `distance` , `current_location_lat` , `current_location_lng` , `mark_location_lat` , `mark_location_lng` , `path_img` , `date` , `time` ,`status` )
      VALUES $sql_insert
      ";

  $query = mysqli_query($dbconn, $sql);

}

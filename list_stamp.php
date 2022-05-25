<?php
include('./project/dbconn.php');

if(isset($_SESSION['mem_id'])){
  $list = array();
  $stamp_list = array();
  $data = array();
  $sql = "
    SELECT 
      utp.user_id , utp.mark_location_lat , utp.mark_location_lng , 
      utp.status , stp.stm_name , stp.stm_plete , stp.stm_id
    FROM users_stamp as utp
    LEFT JOIN location as lc	ON  utp.mark_location_lat = lc.LAT AND utp.mark_location_lng = lc.LNG
    LEFT JOIN stamps as stp 	ON lc.LOC_ID = stp.LOC_ID
    WHERE 1 AND utp.user_id = ".$_SESSION['mem_id']."
  ";

  $sql_stamp = "
    SELECT stm_id
    FROM stamps
  ";

  $stamp = [];
  $all_stamp = array();
  $exceute = mysqli_query($dbconn , $sql);
  $exceute2 = mysqli_query($dbconn , $sql_stamp);

  while ($list = mysqli_fetch_assoc($exceute)) {
    $stamp[$list['stm_id']] = $list;
  }
  while ($stamp_list = mysqli_fetch_assoc($exceute2)) {
    $all_stamp[$stamp_list['stm_id']] = $stamp_list;
  }

  foreach($all_stamp as $key => $row){
    if(isset($stamp[$key])){
      $data[$key] = $stamp[$key];
    }else{
      $data[$key] = array();
    }
  }

  $table = '<table class="table"><tr>';
  $i=0;
  foreach ($data as $k => $r){
    if(isset($r['stm_id'])){
      if($r['status']==0){
        $_img = 'images/stamp_empty.png';
      }else{
        $_img = $r['stm_plete'];
      }
    }else{
      $_img = 'images/stamp_empty.png';
    }

    if($i%3==0 && $i!=0){
      $table .= '</tr><tr><td><img src="'.$_img.'"></td>';
    }else
      $table .= '<td><img src="'.$_img.'"></td>';
    $i++;

  }
  $table .= '</tr></table>';

  echo json_encode(array('html'=>$table));
}else{
  echo json_encode(array('html'=>''));
}

?>

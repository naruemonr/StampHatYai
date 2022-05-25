<?php
// session_start();
include('./project/dbconn.php');

// include('../dbconn.php');
// header('Content-Type: application/json');
$response = array('code' => 0, 'msg' => 'No action');
// ข้อแรก หากใช้ js call เข้า php ห้าม echo ไม่งั้นจะถือว่า เบรค js หรือ ให้เป็น response ทันที

// บรรทัดนี้ เป็นการเช็คว่าค่าที่เราส่งมานั้น เป็น array และข้างใน array ไม่ว่าง โดยเมื่อเราส่ง json มาจาก js
// php จะทำการรับในรูปแบบ method ที่เรากำหนด ซึ่ง_POST , _GET เป็น array จึงควรเชคค่าแบบนี้
if (is_array($_POST) && sizeof($_POST) > 0) {

    // ในกรณีที่จะให้รัดกุมกว่านี้

    $user_unsafe = isset($_POST['username']) ? $_POST['username'] : '';
    // isset คือการ check keyname นี้ ถ้าหากไม่มี keyname ให้มันว่างไว้
    $pass_unsafe = isset($_POST['password']) ? $_POST['password'] : '';

    if ($user_unsafe != "" && $pass_unsafe != "") { // เช็คให้ชัวว่ามีทั้ง 2 key
        $user = mysqli_real_escape_string($dbconn, $user_unsafe);
        $pass = mysqli_real_escape_string($dbconn, $pass_unsafe);

        // $pass1=md5($pass);
        // $salt="a1Bz20ydqelm8m1wql";
        // $pass2=$pass1;

        // '".$_variable."' เป็นการต่อเครื่องหมาย คำพูด ที่ใช้ค้นหา string ใน database มันจะเป็นรูปแบบ WHERE username ="bambam" ซึ่งแบบเก่าที่เราเขียน จะได้แบบนี้ username = bambam การเขียนแบบนี้ไม่มีเครื่องหมายคำพูด ระบุว่า string
        // อาจเกิด error type หรือการค้นหาที่ล่าช้า เพราะไม่ถูก datatype ใน db 
        $query = mysqli_query($dbconn, "SELECT `user_id` , `name` , `username` FROM users WHERE username='" . $user_unsafe . "' AND password='" . $pass_unsafe . "'");

        $res = mysqli_fetch_array($query);

        if (mysqli_num_rows($query) < 1) {
            // $_SESSION['msg']="Login Failed, User not found!";
            // header('Location:user_login_page.php');
            $response = array('code' => 0, 'msg' => 'No Username');
            echo json_encode($response);
        } else {
            $_SESSION['mem_id'] = $res['user_id'];
            $_SESSION['mem_name'] = $res['name'];
            $response = array('code' => 1, 'msg' => 'Login Success');

            if ($res['username'] == 'admin') {
                $response['code'] = 2; // code change 
            }

            echo json_encode($response);
            // $res=mysqli_fetch_array($query);
            // $_SESSION['id']=$res['username'];
            // header('Location: usermode.html');
            // $_SESSION['id']=$id;
            // $remarks="has logged in the system at ";  
            // mysqli_query($dbconn,"INSERT INTO logs(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($dbconn));
        }
    } else {
        $response = array('code' => 0, 'msg' => 'No data');
        echo json_encode($response);
    }
} else {
    echo json_encode($response);
}

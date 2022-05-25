<?php
// including the database connection file
session_start();
include("../project/dbconn.php");

// default fail all case 
/**
 * @param code status 0 = fail , 1 = success
 * @param msg string show message step debug ** can show if you want to show text
 */
$response = array(
    'code' => 0, // no action
    'msg' => 'No Action'
);

// check array from _POST
if (is_array($_POST) && sizeof($_POST) > 0) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    // $phone=$_POST['phone'];
    // $gender=$_POST['gender'];
    // $con_password=$_POST['con_password'];
    // $phonenumber=$_POST['phonenumber'];


    // $pass1=md5($password);
    // $salt="a1Bz20ydqelm8m1wql";
    // $pass2=$pass1;

    // checking empty fields
    if (empty($name) || empty($username) || empty($password) || empty($email)) {

        // change msg  but no change code response
        $response['msg'] = 'Some data require not found';

        if (empty($name)) {
            $response['code'] = 2; // check in js when code == 2 name is empty
            $response['msg'] = 'Name is empty';  // you can set msg for show in js is here
            // echo "<font color='red'>Student ID is empty!</font><br/>";
        }

        if (empty($username)) {
            $response['code'] = 3; // check in js when code == 3 name is empty
            $response['msg'] = 'Username is empty';
            // echo "<font color='red'>Username is empty!</font><br/>";
        }

        if (empty($password)) {
            $response['code'] = 4; // check in js when code == 4 name is empty
            $response['msg'] = 'Pasword is empty';
            // echo "<font color='red'>Password is empty!</font><br/>";
        }

        if (empty($email)) {
            $response['code'] = 5; // check in js when code == 5 name is empty
            $response['msg'] = 'Email is empty';
            // echo "<font color='red'>Email is empty!</font><br/>";
        }

        echo json_encode($response);
    } else {
        //updating the table
        $query = "INSERT INTO users (name, username, password, email) 
                VALUES ('$name','$username','$password','$email')";

        $result = mysqli_query($dbconn, $query);
        if ($result) {
            $response['code'] = 1;
            $response['msg'] = 'Signup Success';
            echo json_encode($response);
            //redirecting to the display page. In our case, it is index.php
            // header("Location: user_login_page.html");
        }
    }
} else {
    // _POST is empty array
    $response['msg'] = 'Post array is empty';
    echo json_encode($response);
}

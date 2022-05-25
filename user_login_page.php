<?php
    session_start();
    include('./project/dbconn.php');
?>

<!DOCTYPE html>
<html lang="en">


<head>
  <title>LOGIN page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Include CSS File Here -->
  <link rel="stylesheet" href="css/login.css" />
  <!-- Include JS File Here -->
  <!-- <script src="js/login.js"></script> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></!-->
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <!-- <script src="js/jquery.3.4.1.min.js" type="text/javascript"></script> -->

  <style>
    @media print {
      #map {
        height: 950px;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="main">
      <h2>HATYAI STAMP</h2>
      <img src="images/logo1.png" alt="logo" width="150" height="150">
      <br />
      <label>User Name :</label>
      <input type="text" name="username" placeholder="username" id="username" required>
      <label>Password :</label>
      <input type="password" name="password" placeholder="password" id="password" required>
      <!-- <input type="button" value="Login" id="submit" onclick="validate()" /> -->
      <button type="submit" class="btn-login" value="login" name="submit" id="login">login</button>
      <!-- <input type="button" value="Login guest mode" id="submit" onclick="guest()" />  -->
      <div class="guestmode">
        <p>Don't have an account? <a href="user_signup_page.html">REGISTER</a>.</p>
      </div>
      <br>
      <div id="msg" style="color: red;text-align: center;font-weight: bold;"></div>
    </div>
  </div>
</body>
<script type="text/javascript">
  $(document).ready(function () {
    $("#login").click(function () {
      var username = $("#username").val().trim();
      var password = $("#password").val().trim();

      if (username != "" && password != "") {
        $.ajax({
            // url: 'https://seniorproject.ict.sci.psu.ac.th/students/ict/std-59/303155/STAMPHATYAI/user_login.php',
            url: "http://localhost/stamphatyai/user_login.php",
            type: 'POST',
            dataType: 'JSON',
            data: {
              username: username,
              password: password
            },
            cache: false
          })
          // see error php side when call with ajax
          .fail(function (xhr, st, err) {
            console.log(xhr.responseText)
          })
          .done(function (response) {
            var msg = "";
            if (response.code == 1) {
              window.location.href = "usermode.php";
            } else if (response.code == 2) {
              window.location.href = "adminmode.php";
            } else {
              msg = "Invalid username and password!";
            }
            $("#msg").html(msg);
          });
      }
    });
  });
</script>

</html>
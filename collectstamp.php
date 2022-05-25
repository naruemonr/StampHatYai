<?php
if (!isset($_SESSION)) {
  session_start();
} 

// if (!isset($_SESSION['mem_id']) || (trim($_SESSION['mem_id']) == '')) {
//   header('location:user_login_page.html');
//   exit();
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Stamp page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <script src="https://code.jquery.com/jquery-latest.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- <script type="text/javascript"src="https://platform-api.sharethis.com/js/sharethis.js#property=5dd652253addbb00127ec951&product=inline-share-buttons" async="async"></script> -->
  <link rel="stylesheet" href="css/stamp.css" />
  <style>
    .empty {
      display: block;
      max-width:100px;
      max-height:104px;
      width: auto;
      height: auto;
    }
  </style>
</head>

<body>
  <div class="topbar">
    <img src="images/home.png" href="#back" width="25" height="25">
    <div class="topbar-right">
      <img src="images/login.png" href="#back" width="25" height="25">
    </div>
  </div>



  <div class="page">
    <center>
      <h3>STAMP COLLECTION</h3>
      <div id="table-show">
      </div>
    </center>
  </div>

<script type="text/javascript">
  $.ajax({
    url : 'http://localhost/stamphatyai/list_stamp.php',
    dataType : 'JSON',
    cache : false
  })
  .fail(function(xhr,st,err){
    console.log(xhr.responseText)
  })
  .done(function(resp){
   $('#table-show').append(resp.html)
  })


</script>
<script type="text/javascript"src="https://platform-api.sharethis.com/js/sharethis.js#property=5dd652253addbb00127ec951&product=inline-share-buttons" async="async"></script>
<div class= "footer">
<div class="sharethis-inline-share-buttons"></div>
</div>

</body>

</html>
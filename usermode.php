<?php
include('./project/dbconn.php');
if (!isset($_SESSION['mem_id']) || (trim($_SESSION['mem_id']) == '')) {
  header('location:user_login_page.html');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>USER MODE</title>
  <meta name="viewport" content="width=fgdfg, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="css/user.css" />
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script type="text/javascript" src="js/user.js"></script>
  <meta charset="utf-8" />
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFd4RCo22KnGhh3e2Y1gqwrI-MQ_OjzFA&callback=initMap" async defer>
  </script>


</head>

<body>
  <!-- <header> -->
  <div class="topbar">
    <input type="image" alt="back" src="images/left-arrow.png" href="index.html" width="25" height="25">
    <div class="topbar-right">
    USER : <?php echo $_SESSION['mem_name']; ?>
      <input type="image" alt="home" src="images/home.png" href="logout.php" width="25" height="25">
    </div>
  </div>
  <!-- </header> -->

  <a class="weatherwidget-io" href="https://forecast7.com/en/7d01100d47/hat-yai/" data-label_1="HAT YAI"
    data-label_2="WEATHER" data-font="Arimo" data-icons="Climacons Animated" data-mode="Current" data-days="3"
    data-theme="blue-mountains">HAT YAI WEATHER</a>

  <section>

    <?php
      $query = mysqli_query($dbconn, "SELECT * FROM `users` WHERE user_id='" . $_SESSION['mem_id'] . "'");
      $row = mysqli_fetch_array($query);
      echo '' . $row['username'] . '';
    ?>


    <div id="map"></div>

  </section>
  <div class="footer">
    <a href="category.html">
      <button class="tablinks1"><input type="image" src="images/category.png" width="18" height="25"
          align="left">CATEGORY</button>
    </a>

    <a href="collectstamp.php">
      <button class="tablinks3"><input type="image" src="images/stamp.png" width="25" height="25" align="left">
        COLLECT
      </button>
    </a>
    <a href="invite.html">
      <button class="tablinks2"><input type="image" src="images/invite.png" width="25" height="25" align="left">
        INVITE</button>
    </a>

  </div>

  <script>
    ! function (d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (!d.getElementById(id)) {
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://weatherwidget.io/js/widget.min.js';
        fjs.parentNode.insertBefore(js, fjs);
      }
    }(document, 'script', 'weatherwidget-io-js');
  </script>
</body>

</html>
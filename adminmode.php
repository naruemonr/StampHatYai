<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>ADMIN MODE</title>
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <meta charset="utf-8" />
  <link rel="stylesheet" type="text/css" href="css/admin.css" />
  <script type="text/javascript" src="js/admin.js"></script>
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFd4RCo22KnGhh3e2Y1gqwrI-MQ_OjzFA" async defer></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>


<body>
  <!-- <header> -->
  <div class="topbar">
    <a type="image" alt="back" src="images/left-arrow.png" href="#back" width="25" height="25" /></a>

    <div class="topbar-right">
      <a type="image" alt="home" src="images/home.png" href="uer_login_page.html" width="25" height="25"></a>
    </div>
    <div class="pull-right">
      <?php echo $_SESSION ['mem_name']; ?>
    </div>
  </div>

  <a class="weatherwidget-io" href="https://forecast7.com/en/7d01100d47/hat-yai/" data-label_1="HAT YAI" data-label_2="WEATHER" data-theme="original">HAT YAI WEATHER</a>

  <section>
    <!-- search location -->
    <div id="floating-panel">
      <input id="address" type="text" value="" />
      <input id="submit" type="button" value="   Reverse Geocode   " />
    </div>

    <br />

    <div id="map"></div>

    <br />
    <br />
    <div id="loc">
      <!-- Latitude: -->
      <div id="showLat">Current Latitude:</div>
      <!--show text lat-->
      <br />
      <!-- Longitude: -->
      <div id="showLong">Current Longitude:</div>
      <!--show text lng-->
      <br />
      Location name: <input type="text" id="sendata" name="fname" /><br />
      Info: <input type="text" id="sendinfo" name="info" /><br />
      <p>
        <input type="button" id="submit" onclick="send_data()" tabindex="5" value="  Submit  " />
      </p>
    </div>

    <br />
    <div class="contrainer">
      <!--Make sure to put "enctype="multipart/form-data" inside form tag when uploading files -->
      <form action="https://seniorproject.ict.sci.psu.ac.th/students/ict/std-59/303155/stamphatyai/upload.php" method="post" enctype="multipart/form-data">
        <!--input tag for file types should have a "type" attribute with value "file"-->
        Select File : <input type="file" name="file" />
        <input type="submit" id="submit" name="submit" value="Upload" />
      </form>
    </div>
  </section>
</body>

<script>
  !(function(d, s, id) {
    var js,
      fjs = d.getElementsByTagName(s)[0];
    if (!d.getElementById(id)) {
      js = d.createElement(s);
      js.id = id;
      js.src = "https://weatherwidget.io/js/widget.min.js";
      fjs.parentNode.insertBefore(js, fjs);
    }
  })(document, "script", "weatherwidget-io-js");
</script>

</html>
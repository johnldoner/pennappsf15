<?php
session_start();
$user = "John";
?>
<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome</title>
    
    <style>
      body, .row {
        color:#fff;
      }
    </style>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootswatch.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>

<script>
$( document ).ready(function() {
var x = document.getElementById("demo");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
    latlon = position.coords.latitude + "," + position.coords.longitude;
    console.log(latlon);
    $.ajax({
        type: "POST",
        url: "notify.php?user=<?php echo $user ?>" + "&coord="+latlon,
        context: document.body
      }).done(function() {
          console.log('success!');
      }); 
}
    window.onload = getLocation;
  
      
      
});
  </script>


</head>

<body class="full">

<body onload="getLocation();">
  
  <button onclick="notify();">Notify</button>
 
</body>

</html>

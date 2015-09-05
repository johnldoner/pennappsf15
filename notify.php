<?php
session_start();
// $user = $_SESSION['uid'];
$user = "John";
$coord = $_GET['coord'];
?>
<script>
var latlon = position.coords.latitude + "," + position.coords.longitude;
console.log(latlon);
</script>
<?php
// $coord = ;

$subject = $user . ' is feeling a little down. Wanna talk?';
$message = 
"
<html>
<body>


<strong>" .
$coord . "</strong><br>
  <img src='http://maps.googleapis.com/maps/api/staticmap?center="
    . $coord . "&zoom=16&size=400x300&sensor=true&markers=color:blue%7Clabel:S%7C" . $coord ."'>
</body>
</html>

";
$headers = 'From: notifications@sikavi.com' . "\r\n" .
    'Reply-To: notifications@sikavi.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


if(isset($_POST['contact1'])) {
  $data1 = $_POST['contact1'];
  $pieces1 = explode(";", $data1);
  $to1 = $pieces1[1];
  mail($to1, $subject, $message, $headers);
}
if(isset($_POST['contact2'])) {
  $data2 = $_POST['contact2'];
  $pieces2 = explode(";", $data2);
  $to2 = $pieces2[1];
  mail($to2, $subject, $message, $headers);
}

    require "twilio/Services/Twilio.php";
 
    $AccountSid = "AC4b5141cf30bc59fc715748975f14894c";
    $AuthToken = "0a2567992a4a61287ff2a69952669784";
    $client = new Services_Twilio($AccountSid, $AuthToken);
 
    $people = array(
        "+15103789535" => "John Doner",
        "+18452450275" => "Nancy Minyanou"
    );
    foreach ($people as $number => $name) {
 
        $sms = $client->account->messages->sendMessage(
            "+12152740396", 
            $number,
            "Hello there, $user needs your help. He's at https://maps.google.com/maps?q=$coord ($coord). Could you talk to him?"
        );
    }
header("Location:../help/");
?>
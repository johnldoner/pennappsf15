<?php session_start();
include('connect.php');
global $db;
$uid = $_SESSION['uid'];
$sid = session_id();
if($_SESSION['loggedin'] != "true") {
  echo "Error! Please <a href='login.php'>Login</a>.";
  exit;
} else {
$tsid = "tmp_" . $sid;
$user_table = $_SESSION['user_table'];
echo "User Table: " .$user_table. "<br>";

// TYPE OF SURVEY
$sql = "SELECT * FROM `$user_table` WHERE DATE(dateTaken) = DATE(NOW())";
echo $sql;
$stmt = $db->query($sql);
$row_count = $stmt->rowCount();
echo $row_count.' rows selected';

 if ($row_count == 0) {
$table = "template_basic";
$_SESSION['curr_table'] = $table;
 } else {
   // check to see if there are any red flags
   $dateNow = date('Y-m-d');
   $sql = "SELECT * FROM `$user_table` WHERE DATE(dateTaken) = '$dateNow'";
   echo "<br>".$sql . "<br>";
 foreach($db->query($sql) as $row) {
    if($row['depressedyn'] == 'Yes') {
      $table = "template_depression";
    }
    if($row['suicidalyn'] == 'Yes') {
      $table = "template_suicide";
    }
    if($row['anxietyyn'] == 'Yes') {
      $table = "template_anxiety";
    }
    if($row['stressyn'] == 'Yes') {
      $table = "template_stressed";
    }
    if($row['burnoutyn'] == 'Yes') {
      $table = "template_burnout";
    }
    
    
    
    $_SESSION['curr_table'] = $table;
}
  
  echo "You have already taken this survey today!";
 }

$results = $db->query("SELECT * FROM `$tsid`");
    if(!$results) {
        echo "table does not exist... duplicating table";
        $db->query("CREATE TABLE `$tsid` LIKE `$table`");
        $db->query("INSERT `$tsid` SELECT * FROM `$table`");
    }
 //   header("Location:survey2.php");
 
}
?>

 <script> // location.replace("survey2.php"); </script>
 
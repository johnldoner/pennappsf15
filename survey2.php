<?php
session_start();
include('connect.php');
global $db;
$uid = $_SESSION['uid'];
global $uid;
$sid = session_id();
echo "userID: ".$uid;
echo "loggedin: ". $_SESSION['loggedin'] . "<br>";
if($_SESSION['loggedin'] != "true") {
  echo "Error! Please <a href='login.php'>Login</a>.";
  exit;
} else {

$tsid = "tmp_" . $sid;
echo $tsid . "<br>";

// TYPE OF SURVEY
$table = "basic";

$sql = "SELECT * FROM `$tsid`";
$stmt = $db->query($sql);
$_SESSION['row_count'] = $stmt->rowCount();

echo $_SESSION['row_count'] .' session rows selected';

$tid = "results_" . $uid;
  echo "<br>TID: " . $tid . "<br>";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $row = $db->query("SELECT * FROM `$tsid` LIMIT 1")->fetch(); 
  $qid = $row['id'];
  echo "QID: " .$qid . "<br>";
  $sid = session_id();
  $score = $_POST['choice'];
  echo $tid;
  $db->exec("INSERT INTO `$tid` (uid, qid, sid, score) VALUES ('$uid', '$qid', '$sid', '$score')");
  if ($_SESSION['row_count'] > 0) {
    $sql2 = "DELETE FROM `$tsid` WHERE id='$qid'";
  } else {
    $sql2 = "DROP TABLE `$tsid`";
  }
  $db->exec($sql2);
}

?>
<form action="/survey2.php" method="post">
<?php
  $row = $db->query("SELECT * FROM `$tsid` LIMIT 1")->fetch(); 
  if ($_SESSION['row_count'] > 1) {
    echo $row['question'] . "<br>" .
    '<input type="radio" name="choice" value="'.$row['s1'].'">' . $row['c1'] . "<br>" .
    '<input type="radio" name="choice" value="'.$row['s2'].'">' . $row['c2'] . "<br>" ;
  } else {
    echo "Thank you for completing the survey!";
  }
}
?> 
  <button type="submit">Submit</button>
</form>


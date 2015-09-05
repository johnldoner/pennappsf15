<?php
session_start();
include('connect.php');
global $db;
$user = $_SESSION['user'];
global $user;
$sid = session_id();
echo "userID: ".$user;
echo "loggedin: ". $_SESSION['loggedin'] . "<br>";
if($_SESSION['loggedin'] != "true") {
  echo "Error! Please <a href='login.php'>Login</a>.";
  exit;
} else {

// declare temp user progress table
$tsid = "tmp_" . $sid;
echo $tsid . "<br>";

// current conditional
$table = $_SESSION['curr_table'];

// the permanent user progress table
$user_table = $_SESSION['user_table'];

// CONDITIONALS
$sql_dep = "SELECT * FROM `$tsid` WHERE id > 1 AND id < 8";
$sql_sui = "SELECT * FROM `$tsid` WHERE id > 7 AND id < 12";
$sql_anx = "SELECT * FROM `$tsid` WHERE id > 12 AND id < 20";
$sql_str = "SELECT * FROM `$tsid` WHERE id > 20 AND id < 28";
$sql_bur = "SELECT * FROM `$tsid` WHERE id > 28";


// get how many rows are left in the temp user progress table sequence
$sql = "SELECT * FROM `$tsid`";
$stmt = $db->query($sql);
$_SESSION['row_count'] = $stmt->rowCount();
echo $_SESSION['row_count'] .' session rows selected';


// $tid is the permanent progress table, where user progress is saved
/*$tid = "result_" . $user;
  echo "<br>TID: " . $tid . "<br>";
  */

// IF SURVEY QUESTION IS DONE
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  // get the current Question ID
  $row = $db->query("SELECT * FROM `$tsid` LIMIT 1")->fetch(); 
  $qid = $row['id'];
  echo "QID: " .$qid . "<br>";
  $sid = session_id();
  $response = $_POST['choice']; // whatever the user has picked
  
  // permanent user progress table
  $user_table = $_SESSION['user_table'];
  echo "User Table: " .$user_table. "<br>";
  
  // figure out if there are any posts from today. $row_count = 0 is NO, anything else is YES
  $sql = "SELECT * FROM `$user_table` WHERE DATE(dateTaken) = DATE(NOW())";
  //  echo $sql;
    $stmt = $db->query($sql);
    $row_count = $stmt->rowCount();
    echo $row_count.' rows selected';
    
    // current table = phq4
    if($table == "template_basic") {
      $row = $db->query("SELECT * FROM `$tsid` LIMIT 1")->fetch(); 
        if ($_SESSION['row_count'] > 0) {
          if($row['id'] == 1) { $wildcard = 'depressedyn'; }
          if($row['id'] == 12) { $wildcard = 'anxietyyn'; }
          if($row['id'] == 20) { $wildcard = 'stressyn'; }
          if($row['id'] == 28) { $wildcard = 'burnoutyn'; }
          $score = $_POST['choice'];
          $dateNow = date('Y-m-d');
          echo "<br>Row ID: ". $row['id'] . "<br>";
          echo "<br>Row count: " . $row_count."<br>";
          if ($row_count > 0) {
              $sql2 = "UPDATE `$user_table` SET `$wildcard`='$score' WHERE `dateTaken`='$dateNow'";
              echo "<br>". $sql2 . "<br>";
              $stmt = $db->exec($sql2);
            } else {
              $sql2 = "INSERT INTO `$user_table` (dateTaken, $wildcard) VALUES ('$dateNow', '$score')";
              $stmt = $db->exec($sql2);
              echo "<br>". $sql2 . "<br>";
            }
        }
      unset($_SESSION['curr_table']);
    }
    
    
    // current table = depression
    if($table == "template_depression" || $_GET['p'] = "d") {
      $row = $db->query("SELECT * FROM `$tsid` LIMIT 1")->fetch(); 
        if ($_SESSION['row_count'] > 0) {
          if($row['id'] == 2) { $wildcard = 'depression_q1'; }
          if($row['id'] == 3) { $wildcard = 'depression_q2'; }
          if($row['id'] == 4) { $wildcard = 'depression_q3'; }
          if($row['id'] == 5) { $wildcard = 'depression_q4'; }
          if($row['id'] == 6) { $wildcard = 'depression_q5'; }
          if($row['id'] == 7) { $wildcard = 'depression_q6'; }
          $score = $_POST['choice'];
          $dateNow = date('Y-m-d');
          echo "<br>Row ID: ". $row['id'] . "<br>";
          echo "<br>Row count: " . $row_count."<br>";
          $sql2 = "UPDATE `$user_table` SET `$wildcard`='$score' WHERE `dateTaken`='$dateNow'";
          echo "<br>". $sql2 . "<br>";
          $stmt = $db->exec($sql2);
        }
      unset($_SESSION['curr_table']);
    }
    
    
      // current table = suicide
    if($table == "template_suicide" || $_GET['p'] = "s") {
      $row = $db->query("SELECT * FROM `$tsid` LIMIT 1")->fetch(); 
        if ($_SESSION['row_count'] > 0) {
          if($row['id'] == 8) { $wildcard = 'suicide_q1'; }
          if($row['id'] == 9) { $wildcard = 'suicide_q2'; }
          if($row['id'] == 10) { $wildcard = 'suicide_q3'; }
          if($row['id'] == 11) { $wildcard = 'suicide_q4'; }
          $score = $_POST['choice'];
          $dateNow = date('Y-m-d');
          echo "<br>Row ID: ". $row['id'] . "<br>";
          echo "<br>Row count: " . $row_count."<br>";
          $sql2 = "UPDATE `$user_table` SET `$wildcard`='$score' WHERE `dateTaken`='$dateNow'";
          echo "<br>". $sql2 . "<br>";
          $stmt = $db->exec($sql2);
        }
      unset($_SESSION['curr_table']);
    }  
    
          // current table = anxiety
    if($table == "template_anxiety" || $_GET['p'] = "a") {
      $row = $db->query("SELECT * FROM `$tsid` LIMIT 1")->fetch(); 
        if ($_SESSION['row_count'] > 0) {
          if($row['id'] == 13) { $wildcard = 'anxiety_q1'; }
          if($row['id'] == 14) { $wildcard = 'anxiety_q2'; }
          if($row['id'] == 15) { $wildcard = 'anxiety_q3'; }
          if($row['id'] == 16) { $wildcard = 'anxiety_q4'; }
          if($row['id'] == 17) { $wildcard = 'anxiety_q5'; }
          if($row['id'] == 18) { $wildcard = 'anxiety_q6'; }
          if($row['id'] == 19) { $wildcard = 'anxiety_q7'; }
          $score = $_POST['choice'];
          $dateNow = date('Y-m-d');
          echo "<br>Row ID: ". $row['id'] . "<br>";
          echo "<br>Row count: " . $row_count."<br>";
          $sql2 = "UPDATE `$user_table` SET `$wildcard`='$score' WHERE `dateTaken`='$dateNow'";
          echo "<br>". $sql2 . "<br>";
          $stmt = $db->exec($sql2);
        }
      unset($_SESSION['curr_table']);
    }  
    
              // current table = stress
    if($table == "template_stressed" || $_GET['p'] = "s") {
      $row = $db->query("SELECT * FROM `$tsid` LIMIT 1")->fetch(); 
        if ($_SESSION['row_count'] > 0) {
          if($row['id'] == 21) { $wildcard = 'stress_q1'; }
          if($row['id'] == 22) { $wildcard = 'stress_q2'; }
          if($row['id'] == 23) { $wildcard = 'stress_q3'; }
          if($row['id'] == 24) { $wildcard = 'stress_q4'; }
          if($row['id'] == 25) { $wildcard = 'stress_q5'; }
          if($row['id'] == 26) { $wildcard = 'stress_q6'; }
          if($row['id'] == 27) { $wildcard = 'stress_q7'; }
          $score = $_POST['choice'];
          $dateNow = date('Y-m-d');
          echo "<br>Row ID: ". $row['id'] . "<br>";
          echo "<br>Row count: " . $row_count."<br>";
          $sql2 = "UPDATE `$user_table` SET `$wildcard`='$score' WHERE `dateTaken`='$dateNow'";
          echo "<br>". $sql2 . "<br>";
          $stmt = $db->exec($sql2);
        }
      unset($_SESSION['curr_table']);
    }  
    
                // current table = burnout
    if($table == "template_burnedout" || $_GET['p'] = "b") {
      $row = $db->query("SELECT * FROM `$tsid` LIMIT 1")->fetch(); 
        if ($_SESSION['row_count'] > 0) {
          if($row['id'] == 29) { $wildcard = 'burnout_q1'; }
          if($row['id'] == 30) { $wildcard = 'burnout_q2'; }
          if($row['id'] == 31) { $wildcard = 'burnout_q3'; }
          if($row['id'] == 32) { $wildcard = 'burnout_q4'; }
          if($row['id'] == 33) { $wildcard = 'burnout_q5'; }
          if($row['id'] == 34) { $wildcard = 'burnout_q6'; }
          if($row['id'] == 35) { $wildcard = 'burnout_q7'; }
          $score = $_POST['choice'];
          $dateNow = date('Y-m-d');
          echo "<br>Row ID: ". $row['id'] . "<br>";
          echo "<br>Row count: " . $row_count."<br>";
          $sql2 = "UPDATE `$user_table` SET `$wildcard`='$score' WHERE `dateTaken`='$dateNow'";
          echo "<br>". $sql2 . "<br>";
          $stmt = $db->exec($sql2);
        }
      unset($_SESSION['curr_table']);
    }  
    
    
    
    
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
    echo $row['question'] . "<br>";
  if ($_SESSION['row_count'] > 1) {
    if(!empty($row['c1'])) { echo '<input type="radio" name="choice" value="'.$row['c1'].'">' . $row['c1'] . "<br>"; }
    if(!empty($row['c2'])) { echo '<input type="radio" name="choice" value="'.$row['c2'].'">' . $row['c2'] . "<br>"; }
    if(!empty($row['c3'])) { echo '<input type="radio" name="choice" value="'.$row['c3'].'">' . $row['c3'] . "<br>"; }
    if(!empty($row['c4'])) { echo '<input type="radio" name="choice" value="'.$row['c4'].'">' . $row['c4'] . "<br>"; }
    if(!empty($row['c5'])) { echo '<input type="radio" name="choice" value="'.$row['c5'].'">' . $row['c5'] . "<br>"; }
    if(!empty($row['c6'])) { echo '<input type="radio" name="choice" value="'.$row['c6'].'">' . $row['c6'] . "<br>"; }
    
    echo '<button type="submit">Submit</button>';
  } else {
    $sql2 = "DROP TABLE `$tsid`";
    $db->exec($sql2);
    echo "Thank you for completing the survey!";
  }
}
?> 
</form>


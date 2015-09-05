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

// TYPE OF SURVEY
$table = "basic";

$tid = "results_" . $uid;
$db->exec("CREATE TABLE IF NOT EXISTS `$tid` (
uid INT(10),
qid INT(10),
sid VARCHAR(200),
score TINYINT(3),
timestamp TIMESTAMP
)");

$results = $db->query("SHOW TABLES LIKE `'$tsid'`");

    if(!$results) {
        echo "table does not exist... duplicating table";
        $db->query("CREATE TABLE `$tsid` LIKE `$table`");
        $db->query("INSERT `$tsid` SELECT * FROM `$table`");
    }
 //   header("Location:survey2.php");
}
?>
 <script> location.replace("survey2.php"); </script>
<?php
session_start();
include("connect.php");
$uid = $_SESSION['uid'];
$user_table = "result_" . $uid;
 if($_SERVER['REQUEST_METHOD'] == 'POST') {
   $email = $_POST['email'];
   $npass = md5($_POST['pass']);
   $affected_rows = $db->exec("INSERT INTO users (email, pass)
    VALUES ('$email', '$npass')");
  echo $affected_rows.' row inserted';
    $user_table = "result_" . $uid;
    $db>exec("CREATE TABLE `$user_table` LIKE `table_user_template`");
    $db>exec("INSERT `$user_table` SELECT * FROM `table_user_template`");
 }
?>
<form action="register.php" method="post">
  <h2>Register</h2>
  Email: <input type="email" length="30" name="email"><br>
  Password: <input type="password" length="30" name="pass"><br>
  <a href="login.php">Returning user? Login</a>
  <br>
  <button type="submit">Register</button>
</form>
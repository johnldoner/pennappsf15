<?php
session_start();
include("connect.php");
 if($_SERVER['REQUEST_METHOD'] == 'POST') {
   $email = $_POST['email'];
   $npass = md5($_POST['pass']);
   $affected_rows = $db->exec("INSERT INTO users (email, pass)
    VALUES ('$email', '$npass')");
  echo $affected_rows.' were affected';
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
<?php
session_start();
echo "loggedin: ". $_SESSION['loggedin'] . "<br>";
include("connect.php");
if($_SERVER['REQUEST_METHOD'] == 'POST') {
   $user = $_POST['user'];
   $npass = md5($_POST['pass']);
   foreach($db->query("SELECT * FROM users WHERE user = '$user'") as $row) {
    if($npass == $row['pass']) {
      echo "Login successful!";
      $_SESSION['loggedin'] = "true";
      $_SESSION['uid'] = $row['uid'];
      echo "Proceed to <a href='survey.php'>survey</a>.";
    } else {
      echo "Invalid username/password!";
    }
  }
 }
?>
<form action="login.php" method="post">
  <h2>Login</h2>
  Username: <input type="user" length="30" name="user"><br>
  Password: <input type="password" length="30" name="pass"><br>
  <a href="register.php">Register</a>
  <br>
  <button type="submit">Login</button>
</form>
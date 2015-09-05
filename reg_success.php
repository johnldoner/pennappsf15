<?php
session_start();
include("connect.php");
$db->query("SELECT * FROM users WHERE email = '$email'");

foreach($db->query("SELECT * FROM users WHERE email = '$email'") as $row) {
    if($npass == $row['pass']) {
      echo "Login successful!";
      $_SESSION['loggedin'] = "true";
      $_SESSION['uid'] = $row['uid'];
      echo "Proceed to <a href='survey.php'>survey</a>.";
    } else {
      echo "Invalid username/password!";
    }
  }
  
    $user_table = "result_" . $uid;
    $db>exec("CREATE TABLE `$user_table` LIKE `table_user_template`");
    $db>exec("INSERT `$user_table` SELECT * FROM `table_user_template`");
?>
<form action="register.php" method="post">
  <h2>Register</h2>
  Email: <input type="email" length="30" name="email"><br>
  Password: <input type="password" length="30" name="pass"><br>
  <a href="login.php">Returning user? Login</a>
  <br>
  <button type="submit">Register</button>
</form>
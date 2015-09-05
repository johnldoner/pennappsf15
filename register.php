<?php
session_start();
include("connect.php");
 if($_SERVER['REQUEST_METHOD'] == 'POST') {
   $user = $_POST['user'];
   $npass = md5($_POST['pass']);
   $user_table = "result_" . $user;
   $affected_rows = $db->exec("INSERT INTO users (user, pass)
    VALUES ('$user', '$npass')");
  echo $affected_rows.' row inserted';
  $_SESSION['loggedin'] = "true";
  $_SESSION['user'] = $user;
    ?>
    
    <script> location.replace("reg_success.php"); </script>
    
    <?php
 }
?>
<form action="register.php" method="post">
  <h2>Register</h2>
  Username: <input type="text" length="30" name="user"><br>
  Password: <input type="password" length="30" name="pass"><br>
  <a href="login.php">Returning user? Login</a>
  <br>
  <button type="submit">Register</button>
</form>
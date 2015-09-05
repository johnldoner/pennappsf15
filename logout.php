<?php
session_start();
session_unset();
session_destroy();
?>
You've been logged out. <a href="login.php">Login again.</a>
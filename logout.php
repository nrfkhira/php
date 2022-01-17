<?php
session_start();
session_unset();
session_destroy();
session_start();

$_SESSION['message'] = "You've logged out.";
header("Location: /login.php");
exit();
?>

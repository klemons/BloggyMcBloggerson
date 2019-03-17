<!doctype html>
<?php
session_start();
unset($_SESSION['logged_in']);
header("Location: main.php");
?>
<head></head>
<body></body>
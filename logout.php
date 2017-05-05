<?php
session_start();
unset($_SESSION['test']);
echo "<script>alert('注销成功');window.location.href='login.php';</script>";
?>

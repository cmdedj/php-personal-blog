<?php
$username = htmlspecialchars($_POST['username']);
$password = MD5($_POST['password']);
require_once("admin/connect.php");
$result = mysqli_query($con, "select* from user where username='$username'");
$row = mysqli_fetch_assoc($result);
if(!$row) {
	echo "<script>alert('用户名不存在');window.location.href='login.php';</script>";
}else{
	if($password==MD5($row["password"])){
		session_start();
		$_SESSION['test'] = 1;
		echo "<script>alert('登陆成功');window.location.href='admin/console.php';</script>";
	}
	echo "<script>alert('用户名或密码错误');window.location.href='login.php';</script>";
}

?>
<?php
session_start();
if(!isset($_SESSION['test']))
{
	echo "<script>alert('请登陆后访问');window.location.href='/login.php';</script>";
}
	require_once("connect.php");
	$id = $_POST["id"];
	date_default_timezone_set('PRC');
	if(!(isset($_POST["title"])&&(!empty($_POST["title"])))){
		echo "<script>alert('标题不能为空');window.location.href='article.modify.php?id=$id'</script>";

	}elseif(!(isset($_POST["author"])&&(!empty($_POST["author"])))){
	echo "<script>alert('作者不能为空');window.location.href='article.modify.php?id=$id'</script>";

	}elseif(!(isset($_POST["description"])&&(!empty($_POST["description"])))){
	echo "<script>alert('简介不能为空');window.location.href='article.modify.php?id=$id'</script>";

	}elseif(!(isset($_POST["content"])&&(!empty($_POST["content"])))){
	echo "<script>alert('内容不能为空');window.location.href='article.modify.php?id=$id'</script>";

	}else{
	$title = $_POST["title"];
	$author = $_POST["author"];
	$description = $_POST["description"];
	$content = $_POST["content"];
	$dateline = time();
	$updatesql = "update article set title='$title',author='$author',description='$description',content='$content',dateline=$dateline where id=$id";
	if(mysqli_query($con,$updatesql)){
		echo "<script>alert('修改文章成功');window.location.href='article.manage.php'</script>";
	}else{
		echo "<script>alert('修改文章失败');window.location.href='article.manage.php'</script>";
	}
	}
?>


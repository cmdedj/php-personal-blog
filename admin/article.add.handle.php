<?php
session_start();
if(!isset($_SESSION['test']))
{
	echo "<script>alert('请登陆后访问');window.location.href='/login.php';</script>";
}
	require_once("connect.php");
	date_default_timezone_set('PRC');
	if(!(isset($_POST["title"])&&(!empty($_POST["title"])))){
		echo "<script>alert('标题不能为空');window.location.href='article.add.php'</script>";

	}elseif(!(isset($_POST["author"])&&(!empty($_POST["author"])))){
	echo "<script>alert('作者不能为空');window.location.href='article.add.php'</script>";

	}elseif(!(isset($_POST["description"])&&(!empty($_POST["description"])))){
	echo "<script>alert('简介不能为空');window.location.href='article.add.php'</script>";

	}elseif(!(isset($_POST["content"])&&(!empty($_POST["content"])))){
	echo "<script>alert('内容不能为空');window.location.href='article.add.php'</script>";

	}else{
	$title = $_POST["title"];
	$author = $_POST["author"];
	$description = $_POST["description"];
	$content = $_POST["content"];
	$dateline = time();
	$insertsql = "insert into article(title, author, description, content, dateline) values('$title', '$author', '$description', '$content', $dateline)";
	if(mysqli_query($con,$insertsql)){
		echo "<script>alert('发布文章成功');window.location.href='article.add.php'</script>";
	}else{
		echo "<script>alert('发布文章失败');window.location.href='article.add.php'</script>";
	}
	}
?>


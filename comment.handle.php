<?php
require_once("admin/connect.php");
date_default_timezone_set('PRC');
$articleid = $_POST["articleid"];
if(!(isset($_POST["name"])&&(!empty($_POST["name"])))){
	echo "<script>alert('ID不能为空');window.location.href='article.show.php?id=$articleid'</script>";

}elseif(!(isset($_POST["comment"])&&(!empty($_POST["comment"])))){
	echo "<script>alert('内容不能为空');window.location.href='article.show.php?id=$articleid'</script>";

}else{
$result = mysqli_query($con, "select* from article where id='$articleid'");
$row = mysqli_fetch_assoc($result);
$articlename = $row["title"];
$name = $_POST["name"];
$ip = $_SERVER['REMOTE_ADDR'];
$comment = $_POST["comment"];
$dateline = time();
$insertsql = "insert into comment(articleid, articlename, name, ip, comment, dateline) values($articleid, '$articlename', '$name', '$ip', '$comment', $dateline)";
if(mysqli_query($con,$insertsql)){
	echo "<script>alert('发布评论成功');window.location.href='article.show.php?id=$articleid'</script>";
}else{
	echo "<script>alert('发布评论失败');window.location.href='article.show.php?id=$articleid'</script>";
}
}
?>
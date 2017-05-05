<?php
session_start();
if(!isset($_SESSION['test']))
{
	echo "<script>alert('请登陆后访问');window.location.href='/login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/pic/chis.jpg">

    <title>Console</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <link href="/css/dashboard.css" rel="stylesheet">

    <script src="/js/ie-emulation-modes-warning.js"></script>

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Console</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/index.php">Home</a></li>
                <li><a href="/logout.php">Exit</a></li>
            </ul>

        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li>Server</a></li>
                <li class="active"><a href="#">ServerState</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li>Article</a></li>
                <li><a href="article.add.php">ArticleAdd</a></li>
                <li><a href="article.manage.php">ArticleManagement</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li>Comment</a></li>
                <li><a href="comment.manage.php">CommentManagement</a></li>
            </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <p>当前登陆ip:<?php echo $_SERVER['REMOTE_ADDR'] ?></p>
            <p>服务器ip:<?php echo GetHostByName($_SERVER['SERVER_NAME']) ?></p>
            <p>系统时间:<?php date_default_timezone_set('PRC'); echo date("Y-m-d H:i:s",time())?></p>
           <p>系统类型及版本号:<?php echo php_uname() ?></p>
            <p>PHP版本:<?php echo PHP_VERSION ?></p>
        </div>
    </div>
</div>

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/docs.min.js"></script>
<script src="/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>

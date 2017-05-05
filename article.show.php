<?php
    require_once("admin/connect.php");
    $id = intval($_GET["id"]);
    $updatesql = "update article set clicknum=clicknum+1 where id=$id";
    mysqli_query($con,$updatesql);
    $sql = ("select* from article where id=$id");
    $query = mysqli_query($con,$sql);
    if($query&&mysqli_num_rows($query)){
        $row = mysqli_fetch_assoc($query);
    }else{
        echo "这篇文章不存在";
        exit;
    }
$commentsql = ("select* from comment where articleid='$id' order by dateline desc");
$commentquery = mysqli_query($con,$commentsql);
$count = mysqli_num_rows($commentquery);
if($commentquery&&mysqli_num_rows($commentquery)){
	while($rows = mysqli_fetch_assoc($commentquery)){
		$data[] = $rows;
	}
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
    <link rel="icon" href="pic/chis.jpg">

    <title>CMdeDJ</title>

      <link href="css/bootstrap.min.css" rel="stylesheet">

      <link href="css/blog.css" rel="stylesheet">

      <script src="js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item" href="index.php">Home</a>
          <a class="blog-nav-item active" href="article.php?p=1">Article</a>
          <a class="blog-nav-item" href="photo.php">Photo</a>
          <a class="blog-nav-item" href="login.php">Console</a>
          <a class="blog-nav-item" href="about.php">About</a>
        </nav>
      </div>
    </div>

    <div class="container">

        <div class="row">

            <div class="col-sm-8 blog-main">
                <br />
                <br />
                <div class="blog-post">
                    <h2 class="blog-post-title"><?php echo $row["title"] ?></h2>
                    <br />
                    <p style="position:absolute;right:0px;">访问量:<?php echo $row["clicknum"] ?></p>
                    <br />
                    <p class="blog-post-meta"><?php date_default_timezone_set('PRC'); echo date("Y-m-d H:i:s",$row["dateline"]) ?> by <?php echo $row["author"] ?></a></p>
                    <?php echo $row["content"] ?>
                </div><!-- /.blog-post -->

            </div><!-- /.blog-main -->

            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <form name="form" method="post" action="comment.handle.php">
                <br />
                <br />
                <br />
                <p>ID</p>
                <input name="articleid" type="hidden" value="<?php echo $id?>">
                <input name="name" type="text" class="form-control" placeholder="输入你的ID" autofocus>
                <p>内容</p>
                <textarea name="comment"  class="form-control" cols="10" rows="5" placeholder="输入你的内容"></textarea>
                <div style="position:absolute;right:15px;top:275px;">
                <input type="submit" class="btn btn-primary" value="评论">
                </div>
            </form>
                <br />
                <br />
                <br />
				<?php
				if(empty($data)){
					echo "当前没有评论";
				}else {
				foreach ($data as $value) {
				?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $count."楼"; $count--;?></h3>
                        <p>ID:<?php echo $value["name"] ?></p>
                        <p>IP:<?php echo $value["ip"] ?></p>
                    </div>
                    <div class="panel-body">
                        <p><?php echo $value["comment"] ?></p>
                        <p class="blog-post-meta"><?php date_default_timezone_set('PRC'); echo date("Y-m-d H:i:s",$value["dateline"]) ?></p>
                    </div>
                </div>
					<?php
				}
				}
				?>
            </div><!-- /.blog-sidebar -->

        </div><!-- /.row -->

    </div><!-- /.container -->

    <div class="blog-footer">
        <p>Powered By<a href="#">@cmdedj</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

<?php
    require_once("admin/connect.php");
    $pageSize = 5;
    $page = intval($_GET["p"]);
    $sql = ("select* from article order by dateline desc limit ".($page-1)*$pageSize .",$pageSize");
    $query = mysqli_query($con,$sql);
    if($query&&mysqli_num_rows($query)){
        while($row = mysqli_fetch_assoc($query)){
            $data[] = $row;
        }
    }
    $total_sql = ("select count(*) from article");
    $total_result = mysqli_fetch_array(mysqli_query($con,$total_sql));
    if(!($total_result[0])){
        $total = 1;
    }else{
		$total = $total_result[0];
    }
    $total_pages = ceil($total/$pageSize);

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
                <?php
                if(empty($data)){
                    echo "当前没有文章";
                }else {
                    foreach ($data as $value) {
						?>
                        <div class="blog-post">
                            <br />
                            <h2 class="blog-post-title"><a href="article.show.php?id=<?php echo $value["id"] ?>"><?php echo $value["title"] ?></a></h2>
                            <p><?php echo $value["description"] ?></p>
                            <p class="blog-post-meta"><?php date_default_timezone_set('PRC'); echo date("Y-m-d H:i:s",$value["dateline"]) ?> by <?php echo $value["author"] ?></p>
                        </div><!-- /.blog-post -->
						<?php
					}
				}
                ?>

                <nav>
                    <ul class="pager">
                        <?php
                        $page_banner = "";
						if($page > 1){
							$page_banner .= "<li><a href='article.php?p=1'>首页</a></li>";
							$page_banner .= "<li><a href='article.php?p=".($page-1)."'>上一页</a></li>";
                        }
                        if($page < $total_pages){
							$page_banner .= "<li><a href='article.php?p=".($page+1)."'>下一页</a></li>";
							$page_banner .= "<li><a href='article.php?p=".($total_pages)."'>尾页</a></li>";
                        }
                        echo $page_banner;
                        echo "<li>第$page/$total_pages 页</li>";
                        ?>
                    </ul>
                </nav>

            </div><!-- /.blog-main -->

            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                <br />
                <div>
                <form class="navbar-form" method="get" action="article.search.php">
                    <input name="key" type="text" class="form-control" placeholder="Search..." autofocus>
                    <div style="position:absolute;right:40px;top:70px;">
                    <input type="submit" class="btn btn-primary" value="search" >
                    </div>
                </form>
                </div>
                <br />
                <br />
                <div class="sidebar-module sidebar-module-inset">
                    <h4>About</h4>
                    <p>喵了个咪的~</p>
                </div>
                <div class="sidebar-module">
                    <h4>Archives</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">January</a></li>
                        <li><a href="#">February</a></li>
                        <li><a href="#">March</a></li>
                        <li><a href="#">April</a></li>
                        <li><a href="#">May</a></li>
                        <li><a href="#">June</a></li>
                        <li><a href="#">July</a></li>
                        <li><a href="#">August</a></li>
                        <li><a href="#">September</a></li>
                        <li><a href="#">October</a></li>
                        <li><a href="#">November</a></li>
                        <li><a href="#">December</a></li>
                    </ol>
                </div>
                <div class="sidebar-module">
                    <h4>Elsewhere</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
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

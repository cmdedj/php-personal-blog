<?php
session_start();
if(isset($_SESSION['test']))
	echo "<script>window.location.href='admin/console.php';</script>";
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

      <link href="css/signin.css" rel="stylesheet">

      <link href="css/bootstrap.min.css" rel="stylesheet">

      <link href="css/blog.css" rel="stylesheet">

      <script src="js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item" href="index.php">Home</a>
          <a class="blog-nav-item" href="article.php?p=1">Article</a>
          <a class="blog-nav-item" href="photo.php">Photo</a>
          <a class="blog-nav-item active" href="#">Console</a>
          <a class="blog-nav-item" href="about.php">About</a>
        </nav>
      </div>
    </div>

    <br />
    <br />
    <br />

    <div class="container">

        <form class="form-signin" role="form" method="post" action="login.handle.php">
            <h2 class="form-signin-heading">Please sign in</h2>
            <input name="username" type="email" class="form-control" placeholder="Email address" required autofocus>
            <input name="password" type="password" class="form-control" placeholder="Password" required>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>

    </div> <!-- /container -->

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

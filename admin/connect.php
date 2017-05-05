<?php
	require_once("config.php");
	$con = mysqli_connect(HOST,USERNAME,PASSWORD);
	mysqli_select_db($con,"www");
	mysqli_query($con,"set names utf8");
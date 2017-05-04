<?php
	require_once('config.php'); //包含文件进来,只包含一次
	//连库
	if(!($con = mysql_connect(DBHOST, DBUSER, DBPASSWORD))){
		echo mysql_error();
	}
	//选库
	if(!mysql_select_db('content')){
		echo mysql_error();
	}
	//字符集
	if(!mysql_query('set names utf8')){
		echo mysql_error();
	}
?>
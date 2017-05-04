<?php
	require_once('connect.php'); //连接数据库的文件，外部文件 conn.php 的内容就将被包含进该自身php文件
	$username = $_POST['username'];
	$userpassword = $_POST['userpassword'];
	$sqluser = "select * from user where username='$username' and userpassword='$userpassword'";
	$queryuser = mysql_query($sqluser);
	$rowuser = mysql_fetch_array($queryuser); //从结果集中取得一行作为关联数组
	if ($rowuser && is_array($rowuser) && !empty($rowuser)) {
	    if ($rowuser['username'] == $username && $rowuser['userpassword'] == $userpassword) {
	        	echo "<p style='width: 100%; max-width: 767px; margin: 50px auto 0; font-size: 18px;'>登录成功,两秒后跳转</p>";
	        	echo "<script>setTimeout(function(){window.location.href='/admin/admin.php'},2000)</script>";
	    }
	} else {
	    echo "<script>alert('用户名密码错误');window.location.href='login.php';</script>";
	} 
?>
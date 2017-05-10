<?php
	require_once('../connect.php');
	$id = $_GET['id'];
	$deletesql = "delete from tag where id=$id";
	if(mysql_query($deletesql)){
		echo "<script>alert('删除标签成功');window.location.href='tag.manage.php';</script>";
	}else{
		echo "<script>alert('删除标签失败');window.location.href='tag.manage.php';</script>";
	}
?>
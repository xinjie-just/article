<?php
	header('content-type:text/html;charset=utf-8');
	require_once('../connect.php');
	//把传递过来的信息入库,在入库之前对所有的信息进行校验。
	$title = $_POST['title'];
	$description = $_POST['description'];
	$insertsql = "insert into tag(tag_name, tag_desc) values('$title', '$description')"; //将从前台接收到的信息插入到数据库
	if(mysql_query($insertsql)){
		echo "<script>alert('添加标签成功');window.location.href='tag.manage.php';</script>";
	}else{
		echo "<script>alert('添加标签失败');window.location.href='add.tag.php';</script>";
	}
?>
<?php
	header('content-type:text/html;charset=utf-8');
	include_once 'upload.func.php';
	$fileInfo=$_FILES['img'];
	// $newName=uploadFile($fileInfo);
	// echo $newName;
	// $newName=uploadFile($fileInfo,'imooc');
	// echo $newName;
	//$allowExt='txt';
	$allowExt=array('jpeg','jpg','png','gif');
	$newName=uploadFile($fileInfo,'uploads',true,$allowExt);
	//echo $newName;

	require_once('../connect.php');
	//把传递过来的信息入库,在入库之前对所有的信息进行校验。
	$title = $_POST['title'];
	$author = $_POST['author'];
	$description = $_POST['description'];
	$body = $_POST['body'];
	$dateline =  time();
	$insertsql = "insert into article(title, author, description, img, body, dateline) values('$title', '$author', '$description', '$newName', '$body', $dateline)"; //将从前台接收到的信息插入到数据库
	if(mysql_query($insertsql)){
		echo "<script>alert('发布文章成功');window.location.href='manage.message.list.php';</script>";
	}else{
		echo "<script>alert('发布失败');window.location.href='add.message.php';</script>";
	}
?>
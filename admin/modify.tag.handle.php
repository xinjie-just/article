<?php	
	require_once('../connect.php');
	$id = $_POST['id'];
	$title = $_POST['title'];
	$author = $_POST['author'];
	$description = $_POST['description'];
	$body = $_POST['body'];
	$dateline =  time();
	$updatesql = "update article set title='$title',author='$author',description='$description',body='$body',dateline=$dateline where id=$id"; // 这里没有修改 id
	if(mysql_query($updatesql)){
		echo "<script>alert('修改文章成功');window.location.href='manage.message.list.php';</script>";
	}else{
		echo "<script>alert('修改文章失败');window.location.href='modify.message.php';</script>";
	}
?>
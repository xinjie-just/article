<?php	
	require_once('../connect.php');
	$id = $_POST['id'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$updatesql = "update tag set tag_name='$title',tag_desc='$description' where id=$id"; // 这里没有修改 id
	if(mysql_query($updatesql)){
		echo "<script>alert('修改标签成功');window.location.href='tag.manage.php';</script>";
	}else{
		echo "<script>alert('修改标签失败');window.location.href='modify.tag.php';</script>";
	}
?>
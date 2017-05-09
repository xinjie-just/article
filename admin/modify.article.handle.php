<?php	
	require_once('../connect.php');
	
	//把传递过来的信息入库,在入库之前对所有的信息进行校验。
	$id = $_POST['id'];	
	$title = $_POST['title'];
	$tag = $_POST['modifyArticleTag'];
	$link = $_POST['link'];
	$description = $_POST['description'];
	$body = $_POST['content'];
	$dateline =  time();

	$updatesql = "update article set title='$title',tag_codes='$tag',content_url='$link',description=$description,body='$body',dateline=$dateline where id=$id"; // 这里没有修改 id
	if(mysql_query($updatesql)){
		echo "<script>alert('修改资讯成功');window.location.href='article.message.php';</script>";
	}else{
		echo "<script>alert('修改资讯失败');window.location.href='modify.article.php';</script>";
	}
?>
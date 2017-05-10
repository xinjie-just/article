<?php
	header('content-type:text/html;charset=utf-8');
	include_once 'upload.func.php';
	$fileInfo=$_FILES['img'];
	$allowExt=array('jpeg','jpg','png','gif');
	$newName=uploadFile($fileInfo,'uploads',true,$allowExt);
	//echo $newName;

	require_once('../connect.php');
	//把传递过来的信息入库,在入库之前对所有的信息进行校验。
	$title = $_POST['title'];
	$tag = $_POST['addArticleTag'];
	$link = $_POST['link'];
	$description = $_POST['description'];
	$content = $_POST['content'];
	/*echo "hello";
	echo "description 的个数".strlen($description);*/
	
	if(strlen($description) == 0) {
		if(strlen($content) >= 200) {
			$description = substr($content , 0 , 200);
		} else {
			$description = $content;
		}		
	}
	
	$dateline =  time();
	$insertsql = "insert into article(title, tag_name, content_url, description, body, photo, dateline) values('$title', '$tag', '$link', '$description', '$content', '$newName', $dateline)"; //将从前台接收到的信息插入到数据库
	if(mysql_query($insertsql)){
		echo "<script>alert('添加资讯成功');location.href='article.manage.php';</script>";
	}else{
		echo "<script>alert('添加资讯失败');setTimeout(function(){location.href='add.article.php';},20000);</script>";
	}
?>
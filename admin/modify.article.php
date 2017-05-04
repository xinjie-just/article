<?php
	require_once('../connect.php');
	//读取旧信息
	$id = $_GET['id'];
	$query = mysql_query("select * from article where id=$id");
	$data = mysql_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0;">
		<title>修改资讯</title>
		<meta name="keywords" content="个人健康管理,健康小区建设,基础医疗服务,HCC,智能、便捷、全面,远程医疗服务" />
    	<meta name="description" content="HCC日常健康管理体系是以个人为中心的健康生活平台，引导全民积极参与健康管理，为个人提供全面的健康生活服务，帮助人们建立科学合理的生活方式和健康管理方式的服务平台。" />
    	<link rel="stylesheet" href="/style/message.css" />
	</head>
	<body>
		<!--<header>
			<h1>修改资讯</h1>
		</header>-->
		<main>
			<div class="sidebar">
				<aside class="left-sidebar">
					<nav>
						<ul>
							<li><a href="add.tag.php" title="标签管理">标签管理</a></li>
							<li><a href="manage.tag.php" title="文章管理" class="active">文章管理</a></li>
						</ul>
					</nav>
				</aside>
				<aside class="right-sidebar">
					<nav>
						<ul>
							<li><a href="add.message.php" title="添加文章" class="active">添加文章</a></li>
							<li><a href="manage.message.list.php" title="管理文章">管理文章</a></li>
						</ul>
					</nav>
					<p class="tips">带红色星号为必填(必选)字段</p>
					<form action="modify.message.handle.php" method="post" enctype="multipart/form-data" id="modifyMessage" name="modifyMessage" class="modify-message-form">
						<input type="hidden" name="id" value="<?php echo $data['id']?>">
						<div class="title">
							<label for="title">标题</label>
							<input type="text" id="title" name="title" value="<?php echo $data['title']?>" placeholder="请输入文章标题" required autofocus>
						</div>
						<div class="author">
							<label for="author">作者</label>
							<input type="text" id="author" name="author" value="<?php echo $data['author']?>" placeholder="请输入文章作者">
						</div>
						<!--<div class="img">
							<label for="img">缩率图</label>
							<input type="file" id="img" name="img" value="" accept="image/gif,image/jpeg,image/pjpeg,image/png" placeholder="请选择文章缩率图">
							<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
						</div>-->
						<div class="description">
							<label for="description">简介</label>
							<textarea id="description" name="description" placeholder="请输入文章简介" required><?php echo $data['description']?></textarea>
						</div>
						<div class="body">
							<label for="body">主要内容</label>
							<textarea id="body" name="body" placeholder="请输入文章主要内容" required><?php echo $data['body']?></textarea>
						</div>
						<button type="submit" id="modifyMessageSubmit" name="modifyMessageSubmit" class="modify-message-submit">发布</button>
					</form>
				</aside>
			</div>			
		</main>
		<!--<footer>
			<small>版权信息版权信息版权信息版权信息版权信息版权信息版权信息版权信息版权信息版权信息</small>
		</footer>-->
		<script>
			/*下面进行表单提交前的判断*/
		</script>
	</body>
</html>
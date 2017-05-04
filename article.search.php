<?php 
	require_once('connect.php');
	$key = $_GET['key'];
	$sql = "select * from article where title like '%$key%' order by dateline desc";
	$query = mysql_query($sql);
	if($query&&mysql_num_rows($query)){
		while($row = mysql_fetch_assoc($query)){
			$data[] = $row;
		}
	}
?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0;">
		<title>文章搜索</title>
		<meta name="keywords" content="个人健康管理,健康小区建设,基础医疗服务,HCC,智能、便捷、全面,远程医疗服务" />
    	<meta name="description" content="HCC日常健康管理体系是以个人为中心的健康生活平台，引导全民积极参与健康管理，为个人提供全面的健康生活服务，帮助人们建立科学合理的生活方式和健康管理方式的服务平台。" />
    	<link rel="stylesheet" href="style/message.css" />
	</head>
<body>
<div id="wrapper">
<!-- start header -->
<div id="header">
	<div id="logo">
		<h1><a href="#">php与mysql<sup></sup></a></h1>
		<h2></h2>
	</div>
	<div id="menu">
		<ul>
			<li class="active"><a href="article.list.php">文章</a></li>
			<li><a href="about.php">关于我们</a></li>
			<li><a href="contact.php">联系我们</a></li>
		</ul>
	</div>
</div>
<!-- end header -->
</div>

<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
	<?php
		if(empty($data)){	
			echo "当前没有文章，请管理员在后台添加文章";
		}else{
			foreach($data as $value){
	?>
		<div class="post">
			<h1 class="title"><?php echo $value['title']?><span style="color:#ccc;font-size:14px;">　　作者：<!--作者放置到这里--><?php echo $value['author']?></span></h1>
			<div class="entry">
				<?php echo $value['description']?>
			</div>
			<div class="meta">
				<p class="links"><a href="article.show.php?id=<?php echo $value['id']?>" class="more">查看详细</a>&nbsp;&nbsp;&raquo;&nbsp;&nbsp;</p>
			</div>
		</div>
	<?php
			}
		}
	?>
	</div>
	<!-- end content -->
	<!-- start sidebar -->
	<div id="sidebar">
		<ul>
			<li id="search">
				<h2><b class="text1">Search</b></h2>
				<form method="get" action="">
					<fieldset>
					<input type="text" id="s" name="s" value="" />
					<input type="submit" id="x" value="Search" />
					</fieldset>
				</form>
			</li>
		</ul>
	</div>
	<!-- end sidebar -->
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->
<!-- start footer -->
<div id="footer">
	<p id="legal"></p>
</div>
<!-- end footer -->
</body>
</html>
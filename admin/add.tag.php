<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0;">
		<title>添加标签 | 资讯管理系统后台</title>
		<meta name="keywords" content="个人健康管理,健康小区建设,基础医疗服务,HCC,智能、便捷、全面,远程医疗服务" />
    	<meta name="description" content="HCC日常健康管理体系是以个人为中心的健康生活平台，引导全民积极参与健康管理，为个人提供全面的健康生活服务，帮助人们建立科学合理的生活方式和健康管理方式的服务平台。" />
    	<link rel="stylesheet" href="../style/bootstrap.css" />
    	<link rel="stylesheet" href="../style/article.css" />
	</head>
	<body>
		<header id="header">
			<div class="logo">
				<figure>
					<img src="../images/logo2.png"/>
				</figure>
				<h2>每一个人的健康管家</h2>
			</div>
			<div class="user">
				<div class="username">
					<i class="iconfont icon-user"></i><span>用户名</span>
				</div>
				<div class="signout">
					<a href="" title="退出">
						<i class="iconfont icon-signout"></i><span>退出</span>
					</a>					
				</div>
			</div>
		</header>
		<main id="main">
			<div class="side-left">
				<div class="datetime">
					<!--下面实时显示日期和时间，id分别为 time 和 date-->
					<span class="time" id="time"></span>
					<span class="date" id="date"></span>
				</div>
				<nav class="manage-nav">
					<ul>
						<li>
							<a href="article.manage.php" title="资讯管理"><i class="iconfont icon-article"></i>资讯管理</a>
						</li>
						<li>
							<a href="tag.manage.php" title="标签管理" class="active"><i class="iconfont icon-tag"></i>标签管理</a>
						</li>
					</ul>
				</nav>				
			</div>
			<div class="side-right">
				<div class="function">
					<a href="javascript:void(0)" title="取消返回" id="back">
						<i class="iconfont icon-back"></i>取消返回
					</a>
				</div>
				<form action="add.tag.handle.php" enctype="multipart/form-data" method="post" id="addTagForm" name="addTagForm" class="form-horizontal add-tag-form">
					<fieldset>
						<legend>添加标签</legend>
						<div class="form-group">
							<label for="title" class="col-sm-2 control-label required">标签名称</label>
	    					<div class="col-sm-10">
								<input type="text" id="title" name="title" class="form-control" placeholder="请输入标签名称">
							</div>
						</div>
						<div class="form-group">
							<label for="description" class="col-sm-2 control-label">标签描述</label>
	    					<div class="col-sm-10">
								<textarea id="description" name="description" class="form-control" placeholder="请输入标签描述"></textarea>
							</div>
						</div>
						<div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      	<button type="submit" id="addTagSubmit" name="addTagSubmit" class="btn btn-default add-tag-submit">添加</button>
						    </div>
						</div>
					</fieldset>
				</form>				
			</div>
		</main>
		<script src="../script/jquery-3.2.0.min.js"></script>
		<script src="../script/bootstrap.min.js"></script>
		<script src="../script/jquery.validate.min.js"></script>
		<script src="../script/article.js"></script>
		<script src="../script/now-datetime.js"></script><!--显示当前日期时间函数-->
		<script>
			/*下面对表单验证进行*/			
			$(document).ready(function() {
				// 提示错误
				$("#addTagForm").validate({
					rules: {
						title: {
							required: true
						}
					},
					messages: {
						title: {
							required: "请输入资讯标题"
						}
					}
				});
			});
		</script>
	</body>
</html>
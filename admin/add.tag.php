<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0;">
		<title>添加标签</title>
		<meta name="keywords" content="个人健康管理,健康小区建设,基础医疗服务,HCC,智能、便捷、全面,远程医疗服务" />
    	<meta name="description" content="HCC日常健康管理体系是以个人为中心的健康生活平台，引导全民积极参与健康管理，为个人提供全面的健康生活服务，帮助人们建立科学合理的生活方式和健康管理方式的服务平台。" />
    	<link rel="stylesheet" href="/style/message.css" />
	</head>
	<body>
		<!--<header>
			<h1>发布资讯</h1>
		</header>-->
		<main>
			<div class="sidebar">
				<aside class="left-sidebar">
					<nav>
						<ul>
							<li><a href="javascript:void(0)" title="标签管理" class="active">标签管理</a></li>
							<li><a href="add.message.php" title="文章管理">文章管理</a></li>
						</ul>
					</nav>
				</aside>
				<aside class="right-sidebar">
					<nav>
						<ul>
							<li><a href="javascript:void(0)" title="添加标签" class="active">添加标签</a></li>
							<li><a href="manage.message.list.php" title="管理标签">管理标签</a></li>
						</ul>
					</nav>
					<p class="tips">带红色星号为必填(必选)字段</p>
					<form action="add.tag.handle.php" method="post" id="addTag" name="addTag" class="add-tag-form">
						<select id="tagName" name="tag_name">
							<option value=""></option>
						</select>
						<div class="desc">
							<label for="desc">描述</label>
							<textarea id="desc" name="tag_desc" placeholder="请输入标签描述" required></textarea>
						</div>
						<p id="tips"></p>
						<button type="submit" id="addTagSubmit" name="addTagSubmit" class="add-tag-submit">添加</button>
					</form>
				</aside>
			</div>	
		</main>
		<!--<footer>
			<small>版权信息版权信息版权信息版权信息版权信息版权信息版权信息版权信息版权信息版权信息</small>
		</footer>-->
		<script>
			/*下面进行表单提交前的判断*/
			$(document).ready(function() {
				$.ajax({
					type:"POST",
					url: 'http://api.pp-panda.cc:8080/v1/content/contenttaglist',
					async: true,
					dataType:"json",
					data:{
						
					},							
					success: function(data){
						if(data.code == 0){
							$("#tagName").val(data.body.tags[0].tag_name);
							window.location.href = "add.tag.handle.php";
						}else {
							$("#tips").css("visibility","visible");
							$("#tips").html("出现错误：" + data.code_msg);
						}
					},
					error: function(jqXHR){     
					   alert("发生错误：" + jqXHR.status);
					},							
				});
			});
		</script>
	</body>
</html>
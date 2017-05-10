<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0;">
		<title>登录</title>
		<meta name="keywords" content="个人健康管理,健康小区建设,基础医疗服务,HCC,智能、便捷、全面,远程医疗服务" />
    	<meta name="description" content="HCC日常健康管理体系是以个人为中心的健康生活平台，引导全民积极参与健康管理，为个人提供全面的健康生活服务，帮助人们建立科学合理的生活方式和健康管理方式的服务平台。" />
    	<link rel="stylesheet" href="style/bootstrap.css" />
    	<link rel="stylesheet" href="style/article.css" />
	</head>
	<body>
		<header>
		</header>
		<main>
			</div>
			<div class="container">
				<div class="row login-logo">					
					<img src="images/logo.png" alt="早寻logo" class="img-responsive center-block"/>
				</div>
				<div class="row title">
					<h1 class="text-center">资讯管理系统</h1>
				</div>
				<form action="login.handle.php" id="loginForm" name="loginForm" method="post" class="form-horizontal">
					<div class="form-group">
						<label for="username" class="col-sm-2 control-label">用户名：</label>					
						<div class="col-sm-10">
							<input type="text" name="username" id="username" class="form-control" placeholder="请输入用户名">
						</div>
					</div>
					<div class="form-group">
						<label for="userpassword" class="col-sm-2 control-label">密码：</label>
						<div class="col-sm-10">
							<input type="password" name="userpassword" id="userpassword" class="form-control" placeholder="请输入密码" />
						</div>
					</div>
					<div class="form-group tips">
						<div class="col-sm-10 col-sm-offset-2" id="tips"></div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
								<label>
				          			<input type="checkbox"> 记住密码
				        		</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" id="loginSubmit" class="btn btn-default login-submit">登录</button>
						</div>
					</div>
				</form>
			</div>
		</main>
		<script src="script/jquery-3.2.0.min.js"></script>
		<script src="script/jquery.validate.min.js"></script>
		<script>
			$(document).ready(function() {
				// 提示错误
				$("#loginForm").validate({
					rules: {
						username: {
							required: true
						},
						userpassword: {
							required: true
						}
					},
					messages: {
						username: {
							required: "请输入用户名"
						},
						userpassword: {
							required: "请输入密码"
						}
					},
					errorPlacement: function (error, element) {
						error.appendTo( element.parents(".form-group").siblings(".form-group").find("#tips"));
				    }
				});
			});
		</script>
	</body>
</html>
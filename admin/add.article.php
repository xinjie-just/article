<?php
include_once 'islogin.php';	

	require_once('../connect.php');
	//读取旧信息
	$query = mysql_query("select tag_name from tag");
	if($query&&mysql_num_rows($query)){
		while($row =mysql_fetch_assoc($query)){
			$data[] = $row;
		}
	}else{
		$data = array();
	}
?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
		<title>添加资讯 | 资讯管理系统后台</title>
		<meta name="keywords" content="个人健康管理,健康小区建设,基础医疗服务,HCC,智能、便捷、全面,远程医疗服务" />
    	<meta name="description" content="HCC日常健康管理体系是以个人为中心的健康生活平台，引导全民积极参与健康管理，为个人提供全面的健康生活服务，帮助人们建立科学合理的生活方式和健康管理方式的服务平台。" />
    	<link rel="stylesheet" href="../style/bootstrap.css" />
    	<link rel="stylesheet" href="../style/article.css" />
		<script src="../script/jquery-3.2.0.min.js"></script>
		<script src="../script/jquery.validate.min.js"></script>
		<script src="../script/bootstrap.min.js"></script>		
	    <script charset="utf-8" src="../script/ueditor.config.js"></script>
	    <script charset="utf-8" src="../script/ueditor.all.min.js"> </script>
	    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
	    <!--这里加载的语言文件会覆盖在配置项目里添加的语言类型，比如在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
	    <script charset="utf-8" src="../script/ueditor-zh-cn.js"></script>
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
					<i class="iconfont icon-user"></i>
					<span>						
						<?php
							if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
						    	echo $_SESSION['username'];
							}
						?>
					</span>
				</div>
				<div class="signout">
					<a href="../login.out.php" title="退出">
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
							<a href="article.manage.php" title="资讯管理" class="active"><i class="iconfont icon-article"></i>资讯管理</a>
						</li>
						<li>
							<a href="tag.manage.php" title="标签管理"><i class="iconfont icon-tag"></i>标签管理</a>
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
				<form action="add.article.handle.php" enctype="multipart/form-data" method="post" id="addArticleForm" name="addArticleForm" class="form-horizontal add-article-form">
					<fieldset>
						<legend>添加资讯</legend>
						<div class="form-group">
							<label for="title" class="col-sm-2 control-label required">标题</label>
	    					<div class="col-sm-10">
								<input type="text" id="title" name="title" class="form-control" placeholder="请输入文章标题">
							</div>
						</div>
						<div class="form-group">
							<label for="author" class="col-sm-2 control-label required">标签</label>
	    					<div class="col-sm-10">
								<?php 
									if(empty($data)){
										echo "没有标签，待管理员后台添加"	;
									}else {							
										foreach($data as $key=>$value){
								?>
	    						<label class="checkbox-inline">
									<input type="checkbox" name="addArticleTag[]" value="<?php echo $value['tag_name'] ?>"> <?php echo $value['tag_name'] ?>
								</label>									
								<?php
										}
									}	
								?>
							</div>
						</div>
						<div class="form-group">
							<label for="link" class="col-sm-2 control-label required">资讯地址</label>
	    					<div class="col-sm-10">
								<input type="text" id="link" name="link" class="form-control" placeholder="请输入资讯地址">
							</div>
						</div>
						<div class="form-group">
							<label for="description" class="col-sm-2 control-label">内容导读</label>
	    					<div class="col-sm-10">
								<textarea id="description" name="description" class="form-control" placeholder="请输入内容导读"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="img" class="col-sm-2 control-label required">缩率图</label>
	    					<div class="col-sm-10">
								<input type="file" id="img" name="img" accept="image/gif,image/jpeg,image/pjpeg,image/png">
								<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
							</div>
						</div>
						<div class="form-group">
							<label for="body" class="col-sm-2 control-label required">资讯正文</label>
	    					<div class="col-sm-10">
	    						<!--这里是百度 euditor 富文本编辑器-->
								<script id="container" name="content" type="text/plain" style="width: 100%; height: 300px;"></script>
							</div>
						</div>
						<p id="tips"></p>
						<div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      	<button type="submit" id="addArticleSubmit" name="addArticleSubmit" class="btn btn-default add-article-submit">添加</button>
						    </div>
						</div>
					</fieldset>
				</form>
			</div>
		</main>
	    <script src="../script/article.js"></script>
		<script src="../script/now-datetime.js"></script><!--显示当前日期时间函数-->
		<script>
		    //实例化编辑器
		    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
		    var ue = UE.getEditor('container');
			ue.ready(function() {
				//获取编辑器的内容
				var html = ue.getContent();
			});
		    
			/*下面对表单验证进行*/			
			$(document).ready(function() {
				$("#addArticleForm").validate({
					/*errorPlacement: function(error, element) {
						if (element.attr("type") == "checkbox") {
							error.appendTo(element.parents("div"));							
						} else {
							error.appendTo(element.parent());
						}
					},*/
					rules: {
						title: {
							required: true
						},
						"addArticleTag[]": {
							required: true
						},
						link: {
							required: true,
							//url: true
						},
						img: {
							required: true
						},
						content: {
							required: true
						}
					},
					messages: {
						title: {
							required: "请输入资讯标题"
						},
						"addArticleTag[]": {
							required: "请选择标签"
						},
						link: {
							required: "请输入链接",
							//url: "必须是一个有效的 url"
						},
						img: {
							required: "请选择缩率图"
						},
						content: {
							required: "请输入资讯正文"
						}
					}
				});
			});
		</script>
	</body>
</html>
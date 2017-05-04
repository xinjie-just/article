<?php 
	require_once('connect.php');
	$id = intval($_GET['id']);
	$sql = "select * from article where id=$id";
	$query = mysql_query($sql);
	if($query&&mysql_num_rows($query)){
		$row = mysql_fetch_assoc($query);
	}else{
		echo "这篇文章不存在";
		exit;
	}
?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0;">
		<title>消息详情</title>
		<meta name="keywords" content="个人健康管理,健康小区建设,基础医疗服务,HCC,智能、便捷、全面,远程医疗服务" />
    	<meta name="description" content="HCC日常健康管理体系是以个人为中心的健康生活平台，引导全民积极参与健康管理，为个人提供全面的健康生活服务，帮助人们建立科学合理的生活方式和健康管理方式的服务平台。" />
    	<link rel="stylesheet" href="style/message.css" />
	</head>
	<body>
		<header>
			<i class="iconfont icon-back" id="back"></i>
			<h1>消息详情</h1>
		</header>
		<main>
			<article class="message-details">
				<h2><?php echo $row['title']?></h2>
				<div class="info">
					<time><?php date_default_timezone_set("PRC"); echo date("Y-m-d H:i:s", $row['dateline'])?></time>
					<span class="author"><?php echo $row['author']?></span>
				</div>
				<figure class="shrinkage-img">
					<img src="admin/<?php echo $row['img'] ?>" alt="<?php echo $row['title']?>" />
				</figure>
				<div class="body" id="articleBody">
					<?php echo $row['body']?>
				</div>
			</article>
		</main>
		<script src="script/jquery-3.2.0.min.js"></script>
		<script src="script/message.js"></script>
		<script>
			$(document).ready(function(){			
				/* 控制文章的格式 */
		        // 删除图片宽高属性
		        $("#articleBody img").removeAttr("width");
		        $("#articleBody img").removeAttr("height");
		        // 设置图片样式
		        $("#articleBody img").css({
		            display: "block",
		            maxWidth: "100%",
		            height: "auto",
		            margin: "1rem auto 0"
		        });
		        $("#articleBody img + img").css("marginTop", ".5rem");
		        // 设置段落样式
		        $("#articleBody > div, #articleBody > p").css({
		            fontSize: "14px",
		            textIndent: "2.2em",
		            letterSpacing: ".1em",
		            lineHeight: 1.6,
		            marginTop: ".8rem",
		            textAlign: "justify",
		            wordWrap: "breakWord"   
		        });
		        $("#articleBody img + p").css("marginTop", "1rem");
		        $("#articleBody img + div").css("marginTop", "1rem");
		        $("#articleBody div > p").css("marginTop", ".5rem");
		        $("#articleBody div > div").css("marginTop", ".5rem");
		        $("#articleBody img + div > p").css("marginTop", ".5rem");
		        $("#articleBody img + div > div").css("marginTop", ".5rem");
		        // 删除段落中多余的 换行
		        $("#articleBody > div:has(br) br").remove();
		        $("#articleBody > p:has(br) br").remove();
			});
		</script>
	</body>
</html>
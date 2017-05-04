<?php
	require_once('../connect.php');
	/*输出内容*/
	$sql = "select * from article order by dateline desc";
	$query  = mysql_query($sql);
	if($query&&mysql_num_rows($query)){
		while($row =mysql_fetch_assoc($query)){
			$data[] = $row;
		}
	}else{
		$data = array();
	}
	/*分页*/
?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0;">
		<title>首页 | 资讯管理系统后台</title>
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
					<span class="time">15:33</span>
					<span class="date">2017年11月11日 星期一</span>
				</div>
				<nav class="manage-nav">
					<ul>
						<li>
							<a href="" title="资讯管理" class="active"><i class="iconfont icon-article"></i>资讯管理</a>
						</li>
						<li>
							<a href="" title="标签管理"><i class="iconfont icon-tag"></i>标签管理</a>
						</li>
					</ul>
				</nav>				
			</div>
			<div class="side-right">
				<div class="function">
					<!--<a href="#" title="添加资讯">
						<i class="iconfont icon-add"></i>添加资讯
					</a>-->
					
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
					<i class="iconfont icon-add"></i>添加资讯
					</button>
					
					<!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Modal title</h4>
					  </div>
					  <div class="modal-body">
					    ...
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					  </div>
					</div>
					  </div>
					</div>
					
										
				</div>
				<div class="table-responsive">
					<table class="article-list table table-condensed table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>标题</th>
								<th>标签</th>
								<th>资讯地址</th>
								<th>时间</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td><a href="#" title="10个信号让你了解心脏">10个信号让你了解心脏</a></td>
								<td>心脏病、高血压、糖尿病、老年病</td>
								<td>http://www.pp-panda.com/0001.html</td>
								<td>2017-03-18</td>
								<td>
									<a href="#" title="编辑">编辑</a>
									<a href="#" title="删除">删除</a>
								</td>
							</tr>
							<tr>
								<td>2</td>
								<td><a href="#" title="10个信号">10个信号</a></td>
								<td>心脏病、高血压、糖尿病、老年病</td>
								<td>http://www.pp-panda.com/0001.html</td>
								<td>2017-03-18</td>
								<td>
									<a href="#" title="编辑">编辑</a>
									<a href="#" title="删除">删除</a>
								</td>
							</tr>
							<tr>
								<td>3</td>
								<td><a href="#" title="10个信号让你了解心脏病发生前兆">10个信号让你了解心脏病发生前兆</a></td>
								<td>心脏病、高血压、糖尿病、老年病</td>
								<td>http://www.pp-panda.com/0001.html</td>
								<td>2017-03-18</td>
								<td>
									<a href="#" title="编辑">编辑</a>
									<a href="#" title="删除">删除</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="pagination-wrap">
					<ul class="pagination">
					    <li>
					      	<a href="#" aria-label="Previous">
					        	<span aria-hidden="true">&laquo;</span>
					      	</a>
					    </li>
					    <li class="active"><a href="#">1</a></li>
					    <li><a href="#">2</a></li>
					    <li><a href="#">3</a></li>
					    <li><a href="#">4</a></li>
					    <li><a href="#">5</a></li>
					    <li>
					      	<a href="#" aria-label="Next">
					        	<span aria-hidden="true">&raquo;</span>
					      	</a>
					    </li>
					</ul>				
				</div>
			</div>

		</main>
		<script src="../script/jquery-3.2.0.min.js"></script>
		<script src="../script/bootstrap.min.js"></script>
	</body>
</html>
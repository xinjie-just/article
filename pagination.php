<?php
	$pageSize = 10; //每一页的条数
	$showPage = 5; //显示分页数 
	/*传入页码*/
	$page = $_GET['p']; // 参数p为页码
	
	/*根据页码，取出数据,php对mysql的处理*/
	//连库和选库
	
	//sql获取分页数据和显示条数
	$sql = "SELECT * FORM article LIMIT".($page-1)*$pageSize.",$pageSize"
	$result = mysql_query($sql);
	echo "<table>";
	while($row = mysql_fetch_assoc($result)){
		echo "<tr>"
		echo "<td></td>";
	}
	echo "</table>";
	// 释放结果，关闭链接
	mysql_free_result($result);
	
	//获取数据总条数
	$total_sql = "SELECT COUNT(*) FROM article";
	$total_result = mysql_fetch_array(mysql_query($total_sql));
	$total = $total_result[0];
	//计算页数
	$total_pages = ceil($total/$pageSize);
	
	/*显示数据和分页条*/
	$page_banner = "";
	// 计算偏移量
	$pageoffset = ($showPage - 1)/2;
	if($page > 1){
		$page_banner .= "<a href='".$_SERVER['PHP_SELF']."?p=1'>首页</a>";
		$page_banner .= "<a href='".$_SERVER['PHP_SELF']."?p=".($page-1)."'>上一页</a>";
	}
	//初始化数据
	$start = 1;
	$end = $total_pages;
	if($total_pages > $showPage){
		if($page > $pageoffset + 1){
			$page_banner .= "...";
		}
		if($page > $pageoffset){
			$start = $page - $pageoffset;
			$end = $total_pages > $page+$pageoffset ? $page+$pageoffset : $total_pages;
		}else{
			$start = 1;
			$end = $total_pages > $showPage ? $showPage : $total_pages; 
		}
		if($page + $pageoffset > $total_pages){
			$start = $start - ($page + $pageoffset - $end);
		}
	}
	
	if($page < $total_pages){
		$page_banner .= "<a href='".$_SERVER['PHP_SELF']."?p=".($page+1)."'>下一页</a>";	
		$page_banner .= "<a href='".$_SERVER['PHP_SELF']."?p=".($total_pages)."'>尾页</a>";
	}
	
	$page_banner .= "共{$total_pages}页,";
	echo $page_banner;
?>
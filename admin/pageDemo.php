<?php
/**
 * 分页类demo
 * Be the best of whatever you are!
 * 
 * @author: Dzer<358654744@qq.com>
 * @version: 2014-12-28 17:38:23
 * @Last Modified time: 2014-12-28 18:08:28
 */
header("content-type:text/html;charset=utf8");
include('./Page.class.php');	//引入类

//$p=new Page(总页数,显示页数,当前页码,每页显示条数,[链接]);
//连接不设置则为当前链接
$page=isset($_GET['page']) ? $_GET['page'] : 1;
$p=new Page(100,7,$page,2);

//生成一个页码数组（键为页码，值为链接）
echo "<pre>";
print_r($p->getPages()); 

//生成一个页码样式（可添加自定义样式）
//样式 共45条记录,每页显示10条,当前第1/4页 [首页] [上页] [1] [2] [3] .. [下页] [尾页]
echo $p->showPages(1);	

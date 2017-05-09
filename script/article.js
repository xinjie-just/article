$("#back").click(function(){
	var r = confirm("你确定要返回吗？现在输入的内容将消失！");
	if (r == true){
		window.history.go(-1);
	}
});

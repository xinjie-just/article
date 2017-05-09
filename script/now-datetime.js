setInterval(function() {
	var datetime = new Date();
	// 程序计时的月从0开始取值后+1
	var mymonth = datetime.getMonth() + 1;
	var myweek = datetime.getDay();
	var myhour = datetime.getHours();
	var myminute = datetime.getMinutes();
	var mysecond = datetime.getSeconds();
	function addZero(value) {
		if(value.toString().length == 1) {
			value = "0" + value;
		}
		return value;
	}
	var myfullhour = addZero(myhour);
	var myfullminute = addZero(myminute);
	var myfullsecond = addZero(mysecond);
	switch (myweek){
		case 0: 
			myweek = "星期日";
			break;
		case 1:  
			myweek = "星期一";
			break;
		case 2:  
			myweek = "星期二";
			break;
		case 3:  
			myweek = "星期三";
			break;
		case 4:  
			myweek = "星期四";
			break;
		case 5:  
			myweek = "星期五";
			break;
		case 6:  
			myweek = "星期六";
			break;
	} 
	var mydate = datetime.getFullYear() + "年" + mymonth + "月" + datetime.getDate() + "日" + " " + myweek;
	var mytime = myfullhour + ":" + myfullminute + ":" + myfullsecond;					
	$("#time").text(mytime);
	$("#date").text(mydate);
}, 1000);
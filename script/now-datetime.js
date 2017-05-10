	function curTime() {
		var datetime = new Date();
		// 程序计时的月从0开始取值后+1
		var mymonth = datetime.getMonth() + 1;
		var mydate = datetime.getDate();
		var myweek = datetime.getDay();
		var myhour = datetime.getHours();
		var myminute = datetime.getMinutes();
		var mysecond = datetime.getSeconds();
		/*该方法是将数值只有一位的，转变成两位(在前面加 0)*/
		function addZero(value) {
			if(value.toString().length == 1) {
				value = "0" + value;
			}
			return value;
		}
		/*月、日、时、分、秒，凡只有一个数字值的，在前面加0（如月：5->05）*/
		var myfullmonth = addZero(mymonth);
		var myfulldate = addZero(mydate);
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
		var mydate = datetime.getFullYear() + "年" + myfullmonth + "月" + myfulldate + "日" + " " + myweek;
		var mytime = myfullhour + ":" + myfullminute + ":" + myfullsecond;
		return [mydate, mytime]; //返回数组，日期是第一个值，时间是第二个值
	}					
	/*先显示日期和时间，避免日期和时间在刷新页面后出现一秒的延迟*/
	$("#time").text(curTime()[1]);
	$("#date").text(curTime()[0]);
	/*每隔 1000ms 时间更新一次*/
	setInterval(function() {					
		$("#time").text(curTime()[1]);
		$("#date").text(curTime()[0]);
	}, 1000);
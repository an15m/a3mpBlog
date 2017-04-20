$(function(){
	
	/* 
	//div固定在屏幕指定位置
	var scrollTop=$("body").scrollTop();
    var str=scrollTop+"px";
	$("#head").css({
		'top': str,
	});
    $(window).scroll(function() {
    	var scrollTop=$("body").scrollTop();
        var str=scrollTop+"px";
    	$("#head").css({
			'top': str,
		});
    });
    */
    
    //测试
	$("#btn1").bind("click",function(){
		var scrollTop=$(window).scrollTop();

		var width=$(window).width();
		var height=$(window).height();
		var availHeight=window.screen.availHeight;
		var availWidth=window.screen.availWidth;	
		var str="width:"+width+"<br>"+"height:"+height+"<br>";
		str+="availWidth:"+availWidth+"<br>"+"availHeight:"+availHeight;
		str+="<br>scrollTop:"+scrollTop;
		$("#test").html(str);		
	});	

    //导航栏‘技术’导航栏效果
	$("#tech-navigation-ul").bind('mouseover', function() {
		$("#tech-navigation-li").slideDown(500);
		$("#tech-navigation-ul img").stop().animate({'padding-left': '50px'}, 300);
	});	

	$("#tech-navigation-ul").bind('mouseleave', function() {
		$("#tech-navigation-ul img").stop().animate({'padding-left': '30px'}, 100);
		$("#tech-navigation-li").stop().slideUp(300);
		
	});	

	//搜索
	$("#searchimg").click(function(event) {
		$("#searchform").submit();
	});
 })

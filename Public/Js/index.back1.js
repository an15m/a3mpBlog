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


    //限长显示
    function limitLength(limit){
    	var num=0;
        var coun
		$("#temp *").each(function(index, el) {
			if($(this).children().length==0){
				var temp=num;
				num+=$(this).html().length;
				if(count==1){
					   $(this).remove();
				}
				if(num>limit&&count==0){
					count=1;
					var text=$(this).html().substring(0,limit-temp)+"..."; 
					$(this).html(text); 
				}
			}
		});
		$("#temp ul").each(function(index, el) {
			if($(this).children().length==0){
				$(this).remove();
			}	
		});
    }

    limitLength(100);

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
})
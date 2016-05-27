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
    	$(".content").each(function(index, el) {
    		var num=0;
	        var count=0;
	        var id=$(this).attr('id');
			$("#"+id+" *").each(function(index, el) {
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
    	});
    		
		$(".content ul").each(function(index, el) {
			if($(this).children().length==0){
				$(this).remove();
			}	
		});

		$(".content p").each(function(index, el) {
			var text=$(this).html();
			var count=0;
			for(var i=1;i<text.length;i++){
				if(text[i]!=' '){
					count=1;
				}
			}		
			if(count==0){
				$(this).remove();
			}
		});

		alert($("#content-id0").html());
    }
   

    limitLength(69);

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
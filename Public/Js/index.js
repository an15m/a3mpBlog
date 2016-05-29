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
    var root_url = '/dandelionblog/';
    //登陆判断
    $.ajax({
	    url: root_url + 'index.php/Index/IsLogin',
	    success: function(IsLogin){
	    	if(IsLogin==1){
	    		$("#not-login").css('display', 'none');	
	    		$("#have-login").css('display', 'block');
	    		$(".new-message-user-information").css('display', 'none');
	    		$(".new-comment-user-information").css('display', 'none');

	    		//处理评论信息
	    		$(".new-comment-button").click(function(event) {
	    			var str=$(".new-comment-content-textarea").val();
	    			var empty=true;
	    			for(var i=0;i<str.length;i++){
	    				if(str[i]!=' '&&str[i]!='　'){
	    					empty=false;
	    				}
	    			}
	    			if((!$(".new-comment-content-textarea").val())||empty){
						$(".new-comment-textarea-tip span").val("评论内容不能为空！");
	    				$(".new-comment-button").unbind();
	    			}else{
	    				$("#new-comment-form").submit();
	    			}
	    		});	

	    		//处理留言信息
	    		$(".new-message-button").click(function(event) {
	    			var messageStr=$(".new-message-content-textarea").val();
	    			var messageEmpty=true;
	    			for(var i=0;i<messageStr.length;i++){
	    				if(messageStr[i]!=' '&&messageStr[i]!='　'){
	    					messageEmpty=false;
	    				}
	    			}
	    			if((!$(".new-message-content-textarea").val())||messageEmpty){
						$(".new-message-textarea-tip span").val("留言内容不能为空！");
	    				$(".new-message-button").unbind();
	    			}else{
	    				$("#new-message-form").submit();
	    			}
	    		});	

	    	}else{
	    		
	    		$("#have-login").css('display', 'none');
	    		$("#not-login").css('display', 'block');

	    		//处理评论信息
	    		var textCanSubmit=new Array(0,0);

	    		$("#new-comment-username").bind('focusout', function() {
	    			$.ajax({
						url: root_url + 'index.php/Register/check_name',
						type: 'POST',
						data: {val: $(this).val()},
						async : false ,
					})
					.done(function(return_data) {
						if(return_data==1){
							textCanSubmit[0]=1;	
							$("#new-comment-username-tip").css('color', '#666666');
							$("#new-comment-username-tip").text("限4-32个字符(汉字算3个字符)");
						}
						if(return_data==0){
							textCanSubmit[0]=0;	
							$("#new-comment-username-tip").css('color', '#AB0707');
							$("#new-comment-username-tip").text("限4-32个字符(汉字算3个字符)");
						}
						if(return_data==2){
							textCanSubmit[0]=0;	
							$("#new-comment-username-tip").css('color', '#AB0707');
							$("#new-comment-username-tip").text("用户名已被注册！");
						}
					});
	    		});

	    		$("#new-comment-useremail").bind('focusout', function() {
	    			$.ajax({
						url: root_url + 'index.php/Register/check_email',
						type: 'POST',
						data: {val: $(this).val()},
						async : false ,
					})
					.done(function(return_data) {
						if(return_data==1){
							textCanSubmit[1]=1;	
							$("#new-comment-useremail-tip").css('color', '#666666');
						}else{
							textCanSubmit[1]=0;	
							$("#new-comment-useremail-tip").css('color', '#AB0707');
						}
					});
	    		});

	    		$(".new-comment-button").click(function(event) {
	    			var  textCannotSubmit=false;
		    		for(var i=0;i<2;i++){
		    			if(textCanSubmit[i]==0){
		    				textCannotSubmit=true;
		    			}
		    		}
	    			var textAreaStr=$(".new-comment-content-textarea").val();
	    			var textAreaEmpty=true;
	    			for(var i=0;i<textAreaStr.length;i++){
	    				if(textAreaStr[i]!=' '&&textAreaStr[i]!='　'){
	    					textAreaEmpty=false;
	    				}
	    			}
	    			if((!$(".new-comment-content-textarea").val())||textAreaEmpty||textCannotSubmit){
						if((!$(".new-comment-content-textarea").val())||textCannotSubmit){
							$("#new-comment-textarea-tip").text("评论内容不能为空！");
						}
	    			}else{
	    				$("#new-comment-form").submit();
	    			}
	    		});	

	    		//处理留言信息
	    		var messageCanSubmit=new Array(0,0);

	    		$("#new-message-username").bind('focusout', function() {
	    			$.ajax({
						url: root_url + 'index.php/Register/check_name',
						type: 'POST',
						data: {val: $(this).val()},
						async : false ,
					})
					.done(function(return_data) {
						if(return_data==1){
							messageCanSubmit[0]=1;	
							$("#new-message-username-tip").css('color', '#666666');
							$("#new-message-username-tip").text("限4-32个字符(汉字算3个字符)");
						}
						if(return_data==0){
							messageCanSubmit[0]=0;	
							$("#new-message-username-tip").css('color', '#AB0707');
							$("#new-message-username-tip").text("限4-32个字符(汉字算3个字符)");
						}
						if(return_data==2){
							messageCanSubmit[0]=0;	
							$("#new-message-username-tip").css('color', '#AB0707');
							$("#new-message-username-tip").text("用户名已被注册！");
						}
					});
	    		});

	    		$("#new-message-useremail").bind('focusout', function() {
	    			$.ajax({
						url: root_url + 'index.php/Register/check_email',
						type: 'POST',
						data: {val: $(this).val()},
						async : false ,
					})
					.done(function(return_data) {
						if(return_data==1){
							messageCanSubmit[1]=1;	
							$("#new-message-useremail-tip").css('color', '#666666');
						}else{
							messageCanSubmit[1]=0;	
							$("#new-message-useremail-tip").css('color', '#AB0707');
						}
					});
	    		});

	    		$(".new-message-button").click(function(event) {
	    			var  messageCannotSubmit=false;
		    		for(var i=0;i<2;i++){
		    			if(messageCanSubmit[i]==0){
		    				messageCannotSubmit=true;
		    			}
		    		}
	    			var messageAreaStr=$(".new-message-content-textarea").val();
	    			var messageAreaEmpty=true;
	    			for(var i=0;i<messageAreaStr.length;i++){
	    				if(messageAreaStr[i]!=' '&&messageAreaStr[i]!='　'){
	    					messageAreaEmpty=false;
	    				}
	    			}
	    			if((!$(".new-message-content-textarea").val())||messageAreaEmpty||messageCannotSubmit){
						if((!$(".new-message-content-textarea").val())||messageCannotSubmit){
							$("#new-message-textarea-tip").text("留言内容不能为空！");
						}
	    			}else{
	    				$("#new-message-form").submit();
	    			}
	    		});
		
	    	}
	    },
	    async : false ,
	});


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


	//用户选项效果
	$("#user-option").bind('mouseover', function() {
		$("#user-option ul").css('display','block');
		// $("#user-option ul").slideDown(50);
		$("#user-option img").css('background-color','white');	
		$("#user-option img").css('color','#232B2D');	
		// $("#user-option img").animate({'background-color': 'white', 'color': '#232B2D'}, 3000);
		$("#user-option img").attr('src',root_url + 'Public/Images/setting2.png');
	});

	$("#user-option").bind('mouseleave', function() {
		$("#user-option ul").css('display','none');
		// $("#user-option ul").slideUp(50);
		$("#user-option img").css('background-color','#232B2D');
		// $("#user-option img").animate({'background-color': '#232B2D', 'color': 'white'}, 3000);
		$("#user-option img").css('color','white');
		$("#user-option img").attr('src',root_url + 'Public/Images/setting1.png');
	});



    //导航栏‘技术’导航栏效果
	$("#tech-navigation-ul").bind('mouseover', function() {
		$("#tech-navigation-li").slideDown(100);
		$("#tech-navigation-ul img").animate({'padding-left': '50px'}, 120);
	});	

	$("#tech-navigation-ul").bind('mouseleave', function() {
		$("#tech-navigation-ul img").animate({'padding-left': '30px'}, 50);
		$("#tech-navigation-li").slideUp(100);
		
	});	


	//注册登陆
	$("#register").bind('click', function() {
		location=root_url + 'index.php/Register';
	});

	$("#login").click(function(event) {
		location=root_url + 'index.php/Login/index';
	});


	//文章评论回复
	$(".comment-comment").each(function(index, el) {
		$(this).click(function(event) {
			var str="回复"+$(this).attr("floor")+"楼\n";
			$(".new-comment-content-textarea").val(str);
		});
	});

	//留言回复
	$(".message-comment").each(function(index, el) {
		$(this).click(function(event) {
			var str="回复"+$(this).attr("floor")+"楼\n";
			$(".new-message-content-textarea").val(str);
		});	
	});


	//搜索
	$("#searchimg").click(function(event) {
		$("#searchform").submit();
	});
 })

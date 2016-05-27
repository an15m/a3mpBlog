$(document).ready(function(){
	var root_url = '/dandelionblog/';

	var CanSubmit= new Array(0,0,0,0);

	$(".input").each(function(index, el) {
		$(this).bind('click', function() {
			$(this).css({
				'border':'1px solid #239DDD',
				'border-radius': '5px',
			});
		});
		$(this).bind('focusout', function() {
			$(this).css({
				'border':'1px solid #D1D1D1',
				'border-radius': '5px',
			});
		});
	});

	
	$("#name").bind('focusout', function() {
		$.ajax({
			url: root_url + 'index.php/Register/check_name',
			type: 'POST',
			data: {val: $(this).val()},
			async : false ,
		})
		.done(function(return_data) {
			if(return_data==1){
				CanSubmit[0]=1;	
				$("#name-tip").css('color', '#666666');
				$("#name-tip").text("限4-32个字符(汉字算3个字符)");
			}
			if(return_data==0){
				CanSubmit[0]=0;	
				$("#name-tip").css('color', '#AB0707');
				$("#name-tip").text("限4-32个字符(汉字算3个字符)");
			}
			if(return_data==2){
				CanSubmit[0]=0;	
				$("#name-tip").css('color', '#AB0707');
				$("#name-tip").text("用户名已被注册！");
			}
		});
	});

	$("#email").bind('focusout', function() {
		$.ajax({
			url: root_url + 'index.php/Register/check_email',
			type: 'POST',
			data: {val: $(this).val()},
			async : false ,
		})
		.done(function(return_data) {
			if(return_data==1){
				CanSubmit[1]=1;	
				$("#email-tip").css('color', '#666666');
			}else{
				CanSubmit[1]=0;	
				$("#email-tip").css('color', '#AB0707');
			}
		});
	});

	$("#password").bind('focusout', function() {
		$.ajax({
			url: root_url + 'index.php/Register/check_password',
			type: 'POST',
			data: {val: $(this).val()},
			async : false ,
		})
		.done(function(return_data) {
			if(return_data==1){
				CanSubmit[2]=1;	
				$("#password-tip").css('color', '#666666');
			}else{
				CanSubmit[2]=0;	
				$("#password-tip").css('color', '#AB0707');
			}
		});
	});

	$("#repassword").bind('focusout', function() {
		$.ajax({
			url: root_url + 'index.php/Register/check_repassword',
			type: 'POST',
			data: {password: $(this).val(),repassword:$("#password").val()},
			async : false ,
		})
		.done(function(return_data) {
			if(return_data==1){
				CanSubmit[3]=1;	
				$("#repassword-tip").css('color', '#666666');
			}else{
				CanSubmit[3]=0;	
				$("#repassword-tip").css('color', '#AB0707');
			}
		});
	});

	$("#register").bind('click', function() {
		var temp=1;
		for(var i=0;i<4;i++){
			if(CanSubmit[i]==0){
				temp=0;
			}
		}
		if(temp==1){
			$("#form").submit();
		}
	});

})
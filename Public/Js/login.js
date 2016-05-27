$(document).ready(function(){
	var root_url = '/dandelionblog/';

	var CanSubmit= new Array(0,0);

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
			url: root_url + 'index.php/Login/check',
			type: 'POST',
			data: {val: $(this).val()},
			async : false ,
		})
		.done(function(return_data) {
			if(return_data==1){
				CanSubmit[0]=1;
				$("#name-tip").css('display', 'none');
			}else{
				CanSubmit[0]=0;	
				$("#name-tip").css('display', 'inline-block');
			}
		});
	});


	$("#password").bind('focusout', function() {
		$.ajax({
			url: root_url + 'index.php/Login/check',
			type: 'POST',
			data: {val: $(this).val()},
			async : false ,
		})
		.done(function(return_data) {
			if(return_data==1){
				CanSubmit[1]=1;	
				$("#password-tip").css('display', 'none');
			}else{
				CanSubmit[1]=0;	
				$("#password-tip").css('display', 'inline-block');
			}
		});
	});

	$("#login").click(function() {
		var temp=1;
		for(var i=0;i<2;i++){
			if(CanSubmit[i]==0){
				temp=0;
			}
		}
		if(temp==1){
			$("#form").submit();
		}
	});
})
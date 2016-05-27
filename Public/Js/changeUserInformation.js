$(document).ready(function(){
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


	$("#change-email").bind('click',function() {
		$("#change-password").css({
			'background-color': '#73BDE6',
			'cursor': 'pointer',
			'height': '35px',
			'width': '150px',
		});
		$("#change-email").css({
			'cursor': 'default',
			'height': '50px',
			'width': '175px',
			'background-color': '#4490F7',
		});
		$("#change-password-div").css('display', 'none');
		$("#change-email-div").css('display', 'block');
		$("#tips").text("");
	});

	$("#change-password").bind('click',function() {
		$("#change-email").css({
			'background-color': '#73BDE6',
			'cursor': 'pointer',
			'height': '35px',
			'width': '150px',
		});
		$("#change-password").css({
			'cursor': 'default',
			'height': '50px',
			'width': '175px',
			'background-color': '#4490F7',
		});
		$("#change-email-div").css('display', 'none');
		$("#change-password-div").css('display', 'block');
		$("#tips").text("");
	});



	$("#password-button").click(function(event) {
		$("#password-form").submit();
	});

	$("#email-button").click(function(event) {
		$("#email-form").submit();
	});
	
})
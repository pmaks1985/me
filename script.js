$(document).ready(function() {
	$("input").change(function() {
    	if ($("input[value='normal']").prop("checked")) {
			$(".normal-value").removeAttr('disabled');
			$(".normal-value").css("background", "#ffffff");
			$(".normal-img").css("border","1px solid #3aa1ee");
			$(".normal-value").css("border","1.3px solid #3aa1ee");
		} else {
			$(".normal-value").prop('disabled','true');
			$(".normal-value").css("background", "#dff1ff");
			$(".normal-img").css("border","none");
			$(".normal-value").css("border","none");
		}
		if ($("input[value='wide-shelving']").prop("checked")) {
			$(".wide-shelving-value").removeAttr('disabled');
			$(".wide-shelving-value").css("background", "#ffffff");
			$(".wide-shelving-img").css("border","1px solid #3aa1ee");
			$(".wide-shelving-value").css("border","1.3px solid #3aa1ee");
		} else {
			$(".wide-shelving-value").prop('disabled','true');
			$(".wide-shelving-value").css("background", "#dff1ff");
			$(".wide-shelving-img").css("border","none");
			$(".wide-shelving-value").css("border","none");
		}
		if ($("input[value='columned']").prop("checked")) {
			$(".columned-value").removeAttr('disabled');
			$(".columned-value").css("background", "#ffffff");
			$(".columned-img").css("border","1px solid #3aa1ee");
			$(".columned-value").css("border","1.3px solid #3aa1ee");
		} else {
			$(".columned-value").prop('disabled','true');
			$(".columned-value").css("background", "#dff1ff");
			$(".columned-img").css("border","none");
			$(".columned-value").css("border","none");
		}
		if ($("input[value='additional-series']").prop("checked")) {
			$(".additional-series-value").removeAttr('disabled');
			$(".additional-series-value").css("background", "#ffffff");
			$(".additional-series-img").css("border","1px solid #3aa1ee");
			$(".additional-series-value").css("border","1.3px solid #3aa1ee");
		} else {
			$(".additional-series-value").prop('disabled','true');
			$(".additional-series-value").css("background", "#dff1ff");
			$(".additional-series-img").css("border","none");
			$(".additional-series-value").css("border","none");
		}
		if ($("input[value='gost-normal']").prop("checked")) {
			$(".gost-normal-value").removeAttr('disabled');
			$(".gost-normal-value").css("background", "#ffffff");
			$(".gost-normal-img").css("border","1px solid #3aa1ee");
			$(".gost-normal-value").css("border","1.3px solid #3aa1ee");
		} else {
			$(".gost-normal-value").prop('disabled','true');
			$(".gost-normal-value").css("background", "#dff1ff");
			$(".gost-normal-img").css("border","none");
			$(".gost-normal-value").css("border","none");
		}
		if ($("input[value='gost-wide-shelving']").prop("checked")) {
			$(".gost-wide-shelving-value").removeAttr('disabled');
			$(".gost-wide-shelving-value").css("background", "#ffffff");
			$(".gost-wide-shelving-img").css("border","1px solid #3aa1ee");
			$(".gost-wide-shelving-value").css("border","1.3px solid #3aa1ee");
		} else {
			$(".gost-wide-shelving-value").prop('disabled','true');
			$(".gost-wide-shelving-value").css("background", "#dff1ff");
			$(".gost-wide-shelving-img").css("border","none");
			$(".gost-wide-shelving-value").css("border","none");
		}
		if ($("input[value='gost-columned']").prop("checked")) {
			$(".gost-columned-value").removeAttr('disabled');
			$(".gost-columned-value").css("background", "#ffffff");
			$(".gost-columned-img").css("border","1px solid #3aa1ee");
			$(".gost-columned-value").css("border","1.3px solid #3aa1ee");
		} else {
			$(".gost-columned-value").prop('disabled','true');
			$(".gost-columned-value").css("background", "#dff1ff");
			$(".gost-columned-img").css("border","none");
			$(".gost-columned-value").css("border","none");
		}
		if ($("input[value='gost-additional-series']").prop("checked")) {
			$(".gost-additional-series-value").removeAttr('disabled');
			$(".gost-additional-series-value").css("background", "#ffffff");
			$(".gost-additional-series-img").css("border","1px solid #3aa1ee");
			$(".gost-additional-series-value").css("border","1.3px solid #3aa1ee");
		} else {
			$(".gost-additional-series-value").prop('disabled','true');
			$(".gost-additional-series-value").css("background", "#dff1ff");
			$(".gost-additional-series-img").css("border","none");
			$(".gost-additional-series-value").css("border","none");
		}
	});
});
$(function($){	

	$('body').attr({
		onload: 'StartTimers();',
		onmousemove: 'ResetTimers();'
	});

	$('#enlace_info').hover(function(){
		$('.footer_bg').attr('style','height:190px');
		$('#info_pcv').show().attr('style', 'position:relative; left:180px;top:-90px; z-index:100');
	}, function() {
		$('#info_pcv').mouseleave(function(){
			$(this).hide();
		});
	});

	$(window).on('load', function() {
		/* custom scrollbar fn call */
		$(".content_1").mCustomScrollbar({
			scrollButtons:{
				enable:true
			}
		});
		$(".content_2").mCustomScrollbar({
			scrollInertia:150
		});
		$(".content_3").mCustomScrollbar({
			scrollInertia:600,
			autoDraggerLength:false
		});
		$(".content_4").mCustomScrollbar({
			set_height:"85%",
			mouseWheel:false
		});
		$(".content_5").mCustomScrollbar({
			horizontalScroll:true,
			scrollButtons:{
				enable:true
			},
			theme:"dark-thin"
		});
		$(".content_6").mCustomScrollbar({
			horizontalScroll:true,
			advanced:{
				autoExpandHorizontalScroll:true
			}
		});
		$(".content_7").mCustomScrollbar({
			set_width:"95%",
			scrollButtons:{
				enable:true
			},
			theme:"light-2"
		});
		$(".content_8").mCustomScrollbar({
			callbacks:{
				onScroll:function(){
					onScrollCallback();
				},
				onTotalScroll:function(){
					onTotalScrollCallback();
				},
				onTotalScrollOffset:40,
				onTotalScrollBack:function(){
					onTotalScrollBackCallback();
				},
				onTotalScrollBackOffset:20
			}
		});

		function onScrollCallback(){
			$(".callback_demo .callback_demo_output").html("<em>Scrolled... Content top position: "+mcs.top+"</em>").children("em").delay(1000).fadeOut("slow");
		}
		function onTotalScrollCallback(){
			if($(".appended").length<1){
				$(".content_8 .mCSB_container").append("<p class='appended'><img src='custom-scrollbar-plugin/demo_files/mcsImg1.jpg' /></p>");
			}else{
				$(".callback_demo .callback_demo_output").html("<em>Scrolled to bottom. Content top position: "+mcs.top+"</em>").children("em").delay(1000).fadeOut("slow");
			}
			$(".content_8 .mCSB_container img").load(function(){
				$(".content_8").mCustomScrollbar("update");
				$(".callback_demo .callback_demo_output").html("<em>New image loaded...</em>").children("em").delay(1000).fadeOut("slow");
			});
		}
		function onTotalScrollBackCallback(){
			$(".callback_demo .callback_demo_output").html("<em>Scrolled to top. Content top position: "+mcs.top+"</em>").children("em").delay(1000).fadeOut("slow");
		}
		$(".callback_demo a[rel='scrollto-bottom']").click(function(e){
			e.preventDefault();
			$(".content_8").mCustomScrollbar("scrollTo","bottom");
		});
	});
});

// Set timeout variables.
//var timoutWarning = 300000; // Display warning in 14 Mins.
var timoutNow = 3600000; // Timeout in 15 mins.
var logoutUrl = site_url + '/bitinka/logout'; // URL to logout page.

var warningTimer;
var timeoutTimer;

function onlyNumber(e){
	var key = window.Event ? e.which : e.keyCode
	return (key >= 48 && key <= 57 || key == 8)
}

function getHTTPObject(){
	var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}
	else{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	return xmlhttp;  
}

function newsletter(){
	var mail = $('#newsletterMail').val();

	if(mail==""){
		$('#newsMsg').html('Email Required.');
		return false;
	}
	else{
		var reg1 = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if(reg1.test(mail) == false) {
			$('#newsMsg').html('Invalid Email ID Format.');
			return false;  
		}
		else{
			$.ajax ({
				url:"<?php echo site_url();? >/bitinka/newsletter",
				type:"POST",
				data:{email:mail, inka_forms: Cookies.get('cookie_forms')},
				success:function(data) { 
					if(data=="failure"){
						$('#newsMsg').html('You have already subscribed.');  
					}
					else{
						$('#newsMsg').html('You will receive an email in a few minutes.');
					}
					// setTimeout(function() { 
     //  	window.location.href="<?php  echo "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>";       
     //  }, 
     //  3000); 
				}
			});
		}
	}
}

function set_currecny(cur){
	if(cur!=""){
		$.ajax ({
		url:"<?php echo site_url();? >/bitinka/currency/"+cur,
		type:"POST",
		data: {inka_forms: Cookies.get('cookie_forms')},
		success:function(data) {
		// window.location.href="<?php  echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>";       
		 		console.log(data);
			}			
		});
	}
}

function myFun(str){
	if(str=='profile'){
		window.location.href="<?php echo site_url();?>/bitinka/profile";
	}
	if(str=='wallet'){
		window.location.href="<?php echo site_url();?>/bitinka/wallet";
	}
	if(str=='send_money'){
		window.location.href="<?php echo site_url();?>/bitinka/send_money";
	}
	if(str=='receieve_money'){
		window.location.href="<?php echo site_url();?>/bitinka/receieve_money";
	}
	if(str=='edit'){
		window.location.href="<?php echo site_url();?>/bitinka/edit";
	}
	if(str=='security'){
		window.location.href="<?php echo site_url();?>/bitinka/security";
	}
	if(str=='transaction_history'){
		window.location.href="<?php echo site_url();?>/bitinka/transaction_history";
	}
	if(str=='trade_history'){
		window.location.href="<?php echo site_url();?>/bitinka/trade_history";
	}
	if(str=='order_history'){
		window.location.href="<?php echo site_url();?>/bitinka/order_history";
	}
	if(str=='api_key'){
		window.location.href="<?php echo site_url();?>/bitinka/api_key";
	}
	if(str=='meta_trader'){
		window.location.href="<?php echo site_url();?>/bitinka/meta_trader";
	}
}

// Start timers.
function StartTimers() {
    //warningTimer = setTimeout("IdleWarning()", timoutWarning);
    timeoutTimer = setTimeout("IdleTimeout()", timoutNow);
}

// Reset timers.
function ResetTimers() {
    //clearTimeout(warningTimer);
    clearTimeout(timeoutTimer);
    StartTimers();
    //$("#timeout").dialog('close');
}

// Show idle timeout warning dialog.
// function IdleWarning() {
//     $("#timeout").dialog({
//         modal: true
//     });
// }

// Logout the user.
function IdleTimeout() {
    window.location = logoutUrl;
}
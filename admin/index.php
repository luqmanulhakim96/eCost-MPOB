<?php error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../images/icon.ico" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" media="screen" rel="stylesheet" href="colorbox.css" />
<script type="text/javascript" src="colorbox/jquery.min.js"></script>
<script type="text/javascript" src="colorbox/jquery.colorbox.js"></script>
<script type="text/javascript">
			$(document).ready(function(){
				//Examples of how to assign the ColorBox event to elements.
				$("a[rel='jack']").colorbox({transition:"fade"});
				$("a[rel='dogs']").colorbox({transition:"elastic"});
				$("a[rel='river']").colorbox({transition:"none", width:"75%", height:"75%"});
				$("a[rel='lightbox2']").colorbox({width:"50%", height:"60%", iframe:false});
				$("a[rel='pdf']").colorbox({width:"75%", height:"97%", iframe:false});
				
				
				$(".slideshow").colorbox({slideshow:true});
				$("a.single").colorbox({}, function(){
					alert('Howdy, this is an example callback.');
				});
				$("a[title='Homer Defined']").colorbox();
				$(".flash").colorbox({href:"../content/flash.html"});
				$("a[href='loginbox.jsp']").colorbox({width:"25%", height:"58%", iframe:false});
				$("a[href='search_data.jsp']").colorbox({width:"55%", height:"30%", iframe:false});
				$("a[href='succes_deposit.jsp']").colorbox({width:"50%", height:"25%", iframe:false});
				$("a[href='succes_register.jsp']").colorbox({width:"50%", height:"25%", iframe:false});
				$("a[href='contact_detail.jsp']").colorbox({width:"60%", height:"45%", iframe:false});
				//$("a[href='viewer.jsp']").colorbox({width:"75%", height:"97%", iframe:false});
				$("a[href='viewer_book.jsp']").colorbox({width:"75%", height:"97%", iframe:false});
				$("a[href='errorbox.jsp']").colorbox({width:"40%", height:"20%", iframe:false});
				
				$.fn.colorbox({href:'login.php', open:true,width:"50%", height:"60%", iframe:false});
				
			
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
				$("#inline").colorbox({width:"50%", inline:true, href:"#inline_example1", title:"hello"});
			});
		</script>
<title>E-COST</title>
<style type="text/css">
<!--
body {
	background-color: #D3E2F8;
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
}
.style1 {color: #0000FF}
.style2 {
	font-size: 24px;
	font-weight: bold;
}
-->
</style></head>

<body>
</body>
</html>

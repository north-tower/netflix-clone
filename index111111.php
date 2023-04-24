<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>
<html>
<head>
<script>
<!--
window.open("main/welcome.php","fs","fullscreen,scrollbars")
//-->
</script> 
<title>
POS
</title>
<link href="style.css" media="screen" rel="stylesheet" type="text/css" />
<div id="header" style="text-align: left; font-size: 20px; margin: 0px 0px -74px;">
<font color="#0000FF">
<img src="zeni logo.png" align="left">ZENPOS SYSTEMS
</font>
</div>
</head>

<body>

<div id="loginform">
<?php
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
	foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		echo '<div style="color: red; text-align: center;">',$msg,'</div><br>'; 
	}
	unset($_SESSION['ERRMSG_ARR']);
}
?>
<form action="login.php" method="post">
<span>Username :</span><input type="text" name="username" required autofocus/><br><br>
<span>Password :</span><input type="password" name="password" /><br><br>
<span>&nbsp;</span><input id="btn" type="submit" value="Login" />
</form>
</div>
			<div class="row-fluid" align="center" style="font-family:Tahoma; color:#0033FF;">
				<div class="col-md-5 col-md-offset-1">
				<h4><span id=tick2>
				</span>&nbsp;| 
<script>
				function show2(){
				if (!document.all&&!document.getElementById)
				return
				thelement=document.getElementById? document.getElementById("tick2"): document.all.tick2
				var Digital=new Date()
				var hours=Digital.getHours()
				var minutes=Digital.getMinutes()
				var seconds=Digital.getSeconds()
				var dn="PM"
				if (hours<12)
				dn="AM"
				if (hours>12)
				hours=hours-12
				if (hours==0)
				hours=12
				if (minutes<=9)
				minutes="0"+minutes
				if (seconds<=9)
				seconds="0"+seconds
				var ctime=hours+":"+minutes+":"+seconds+" "+dn
				thelement.innerHTML=ctime
				setTimeout("show2()",1000)
				}
				window.onload=show2
				//-->
</script>
	      <?php
            $date = new DateTime();
            echo $date->format('l, F jS, Y');
          ?><h4>
            </div>
</body>
</html>
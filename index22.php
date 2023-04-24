<!DOCTYPE html>
<html lang="en">
<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css22/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css22/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css22/grid.css" type="text/css" media="screen">   
    <script src="js/jquery-1.6.3.min.js" type="text/javascript"></script>
    <script src="js/cufon-yui.js" type="text/javascript"></script>
    <script src="js/cufon-replace.js" type="text/javascript"></script>
    <script src="js/NewsGoth_400.font.js" type="text/javascript"></script>
	<script src="js/NewsGoth_700.font.js" type="text/javascript"></script>
    <script src="js/NewsGoth_Lt_BT_italic_400.font.js" type="text/javascript"></script>
    <script src="js/Vegur_400.font.js" type="text/javascript"></script> 
    <script src="js/FF-cash.js" type="text/javascript"></script>
    <script src="js/jquery.featureCarousel.js" type="text/javascript"></script>     
    <script type="text/javascript">
      $(document).ready(function() {
        $("#carousel").featureCarousel({
			autoPlay:7000,
			trackerIndividual:false,
			trackerSummation:false,
			topPadding:50,
			smallFeatureWidth:.9,
			smallFeatureHeight:.9,
			sidePadding:0,
			smallFeatureOffset:0
		});
      });
    </script>
		<script type="text/javascript">
function target_popup(form)
{
window.open('','formpopup', 'width=1800,height=1000,resizeable,scrollbars');
form.target = 'formpopup';
}
</script>
	<!--[if lt IE 7]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
        	<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
    </div>
	<![endif]-->
    <!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html5.js"></script>
        <link rel="stylesheet" href="css22/ie.css" type="text/css" media="screen">
	<![endif]-->
</head>
<body id="page1">
	<div class="extra">
    	<!--==============================header=================================-->
        <header>
        	<div class="row-top">
            	<div class="main">
                	<div class="wrapper">
                    	<h1><a href="#">Zeni-Tech Solutions</a></h1>
                       <!-- <form id="search-form" method="post" enctype="multipart/form-data">
                        <fieldset>	
                            <div class="search-field">
                                <input name="search" type="text" value="Search..." onBlur="if(this.value=='') this.value='Search...'" onFocus="if(this.value =='Search...' ) this.value=''" />
                                <a class="search-button" href="#" onClick="document.getElementById('search-form').submit()"></a>	
                            </div>						
                        </fieldset>
                    </form> -->
                    </div>
                </div>
            </div>
            <div class="menu-row">
            	<div class="menu-bg">
                    <div class="main">
                        <nav class="indent-left">
                            <ul class="menu wrapper">
                                <li class="active"><a href="#">&nbsp;</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row-bot">
            	<div class="center-shadow">
                	<div>
                      <div>
                        <div style="height:400px;">
						<div style="height:150px;">&nbsp;</div>
                          <div id="loginform">
<?php
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
	foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		echo '<div style="color: red; text-align: center;">',$msg,'</div><br>'; 
	}
	unset($_SESSION['ERRMSG_ARR']);
}
?>

<div align="center">
<?php $date = date('Y-m-d');
//echo $date;
 if($date >= "2017-05-05"){
 echo "<FONT COLOR='RED'>KINDLY CONTACT THE ADMINISTRATOR TO CONTINUE WITH SYSTEM OPERATIONS, THANK YOU</font>";
 }else{ ?>
<form action="login.php" method="post" onSubmit="target_popup(this)"  >
<span><h4><font color="#000000">Username :</font></span><input type="text" style="width:250px; height:30px;" name="username" required autofocus /><br><br>
<span><h4><font color="#000000">Password :</font>.</span><input type="password" style="width:250px; height:30px;" name="password" /><br><br>
<span>&nbsp;</span><input id="btn" type="submit" value="Login" style="width:250px; height:35px; margin-left:100px;" />
</form>
</div>

			
                     <?php } ?>     </div>
                        
                        
                      </div>
    				</div>
                </div>
            </div>
        </header>
        
        <!--==============================content================================-->
       <div class="row-fluid" align="center" style="font-family:Tahoma; color:#000000;">
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
            echo '<font color="black"><h4>' . $date->format('l, F jS, Y');
          ?><h4>
		  
		  Zeni-Tech - Solutions &copy &reg CALL 0711649109
            </div>
                          
        </section>
    </div>
	
	<!--==============================footer=================================-->
    <footer>
        <div class="padding">
            <div class="main">
                <div class="container_12">
                    <div class="wrapper">
                       
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </footer>
	<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>

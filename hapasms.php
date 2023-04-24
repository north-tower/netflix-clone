<?php
	require_once('auth.php');
?>
<html>
<head>
<title>
POS
</title>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>
<script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:Georgia, "Times New Roman", Times, serif; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

<!--sa poip up-->

<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
</head>
<body>
<div id="maintable">
<div style="margin-top: -19px; margin-bottom: 21px;">
<a id="addd" href="index.php" style="float: none;">Back</a>
</div>

<input type="text" name="filter" value="" id="filter" placeholder="Search Product..." autocomplete="off" /><a id="addd" href="javascript:Clickheretoprint()">Print</a>

<br />
<div class="content" id="content">
<div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
<BR />
BALANCE REPORT 
<br />
</div>
<form name="form1" method="post" action="selectedsms.php">
<table id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="17%"> Transaction ID </th>
			<th width="25%"> Customer Name </th>
			<th width="25%"> Total Balance </th>
			<th width="25%"> Options </th>
		</tr>
	</thead>
	<tbody>
	
		
			<?php
				include('../connect.php');
				
				$c='credit';
			
				$result = $db->prepare("SELECT  name, sum(balance) FROM sales WHERE type=:c AND balance > 0 GROUP BY name");
				$result->bindParam(':c', $c);
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td>TRN-000</td>
			
			<td><?php echo $row['name']; ?></td>
			
			<td><?php
			$dsdsd=$row['sum(balance)'];
			echo formatMoney($dsdsd, true);
			?></td>
			<td align="center" bgcolor="#FFFFFF"><center><input style="width: 20px;" name="checkbox[]" type="checkbox" id="checkbox[]" value="' .$row['name'] .'"></center></td>
			</tr>
			<?php
				}
			?>
		
	</tbody>
	<thead>
		<tr>
			<th colspan="2" style="border-top:1px solid #999999"> Total Balance </th>
			<th colspan="2" style="border-top:1px solid #999999"> 
			<?php
				function formatMoney($number, $fractional=false) {
					if ($fractional) {
						$number = sprintf('%.2f', $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}
				
				$c='credit';
				$results = $db->prepare("SELECT sum(balance) FROM sales WHERE type=:c");
				$results->bindParam(':c', $c);
				$results->execute();
				for($i=0; $rows = $results->fetch(); $i++){
				$dsdsd=$rows['sum(balance)'];
				echo formatMoney($dsdsd, true);
				}
				?>
			</th>
		</tr>
	</thead>
</table>
<br />
<br />
<input name="smsfew" type="submit" id="smsfew" style="width: 90px; color: #fff; background-color: #333;" value="sms selected"></form>
//	<?php // if(isset($_POST['smsfew'])){
//$checked = $_POST["checkbox"];
//for($i=0; $i < count($checked); $i++) {
//$name = $checked[$i];
//$sql = "SELECT FROM messages WHERE message_id='$del_id'";
//$result = mysql_query($sql);
//}
//
//// if successful redirect to delete_multiple.php 
//if($result){
//echo "<meta http-equiv=\"refresh\" content=\"0;URL=mail.php\">";
//}
//?>
</div>
<div class="clearfix"></div>
</div>
</body>
</html>
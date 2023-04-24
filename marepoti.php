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
<?php include('navbar_dasboard.php'); ?>
<link href="../css/bootstrap.css" rel="stylesheet" media="screen">
			<link href="../css/bootstrap-responsive.css" rel="stylesheet" media="screen">
			<link href="../css/docs.css" rel="stylesheet" media="screen">
			<link href="../css/font-awesome.css" rel="stylesheet" media="screen">
			   <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
			   	   
			<!--sa calendar-->	
		<script type="text/javascript" src="js1/datepicker.js"></script>
        <link href="css/datepicker.css" rel="stylesheet" type="text/css" />  
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="libw/css/style.css">
        <link rel="stylesheet" href="jsw/date_pic/date_input.css">
        <link rel="stylesheet" href="libw/auto/css/jquery.autocomplete.css">
		<script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript" src="tcal.js"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script>
window.onload = function() {
  document.getElementById("country").focus();
};
</script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	


</head>
<body>

<div id="maintable">
<div style="margin-top: -19px; margin-bottom: 21px;">

</div><div class="empty">
<form action="marepoti.php" method="get">
From : <input type="text" name="d1" class="tcal" value="" /> To: <input type="text" name="d2" class="tcal" value="" /> <input type="submit" value="Search">
<a href="#" class="btn btn-primary" onClick="window.print()" id="print" ><i class="fa fa-print"></i> Print </a></button>
</div>
</form>
<link href="css/print.css" rel="stylesheet" type="text/css" media="print">
<div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
<?php
$source = $_GET['d1'];
$datev = new DateTime($source);
$new = $datev->format('Y-m-d'); 

$s2 = $_GET['d2'];
$date2 = new DateTime($s2);
$new2 = $date2->format('Y-m-d');  ?> 

SALES REPORT BETWEEN
<br /> &nbsp;<?php echo $new; ?>&nbsp; AND &nbsp;<?php echo $new2; ?>
</div>
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
				?>	
									<?php	include('../connect.php');
		
	?><div class="row">
					<div class="col-md-12">
					<div class="content" id="content">
	<div align="center"><h4>BALANCE SHEET FOR THE PERIOD FROM<br /> <?php echo $_GET['d1']; ?> TO <?php  echo $_GET['d2'];  ?></div>
<?php
	$tb_balance = "";
	// Trading Account Work Out
	
	
	?><table class='trading' style="display:none;">
	<tr bgcolor=\"#bbbbbb\"><td colspan=\"3\">Trading Account for the period from <?php echo $new1; ?> to <?php echo $new2; ?></td></tr>
	<tr bgcolor=\"#bbbbbb\"><td>Trading Account</td><td>Debit</td><td>Credit</td></tr>
	<?php
	$query = " select sum(opening_balance) AS opening_stock from account_name where act_group_head='STOCK' ";
	$result = mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		while($row = mysql_fetch_array($result)) {
			?><tr><td>Opening Stock</td><td bgcolor=\"#bbbbbb\"><?php echo $row['opening_stock']; ?></td><td></td></tr>
			<?php $tb_balance = $tb_balance + $row['opening_stock'];
		}
		
	}
	$query = " select an.act_group_head as actgrouphead,sum(db.daybookamount) as debit, 0 as credit from daybook as db inner join  account_name as an on db.debit=an.acc_name where an.acc_head='tr' ";
   	if($new1 != "") {
		$query .= " and (dayBookDate between '".$new1."' and '".$new2."') ";			
	}	
	$query .= "	group by an.act_group_head";
	$query .= " union ";
	$query .= " select an.act_group_head as actgrouphead,0 as debit, sum(db.daybookamount) as credit from daybook as db inner join  account_name as an on db.credit=an.acc_name where an.acc_head='tr' ";
   	if($new1 != "") {
		$query .= " and (dayBookDate between '".$new1."' and '".$new2."') ";			
	}	
	$query .= " group by an.act_group_head";
	//echo $query; 	 
	$result = mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		while($row = mysql_fetch_array($result)) {
			?><tr><td bgcolor=\"#bbbbbb\"><?php echo $row['actgrouphead']; ?></td>
			<td><?php echo $row['debit']; ?></td>
			<td><?php echo $row['credit']; ?></td>
			<?php $tb_balance += $row['debit'] - $row['credit'];
		} 
	}

	$query = " select sum(closing_balance) AS closing_stock from account_name where act_group_head='STOCK' ";
	$result = mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		while($row = mysql_fetch_array($result)) {
			?><tr><td>Closing Stock</td><td></td><td bgcolor=\"#bbbbbb\"><?php echo $row['closing_stock']; ?></td></tr>
			<?php $tb_balance = $tb_balance - $row['closing_stock'];
			$closing_stock = $row['closing_stock'];
		}
	}
	
	
	//$tb_balance = $tb_balance + 10000000;	
	$tb_profit="";
	$tb_loss ="";
	if ($tb_balance <= 0) {
		$tb_profit = $tb_balance;
		?><tr bgcolor=\"#33dd00\"><td>Trading Profit</td>
		<td><?php echo abs($tb_profit); ?></td>
		<td>&nbsp;</td>
		</tr>
		<?php
	} else {
		$tb_loss = $tb_balance;		
		?><tr bgcolor=\"#dd3300\"><td>Trading Loss</td>
		<td>&nbsp;</td>
		<td><?php echo $tb_loss; ?></td>
		</tr>
		<?php
	}
	?></table>
	<?php
	
	
	$pl_balance = "";
	
	// Profit and Loss Work Out
?><table style="display:none;">
	<tr bgcolor=\"#bbbbbb\"><td colspan=\"3\">Profit &amp; Loss for the period from <?php echo $new1; ?> to <?php echo $new2; ?></td></tr>
	<tr bgcolor=\"#bbbbbb\"><td>Profit & Loss</td><td>Debit</td><td>Credit</td></tr>
	<?php
	$query = " select an.act_group_head as actgrouphead,sum(db.daybookamount) as debit, 0 as credit from daybook as db inner join  account_name as an on db.debit=an.acc_name where an.acc_head='pl' ";
   	if($new1 != "") {
		$query .= " and (dayBookDate between '".$new1."' and '".$new2."') ";			
	}

	$query .= " group by an.act_group_head";
	$query .= " union ";
	$query .= " select an.act_group_head as actgrouphead,0 as debit, sum(db.daybookamount) as credit from daybook as db inner join  account_name as an on db.credit=an.acc_name where an.acc_head='pl' ";
   	if($new1 != "") {
		$query .= " and (dayBookDate between '".$new1."' and '".$new2."') ";			
	}

	$query .= " group by an.act_group_head";

	//echo $query; 	 

	$result = mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		while($row = mysql_fetch_array($result)) {
			?><tr><td bgcolor=\"#bbbbbb\"><a id="print" href="perdetailsexpenses.php?d1=<?php echo $new1; ?>&d2=<?php echo $new2; ?>&expese=<?php echo $row['debit'];?>&projct=<?php echo $lmn; ?>"><?php echo "view "; ?></a><?php echo $row['actgrouphead'];?></a></td>
			<td><?php echo $row['debit']; ?></td>
			<td><?php echo $row['credit']; ?></td>
			<?php
			$pl_balance += $row['debit'] - $row['credit'];
		} 
	}
	//$tb_balance = $tb_balance + 10000000;
	$pl_profit = "";
	$pl_loss = "";
	$pl_balance = $pl_balance + $tb_profit + $tb_loss;
	if ($pl_balance <= 0) {
		$pl_profit = $pl_balance;
		?><tr bgcolor=\"#33dd00\"><td>Net Profit</td>
		<td><?php echo abs($pl_profit); ?></td>
		<td>&nbsp;</td>
		</tr>
		<?php
	} else {
		$pl_loss = $pl_balance;		
		?><tr bgcolor=\"#dd3300\"><td>Net Loss</td>
		<td>&nbsp;</td>
		<td><?php echo $pl_loss; ?></td>
		</tr>
		<?php
	}
	?>
	</table>
<?php
	// Balance Sheet Work Out
	
	$query = "select actgrouphead, sum(debit) as debit, sum(credit) as credit, sum(debit-credit) as balance from";
            $query .=  " (";
			$query .=  "   select actgrouphead, sum(a) as debit, sum(b) as credit , sum(a-b) as balance from ";
			$query .=  "   (";
			$query .=  "    select an.act_group_head as actgrouphead,sum(db.daybookamount) as a, 0 as b, 0 as c from daybook as db inner join  account_name as an on db.debit=an.acc_name where an.acc_head='bs' ";
			if($new1 != "") {
				$query .= " and (dayBookDate between '".$new1."' and '".$new2."') ";			
			}	
			  $query .= " group by an.act_group_head";
			  $query .= "   union";
			  $query .= "	select an.act_group_head as actgrouphead,0 as a, sum(db.daybookamount) as b, 0 as c from daybook as db inner join  account_name as an on db.credit=an.acc_name where an.acc_head='bs' ";
			if($new1 != "") {
				$query .= " and (dayBookDate between '".$new1."' and '".$new2."') ";			
			}
			$query .=  " group by an.act_group_head";
			$query .=  "	  ) ";
			$query .=  "	  as TT1 group by TT1.actgrouphead";
			$query .=  "	  union";
			$query .=  "	  select actgrouphead, sum(debit) as debit, sum(credit) as credit, sum(debit-credit) as balance from ";
			$query .=  "	  (";
			$query .=  "	    select act_group_head as actgrouphead, sum(opening_balance) as debit, 0 as credit, 0 as balance from  account_name where opening_balance_type='debit'";
			$query .=  " group by act_group_head";
			$query .=  " union";
			$query .=  " select act_group_head as actgrouphead, 0 as debit, sum(opening_balance) as credit, 0 as balance from  account_name where opening_balance_type='credit' ";
			$query .=  " group by act_group_head";
			$query .=  "	  )";
			$query .=  "    as TT2 group by TT2.actgrouphead";
			$query .=  "	)";
			$query .=  "	as TT3 where TT3.actgrouphead <> 'STOCK' group by TT3.actgrouphead"; // Avoid showing Stock
	//echo $query ;
	$result = mysql_query ($query) or die (mysql_error());;
	
	
	?><table cellpadding="0" cellspacing="0" border="0" class="table" id="resultTable"> 
									
										<thead>
										  <tr>
												<th><center>BALANCE SHEET</center></th>
												<th><center>LIABILITY</center></th>
												<th><center>ASSET</center></th>
										        <th></th>
										   </tr>
										</thead>
										<tbody>
	<?php
	$asset_balance ="";
	$liability_balance="";
	if(mysql_num_rows($result) > 0) 
	{  $i=0;
		while($row = mysql_fetch_array($result)) {
			if ($row[3] < 0){
			$i++; 

if($i%2) 
{ 
$bg_color = "#E0E0E0"; 
} 
else { 
$bg_color = "#EEEEEE"; 
}  ?>
			<?php echo "<tr bgcolor='". $bg_color ."'>";?> <td><a href="javascript:postActionGroupName('".$row[0]."','showGroup')"><?php echo $row[0]; ?></td><td><?php  $two= abs($row[3]); echo formatMoney($two, true); ?></td><td></td></tr>				
				<?php $liability_balance += abs($row[3]);
			} else {
				$i++; 

if($i%2) 
{ 
$bg_color = "#E0E0E0"; 
} 
else { 
$bg_color = "#EEEEEE"; 
}  ?>
			<?php echo "<tr bgcolor='". $bg_color ."'>";?> <?php if($row[0] == "INDIRECT INCOME"){ ?><td></td><?php }else { ?><td><a href="javascript:postActionGroupName('".$row[0]."','showGroup')"><?php echo $row[0]; ?></td><?php } ?><td></td><td><?php $one=$row[3]; echo formatMoney($one, true); ?></td></tr>				
				<?php  $asset_balance += abs($row[3]);
			}
		}
	}
	$asset_balance += $closing_stock;
	$i++; 

if($i%2) 
{ 
$bg_color = "#E0E0E0"; 
} 
else { 
$bg_color = "#EEEEEE"; 
}  ?>
			<?php echo "<tr bgcolor='". $bg_color ."'>";?> <td>STOCK</td><td></td><td><?php $five = $closing_stock; echo formatMoney($five, true); ?></td></tr>
	<?php
	//$bs_total = $pl_profit-$pl_loss;
	$liability_balance += abs($pl_profit);
	$asset_balance += $pl_loss;
	?><tr bgcolor="#FFFFFF" style="color:#990066;"><td>Net Profit / Net Loss</td><td><b><?php  $munah = abs($pl_profit); echo formatMoney($munah, true); ?></td><td><?php $lsss = $pl_loss; echo formatMoney($lsss, true); ?></b></td></tr>
	<tr bgcolor="#666666" style="color:#FFFFFF"><td>Total</td><td><?php $lbmunah = $liability_balance; echo formatMoney($lbmunah, true); ?></td><td><?php $asmunah = $asset_balance; echo formatMoney($asmunah, true); ?></td></tr>
	</table>
	<?php
// }
?>
</div>


<div class="clearfix"></div>

	<!-- js -->			
    <script src="js1/jquery-1.7.2.min.js"></script>
    <script src="js1/bootstrap.js"></script>			
	 <script type="text/javascript" charset="utf-8" language="javascript" src="js1/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="js1/DT_bootstrap.js"></script>
	
			<!--sa calendar-->	
		<script type="text/javascript" src="js1/datepicker.js"></script>
        <link href="css/datepicker.css" rel="stylesheet" type="text/css" />
	



<br />
 <div class="alert alert-info">
						
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp; Total Sales over selected period</strong>
                            </div>
							<div class="container">
						<div class="row">	
						<div class="span9">
</div>

<div class="clearfix"></div>
</div>
</body>
</html>
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
	
<style type="text/css">
	.navi {
	width: 500px;
	margin: 5px;
	padding:2px 5px;
	border:1px solid #eee;
	}

	.show {
	color: blue;
	margin: 5px 0;
	padding: 3px 5px;
	cursor: pointer;
	font: 15px/19px Arial,Helvetica,sans-serif;
	}
	.show a {
	text-decoration: none;
	}
	.show:hover {
	text-decoration: underline;
	}


	ul.setPaginate li.setPage{
	padding:15px 10px;
	font-size:14px;
	}

	ul.setPaginate{
	margin:0px;
	padding:0px;
	height:100%;
	overflow:hidden;
	font:12px 'Tahoma';
	list-style-type:none;	
	}  

	ul.setPaginate li.dot{padding: 3px 0;}

	ul.setPaginate li{
	float:left;
	margin:0px;
	padding:0px;
	margin-left:5px;
	}



	ul.setPaginate li a
	{
	background: none repeat scroll 0 0 #ffffff;
	border: 1px solid #cccccc;
	color: #999999;
	display: inline-block;
	font: 15px/25px Arial,Helvetica,sans-serif;
	margin: 5px 3px 0 0;
	padding: 0 5px;
	text-align: center;
	text-decoration: none;
	}	

	ul.setPaginate li a:hover,
	ul.setPaginate li a.current_page
	{
	background: none repeat scroll 0 0 #0d92e1;
	border: 1px solid #000000;
	color: #ffffff;
	text-decoration: none;
	}

	ul.setPaginate li a{
	color:black;
	display:block;
	text-decoration:none;
	padding:5px 8px;
	text-decoration: none;
	}




	</style> 
</head>
<body style="margin-left: -400px;">
<?php
function createRanword() {
	$char = "003232303232023232023456789";
	srand((double)microtime()*100000);
	$m = 0;
	$pas = '' ;
	while ($m <= 5) {

		$nu = rand() % 33;

		$tmpt = substr($char, $nu, 1);

		$pas = $pas . $tmpt;

		$m++;

	}
	return $pas;
}
$finde2='PR-'.createRanword();

	 $del = $db->prepare('SELECT product_code FROM produtase WHERE product_code=:a ');
$del->bindParam(':a', $finde2);
$del->execute();
$count = $del->rowCount();
if($count > 0){ $finde = $finde2."NW";}else{$finde = $finde2;}
?>   

<div><b>STORE:
<div id="maintable"><div style="margin-top: -19px; margin-bottom: 21px; width: 1000px;"><a class="btn" style="color:#990000;" style="width:100px;" href="exportproducts.php">Export</a>
<a class="btn" style="color:#990000;" style="width:100px;" href="categorystock.php">CATEGORY STOCKS</a> <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;INVENTORY PRODUCTS SECTION ......................</strong>
<div class="alert alert-info">
						
                                    
                            </div>
							
</div>
 <div align="left">
 
<?php include('connect.php'); ?>

<?php  $position=$_SESSION['SESS_LAST_NAME'];
if($position == "admin"){ ?>

<form name="stores" action="products.php" method="GET">
<span>Store : </span>
<select name="datab" class="btn" style="color:#990000; width:155px;" required >
<option value=""> - Select Database - </option>
<option value="produtase"> - Inventory - </option>
	<?php
	include('connect.php');
	$result2 = $db->prepare("SELECT * FROM mydbs ORDER BY dbid ASC");
	//	$result->bindParam(':userid', $res);
		$result2->execute();
		for($i=0; $row2 = $result2->fetch(); $i++){
	?>
		<option value="<?php echo $row2['dbname']; ?>"><?php echo $row2['dbname']; ?></option>
	<?php
	}
	?>
</select>
<input type="submit" name="store" value="View Store Data">
<br />
<br />
<?php if (isset($_GET["datab"])) { 
$store = $_GET['datab'];
echo '<h1><b>STORE:</b> <font color="red"><b>' . strtoupper($store). '</b></font></h1> '; ?> 
<a rel="facebox" class="btn" style="color:#990000; margin-left: 890px; width: 100px; margin-top: -100px;" href="addproduct.php?code=<?php echo $finde;?>&table=<?php echo $store; ?>">Add Product</a><br><br>



<?php
$del2 = $db->prepare('SELECT * FROM '.$store.'');
//$del2->bindParam(':a', $store);
$del2->execute();
$count2 = $del2->rowCount();
echo '<font color=="maroon" class="btn btn-primary">' . $count2 . ' Item Listing</font>';
?></span>
<br />
<input type="text" name="filter" value="" id="filter" placeholder="Search Product..." autocomplete="off" />
<table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example" style="width: 1000px; margin-top: -500px;">
	<thead>
		<tr>
			<th width="10">code</th>
			<th width="30"> Products </th>
			<!-- <th> make </th>
			<th> description</th> -->
			<th width="9"> cost </th>
			 <th width="9"> R/Price </th>
			<th width="9"> W/Price </th>
			<th width="8"> qty </th>
<th>Unposted</th>
<th>Actual Qty</th>
			<th width="12"> Stock value </th>
			<th width="10"> MARGIN</th>
			<th width="10"> ACTION </th>
		</tr>
	</thead>
	<tbody>
		
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
				
				include('../connect.php');
				$result2 = $db->prepare("SELECT DISTINCT Make FROM $store ORDER BY Make ASC");
				$result2->execute();
				for($i=0; $row2 = $result2->fetch(); $i++){
  				$cat = $row2['Make']; 
				
					
				
			?>
			<tr class="record">
				<td nowrap="nowrap"><?php echo $cat; ?></td></tr><tr>	
			<?php	$result = $db->prepare("SELECT * FROM $store WHERE Make =:ff ORDER BY product_name ASC ");
				$result->bindParam(':ff', $cat);
				$result->execute();
				$counter = 1;
				for($i=0; $row = $result->fetch(); $i++){ ?>
<td nowrap="nowrap"><font color="red"><?php echo $row['product_code']; ?></font></td>				
			<td nowrap="nowrap" style="font-size: 12px; font-family: Tahoma;"><b><?php echo $counter++; ?>. ) <a href="stockhistory.php?nmb=<?php echo $row['product_code']; ?>"><?php echo $row['product_name']; ?></a> <span style="font-size: 3px; color:#FFFFFF"><?php echo $row['Make']; ?>'s </font> </span> </td>
			<!-- <td><?php //echo $row['Make']; ?></td>
			<td><?php //echo $row['Description']; ?></td> -->
			<td nowrap="nowrap" style="text-align: right;"><?php
			$pcost=$row['cost'];
			?> <span class="btn btn-primary" ><?php if($position == "admin"){ echo formatMoney($pcost, true); }else{ echo "_**_"; }
			?></span></td>
			 <td nowrap="nowrap" style="text-align: right;"><?php
			$pprice=$row['price'];
		?><span class="btn" style="color:#0066CC;"><?php echo formatMoney($pprice, true);
			?></span></td>
			<td nowrap="nowrap" style="text-align: right;"><span class="btn" style="color:#0066CC;"><?php echo $row['whlsale']; ?></span></td>
			<td nowrap="nowrap" style="text-align: right;"><span class="btn" style="color:red;"><b><?php echo $row['qty']; ?></span></td>
<td nowrap="nowrap" style="text-align: right;"><span class="btn" style="color:#0000FF;"><b>
			<?php

		$d2 = "unposted";
		
				include('connect.php');
$prdc = $row['product_code'];
				$result7 = $db->prepare("SELECT SUM(qty), product FROM sales_order where product =:p AND posted=:c ");
				$result7->bindParam(':p', $prdc);
				$result7->bindParam(':c', $d2);
				$result7->execute();
				
			    $row7 = $result7->fetch(); 
                $qty7 = $row7['SUM(qty)'];

if($qty7 >0){ 
				echo '<font color="red">'. number_format($qty7). '</font>'; }else{ echo '<font color="blue">'. number_format($qty7) . '</font>';  } ?>
<td style="text-align: right;"><span class="btn" style="color:#990000"><b><?php $ttl = $qty7 + $row['qty']; echo number_format($ttl); ?></b></span></td>	

			<td nowrap="nowrap" style="text-align: right;"><?php $v = $pprice * $row['qty'];
			?> <span class="btn" style="color:#0066CC;" style="text-align: right;"><?php echo formatMoney($v, true);
			 ?></span></td>
			 <?php if($position == "admin"){ ?><td nowrap="nowrap" style="text-align: right;"><?php $diff = $pprice - $pcost; if($diff > 0){ ?> <span class="btn btn-primary" ><?php  echo $diff; }else{ ?> <span class="btn" style="color:#990000;"  ><?php  echo $diff; }?></span></td><?php }else{?> <td> </td> <?php } ?><!-- <td nowrap="nowrap" style="text-align: right;"><?php $wwlsale = $row['whlsale']; $diff2 = $wwlsale - $pcost; if($diff2 > 0){ ?> <span class="btn btn-primary" ><?php  echo $diff2; }else{ ?> <span class="btn" style="color:#990000;"  ><?php  echo $diff2; }?></span></td>
			--><td nowrap="nowrap" style="text-align: right;"><a rel="facebox" href="editproduct.php?id=<?php echo $row['product_id']; ?>"><img src="images/icons/table/actions-edit.png"></a>|<?php if($position == "admin"){?><a href="#" id="<?php echo $row['product_id']; ?>" class="delbutton" title="Click To Delete"><img src="images/icons/table/actions-delete.png"></a><?php } ?>|<a rel="facebox" href="adjustquantity.php?id=<?php echo $row['product_id']; ?>"><img src="images/icons/table/menu-settings.png"></a> &nbsp; &nbsp;</td>
			</tr>
			<?php
				}
				}
			?>
		
	</tbody>
	<thead>
		<tr>
			<th colspan="3" style="border-top:1px solid #999999; text-align: right;"> Total Stock Value </th>
			<th colspan="1" style="border-top:1px solid #999999; text-align: right"> 
	<?php
				
				
				$results = $db->prepare("SELECT sum(cost*qty), sum(price*qty), sum(whlsale*qty) FROM $store ");
				
				$results->execute();
				for($i=0; $rows = $results->fetch(); $i++){
				$dsdsd=$rows['sum(cost*qty)'];
                                $dsdsd12=$rows['sum(price*qty)'];
$dsdsd122=$rows['sum(whlsale*qty)'];
				echo  formatMoney($dsdsd, true);
				}
				?>
			
</th><th nowrap="nowrap" colspan="1" style="border-top:1px solid #999999; text-align: right"><?php echo formatMoney($dsdsd12, true); ?> </th>
</th><th nowrap="nowrap" colspan="1" style="border-top:1px solid #999999; text-align: right"><?php echo formatMoney($dsdsd122, true); ?> </th>
<th></th>
<th></th>
<th></th>
<th></th>
<th></th>

		</tr>
	</thead>
</table>

</table>
	<hr />
	
	

<div class="clearfix"></div> <?php
	// Call the Pagination Function to load Pagination.

	//echo displayPaginationBelow($setLimit,$page);
	
	}
	}else if($position != 'admin'){ $store1 = $_SESSION['SESS_CITY']; 
	
echo '<h1><b>STORE:</b> <font color="red"><b>' . strtoupper($store1). '</b></font></h1> '; ?> 
<a rel="facebox" class="btn" style="color:#990000; margin-left: 890px; width: 100px; margin-top: -100px;" href="addproduct.php?code=<?php echo $finde;?>&table=<?php echo $store1; ?>">Add Product</a><br><br>


<?php
$del2 = $db->prepare('SELECT * FROM '.$store1.'');
//$del2->bindParam(':a', $store1);
$del2->execute();
$count2 = $del2->rowCount();
echo '<font color=="maroon" class="btn btn-primary">' . $count2 . ' Item Listing</font>';
?></span>
</span>
<br />
<input type="text" name="filter" value="" id="filter" placeholder="Search Product..." autocomplete="off" />
<table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example" style="width: 1000px; margin-top: -500px;">
	<thead>
		<tr>
			<th width="10">code</th>
			<th width="30"> Products </th>
			<!-- <th> make </th>
			<th> description</th> -->
			<th width="9"> cost </th>
			 <th width="9"> R/Price </th>
			<th width="9"> W/Price </th>
			<th width="8"> qty </th>
			<th width="12"> Stock value </th>
			<th width="10"> MARGIN</th>
			<th width="10"> ACTION - </th>
		</tr>
	</thead>
	<tbody>
		
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
				
				include('../connect.php');
				$result2 = $db->prepare("SELECT DISTINCT Make FROM $store1 ORDER BY Make ASC");
				$result2->execute();
				for($i=0; $row2 = $result2->fetch(); $i++){
  				$cat = $row2['Make']; 
				
					
				
			?>
			<tr class="record">
				<td nowrap="nowrap"><?php echo $cat; ?></td></tr><tr>	
			<?php	$result = $db->prepare("SELECT * FROM $store1 WHERE Make =:ff ORDER BY product_name ASC ");
				$result->bindParam(':ff', $cat);
				$result->execute();
				$counter = 1;
				for($i=0; $row = $result->fetch(); $i++){ ?>
<td nowrap="nowrap"><font color="red"><?php echo $row['product_code']; ?></font></td>				
			<td nowrap="nowrap" style="font-size: 12px; font-family: Tahoma;"><b><?php echo $counter++; ?>. ) <a href="stockhistory.php?nmb=<?php echo $row['product_code']; ?>"><?php echo $row['product_name']; ?></a> <span style="font-size: 3px; color:#FFFFFF"><?php echo $row['Make']; ?>'s </font> </span> </td>
			<!-- <td><?php //echo $row['Make']; ?></td>
			<td><?php //echo $row['Description']; ?></td> -->
			<td nowrap="nowrap" style="text-align: right;"><?php
			$pcost=$row['cost'];
			?> <span class="btn btn-primary" ><?php if($position == "admin"){ echo formatMoney($pcost, true); }else{ echo "_**_"; }
			?></span></td>
			 <td nowrap="nowrap" style="text-align: right;"><?php
			$pprice=$row['price'];
		?><span class="btn" style="color:#0066CC; text-align: right;"><?php echo formatMoney($pprice, true);
			?></span></td>
			<td nowrap="nowrap" style="text-align: right;"><span class="btn" style="color:#0066CC;"><?php echo $row['whlsale']; ?></span></td>
			<td nowrap="nowrap" style="text-align: right;"><span class="btn" style="color:red;"><b><?php echo $row['qty']; ?></span></td>
			<td nowrap="nowrap" style="text-align: right;"><?php $v = $pprice * $row['qty'];
			?> <span class="btn" style="color:#0066CC;"><?php echo formatMoney($v, true);
			 ?></span></td>
			 <?php if($position == "admin"){ ?><td nowrap="nowrap" style="text-align: right;"><?php $diff = $pprice - $pcost; if($diff > 0){ ?> <span class="btn btn-primary" ><?php  echo $diff; }else{ ?> <span class="btn" style="color:#990000;"  ><?php  echo $diff; }?></span></td><?php }else{?> <td> </td> <?php } ?>
			<td nowrap="nowrap"><a rel="facebox" href="editproduct.php?id=<?php echo $row['product_id']; ?>"><img src="images/icons/table/actions-edit.png"></a>|<?php if($position == "admin"){?><a href="#" id="<?php echo $row['product_id']; ?>" class="delbutton" title="Click To Delete"><img src="images/icons/table/actions-delete.png"></a><?php } ?>|<a rel="facebox" href="adjustquantity.php?id=<?php echo $row['product_id']; ?>"><img src="images/icons/table/menu-settings.png"></a></td>
			</tr>
			<?php
				}
				}
			?>
		
	</tbody>
	<thead>
		<tr>
			<th colspan="3" style="border-top:1px solid #999999"> Total Stock Value </th>
			<th colspan="1" style="border-top:1px solid #999999; text-align: right;""> 
	<?php
				
				
				$results = $db->prepare("SELECT sum(cost*qty), sum(price*qty), sum(whlsale*qty) FROM $store1 ");
				
				$results->execute();
				for($i=0; $rows = $results->fetch(); $i++){
				$dsdsd=$rows['sum(cost*qty)'];
                                $dsdsd12=$rows['sum(price*qty)'];
$dsdsd122=$rows['sum(whlsale*qty)'];
				echo  formatMoney($dsdsd, true);
				}
				?>
			
</th><th nowrap="nowrap" colspan="1" style="border-top:1px solid #999999; text-align: right;"><?php echo formatMoney($dsdsd12, true); ?> </th>
</th><th nowrap="nowrap" colspan="3" style="border-top:1px solid #999999; text-align: right;"><?php echo formatMoney($dsdsd122, true); ?> </th>
<th></th>
		</tr>
	</thead>
</table>

</table>
	<hr />
	
	

<div class="clearfix"></div>
<?php }
	?>

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
                                    <strong><i class="icon-user icon-large"></i>&nbsp; Products On your shelves</strong>
                            </div>
							<div class="container">
						<div class="row">	
						<div class="span9">
</div>
</div>
<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deleteproduct.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</body>
</html>
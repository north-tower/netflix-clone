<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "admin_opac";
$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");

if($_POST)
{
$q=mysql_real_escape_string(($_POST['searchword']));
//New query updated 04-02-2014
    $sql_res=mysql_query("select * from books where title  like '%$q%' or author like '%$q%' order by uid LIMIT 5");
while($row=mysql_fetch_array($sql_res))
{
$fname=$row['author'];
$lname=$row['title'];

$re_fname='<b>'.$q.'</b>';
$re_lname='<b>'.$q.'</b>';
$final_fname = str_ireplace($q, $re_fname, $fname);
$final_lname = str_ireplace($q, $re_lname, $lname);

?>
<div class="display_box" align="left">

    <?php echo $final_fname; ?>&nbsp;
    <?php echo $final_lname; ?><br/>

</div>
<?php
}
}
else
{}
?>
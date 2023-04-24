<?php
//include('includes/connection.php');
$conn = mysql_connect('localhost','admin_opac','root', '') or die(mysql_error());

if(isset($_POST['keysearch'])){
    $search = $_POST['keysearch'];
    $data = mysql_query("SELECT * FROM `books` WHERE `copyright_year` like '%$search%' order by id LIMIT 5");
    while($row = mysql_fetch_array($data))
    {
        $username   = $row['title'];
        echo "<div class='show'><img src='' id='search' /><span class='name'><?php echo $username; ?></span></div>";
    }
}
?>
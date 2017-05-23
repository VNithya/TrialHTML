<?php
include "connection.php";

$idnum = $_GET['idnum'];
$query = "DELETE FROM hostel WHERE id_number = '$idnum'";
$result = mysql_query ($query) or die(mysql_error());

if($result) 
{
	echo "<script type='text/javascript'> window.location='show_register.php' </script>";
}
?>
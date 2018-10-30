<?php
include('config.php');
session_start();
if(isset($_SESSION['user'])){

		$user = $_SESSION['user'];

if (isset($_REQUEST["id"]) && is_numeric($_REQUEST["id"]))
{
$id = $_REQUEST["id"];

$result = mysqli_query($dbConn,"DELETE FROM requests WHERE bNo='$id' and user='$user'") or die(mysql_error($dbConn));
echo "Request Deleted";
header("Location:libraryUser.php");
}
else
{
header("Location:libraryUser.php");
}
} else{
	header("location:../../index.html");
	
}
 ?>
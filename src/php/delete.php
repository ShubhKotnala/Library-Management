<?php
include('config.php');
session_start();
if(isset($_SESSION['user'])){

if (isset($_REQUEST["id"]) && $_REQUEST["id"] != '')
{
$id = $_REQUEST["id"];

$result = mysqli_query($dbConn,"DELETE FROM bookdata WHERE bNo='$id'") or die(mysql_error($dbConn));
	echo '<script src="../js/swal.js"> </script>';
echo '<script type="text/javascript">';
echo 'setTimeout(function(){ swal("Done!","The book has been deleted successfully","success");';
echo '},0); </script>';
header("refresh:3;url=bel2.php");
}
else
{
header("Location:bel2.php");
}
} else{
	header("location:../../index.html");
	
}
 ?>
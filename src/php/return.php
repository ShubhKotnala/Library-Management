<?php
include('config.php');
session_start();
if(isset($_SESSION['user'])){

		$user = $_GET['user'];

if (isset($_REQUEST["id"]) && is_numeric($_REQUEST["id"]))
{
$id = $_REQUEST["id"];

 $query="select * from bookdata where bNo='$id'";
		$getBookDetails = mysqli_query($dbConn,$query) or die(mysqli_error($dbConn)) ;
		$row = mysqli_fetch_array($getBookDetails);
		
		$name = $row['bName'];
		$author = $row['bAuthor'];
		$shelf = $row['bShelfNo'];
		$category = $row['bCategory'];
		$status = $row['status'];
		$qty = $row['rqty']+1;
        
        $s = "Available";

mysqli_query($dbConn,"update bookdata set status='$s',rqty='$qty' where bNo='$id'") or die("Cannot change book status, Contact Administrator".mysqli_error($dbConn));
			$date = date('Y-m-d');
			mysqli_query($dbConn,"update approvedbookdata set returnDate='$date' where bNo='$id' and user='$user' ") or die(mysqli_error($dbConn)) ;
			
$result = mysqli_query($dbConn,"DELETE FROM approvedrequests WHERE bNo='$id' and user='$user'") or die(mysql_error($dbConn));

//header("Location:view.php");
}
else
{
	
//header("Location:view.php");
}
} else{
	header("location:../../index.html");
	
}
// ?>
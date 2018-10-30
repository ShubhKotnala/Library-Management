<?php


//------------------new code-----------------------


	include('config.inc');
	if (isset($_REQUEST["id"]) && $_REQUEST["id"] != '')
	{
		$id = $_GET["id"];
		$user = $_GET["user"];
        $query="select * from bookdata where bNo='$id'";
		$getBookDetails = mysqli_query($dbConn,$query) or die(mysqli_error($dbConn)) ;
		$row = mysqli_fetch_array($getBookDetails);
		
		$name = $row['bName'];
		$author = $row['bAuthor'];
		$shelf = $row['bShelfNo'];
		$category = $row['bCategory'];
		$status = $row['status'];
		$qty = $row['rqty']-1;
        
        $s = "Not Available";
		
		if($status != 'Available') {
           die("Book not available : ".mysqli_error($dbConn));
        }	
		else{			
			$date = date('Y-m-d');
			if($qty == 0){
			mysqli_query($dbConn,"update bookdata set status='$s',rqty='$qty' where bNo='$id'") or die("Cannot change book status, Contact Administrator".mysqli_error($dbConn));
			}else{
				mysqli_query($dbConn,"update bookdata set rqty='$qty' where bNo='$id'") or die("Cannot change book status, Contact Administrator".mysqli_error($dbConn));
			
			}
			mysqli_query($dbConn,"DELETE FROM requests WHERE bNo = '$id' and user = '$user'") or die("Cannot delete".mysqli_error($dbConn));
		$setDetailsQuery = "INSERT approvedrequests SET bNo='$id', bName='$name', bAuthor='$author',bShelfNo='$shelf', bCategory='$category', user='$user',date='$date'";
		mysqli_query($dbConn,$setDetailsQuery) or die(mysqli_error($dbConn));
		
		//main database to store all data
		$MainDataStore = "INSERT approvedbookdata SET bNo='$id', bName='$name', bAuthor='$author',bShelfNo='$shelf', bCategory='$category', user='$user',date='$date',returnDate='Not yet returned'";
		mysqli_query($dbConn,$MainDataStore) or die(mysqli_error($dbConn));
		
		header("Location:view.php");
		}
	}
	else
	{
		header("Location:view.php");
	}


//---------------new code ends---------------------

/* include('./src/php/config.php');
if (isset($_POST['submit']))
{
session_start();
$user = $_SESSION['user'];
$name = $_POST['bName'];
$author = $_POST['bAuthor'];
$category = $_POST['category'];
$bNo = $_POST['bNo'];
$bShelf = $_POST['bShelf'];
$status = $_POST['status'];

if ($name == '' || $author == '' || $category == '' || $bNo == '' || $bShelf == '' || $status == '')
{

$error = 'Please enter the details!';

validInsert($name, $author, $category, $bNo, $bShelf, $status,$error);
}
else
{

mysqli_query($dbConn,"INSERT aprovedrequests SET bName='$name', bAuthor='$author',bShelfNo='$bShelf', bCategory='$category', user='$user'") or die('Error'.mysqli_error($dbConn));

header("Location: ./src/php/./src/php/view.php");
}
}
else
{
validInsert('','','','','','','');
}  */

?>
<?php

include('config.php');
session_start();
if(isset($_SESSION['user'])){
	
$user = $_SESSION['user'];
$id = $_GET['id'];


$bookDetailsQuery = "select * from bookdata where bNo='$id'";
$bookQuery = mysqli_query($dbConn,$bookDetailsQuery) or die("Error :".mysqli_error($dbConn));
$row = mysqli_fetch_array($bookQuery);
$name = $row['bName'];
$author = $row['bAuthor'];
$category = $row['bCategory'];
$bShelf = $row['bShelfNo'];
$id1=(int)$id;

$requestQuery = mysqli_query($dbConn,"select * from requests where user = '$user' and bName='$name' ") or die(mysqli_error($dbConn)) ;
$count = mysqli_num_rows($requestQuery);
$approvedRequestQuery = mysqli_query($dbConn,"select * from approvedrequests where user = '$user' and bName='$name' ") or die(mysqli_error($dbConn)) ;
$countApp = mysqli_num_rows($approvedRequestQuery);

if($count == 0 && $countApp == 0){

$query = "insert requests set bNo='$id',bName='$name',bAuthor='$author',bShelfNo='$bShelf',bCategory='$category', user = '$user'";

$insertQuery = mysqli_query($dbConn,$query) or die(mysqli_error($dbConn)) ;

echo '<script src="../js/swal.js"> </script>';
echo '<script type="text/javascript">';
echo 'setTimeout(function(){ swal("DONE!","Your request has been added","success");';
echo '},500); </script>';

header('refresh:4;url=libraryUser.php');
} else if ($count != 0){
	echo '<script src="../js/swal.js"> </script>';
echo '<script type="text/javascript">';
echo 'setTimeout(function(){ swal("Error!","You have already requested for this book, kindly wait for its approval.","error");';
echo '},500); </script>';
	header("refresh:4;url='./libraryUser.php'");
} else if($countApp != 0){
	echo '<script src="../js/swal.js"> </script>';
echo '<script type="text/javascript">';
echo 'setTimeout(function(){ swal("Sorry!","You have already issued this book.","error");';
echo '},500); </script>';
	header("refresh:4;url='./libraryUser.php'");
}
}
?>
<?php

	session_start();
	
	include('config.php');
	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
		$query = "select * from approvedrequests where user='$user'";
		$result=  mysqli_query($dbConn,$query) or die(mysqli_error($dbConn));
				

while($row = mysqli_fetch_array( $result ))
{
	$s = $row['date'];
	$curr_time = time();

$date = strtotime($s);
$fine = 0;
$days =30- (round( ($curr_time-$date)/(60*60*24)));
$xx=0;
if($days<0){
	$xx = -$days;
	$days=0;
	$fine = 5*$xx;
}


if($days == 5){

	echo '<script src="../js/swal.js"> </script>';
echo '<script type="text/javascript">';
echo 'setTimeout(function(){ swal("सूचना !","आपके किताब वापस करने की तारीक पास आ रही है । आपके 5 दिन शेष हैं  .$row['bName'].","error");';
echo '},500); </script>';
	
} else if($days == 0){
	
	echo '<script src="../js/swal.js"> </script>';
echo '<script type="text/javascript">';
echo 'setTimeout(function(){ swal("सूचना !","आपके किताब वापस करने की तारीक समाप्त हो गयी है .$row['bName'].","error");';
echo '},500); </script>';
	
} else if ($days < 0)

	echo '<script src="../js/swal.js"> </script>';
echo '<script type="text/javascript">';
echo 'setTimeout(function(){ swal("सूचना !","आपके किताब वापस करने की तारीक समाप्त हो गयी है .$row['bName'].","error");';
echo '},500); </script>';

}

	}
	else{
		header("location:../../index.html");
	}

?>
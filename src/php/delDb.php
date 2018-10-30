<?php

include('config.php');
mysqli_query($dbConn,"delete from approvedbookdata where bNo='13'") or die(mysqli_error($dbConn));
	
		echo '<script src="../js/swal.js"> </script>';
echo '<script type="text/javascript">';
echo 'setTimeout(function(){ swal("Done!","Database has been cleared. Redirecting in 2 seconds","success");';
echo '},0); </script>';

header("refresh:2;url=./bel2.php");

?>
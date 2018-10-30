<?php

//	session_start();
	
	include('config.php');
	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
		$query = "select * from approvedrequests where user='$user'";
		$result=  mysqli_query($dbConn,$query) or die(mysqli_error($dbConn));
				
echo "<table border='1' cellpadding='10'>";
echo "<tr>
<th><font color='#3984DB'>किताब क्रम संख्या  </font></th>
<th><font color='#3984DB'>नाम </font></th>
<th><font color='#3984DB'>लेखक / लेखिका  </font></th>
<th><font color='#3984DB'>श्रेणी </font></th>
<th><font color='#3984DB'>शेल्फ संख्या  </font></th>
<th><font color='#3984DB'>तारीख  </font></th>
<th><font color='#3984DB'>शेष दिन </font></th>
<th><font color='#3984DB'>अतिरिक्त दिन </font></th>
<th><font color='#3984DB'>जुर्माना </font></th>

</tr>";

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


echo "<tr>";
echo '<td>' . $row['bNo'] . '</td>';
echo '<td>' . $row['bName'] . '</td>';
echo '<td>' . $row['bAuthor'] . '</td>';
echo '<td>' . $row['bCategory'] . '</td>';
echo '<td>' . $row['bShelfNo'] . '</td>';
echo '<td>' . $row['date'] . '</td>';
echo '<td>' .$days . '</td>';
echo '<td>' .$xx . '</td>';
echo '<td>' .$fine . '</td>';
echo "</tr>";

}

echo "</table>";
	}
	else{
		header("location:../../index.html");
	}

?>
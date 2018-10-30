<?php

	session_start();
	include('config.php');
	if(isset($_SESSION['user']) && $_SESSION['user'] == "admin"){
		
		$query = "select * from approvedbookdata";
		$result=  mysqli_query($dbConn,$query) or die(mysqli_error($dbConn));
				
echo "<table border='1' cellpadding='10'>";
echo "<tr>
<th><font color='#3984DB'>किताब संख्या </font></th>
<th><font color='#3984DB'>नाम</font></th>
<th><font color='#3984DB'>लेखक / लेखिका</font></th>
<th><font color='#3984DB'>श्रेणी</font></th>
<th><font color='#3984DB'>शेल्फ संख्या </font></th>
<th><font color='#3984DB'>उपयोगकर्ता </font></th>
<th><font color='#3984DB'>लेने की तारीक </font></th>
<th><font color='#3984DB'>वापसी तारीक </font></th>
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
echo '<td>' . $row['user'] . '</td>';
echo '<td>' . $row['date'] . '</td>';
echo '<td>' .$row['returnDate'] . '</td>';

echo "</tr>";

}

echo "</table>";

echo "<p><a href='./phpExcel.php'>डाटा एक्सपोर्ट करें </a></p><br/>";
echo "<p><a href='./delDb.php'>डेटाबेस को क्लियर करें </a></p>";

	}
	else{
		header("location:../../index.html");
	}

?>
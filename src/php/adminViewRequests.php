	<html>
<head>
<meta charset='UTF-8'>
           <?php
//session_start();     
if(!isset($_SESSION['user'])){
    header ("location:../../index.html");
}

 ?>
<title>View Records</title>
</head>
<body>
<?php

include('config.php');

    if(!$dbConn)
        die( 'Connection failed');
    $query = "select * from requests";
    $result = mysqli_query($dbConn,$query) or die('Cannot read from database : '.mysqli_error($dbConn));

echo "<table border='1' cellpadding='10'>";
echo "<tr>
<th><font color='#3984DB'>किताब क्रम संख्या </font></th>	
<th><font color='#3984DB'>नाम </font></th>
<th><font color='#3984DB'>लेखक / लेखिका </font></th>
<th><font color='#3984DB'>श्रेणी  </font></th>
<th><font color='#3984DB'>शेल्फ संख्या  </font></th>
<th><font color='#3984DB'>प्रयोगी </font></th>
<th><font color='#3984DB'>अनुमोदन करें </font></th>
</tr>";

while($row = mysqli_fetch_array( $result ))
{

echo "<tr>";
echo '<td>' . $row['bNo'] . '</td>';
echo '<td>' . $row['bName'] . '</td>';
echo '<td>' . $row['bAuthor'] . '</td>';
echo '<td>' . $row['bCategory'] . '</td>';
echo '<td>' . $row['bShelfNo'] . '</td>';
echo '<td>' . $row['user'] . '</td>';
echo '<td><a href="approveBookRequest.php?id=' . $row['bNo'] . '&user='. $row['user'] .'">अनुमोदन </a></td>';
echo "</tr>";

}

echo "</table>";
	
?>
</body>
</html>
<html>
<head>
<meta charset="UTF-8">
<title>रेकॉर्ड देखें </title>
</head>
<body>
<?php

include('config.php');
	//session_start();
    if(!$dbConn)
        die( 'Connection failed');
	$user = $_SESSION['user'];
    $query = "select * from requests where user = '$user'";
    $result = mysqli_query($dbConn,$query) or die('Cannot read from database : '.mysqli_error($dbConn));

echo "<table border='1' cellpadding='10'>";
echo "<tr>
<th><font color='#3984DB'>किताब क्रम संख्या</font></th>
<th><font color='#3984DB'>नाम </font></th>
<th><font color='#3984DB'>लेखक / लेखिका  </font></th>
<th><font color='#3984DB'>श्रेणी </font></th>
<th><font color='#3984DB'>शेल्फ संख्या </font></th>
<th><font color='#3984DB'>हटाएँ </font></th>
</tr>";

while($row = mysqli_fetch_array( $result ))
{

echo "<tr>";
echo '<td>' . $row['bNo'] . '</td>';
echo '<td>' . $row['bName'] . '</td>';
echo '<td>' . $row['bAuthor'] . '</td>';
echo '<td>' . $row['bCategory'] . '</td>';
echo '<td>' . $row['bShelfNo'] . '</td>';
echo '<td><a href="./deleteRequest.php?id=' . $row['bNo'] . '">हटाएँ </a></td>';
echo "</tr>";

}

echo "</table>";
?>
</body>
</html>
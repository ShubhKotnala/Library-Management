<html>
<head>
<meta charset="UTF-8">
<title>View Records</title>
</head>
<body>
<?php

include('config.inc');

   // if(!$dbConn)
    //    die( 'Connection failed');
    $query = "select * from bookdata";
    $result = mysqli_query($dbConn,$query) or die('Cannot read from database : '.mysqli_error($dbConn));

echo "<table border='1' cellpadding='10'>";
echo "<tr>
<th><font color='#3984DB'>किताब क्रम संख्या </font></th>
<th><font color='#3984DB'>नाम </font></th>
<th><font color='#3984DB'>लेखक </font></th>
<th><font color='#3984DB'>श्रेणी </font></th>
<th><font color='#3984DB'>शेल्फ संख्या </font></th>
<th><font color='#3984DB'>मौजूदगी </font></th>
<th><font color='#3984DB'>बदलाओ करें </font></th>
<th><font color='#3984DB'>हटाएँ </font></th>
<th><font color='#3984DB'>टोटल मात्रा</font></th>
<th><font color='#3984DB'>मौजूदा मात्रा  </font></th>
</tr>";

while($row = mysqli_fetch_array( $result ))
{

echo "<tr>";
echo '<td>' . $row['bNo'] . '</td>';
echo '<td>' . $row['bName'] . '</td>';
echo '<td>' . $row['bAuthor'] . '</td>';
echo '<td>' . $row['bCategory'] . '</td>';
echo '<td>' . $row['bShelfNo'] . '</td>';
echo '<td>' . $row['status'] . '</td>';
echo '<td><a href="edit.php?id=' . $row['bNo'] . '">Edit</a></td>';
echo '<td><a href="delete.php?id=' . $row['bNo'] . '">Delete</a></td>';
echo '<td>' . $row['qty'] . '</td>';
echo '<td>' . $row['rqty'] . '</td>';
echo "</tr>";

}

echo "</table>";
?>
<!--  <p><a href="insert.php">Insert new record</a></p>
<p><a href="adminViewRequests.php">View Requests</a></p>  -->
</body>
</html>
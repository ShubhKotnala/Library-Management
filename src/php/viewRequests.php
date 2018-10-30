	<html>
<head>
<meta charset='UTF-8'>
<title>View Records</title>
</head>
<body>
<?php

include('config.php');
		//session_start();
				
	if(isset($_SESSION['user']) && !empty($_SESSION['user']))
	{
		$user = $_SESSION['user'];
    if(!$dbConn)
        die( 'Connection failed');
    $query = "select * from requests where user = '$user'";
       
    $result = mysqli_query($dbConn,$query) or die('Cannot read from database : '.mysqli_error($dbConn));

echo "<table border='1' cellpadding='10'>";
echo "<tr>
<th><font color='#3984DB'>Id</font></th>
<th><font color='#3984DB'>Name</font></th>
<th><font color='#3984DB'>Author</font></th>
<th><font color='#3984DB'>Category</font></th>
<th><font color='#3984DB'>Shelf No.</font></th>
<th><font color='#3984DB'>Book No.</font></th>
<th><font color='#3984DB'>Delete</font></th>
</tr>";
while($row = mysqli_fetch_array( $result ))
{

echo "<tr>";
echo '<td>' . $row['bNo'] . '</td>';
echo '<td>' . $row['bName'] . '</td>';
echo '<td>' . $row['bAuthor'] . '</td>';
echo '<td>' . $row['bCategory'] . '</td>';
echo '<td>' . $row['bShelfNo'] . '</td>';
echo '<td>' . $row['bNo'] . '</td>';
echo '<td><a href="deleteRequest.php?id=' . $row['bNo'] . '">Delete</a></td>';
echo "</tr>";

}

echo "</table>";
	}
?>
</body>
</html>
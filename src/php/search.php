<?php

include('config.php');

if(isset($_POST['searchBook']) && !empty($_POST['searchBook'])){
	$search_query = $_POST['searchBook'];
	if($_POST['searchRadio'] == "bookName"){
	$query = mysqli_query($dbConn,"select * from bookdata where UPPER(bName) LIKE UPPER('%$search_query%')") or die(mysqli_error($dbConn));
	}
    else if($_POST['searchRadio'] == "Author"){
	$query = mysqli_query($dbConn,"select * from bookdata where UPPER(bAuthor) LIKE UPPER('%$search_query%')") or die(mysqli_error($dbConn));
	} 
	else if($_POST['searchRadio'] == "BookCategory"){
		$query = mysqli_query($dbConn,"select * from bookdata where UPPER(bCategory) LIKE UPPER('%$search_query%')") or die(mysqli_error($dbConn));
	}	
	else {
			$query = mysqli_query($dbConn,"select * from bookdata where bNo = '$search_query'") or die(mysqli_error($dbConn));
	}
}
/*
else if(isset($_POST['searchAuthor']) && !empty($_POST['searchAuthor'])){
    
$search_query = $_POST['searchAuthor'];
$query = mysqli_query($dbConn,"select * from bookdata where UPPER(bAuthor) LIKE UPPER('%$search_query%')") or die(mysqli_error($dbConn));

} else{
    
$search_query = $_POST['searchNo'];
$query = mysqli_query($dbConn,"select * from bookdata where bNo = $search_query") or die(mysqli_error($dbConn));

}  */

echo "<table border='1' cellpadding='10'>";
echo "<tr>
<th><font color='#3984DB'>किताब क्रम संखिया</font></th>
<th><font color='#3984DB'>नाम</font></th>
<th><font color='#3984DB'>लेखक</font></th>
<th><font color='#3984DB'>Category</font></th>
<th><font color='#3984DB'>Shelf No.</font></th>
<th><font color='#3984DB'>Book No.</font></th>
<th><font color='#3984DB'>Availability</font></th>
<th><font color='#3984DB'>Request</font></th>
</tr>";

while($row = mysqli_fetch_array( $query ))
{
	
	$qty = $row['rqty'];

echo "<tr>";
echo '<td>' . $row['bNo'] . '</td>';
echo '<td>' . $row['bName'] . '</td>';
echo '<td>' . $row['bAuthor'] . '</td>';
echo '<td>' . $row['bCategory'] . '</td>';
echo '<td>' . $row['bShelfNo'] . '</td>';
echo '<td>' . $row['bNo'] . '</td>';

if($qty>0) {
echo '<td>' . $row['status'] . '</td>';
echo '<td><a href="addRequest.php?id=' . $row['bNo'] . '">Request Book</a></td>';
} else{
	echo '<td>' . $row['status'] . '</td>';
	echo '<td>Unable to Request</td>';
}
echo "</tr>";

}

echo "</table>";

?>
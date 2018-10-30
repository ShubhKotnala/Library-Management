<?php
function valid($id, $name, $author,$category,$bNo,$bShelf,$status, $error)
{
?>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Records</title>
</head>
<body>
<?php

if ($error != '')
{
echo '<div style="padding:4px; border:1px solid #3984DB; color:#3984DB;">'.$error.'</div>';
}
?>

<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<table border="1">
<tr>
<td colspan="2"><b><font color='#3984DB'>Records बदले  </font></b></td>
</tr>
<tr>
<td width="179"><b><font color='#663300'>नाम<em>*</em></font></b></td>
<td><label>
<input type="text" name="bName" id="bName" value="<?php echo $name; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>लेखक<em>*</em></font></b></td>
<td><label>
<input type="text" name="bAuthor" id="bAuthor" value="<?php echo $author; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>श्रेणी <em>*</em></font></b></td>
<td><label>
<input type="text" name="category" id="category" value="<?php echo $category; ?>" />
</label></td>
</tr>
    <tr>
<td width="179"><b><font color='#663300'>किताब क्रम संख्या <em>*</em></font></b></td>
<td><label>
<input type="text" name="bNo" id="bNo" value="<?php echo $bNo; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>शेल्फ संखिया <em>*</em></font></b></td>
<td><label>
<input type="text" name="bShelf" id="bShelf" value="<?php echo $bShelf; ?>" />
</label></td>
</tr>
<!--
<tr>
<td width="179"><b><font color='#663300'>Status<em>*</em></font></b></td>
<td><label>
<select name="status" required>
<option>Available</option>
<option>Not Available</option>
</select>
</label></td>
</tr>   -->

<tr align="Right">
<td colspan="2"><label>
<input type="submit" name="submit" value="Edit Records">
</label></td>
</tr>
</table>
</form>
</body>
</html>
<?php
}

include('config.php');

if (isset($_POST['submit']))
{

if (isset($_POST['id']))
{

$id = $_POST['id'];
$name = $_POST['bName'];
$author = $_POST['bAuthor'];
$category = $_POST['category'];
$bNo = $_POST['bNo'];
$bShelf = $_POST['bShelf'];
$status = 'Available';


if ($name == '' || $author == '' || $category == '')
{

$error = 'ERROR: Please fill in all required fields!';
valid($id, $name, $author,$category,$bNo,$bShelf,$status, $error);

}
else   
{

mysqli_query($dbConn,"UPDATE bookdata SET bName='$name', bAuthor='$author' ,bCategory='$category',bNo='$bNo',bShelfNo='$bShelf',status='$status' WHERE bNo='$id'")
or die(mysqli_error($dbConn));

header("Location:bel2.php");
}
}
else
{

echo 'Error!';
}
}
else

{

if (isset($_GET['id']) && $_GET['id'] != '')
{

$id = $_GET['id'];
$result = mysqli_query($dbConn,"SELECT * FROM bookdata WHERE bNo='$id'")
or die(mysqli_error($dbConn));
$row = mysqli_fetch_array($result);

if($row)
{

$name = $row['bName'];
$author = $row['bAuthor'];
$category = $row['bCategory'];
$bNo = $row['bNo'];
$bShelf = $row['bShelfNo'];
$status = $row['status'];

valid($id, $name, $author,$category,$bNo,$bShelf,$status,'');
}
else
{
echo "No results!";
}
}
else

{
echo 'Error!';
}
}
?>
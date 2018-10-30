<?php
function validInsert($name, $author,$category,$qty, $bShelf, $status, $error)
{
?>

<html>
<head>
<title>Insert Records</title>
</head>
<meta charset="UTF-8">
<body>
<?php

if ($error != '')
{
echo '<div style="padding:4px; border:1px solid #3984DB; color:#3984DB;">'.$error.'</div>';
}
?>

<form action="" method="post">
<table border="1">
<tr>
<td colspan="2"><b><font color='#3984DB'>किताबें डाले  </font></b></td>
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
<td width="179"><b><font color='#663300'>Category<em>*</em></font></b></td>
<td><label>
<input type="text" name="category" id="category" value="<?php echo $category; ?>" />
</label></td>
</tr>
    
<tr>
<td width="179"><b><font color='#663300'>मात्रा<em>*</em></font></b></td>
<td><label>
<input type="text" name="bQty" id="bQty" value="<?php echo $qty; ?>"/>
</label></td>
</tr>  
  
<tr>
<td width="179"><b><font color='#663300'>किताब क्रम संख्या <em>*</em></font></b></td>
<td><label>
<input type="text" name="bNo" id="bNo" />
</label></td>
</tr>  
  
<tr>
<td width="179"><b><font color='#663300'>शेल्फ संख्या <em>*</em></font></b></td>
<td><label>
<input type="text" name="bShelf" id="bShelf" value = "<?php echo $bShelf; ?>" />
</label></td>
</tr>
    
<tr>
<td width="179"><b><font color='#663300'>स्थिति <em>*</em></font></b></td>
<td><label>
<!--<input type="text" name="status" id="status" value="Available" />  -->
<select name="status" required>
<option>Available</option>
<option>Not Available</option>
</select>
</label></td>
</tr>


<tr align="Right">
<td colspan="2"><label>
<input type="submit" name="submit" value="Insert Records">
</label></td>
</tr>
</table>
</form>
</body>
</html>
<meta charset="UTF-8">
<?php
}
 include('config.php');
if (isset($_POST['submit']))
{

$name = $_POST['bName'];
$author = $_POST['bAuthor'];
$category = $_POST['category'];
$bShelf = $_POST['bShelf'];
//$status = $_POST['status'];
$status = 'Available';
$qty = $_POST['bQty'];
$bNo = $_POST['bNo'];

if ($name == '' || $author == '' || $category == '' || $qty == '' || $bNo == '' || $bShelf == '' || $status == '')
{

$error = 'कृपया सारी जानकारी डालें !';

validInsert($name, $author, $category,$qty,  $bShelf, $status,$error);
}
else
{

mysqli_query($dbConn,"INSERT bookdata SET bNo='$bNo', bName='$name', bAuthor='$author',bShelfNo='$bShelf',status='$status', bCategory='$category', qty='$qty',rqty='$qty'") or die('Error'.mysqli_error($dbConn));
  header("location:bel2.php");

}
}
else
{
validInsert('','','','','','','');
}
?>

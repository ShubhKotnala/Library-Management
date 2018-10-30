<?php
function valid($_user, $pass, $error)
{
?>

<html>
<head>
<meta charset="UTF-8">
<title>पासवर्ड बदलें </title>
</head>
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
<td colspan="2"><b><font color='#3984DB'>पासवर्ड बदलें </font></b></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>पुराना पासवर्ड <em>*</em></font></b></td>
<td><label>
<input type="password" name="userPass" value="<?php echo $pass; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>नया पासवर्ड <em>*</em></font></b></td>
<td><label>
<input type="password" name="userPassNew" value="<?php echo $pass; ?>" />
</label></td>
</tr>


<tr align="Right">
<td colspan="2"><label>
<input type="submit" name="submit" value="बदलें">
</label></td>
</tr>
</table>
</form>
</body>
</html>
<?php
}
 include('config.inc');
 //session_start();
 $_user = $_SESSION['user'];
if (isset($_POST['submit']))
{
$salt = 'helloworld@123';
$passRaw = $_POST['userPass'];
$passRaw2 = $_POST['userPassNew'];
$pass = crypt($passRaw,$salt);
$passNew = crypt($passRaw2,$salt);
if ($_user == '' || $pass == '')
{
	
$error = 'कृपया सारी जानकारी डाले! ';

valid($_user, $passRaw,$error);
}
else
{
mysqli_query($dbConn,"UPDATE users SET username='$_user', pass='$passNew' WHERE pass='$pass' AND username = '$_user'") or die('Error Changing password '.mysqli_error($dbConn));
echo '<script src="../js/swal.js"> </script>';
echo '<script type="text/javascript">';
echo 'setTimeout(function(){ swal("DONE!","आपका पासवर्ड सफलतापूर्वक बदल दिया गया है","success");';
echo '},500); </script>';

header("refresh:4;url=./libraryUser.php");
}
}
else
{
valid('','','');
}
?>

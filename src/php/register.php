<?php
function valid($name, $pass, $error)
{
?>

<html>
<head>
<meta charset="UTF-8">
<title>Register User</title>
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
<td colspan="2"><b><font color='#3984DB'>नया सदस्य लाइब्ररी मे जोड़ने हेतू  </font></b></td>
</tr>
<tr>
<td width="179"><b><font color='#663300'>नाम<em>*</em></font></b></td>
<td><label>
<input type="text" name="userName" value="<?php echo $name; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>पासवर्ड<em>*</em></font></b></td>
<td><label>
<input type="password" name="userPass" value="<?php echo $pass; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>पासवर्ड फिर से लिखे <em>*</em></font></b></td>
<td><label>
<input type="password" name="userPass2" value="<?php echo $pass; ?>" />
</label></td>
</tr>


<tr align="Right">
<td colspan="2"><label>
<input type="submit" name="submit" value="ठीक है ">
</label></td>
</tr>
</table>
</form>
</body>
</html>
<?php
}
 include('config.inc');
 error_reporting(E_ERROR | E_PARSE);
 $s = $dbConn;
if (isset($_POST['submit']))
{
$salt = 'helloworld@123';
$name = $_POST['userName'];
$passRaw = $_POST['userPass'];
$passRaw2 = $_POST['userPass2'];
if(strcmp($passRaw, $passRaw2) != 0){

		die("आपके द्वारा डाले गए पासवर्ड एक दूसरे से नहीं मिलते , कृपया फिर से प्रयास करे। कास्ठ के लिए खेद है। ");

	}
	else{
$pass = crypt($passRaw,$salt);
if ($name == '' || $pass == '')
{
	
$error = 'Please enter the details!';

valid($name, $pass,$error);
}
else
{

mysqli_query($s,"INSERT users SET username='$name', pass='$pass'") or die('Error creating user '.mysqli_error($s));

header("Location:view.php");
}
} }
else
{
valid('','','');
} 
?>

<?php
session_start();
$user = $_POST["user_name"];
$passRaw = $_POST["user_pass"];
$salt = 'helloworld@123';
$pass = crypt($passRaw,$salt);
include('config.php');
if($_POST['cap'] == $_SESSION['code']){
    

$query = mysqli_query($dbConn,"SELECT username , pass from users where username = '$user' and pass = '$pass' ");
$row = mysqli_fetch_array($query);
$count = mysqli_num_rows($query);
if($count == 1) {
	
	
	$_SESSION['user']=$user;
	
	if($user == 'admin'){
		echo 'Admin login, redirecting in 2 seconds';
		header("location:bel2.php");
	} else {
		echo 'User login, #3984DBirecting in 2 seconds';
		header ("location:libraryUser.php");
	}

}	
else{
    echo 'Incorrect username or password, please try again';
	$_SESSION['validate']='error';
        header("refresh:1;url=../../index.html");
}
}
else{
    echo 'Incorrect captcha, please try again!';
    header("refresh:2;url=../../index.html");
}
?>
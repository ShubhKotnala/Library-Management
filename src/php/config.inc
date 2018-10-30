<?php

/* Database Connection */

$sDbHost = 'Host';
$sDbName = 'YourDatabaseName';
$sDbUser = 'YourDBUserName';
$sDbPwd = 'YourDBPassword';

$dbConn = mysqli_connect ($sDbHost, $sDbUser, $sDbPwd) or die('Connection Failed');
if(!dbConn){
    echo 'Connection failed';
}
mysqli_select_db($dbConn,'YourDatabaseName');
?>

<?php
//Error Reporting Notice
error_reporting(E_ALL ^ E_NOTICE);
/*
*Creat A Connection Width The Data_Base
*/
$Server_name = 'localhost'; //The Name Of Localhost
$User_name   = 'root';      //The User_name Of The Server_Name
$User_pass   = '';          //The User_pass Of The Server_Name
$Db_name     = 'the-rival'; //The Name Of The Data_Base
$connect = new mysqli($Server_name,$User_name,$User_pass,$Db_name);
//Check The Connection
if($connect->connect_error)
{
    echo "Connection Error".mysqli_error($connect);
}
?>
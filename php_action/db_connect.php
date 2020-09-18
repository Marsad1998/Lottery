<?php 	

$localhost = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "lottery";

// $username = "softxode_lottery";
// $password = "UF;2)J&$^-}r";
// $dbname = "softxode_lottery";

$connect = new mysqli($localhost, $username, $password, $dbname);
$dbc =  mysqli_connect($localhost, $username, $password, $dbname);

if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  //echo "Done";
}

?>
<?php 	



require_once 'core.php';
require_once 'db_connect.php';



$sql = "SELECT channel_id, channel_name FROM channels WHERE status = 1  ORDER BY channel_name ASC";

$result = mysqli_query($dbc,$sql);



while($r=mysqli_fetch_assoc($result)){
				$arr[]=$r;
			}
	echo json_encode(["data"=>$arr]);

// $connect->close();




<?php 
	require_once '../php_action/db_connect.php';
	include_once '../php_action/core.php';
	require_once '../inc/functions.php';
	//sellers
	if (isset($_POST['seller_name'])) {
		$data = [
			'seller_name' => $_POST['seller_name'],
			'seller_email' => $_POST['seller_email'],
			'seller_contact' => $_POST['seller_contact'],
			'seller_password' => $_POST['seller_password'],
			'seller_address' => $_POST['seller_address'],
			'seller_sts' => $_POST['seller_sts'],
			'login' => $_POST['login'],
			'delay_inactivity' => $_POST['delay_inactivity'],
			'last_name' => $_POST['last_name'],
			'commission' => $_POST['commission'],
			'pos_serial' => $_POST['pos_serial'],
			'gender' => $_POST['gender'],
		];
		if ($_POST['seller_id'] == "") {
			if (insert_data($dbc,"seller", $data)) {
				$msg = "Seller Added Successfully";
				$sts = "success";
				echo json_encode(array('msg' => $msg, 'sts' => $sts));
				exit();
			}else{
				echo $msg = mysqli_error($dbc);
				exit();
			}
		}else{
			if (update_data($dbc,"seller", $data, "seller_id", $_POST['seller_id'])) {
				$msg = "Seller Data Updated Successfully";
				$sts = "info";
				echo json_encode(array('msg' => $msg, 'sts' => $sts));
				exit();
			}else{
				$msg = mysqli_error($dbc);
				$sts = "danger";
				echo json_encode(array('msg' => $msg, 'sts' => $sts));
				exit();
			}
		}
	}
	//sellers
	// if (isset($_POST['ticket_name'])) {
	// 	$data = [
	// 		'user_id' => $_POST['user_id'], 
	// 		'ticket_name' => $_POST['ticket_name'],
	// 		'ticket_number' => $_POST['ticket_number'],
	// 		'ticket_type' => $_POST['ticket_type'],
	// 		'ticket_sts' => $_POST['ticket_sts'],
	// 	];
	// 	if ($_POST['ticket_id'] == "") {
	// 		if (insert_data($dbc,"tickets", $data)) {
	// 			$msg = "Tickets Added Successfully";
	// 			$sts = "success";
	// 			echo json_encode(array('msg' => $msg, 'sts' => $sts));
	// 			exit();
	// 		}else{
	// 			echo $msg = mysqli_error($dbc);
	// 			exit();
	// 		}
	// 	}else{
	// 		if (update_data($dbc,"tickets", $data, "ticket_id", $_POST['ticket_id'])) {
	// 			$msg = "Tickets Data Updated Successfully";
	// 			$sts = "info";
	// 			echo json_encode(array('msg' => $msg, 'sts' => $sts));
	// 			exit();
	// 		}else{
	// 			$msg = mysqli_error($dbc);
	// 			$sts = "danger";
	// 			echo json_encode(array('msg' => $msg, 'sts' => $sts));
	// 			exit();
	// 		}
	// 	}
	// }

	//Post Manager
	if (isset($_POST['zone'])) {
		$data = [
			'seller_id' => $_POST['seller_id'],
			'description' => $_POST['description'],
			'zone' => $_POST['zone'],
		];
		if ($_POST['post_manager_id'] == "") {
			if (insert_data($dbc,"post_manager", $data)) {
				$msg = "Post Manager Added Successfully";
				$sts = "success";
				echo json_encode(array('msg' => $msg, 'sts' => $sts));
				exit();
			}else{
				echo $msg = mysqli_error($dbc);
				exit();
			}
		}else{
			if (update_data($dbc,"post_manager", $data, "post_manager_id", $_POST['post_manager_id'])) {
				$msg = "Post Manager Data Updated Successfully";
				$sts = "info";
				echo json_encode(array('msg' => $msg, 'sts' => $sts));
				exit();
			}else{
				$msg = mysqli_error($dbc);
				$sts = "danger";
				echo json_encode(array('msg' => $msg, 'sts' => $sts));
				exit();
			}
		}
	}

	//Post management
	if (isset($_POST['seller_id1'])) {
		$data = [
			'seller_id1' => $_POST['seller_id1'],
			'seller_id2' => $_POST['seller_id2'],
			'imei' => $_POST['imei'],
			'description' => $_POST['description'],
			'status' => $_POST['status'],
		];
		if ($_POST['post_management_id'] == "") {
			if (insert_data($dbc,"post_management", $data)) {
				$msg = "Post management Added Successfully";
				$sts = "success";
				echo json_encode(array('msg' => $msg, 'sts' => $sts));
				exit();
			}else{
				echo $msg = mysqli_error($dbc);
				exit();
			}
		}else{
			if (update_data($dbc,"post_management", $data, "post_management_id", $_POST['post_management_id'])) {
				$msg = "Post management Data Updated Successfully";
				$sts = "info";
				echo json_encode(array('msg' => $msg, 'sts' => $sts));
				exit();
			}else{
				$msg = mysqli_error($dbc);
				$sts = "danger";
				echo json_encode(array('msg' => $msg, 'sts' => $sts));
				exit();
			}
		}
	}

	//Limiattion
	if (isset($_POST['lottery'])) {
		if ($_POST['ball_number'] == "") {
			$data = [
				'lottery' => $_POST['lottery'],
				'game_type' => $_POST['game_type'],
				'limits' => $_POST['limits'],
				'seller_id' => $_POST['seller_id'],
				'status' => $_POST['status'],	
			];
		}else{
			$data = [
				'lottery' => $_POST['lottery'],
				'game_type' => $_POST['game_type'],
				'limits' => $_POST['limits'],
				'seller_id' => $_POST['seller_id'],
				'status' => $_POST['status'],	
				'ball_number' => $_POST['ball_number'],	
			];
		}
		if ($_POST['limit_per_game_id'] == "") {
			if (insert_data($dbc,"limit_per_game", $data)) {
				$msg = "Data Added Successfully";
				$sts = "success";
				echo json_encode(array('msg' => $msg, 'sts' => $sts));
				exit();
			}else{
				echo $msg = mysqli_error($dbc);
				exit();
			}
		}else{
			if (update_data($dbc,"limit_per_game", $data, "limit_per_game_id", $_POST['limit_per_game_id'])) {
				$msg = "Data Updated Successfully";
				$sts = "info";
				echo json_encode(array('msg' => $msg, 'sts' => $sts));
				exit();
			}else{
				$msg = mysqli_error($dbc);
				$sts = "danger";
				echo json_encode(array('msg' => $msg, 'sts' => $sts));
				exit();
			}
		}
	}

	//Basic Configuration
	if (isset($_POST['config_country'])) {
		$data = [
			'config_country' => $_POST['config_country'],
			'config_start' => $_POST['config_start'],
			'config_end' => $_POST['config_end'],
			'config_early_draw' => $_POST['config_early_draw'],
 			'config_evening_draw' => $_POST['config_evening_draw'],
 			'from_amount_played' => $_POST['from_amount_played'],
 			'gen_quantity_wed_free' => $_POST['gen_quantity_wed_free'],
 			'config_1st_lot' => $_POST['config_1st_lot'],
			'config_2nd_lot' => $_POST['config_2nd_lot'],
			'config_3rd_lot' => $_POST['config_3rd_lot'],
			'config_loto_3' => $_POST['config_loto_3'],
			'config_loto_4' => $_POST['config_loto_4'],
			'config_loto_5' => $_POST['config_loto_5'],
			'marraige1' => $_POST['marraige1'],
			'marraige2' => $_POST['marraige2'],
		];
		if ($_POST['config_id'] == "") {
			if (insert_data($dbc,"configurations",$data)) {
				echo 'Data Inserted Successfully';
			}
		}else{
			if (update_data($dbc,"configurations",$data, "config_id", $_POST['config_id'])) {
				echo 'Data Updated Successfully';
			}
		}
	}

	//Limiattion
	if (isset($_POST['wining_date'])) {
		$data = [
			'wining_date' => $_POST['wining_date'],
			'lottery_for_wining' => $_POST['lottery_for_wining'],
			'draw' => $_POST['draw'],
			'numbers' => $_POST['numbers'],
			'win4' => $_POST['win4'],
			'status' => $_POST['status'],
		];
		if ($_POST['winning_numbers_id'] == "") {
			if (insert_data($dbc,"winning_numbers", $data)) {
				$msg = "Data Added Successfully";
				$sts = "success";
				echo json_encode(array('msg' => $msg, 'sts' => $sts));
				exit();
			}else{
				echo $msg = mysqli_error($dbc);
				exit();
			}
		}else{
			if (update_data($dbc,"winning_numbers", $data, "winning_numbers_id", $_POST['winning_numbers_id'])) {
				$msg = "Data Updated Successfully";
				$sts = "info";
				echo json_encode(array('msg' => $msg, 'sts' => $sts));
				exit();
			}else{
				$msg = mysqli_error($dbc);
				$sts = "danger";
				echo json_encode(array('msg' => $msg, 'sts' => $sts));
				exit();
			}
		}
	}

	if (isset($_POST['action']) && !empty($_POST['action'])) {
	    $action = $_POST['action'];
	    switch ($action) {
	        case 'seller' :
	            seller($dbc);
	            break;
	        case 'tickets' :
	            tickets($dbc);
	            break;
	        case 'configs' :
	            configs($dbc);
	            break;
	        case 'post_manager' :
	            post_manager($dbc);
	            break;
	        case 'post_management' :
	            post_management($dbc);
	            break;
	        case 'limit_per_game' :
	        	@$lottery_for_search = $_POST['lottery_for_search'];
	        	@$seller_id = $_POST['seller_id'];
	        	@$game_type = $_POST['game_type'];
		        limit_per_game($dbc, $lottery_for_search, $game_type, $seller_id);
	            break;
	        case 'limit_per_ball' :
	        	@$lottery_for_search = $_POST['lottery_for_search'];
	        	@$seller_id = $_POST['seller_id'];
	        	@$game_type = $_POST['game_type'];
	        	@$ball_number = $_POST['ball_number'];
		        limit_per_ball($dbc, $lottery_for_search, $game_type, $seller_id, $ball_number);
	            break;
	        case 'overview_of_limits' :
	        	@$lottery_for_search = $_POST['lottery_for_search'];
	        	@$game_type = $_POST['game_type'];
	        	@$seller_id = $_POST['seller_id'];
	        	@$ball_number = $_POST['ball_number'];
	        	// @$draw = $_POST['draw'];
	            overview_of_limits($dbc, $lottery_for_search, $game_type, $seller_id, $ball_number);
	            break;
	        case 'balance_sheets' :
		        balance_sheets($dbc);
	            break;
	        case 'sale_report' :
		        sale_report($dbc);
	            break;
	        case 'winning_numbers' :
	            winning_numbers($dbc);
	            break;
	    }
	}

	function seller($dbc){
	    $result = mysqli_query($dbc,"SELECT * FROM seller");
	    $output = array('data' => array());
	    if($result->num_rows > 0) { 
	     $status = ""; 
	        while($r = $result->fetch_array()) {
	        $seller_id = $r[0];
	            // active 
	            if($r['seller_sts'] == 1) {
	                // activate member
	                $status = "<label class='label label-success'>Active</label>";
	            } else {
	                // deactivate member
	                $status = "<label class='label label-danger'>Inactive</label>";
	            }

	            $button = '<!-- Single button -->
	            <form>
	            	<i id="'.$seller_id.'" class="fa fa-edit text-danger update" style="cursor: pointer;"></i> | 
	            	<i id="'.$seller_id.'" class="fa fa-remove delete" style="cursor: pointer;"></i> | 
	            	<input type="hidden" id="table_name" value="seller"><input type="hidden" id="col_name" value="seller_id">
	            	<input type="hidden" id="sts_col" value="seller_sts">
	            </form>';
	            $output['data'][] = array(      
	                $r['seller_id'],
	                $r['seller_name'],
	                $r['login'],
	                $r['seller_email'],
	                $r['commission'],
	                $status,     
	                $button
	            );  
	        } // /while 
	    }// if num_rows
	    $dbc->close();
	    echo json_encode($output);
	}

	function post_manager($dbc){
	    $result = mysqli_query($dbc,"SELECT post_manager.*, seller.* FROM post_manager INNER JOIN seller ON post_manager.seller_id = seller.seller_id");
	    $output = array('data' => array());
	    if($result->num_rows > 0) { 
	     $status = ""; 
	        while($r = $result->fetch_array()) {
	        $post_manager_id = $r[0];
	            $button = '<!-- Single button -->
	            <form>
	            	<i id="'.$post_manager_id.'" class="fa fa-edit text-danger update" style="cursor: pointer;"></i> | 
	            	<i id="'.$post_manager_id.'" class="fa fa-remove delete" style="cursor: pointer;"></i> | 
	            	<input type="hidden" id="table_name" value="post_manager"><input type="hidden" id="col_name" value="post_manager_id">
	            	<input type="hidden" id="sts_col" value="">
	            </form>';
	            $output['data'][] = array(      
	                $r['post_manager_id'],
	                ucwords($r['seller_name']." ".$r['last_name']),
	                ucwords($r['description']),
	                ucwords($r['zone']),
	                $button
	            );  
	        } // /while 
	    }// if num_rows
	    $dbc->close();
	    echo json_encode($output);
	}

	function post_management($dbc){
	    $result = mysqli_query($dbc,"SELECT post_management.*, seller.* FROM post_management INNER JOIN seller ON seller.seller_id = post_management.seller_id1");
	    $output = array('data' => array());
	    if($result->num_rows > 0) { 
	     $status = ""; 
	        while($r = $result->fetch_array()) {
	        $post_management_id = $r[0];
	            $button = '<!-- Single button -->
	            <form>
	            	<i id="'.$post_management_id.'" class="fa fa-edit text-danger update" style="cursor: pointer;"></i> | 
	            	<i id="'.$post_management_id.'" class="fa fa-remove delete" style="cursor: pointer;"></i> | 
	            	<input type="hidden" id="table_name" value="post_management"><input type="hidden" id="col_name" value="post_management_id">
	            	<input type="hidden" id="sts_col" value="status">
	            </form>';
	            
	            $status = $r['status'] == "1"? "<span class='label label-success'>Active</span>": "<span class='label label-danger'>Suspend</span>";

	            $output['data'][] = array(      
	                $r['post_management_id'],
	                ucwords($r['seller_name']." ".$r['last_name']),
	                ucwords($r['seller_name']." ".$r['last_name']),
	                $r['imei'],
	                $r['description'],
	                $status,
	                $button
	            );  
	        } // /while 
	    }// if num_rows
	    $dbc->close();
	    echo json_encode($output);
	}

	function limit_per_game($dbc, $a = null, $b = null, $c = null){
		if ($a == null AND $b == null AND $c == null) {
		    $result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE ball_number = ''");
		}else{
			if ($a != null AND $b != null AND $c == null) {
			    $result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.lottery = '$a' AND limit_per_game.game_type = '$b' AND ball_number = ''");
			}elseif ($a == null AND $b != null AND $c != null) {
			    $result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.game_type = '$b' AND limit_per_game.seller_id = '$c' AND ball_number = ''");
			}elseif ($a != null AND $b == null AND $c != null) {
			    $result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.lottery = '$a' AND limit_per_game.seller_id = '$c' AND ball_number = ''");
			}elseif ($a != null AND $b == null AND $c == null) {
			    $result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.lottery = '$a' AND ball_number = ''");
			}elseif ($a == null AND $b != null AND $c == null) {
			    $result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.lottery = '$b' AND ball_number = ''");
			}elseif ($a == null AND $b == null AND $c != null) {
			    $result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.lottery = '$c' AND ball_number = ''");
			}else{
			    $result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.lottery = '$a' AND limit_per_game.game_type = '$b' AND limit_per_game.seller_id = '$c' AND ball_number = ''");
			}
		}
	    $output = array('data' => array());
	    if($result->num_rows > 0) { 
	     $status = ""; 
	        while($r = $result->fetch_array()) {
	        $limit_per_game_id = $r[0];
	            $button = '<!-- Single button -->
	            <form>
	            	<i id="'.$limit_per_game_id.'" class="fa fa-edit text-danger update" style="cursor: pointer;"></i> | 
	            	<i id="'.$limit_per_game_id.'" class="fa fa-remove delete" style="cursor: pointer;"></i> | 
	            	<input type="hidden" id="table_name" value="limit_per_game"><input type="hidden" id="col_name" value="limit_per_game_id">
	            	<input type="hidden" id="sts_col" value="status">
	            </form>';
	            
	            $status = $r['status'] == "1"? "<span class='label label-success'>Active</span>": "<span class='label label-danger'>Inactive</span>";

	            $output['data'][] = array(      
	                $r['limit_per_game_id'],
	                ucwords($r['lottery']),
	                ucwords($r['game_type']),
	                ucwords($r['seller_name']." ".$r['last_name']),
	                $r['limits'],
	                $status,
	                $button
	            );  
	        } // /while 
	    }// if num_rows
	    $dbc->close();
	    echo json_encode($output);
	}
	
	function limit_per_ball($dbc, $a = null, $b = null, $c = null, $d = null){
		if ($a == null AND $b == null AND $c == null) {
		    $result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE ball_number != ''");
		}else{
			if ($a != null AND $b != null AND $c != null AND $d != null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.lottery = '$a' AND limit_per_game.game_type = '$b' AND limit_per_game.seller_id = '$c' AND limit_per_game.ball_number = '$d'");
			}elseif ($a != null AND $b != null AND $c != null AND $d == null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.lottery = '$a' AND limit_per_game.game_type = '$b' AND limit_per_game.seller_id = '$c' AND limit_per_game.ball_number != ''");

			}elseif ($a != null AND $b != null AND $c == null AND $d != null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.lottery = '$a' AND limit_per_game.game_type = '$b' AND limit_per_game.ball_number = '$d'");

			}elseif ($a == null AND $b != null AND $c != null AND $d != null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.seller_id = '$c' AND limit_per_game.game_type = '$b' AND limit_per_game.ball_number = '$d'");

			}elseif ($a != null AND $b != null AND $c == null AND $d == null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.lottery = '$a' AND limit_per_game.game_type = '$b' AND limit_per_game.ball_number != ''");

			}elseif ($a != null AND $b == null AND $c != null AND $d == null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.lottery = '$a' AND limit_per_game.seller_id = '$c' AND limit_per_game.ball_number != ''");

			}elseif ($a != null AND $b == null AND $c == null AND $d != null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.lottery = '$a' AND limit_per_game.ball_number = '$d'");

			}elseif ($a == null AND $b != null AND $c != null AND $d == null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.game_type = '$b' AND limit_per_game.seller_id = '$c' AND limit_per_game.ball_number != ''");

			}elseif ($a == null AND $b != null AND $c == null AND $d != null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.game_type = '$b' AND limit_per_game.ball_number = '$d'");

			}elseif ($a == null AND $b == null AND $c != null AND $d != null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.seller_id = '$c' AND limit_per_game.ball_number = '$d'");
		
			}elseif ($a != null AND $b == null AND $c == null AND $d == null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.lottery = '$a' AND limit_per_game.ball_number != ''");
			}elseif ($a == null AND $b != null AND $c == null AND $d == null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.game_type = '$b' AND limit_per_game.ball_number != ''");
			}elseif ($a == null AND $b == null AND $c != null AND $d == null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.seller_id = '$c' AND limit_per_game.ball_number = ''");
			}elseif ($a == null AND $b == null AND $c == null AND $d != null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.ball_number = '$d'");
			}
			else{
			    $result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.lottery = '$a' AND limit_per_game.game_type = '$b' AND limit_per_game.seller_id = '$c' AND ball_number != ''");
			}
		}
	    $output = array('data' => array());
	    if($result->num_rows > 0) { 
	     $status = ""; 
	        while($r = $result->fetch_array()) {
	        $limit_per_game_id = $r[0];
	            $button = '<!-- Single button -->
	            <form>
	            	<i id="'.$limit_per_game_id.'" class="fa fa-edit text-danger update" style="cursor: pointer;"></i> | 
	            	<i id="'.$limit_per_game_id.'" class="fa fa-remove delete" style="cursor: pointer;"></i> | 
	            	<input type="hidden" id="table_name" value="limit_per_game"><input type="hidden" id="col_name" value="limit_per_game_id">
	            	<input type="hidden" id="sts_col" value="status">
	            </form>';
	            
	            $status = $r['status'] == "1"? "<span class='label label-success'>Active</span>": "<span class='label label-danger'>Inactive</span>";

	            $output['data'][] = array(      
	                $r['limit_per_game_id'],
	                ucwords($r['lottery']),
	                ucwords($r['game_type']),
	                ucwords($r['seller_name']." ".$r['last_name']),
	                $r['ball_number'],
	                $r['limits'],
	                $status,
	                $button
	            );  
	        } // /while 
	    }// if num_rows
	    $dbc->close();
	    echo json_encode($output);
	}

	function overview_of_limits($dbc, $a = null, $b = null, $c = null, $d = null){
		if ($a == null AND $b == null AND $c == null) {
		    $result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE ball_number != ''");
		}else{
			//a b c d
			if ($a != null AND $b != null AND $c != null AND $d != null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.lottery = '$a' AND limit_per_game.game_type = '$b' AND limit_per_game.seller_id = '$c' AND limit_per_game.ball_number = '$d'");
			}//a b c 
			elseif ($a != null AND $b != null AND $c != null AND $d == null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.lottery = '$a' AND limit_per_game.game_type = '$b' AND limit_per_game.seller_id = '$c' AND limit_per_game.ball_number != ''");

			}// a b d
			elseif ($a != null AND $b != null AND $c == null AND $d != null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.lottery = '$a' AND limit_per_game.game_type = '$b' AND limit_per_game.ball_number = '$d'");

			}// b c d
			elseif ($a == null AND $b != null AND $c != null AND $d != null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.seller_id = '$c' AND limit_per_game.game_type = '$b' AND limit_per_game.ball_number = '$d'");

			}// a b
			elseif ($a != null AND $b != null AND $c == null AND $d == null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.lottery = '$a' AND limit_per_game.game_type = '$b' AND limit_per_game.ball_number != ''");

			}//
			elseif ($a != null AND $b == null AND $c != null AND $d == null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.lottery = '$a' AND limit_per_game.seller_id = '$c' AND limit_per_game.ball_number != ''");

			}// a d
			elseif ($a != null AND $b == null AND $c == null AND $d != null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.lottery = '$a' AND limit_per_game.ball_number = '$d'");

			}// b c 
			elseif ($a == null AND $b != null AND $c != null AND $d == null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.game_type = '$b' AND limit_per_game.seller_id = '$c' AND limit_per_game.ball_number != ''");

			}// b d 
			elseif ($a == null AND $b != null AND $c == null AND $d != null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.game_type = '$b' AND limit_per_game.ball_number = '$d'");

			}// c d 
			elseif ($a == null AND $b == null AND $c != null AND $d != null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.seller_id = '$c' AND limit_per_game.ball_number = '$d'");
		
			}// a
			elseif ($a != null AND $b == null AND $c == null AND $d == null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.lottery = '$a' AND limit_per_game.ball_number != ''");
			}// b
			elseif ($a == null AND $b != null AND $c == null AND $d == null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.game_type = '$b' AND limit_per_game.ball_number != ''");
			}// c
			elseif ($a == null AND $b == null AND $c != null AND $d == null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.seller_id = '$c' AND limit_per_game.ball_number = ''");
			}// d
			elseif ($a == null AND $b == null AND $c == null AND $d != null) {
				$result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.ball_number = '$d'");
			}
			else{
			    $result = mysqli_query($dbc,"SELECT limit_per_game.*, seller.* FROM limit_per_game INNER JOIN seller ON seller.seller_id = limit_per_game.seller_id WHERE limit_per_game.lottery = '$a' AND limit_per_game.game_type = '$b' AND limit_per_game.seller_id = '$c' AND ball_number != ''");
			}
		}
	    $output = array('data' => array());
	    if($result->num_rows > 0) { 
	     $status = ""; 
	        while($r = $result->fetch_array()) {
	        $limit_per_game_id = $r[0];
	            $button = '<!-- Single button -->
	            <form>
	            	<i id="'.$limit_per_game_id.'" class="fa fa-edit text-danger update" style="cursor: pointer;"></i> | 
	            	<i id="'.$limit_per_game_id.'" class="fa fa-remove delete" style="cursor: pointer;"></i> | 
	            	<input type="hidden" id="table_name" value="limit_per_game"><input type="hidden" id="col_name" value="limit_per_game_id">
	            	<input type="hidden" id="sts_col" value="status">
	            </form>';
	            
	            $status = $r['status'] == "1"? "<span class='label label-success'>Active</span>": "<span class='label label-danger'>Inactive</span>";

	            $output['data'][] = array(      
	                $r['limit_per_game_id'],
	                date("d/m/Y", strtotime($r['limit_per_game_time'])),
	                ucwords($r['lottery'])."-".ucwords(fetchRecord($dbc,"winning_numbers", "numbers", $r['ball_number'])['draw']),
	                ucwords($r['game_type']),
	                $r['ball_number'],
	                $r['limits'],
	                $r['limits'],
	                $r['limits'],
	                $r['limits'],
	                ucwords($r['seller_name']." ".$r['last_name']),
	                $button
	            );  
	        } // /while 
	    }// if num_rows
	    $dbc->close();
	    echo json_encode($output);
	}

	function balance_sheets($dbc){
	    $result = mysqli_query($dbc,"SELECT ticket_orders.*, transactions.* FROM ticket_orders INNER JOIN transactions ON ticket_orders.seller_id = transactions.seller_id GROUP BY ticket_orders.ticket_order_id");
	    $output = array('data' => array());
	    if($result->num_rows > 0) { 
	     $status = ""; 
	        while($r = $result->fetch_array()) {
	        $limit_per_game_id = $r[0];
	            $button = '<!-- Single button -->
	            <form>
	            	<i id="'.$limit_per_game_id.'" class="fa fa-edit text-danger update" style="cursor: pointer;"></i> | 
	            	<i id="'.$limit_per_game_id.'" class="fa fa-remove delete" style="cursor: pointer;"></i> | 
	            	<input type="hidden" id="table_name" value="limit_per_game"><input type="hidden" id="col_name" value="limit_per_game_id">
	            	<input type="hidden" id="sts_col" value="status">
	            </form>';
	            $number_details = fetchRecord($dbc,"winning_numbers", "numbers", $r['ticket_order_number']);

	            $output['data'][] = array(      
	                $r['ticket_order_id'],
	                ucwords(fetchRecord($dbc,"seller", "seller_id", $r['seller_id'])['seller_name']),
	                date("d/m/Y", strtotime($r['ticket_order_time'])),
	                ucwords($number_details['lottery_for_wining'])." - ".ucwords($number_details['draw']),
	                number_format($r['debit'], 2),
	                number_format(fetchRecord($dbc,"seller", "seller_id", $r['seller_id'])['commission'], 2),
	                number_format($r['debit'], 2),
	                number_format($r['credit'], 2),
	                number_format($r['debit'] - $r['credit'], 2),
	            );  
	        } // /while 
	    }// if num_rows
	    $dbc->close();
	    echo json_encode($output);
	}

	function sale_report($dbc){
	    $result = mysqli_query($dbc,"SELECT ticket_orders.*, transactions.* FROM ticket_orders INNER JOIN transactions ON ticket_orders.seller_id = transactions.seller_id GROUP BY ticket_orders.ticket_order_id");
	    $output = array('data' => array());
	    if($result->num_rows > 0) { 
	     $status = ""; 
	        while($r = $result->fetch_array()) {
	        $limit_per_game_id = $r[0];
	            $button = '<!-- Single button -->
	            <form>
	            	<i id="'.$limit_per_game_id.'" class="fa fa-edit text-danger update" style="cursor: pointer;"></i> | 
	            	<i id="'.$limit_per_game_id.'" class="fa fa-remove delete" style="cursor: pointer;"></i> | 
	            	<input type="hidden" id="table_name" value="limit_per_game"><input type="hidden" id="col_name" value="limit_per_game_id">
	            	<input type="hidden" id="sts_col" value="status">
	            </form>';
	            $number_details = fetchRecord($dbc,"winning_numbers", "numbers", $r['ticket_order_number']);

	            $output['data'][] = array(      
	                $r['ticket_order_id'],
	                ucwords(fetchRecord($dbc,"seller", "seller_id", $r['seller_id'])['seller_name']),
	                ucwords(fetchRecord($dbc,"post_manager", "seller_id", $r['seller_id'])['post_manager_id']),
	                date("d/m/Y", strtotime($r['ticket_order_time'])),
	                ucwords($number_details['lottery_for_wining'])." - ".ucwords($number_details['draw']),
	                number_format($r['debit'], 2),
	                number_format(fetchRecord($dbc,"seller", "seller_id", $r['seller_id'])['commission'], 2),
	                number_format($r['debit'], 2),
	                number_format($r['credit'], 2),
	                number_format($r['debit'] - $r['credit'], 2),
	            );  
	        } // /while 
	    }// if num_rows
	    $dbc->close();
	    echo json_encode($output);
	}

	function configs($dbc){
	    $result = mysqli_query($dbc,"SELECT * FROM configurations");
	    $output = array('data' => array());
	    if($result->num_rows > 0) { 
	     $status = ""; 
	        while($r = $result->fetch_array()) {
	        $config_id = $r[0];
	            // active 
	            if($r[3] == 1) {
	                // activate member
	                $status = "<label class='label label-success'>Active</label>";
	            } else {
	                // deactivate member
	                $status = "<label class='label label-danger'>Inactive</label>";
	            }

	            $button = '<!-- Single button -->
	            <form>
	            	<i id="'.$config_id.'" class="fa fa-edit text-danger update" style="cursor: pointer;"></i> | 
	            	<i id="'.$config_id.'" class="fa fa-remove delete" style="cursor: pointer;"></i> | 
	            	<input type="hidden" id="table_name" value="configurations"><input type="hidden" id="col_name" value="config_id">
	            	<input type="hidden" id="sts_col" value="">
	            </form>';
	            $output['data'][] = array(      
	                $r['config_id'],
	                $r['config_country'],
	                $r['config_start'],
	                $r['config_end'],
	                $r['config_2nd_lot'],
	                $r['config_2nd_lot'],
	                $button
	            );  
	        } // /while 
	    }// if num_rows
	    $dbc->close();
	    echo json_encode($output);
	}

	function tickets($dbc){
	    $result = mysqli_query($dbc,"SELECT * FROM tickets");
	    $output = array('data' => array());
	    if($result->num_rows > 0) { 
	     $status = ""; 
	        while($r = $result->fetch_array()) {
	        $ticket_id = $r[0];
	            // active 
	            if($r[4] == 1) {
	                // activate member
	                $status = "<label class='label label-success'>Active</label>";
	            } else {
	                // deactivate member
	                $status = "<label class='label label-danger'>Inactive</label>";
	            }

	            switch ($r[3]) {
			        case 1:
			        	$type = "Borellete";
			            break;
			        case 2:
			        	$type = "Wedding";
			            break;
			        case 3:
			        	$type = "Loto 3";
			            break;
			        case 4:
			        	$type = "Loto 4";
			            break;
			        case 5:
			        	$type = "Loto 5";
			            break;
			    }

	            $button = '<!-- Single button -->
	            <form>
	            	<i id="'.$ticket_id.'" class="fa fa-edit text-danger update" style="cursor: pointer;"></i> | 
	            	<i id="'.$ticket_id.'" class="fa fa-remove delete" style="cursor: pointer;"></i> | 
	            	<input type="hidden" id="table_name" value="tickets"><input type="hidden" id="col_name" value="ticket_id">
	            	<input type="hidden" id="sts_col" value="ticket_sts">
	            </form>';
	            $output['data'][] = array(      
	                $r[0],
	                $r[1],
	                $r[2],
	                $type,
	                $status,         
	                $button
	            );  
	        } // /while 
	    }// if num_rows
	    $dbc->close();
	    echo json_encode($output);
	}

	function winning_numbers($dbc){
	    $result = mysqli_query($dbc,"SELECT * FROM winning_numbers");
	    $output = array('data' => array());
	    if($result->num_rows > 0) { 
	     $status = ""; 
	        while($r = $result->fetch_array()) {
	        $winning_numbers_id = $r[0];
	            // active 
	            if($r['status'] == 1) {
	                // activate member
	                $status = "<label class='label label-success'>New</label>";
	            } else {
	                // deactivate member
	                $status = "<label class='label label-danger'>None</label>";
	            }

	            $button = '<!-- Single button -->
	            <form>
	            	<i id="'.$winning_numbers_id.'" class="fa fa-edit text-danger update" style="cursor: pointer;"></i> | 
	            	<i id="'.$winning_numbers_id.'" class="fa fa-remove delete" style="cursor: pointer;"></i> | 
	            	<input type="hidden" id="table_name" value="winning_numbers"><input type="hidden" id="col_name" value="winning_numbers_id">
	            	<input type="hidden" id="sts_col" value="status">
	            </form>';
	            $output['data'][] = array(      
					$r['winning_numbers_id'],
	            	$r['wining_date'],
					$r['lottery_for_wining'],
					$r['draw'],
					$r['numbers'],
					$r['win4'],
	                $status,
	                $button
	            );  
	        } // /while 
	    }// if num_rows
	    $dbc->close();
	    echo json_encode($output);
	}

	//Getting Data For Edit Purpose
	if (isset($_POST['edit_user_id']) && isset($_POST['edit_user_id']) != "") {
	 	$id = $_POST['edit_user_id'];
		$table = $_POST['tbl2'];
		$fld = $_POST['col2'];
	 	$q = mysqli_query($dbc,"SELECT * FROM $table WHERE $fld = '$id'");
		$response = array();
		while($r = mysqli_fetch_assoc($q)){
			$response = $r;
		}
		echo json_encode($response);	
		exit();
	}

	//Getting Data For Delete Purpose
	if (isset($_POST['delete_user_id']) && isset($_POST['delete_user_id']) != "") {
		$id = $_POST['delete_user_id'];
		$table = $_POST['tbl3'];
		$fld = $_POST['col_name'];
		$sts = $_POST['sts_col'];
		if ($sts != "") {
		 	$q = mysqli_query($dbc,"UPDATE $table SET $sts = 0 WHERE $fld = '$id'");
		 	if ($q) {
			 	$msg = "Record Deleted Successfully From $table Table";	
			 	$sts = "info";
			 	echo json_encode(array('msg' => $msg, 'sts' => $sts));
				exit();
		 	}
		}else{
		 	if (deleteFromTable($dbc,$table,$fld,$id)) {
		 		if ($table == 'ticket_orders') {
		 			if (deleteFromTable($dbc, "transactions", "ticket_orders_id", $id)) {

		 			}
		 		}else{
				 	$msg = "Record Deleted Successfully From $table Table";	
				 	$sts = "danger";
				 	echo json_encode(array('msg' => $msg, 'sts' => $sts));
		 		}
				exit();
		 	}
		}
	}

	if (isset($_POST['stack'])) {
		$game_type = $_POST['game_type'];
		$number = $_POST['number'];
		$stack = $_POST['stack'];
		$response_array = array();
		$q = mysqli_query($dbc, "INSERT INTO ticket_master (ticket_master_total, seller_id) VALUES ('300', '1')");
		$latest_id = mysqli_insert_id($dbc);
	
		$seller = fetchRecord($dbc,"seller", "seller_contact", $_SESSION['seller_login']);
		$seller_id = $seller['seller_id'];
		$ttl = 0;
	
		foreach ($number as $x => $value) {
			$q = mysqli_query($dbc,"INSERT INTO ticket_orders (ticket_order_name, ticket_order_number, ticket_order_stack, seller_id, 	ticket_master_id) VALUES ('".$game_type[$x]."', '$value', '".$stack[$x]."', '$seller_id', '$latest_id')");	
			$ttl += $stack[$x];
		}

		$q1 = mysqli_query($dbc, "INSERT INTO transactions (debit, credit, transaction_remarks, seller_id, ticket_orders_id) VALUES ('0', '$ttl', 'Ticket Sold By Seller', '$seller_id', '$latest_id')");
		echo json_encode(array('seller_id' => $seller_id, 'tickets' => $latest_id));
	}

	// if (isset($_POST['lottery_for_search'])) {
	// 	$lottery_for_search = $_POST['lottery_for_search'];
	// 	$game_type = $_POST['game_type'];
	// 	$seller_id = $_POST['seller_id'];
	// 	limit_per_game($dbc, $lottery_for_search, $game_type, $seller_id);
	// }
?>
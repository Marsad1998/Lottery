 <?php include_once '../php_action/db_connect.php'; ?>
<?php 
	if (!empty($_REQUEST['customer_id'])) {


		# code...
		$customer_id = $_REQUEST['customer_id'];
		$q=mysqli_query($dbc,"SELECT * FROM transactions WHERE customer_id='$customer_id'");
		 // $fetchTransaction = mysqli_fetch_assoc($q);
		 if (mysqli_num_rows($q)==0) {
		 	# code...
		 	echo "0";
		 }else{
			$temp=0;
		while($row = mysqli_fetch_assoc($q)){
			@$total_debit += $row['debit'];
			@$total_credit+= $row['credit'];
			@$remaing_balance = $row['balance'];
				$temp=($row['credit']-$row['debit'])+$temp; 
				}
			
		 	echo  $temp;
		 }//else
		 
	}//main if
 ?>
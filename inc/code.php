
<?php include_once 'inc/functions.php'; ?>
		 <!--comapany profile add-->
		 <?php
		 	if (isset($_REQUEST['company_submit'])) {
		 			if ($_FILES['logo']['tmp_name']) {
		 			# code...
		 			upload_pic($_FILES['logo'],'img/uploads/');
		 			$data=[
		 				'logo'=>$_SESSION['pic_name'],
		 			'name'=>$_POST['name'],
		 			'address'=>$_POST['address'],
		 			'company_phone'=>$_POST['company_phone'],
		 			'personal_phone'=> $_POST['personal_phone'],
		 			'email' => $_POST['email']
			 		];
		 		}else{
		 			$data=[
		 			'name'=>$_POST['name'],
		 			'address'=>$_POST['address'],
		 			'company_phone'=>$_POST['company_phone'],
		 			'personal_phone'=> $_POST['personal_phone'],
		 			'email' => $_POST['email']
			 		];
		 		}

		 	 if (insert_data($dbc,'company', $data)) {
				# code...
				echo "<script>alert('company Added....!')</script>";
				//$msg = "<script>alert('Company Added')</script>";
					$sts = 'success';
					redirect("company.php",2000);
				}else{
					$msg = mysqli_error($dbc);
					$sts ="danger";
				}
		 		
		 	}
		 	/*get company data*/
		 	if (!empty($_REQUEST['company_edit'])) {
		 		# code...
		 		
		 		$company_edit = $_REQUEST['company_edit'];
		 		$fetchCompany = fetchRecord($dbc,"company",'id',$company_edit);
		 		$company_button='<input type="submit" value="Edit" name="company_update" class="btn btn-primary " style="width: 80%; border-radius: 10px;">';

		 	}else{
		 		$company_button = '<input type="submit" name="company_submit" class="btn btn-success " style="width: 80%; border-radius: 10px;">';
		 	}

		 /*edit company profile*/
		 	if (isset($_POST['company_update'])) {
		 		$company_id=  $_REQUEST['company_edit'];
		 		if ($_FILES['logo']['tmp_name']) {
		 			# code...
		 			upload_pic($_FILES['logo'],'img/uploads/');
		 			$data=[
		 				'logo'=>$_SESSION['pic_name'],
		 			'name'=>$_POST['name'],
		 			'address'=>$_POST['address'],
		 			'company_phone'=>$_POST['company_phone'],
		 			'personal_phone'=> $_POST['personal_phone'],
		 			'email' => $_POST['email']
			 		];
		 		}else{
		 			$data=[
		 			'name'=>$_POST['name'],
		 			'address'=>$_POST['address'],
		 			'company_phone'=>$_POST['company_phone'],
		 			'personal_phone'=> $_POST['personal_phone'],
		 			'email' => $_POST['email']
			 		];
		 		}
		 		
		 			

		 	 if (update_data($dbc,'company', $data , 'id',$company_id)) {
				# code...
				//echo "<script>alert('company Updated....!')</script>";
				echo $msg = "<script>alert('Company Updated')</script>";
					$sts = 'success';
					redirect("company.php",2000);
				}else{
					$msg = mysqli_error($dbc);
					$sts ="danger";
				}	
			}
		   ?>

	
		 <!--comapany profile end-->


<!-- customer add -->
<?php
 	//add customers
 if (isset($_REQUEST['add_customer'])) {
 		$customer_name = $_REQUEST['name'];
		$customer_email=$_REQUEST['email'];
		$customer_phone=$_REQUEST['phone'];
		$customer_address=$_REQUEST['address'];
		$status = $_REQUEST['status'];
		
		if(mysqli_query($dbc,"INSERT INTO customers(customer_name,customer_email,customer_phone,customer_address,customer_active,customer_role)VALUES('$customer_name','$customer_email','$customer_phone','$customer_address','$status','customer')")){
			$msg = "Customer Add Successfully";
			$sts = "success";
			//redirectURL(2000);
			redirect("customers.php",1200);
			}else{
				$msg = mysqli_error($dbc);
				$sts = "danger";
			}
		}
?>
		<?php
 	//add customers
 if (isset($_REQUEST['add_marketier'])) {
 		$customer_name = $_REQUEST['name'];
		$customer_email=$_REQUEST['email'];
		$customer_phone=$_REQUEST['phone'];
		$customer_address=$_REQUEST['address'];
		$status = $_REQUEST['status'];
		
		if(mysqli_query($dbc,"INSERT INTO customers(customer_name,customer_email,customer_phone,customer_address,customer_active,customer_role)VALUES('$customer_name','$customer_email','$customer_phone','$customer_address','$status','marketier')")){
			$msg = "Customer Add Successfully";
			$sts = "success";
			//redirectURL(2000);
			redirect("marketier.php",1200);
			}else{
				$msg = mysqli_error($dbc);
				$sts = "danger";
			}
		}

	/*create voucher*/
	if (isset($_REQUEST['add_voucher'])) {
		
		 $fetchTransaction = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM transactions WHERE customer_id='$_REQUEST[customer_id]' ORDER BY transaction_id DESC LIMIT 1"));
			if ($_REQUEST['debit']>0) {
				# code...
				$debit=$_REQUEST['debit'];
				$balance=$fetchTransaction['balance']-$debit;
				$credit=0;
			}
			if ($_REQUEST['credit']>0) {
				# code...
				$debit=0;
				$credit=$_REQUEST['credit'];
				$balance=$fetchTransaction['balance']+$credit;
				
				
			}

		$data_transaction=[
			'debit'=>$debit,
			'credit'=>$credit,
			'transaction_remarks'=>$_REQUEST['nuration'],
			'customer_id'=>$_REQUEST['customer_id'],
			'balance'=>$balance,

		];
	if(insert_data($dbc,"transactions",$data_transaction)){
		$transaction_id = mysqli_insert_id($dbc);
		$data_voucher=[
		'voucher_date'=>$_REQUEST['voucher_date'],
		'customer_id'=>$_REQUEST['customer_id'],
		'nuration'=>$_REQUEST['nuration'],
		'transaction_id'=>$transaction_id,
		];
		if(insert_data($dbc,"vouchers",$data_voucher)){
			$msg = "Voucher Added Successfully";
			$sts ="success";
			$last_voucher_id = mysqli_insert_id($dbc);
			redirect("createvoucher.php?print_voucher=".$last_voucher_id.'',1200);
		}else{
			$msg =mysqli_error($dbc);
			$sts = "danger";
		}
		
	}
		
	}//isset


	/*Add Budget Category*/
	if (isset($_REQUEST['add_budget_category'])) {
		# code...
	
		$data_budget_category=[
			'budget_category_name'=>$_REQUEST['budget_category_name'],
			'budget_category_type'=>$_REQUEST['budget_category_type'],
			

		];
		if(insert_data($dbc,"budget_category",$data_budget_category)){
			$msg = "Budget Category Added Successfully";
			$sts ="success";
			redirect("chartsofaccount.php",1200);
		}else{
			$msg =mysqli_error($dbc);
			$sts = "danger";
		}
		
	}

	/*Delete budget_category_del_id */
	if (!empty($_REQUEST['budget_category_del_id'])) {
		# code...
		deleteFromTable($dbc,"budget_category",base64_encode($_REQUEST['budget_category_del_id']),"budget_category_id");
		redirect('chartsofaccount.php',2000);
	}
	/*Fetch budget_category_edit_id */
	if (!empty($_REQUEST['budget_category_edit_id'])) {
		# code...
		$fetchBudgetCategory = fetchRecord($dbc,"budget_category",'budget_category_id',$_REQUEST['budget_category_edit_id']);
		$budget_category_button=' <button type="submit" id="budget_category" name="edit_budget_category" data-loading-text="Loading..." class="btn btn-info pull pull-right"><i class="glyphicon glyphicon-edit"></i> Edit </button>';
	}else{
		$budget_category_button=' <button type="submit" id="budget_category" name="add_budget_category" data-loading-text="Loading..." class="btn btn-info pull pull-right"><i class="glyphicon glyphicon-ok-sign"></i> Save </button>';
	}
	/*Edit budget Category*/
	if (isset($_REQUEST['edit_budget_category'])) {
		# code...
	
		$data_budget_category=[
			'budget_category_name'=>$_REQUEST['budget_category_name'],
			'budget_category_type'=>$_REQUEST['budget_category_type'],
			

		];
		if(update_data($dbc,"budget_category",$data_budget_category,'budget_category_id',$_REQUEST['budget_category_edit_id'])){
			$msg = "Budget Category Updated Successfully";
			$sts ="success";
			redirect("chartsofaccount.php",1200);
		}else{
			$msg =mysqli_error($dbc);
			$sts = "danger";
		}
		
	}

	/*Enter Expenses*/
	if (isset($_REQUEST['add_expenses'])) {
		# code...
	
		$data_budget=[
			'budget_name'=>$_REQUEST['expense_category'],
			'budget_amount'=>$_REQUEST['expense_amount'],
			'budget_type'=> 'expense',
			'budget_date'=>$_REQUEST['expense_date'],
			

		];
		if(insert_data($dbc,"budget",$data_budget)){
			$msg = "Expenses Added Successfully";
			$sts ="success";
			redirect("expenses.php",2000);
		}else{
			$msg =mysqli_error($dbc);
			$sts = "danger";
		}
		
	}



/*Add Channel*/
	if (isset($_REQUEST['channel_add'])) {
		# code...
	
		$data_channel=[
			'channel_name'=>$_REQUEST['channel_name'],
			'airing'=>$_REQUEST['onairing_detail'],
			'duration'=>$_REQUEST['duration'],
			'channel_time'=>$_REQUEST['time'],
			'rate'=>$_REQUEST['rate'],
			'status'=>1,
			

		];
		if(insert_data($dbc,"channels",$data_channel)){
			$msg = "Channel Added Successfully";
			$sts ="success";
			redirect("channels.php",1200);
		}else{
			$msg =mysqli_error($dbc);
			$sts = "danger";
		}
		
	}

	/*Delete budget_category_del_id */
	if (!empty($_REQUEST['channel_del_id'])) {
		# code...
		mysqli_query($dbc,"UPDATE channels SET status = '0' WHERE channel_id = '$_REQUEST[channel_del_id]'");
		redirect('channels.php',2000);
	}
	/*Fetch budget_category_edit_id */
	if (!empty($_REQUEST['channel_edit_id'])) {
		# code...
		$fetchchannel = fetchRecord($dbc,"channels",'channel_id',$_REQUEST['channel_edit_id']);
		$channel_button=' <button type="submit" id="budget_category" name="channel_edit" data-loading-text="Loading..." class="btn btn-info pull pull-right"> <i class="material-icons">edit</i> Edit </button>';
	}else{
		$channel_button=' <button type="submit" id="budget_category" name="channel_add" data-loading-text="Loading..." class="btn btn-info pull pull-right"> <i class="material-icons">done</i> Save </button>';
	}
	/*Edit budget Category*/
	if (isset($_REQUEST['channel_edit'])) {
		# code...
		$channel_id = $_REQUEST['channel_edit_id'];
		$data_channels_update=[

			'channel_name'=>$_REQUEST['channel_name'],
			'airing'=>$_REQUEST['onairing_detail'],
			'duration'=>$_REQUEST['duration'],
			'channel_time'=>$_REQUEST['time'],
			'rate'=>$_REQUEST['rate'],
			'status'=>1,
			

		];
		if(update_data($dbc,"channels",$data_channels_update,'channel_id',$channel_id)){
			$msg = "Channel Updated Successfully";
			$sts ="success";
			redirect("channels.php",1200);
		}else{
			$msg =mysqli_error($dbc);

			$sts = "danger"	;
				}
		
	}
	/*Add user*/
	if (isset($_REQUEST['users_add'])) {
		# code...
	
		$data_user=[
			'username' => $_REQUEST['username'],
			'email' => $_REQUEST['email'],
			'phone' => $_REQUEST['phone'],
			'password' => md5($_REQUEST['password']),
			'user_role' => $_REQUEST['user_role'],
			'address' => $_REQUEST['address'],
			'status' => $_REQUEST['status'],
			'branch_id' => $_REQUEST['branch_id'],
			

		];
		if(insert_data($dbc,"users",$data_user)){
			$msg = "User Added Successfully";
			$sts ="success";
			redirect("users.php",1200);
		}else{
			$msg =mysqli_error($dbc);
			$sts = "danger";
		}
		
	}

	/*Delete user_del_id */
	if (!empty($_REQUEST['user_del_id'])) {
		# code...
		mysqli_query($dbc,"UPDATE users SET status = '0' WHERE user_id = '$_REQUEST[user_del_id]'");
		redirect('users.php',2000);
	}
	/*Fetch useredit_id */
	if (!empty($_REQUEST['user_edit_id'])) {
		# code...
		$fetchusers = fetchRecord($dbc,"users",'user_id',$_REQUEST['user_edit_id']);
		$users_button=' <button type="submit" id="budget_category" name="user_edit" data-loading-text="Loading..." class="btn btn-info pull pull-right"> <i class="material-icons">edit</i> Edit </button>';
	}else{
		$users_button=' <button type="submit" id="budget_category" name="users_add" data-loading-text="Loading..." class="btn btn-info pull pull-right"> <i class="material-icons">done</i> Save </button>';
	}
	/*Edit user Category*/
	if (isset($_REQUEST['user_edit'])) {
		# code...
		$user_id = $_REQUEST['user_edit_id'];
		$data_user_update=[

			'username' => $_REQUEST['username'],
			'email' => $_REQUEST['email'],
			'phone' => $_REQUEST['phone'],
			'password' => md5($_REQUEST['password']),
			'user_role' => $_REQUEST['user_role'],
			'address' => $_REQUEST['address'],
			'status' => $_REQUEST['status'],
			'branch_id' => $_REQUEST['branch_id'],
			

		];
		if(update_data($dbc,"users",$data_user_update,'user_id',$user_id)){
			$msg = "Users Updated Successfully";
			$sts ="success";
			redirect("users.php",1200);
		}else{
			$msg =mysqli_error($dbc);

			$sts = "danger"	;
				}
		
	}


	/*Add brachde*/
	if (isset($_REQUEST['branch_add'])) {	
		$data_branch=[
			'branch_name'	=> $_REQUEST['branch_name'],
			'branch_email'	=> $_REQUEST['branch_email'],
			'branch_phone'	=> $_REQUEST['branch_phone'],
			'branch_country'	=> $_REQUEST['branch_country'],
			'branch_address'	=> $_REQUEST['address'],
			'branch_sts'	=> $_REQUEST['status'],
			'branch_note'	=> $_REQUEST['branch_note'],
		];
		if(insert_data($dbc,"branches",$data_branch)){
			$msg = "branches Added Successfully";
			$sts ="success";
			redirect("branches.php",1200);
		}else{
			$msg =mysqli_error($dbc);
			$sts = "danger";
		}
		
	}

	/*Delete braches  */
	if (!empty($_REQUEST['branch_del_id'])) {
		# code...
		mysqli_query($dbc,"UPDATE branches SET branch_sts = '0' WHERE branch_id = '$_REQUEST[branch_del_id]'");
		redirect('branches.php',2000);
	}
	/*Fetch braches  */
	if (!empty($_REQUEST['branch_edit_id'])) {
		# code...
		$fetchbranch= fetchRecord($dbc,"branches",'branch_id',$_REQUEST['branch_edit_id']);
		$branch_button=' <button type="submit" id="budget_category" name="branch_edit" data-loading-text="Loading..." class="btn btn-info pull pull-right"> <i class="material-icons">edit</i> Edit </button>';
	}else{
		$branch_button=' <button type="submit" id="budget_category" name="branch_add" data-loading-text="Loading..." class="btn btn-info pull pull-right"> <i class="material-icons">done</i> Save </button>';
	}
	/*Edit braches  Category*/
	if (isset($_REQUEST['branch_edit'])) {
		# code...
		$branch_id = $_REQUEST['branch_edit_id'];
		$data_branch_update=[
			'branch_name'	=> $_REQUEST['branch_name'],
			'branch_email'	=> $_REQUEST['branch_email'],
			'branch_phone'	=> $_REQUEST['branch_phone'],
			'branch_country'	=> $_REQUEST['branch_country'],
			'branch_address'	=> $_REQUEST['address'],
			'branch_sts'	=> $_REQUEST['status'],
			'branch_note'	=> $_REQUEST['branch_note'],
			

		];
		if(update_data($dbc,"branches",$data_branch_update,'branch_id',$branch_id)){
			$msg = "Branch  Updated Successfully";
			$sts ="success";
			redirect("branches.php",1200);
		}else{
			$msg =mysqli_error($dbc);

			$sts = "danger"	;
				}
		
	}

?>
<?php 
	include_once "includes/header.php";
	include_once "inc/code.php";
?>
<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class="pull-left">
                    <div class="page-title">Seller <a href="#modal-1" class="btn btn-sm btn-primary ml-5" data-toggle="modal" href='#modal-id'><i class="fa fa-pencil"></i> Add New</a></div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Seller</li>
                </ol>
            </div>
        </div>
		<div class="panel">
			<div class="panel-heading text-white purple-bgcolor"><h4>Seller Details</h4></div>
				<div class="panel-body">
					<table class="table" id="seller">
						<thead>
							<tr>	
								<th>ID</th>
								<th>Name</th>
								<th>Login</th>
								<th>Email</th>
								<th>Commission</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						</tbody>			
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include_once "includes/footer.php";
?>

<!-- <script>
	$(document).ready(function () {
		$("#modal-1").modal('show')
	})
</script> -->

<div class="modal fade" id="modal-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Manage Users</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="php_action/custom_action.php" method="POST" role="form" id="formData">
				<div class="msg"></div>
				<div class="row">	
					<div class="col-sm-6">
						<div class="form-group">
							<label for="seller_name">First Name</label>
							<input type="text" class="form-control" id="seller_name" name="seller_name"> 
							<input type="text" class="form-control d-none" id="seller_id" name="seller_id"> 
						</div>
						<div class="form-group">
							<label for="login">Login</label>
							<input type="text" class="form-control" id="login" name="login"> 
						</div>
						<div class="form-group">
							<label for="pos_serial">POS Serial</label>
							<input type="text" class="form-control" id="pos_serial" name="pos_serial"> 
						</div>
						<div class="form-group">
							<label for="seller_email">Email</label>
							<input type="text" class="form-control" id="seller_email" name="seller_email"> 
						</div>
						<div class="form-group">
							<label for="seller_address">Address</label>
							<textarea name="seller_address" id="seller_address" class="form-control" rows="5" required="required"></textarea>
						</div>
						<div class="form-group">
							<label for="delay_inactivity">Delay Inactivity in Minutes</label>
							<input type="text" class="form-control" id="delay_inactivity" name="delay_inactivity"> 
						</div>
					</div><!-- 	col -->
					<div class="col-sm-6">
						<div class="form-group">
							<label for="last_name">Last Name</label>
							<input type="text" class="form-control" id="last_name" name="last_name"> 
						</div>	
						<div class="form-group">
							<label for="">Gender</label>
							<div class="c-inputs-stacked">
								<label class="c-input c-radio">
									<input id="radioStacked1" value="male" name="gender" type="radio">
									<span class="c-indicator"></span>
									Male
								</label>
								<label class="c-input c-radio">
									<input id="radioStacked2" value="female" name="gender" type="radio">
									<span class="c-indicator"></span>
									Female
								</label>
							</div>
						</div>
						<div class="form-group">
							<label for="seller_contact">Contact</label>
							<input type="text" class="form-control" id="seller_contact" name="seller_contact"> 
						</div>
						<div class="form-group">
							<label for="commission">Commission</label>
							<input type="text" class="form-control" id="commission" name="commission"> 
						</div>
						<div class="form-group">
							<label for="seller_password">Password</label>
							<input type="text" class="form-control" id="seller_password" name="seller_password"> 
						</div>
						<div class="form-group">
							<label for="seller_sts">Status</label>
							<select class="form-control" id="seller_sts" name="seller_sts"> 
								<option value="">~~SELECT~~</option>
								<option value="1">Active</option>
								<option value="0">Inactive</option>
							</select>
						</div>
					</div><!-- 	col -->
				</div><!-- row -->
				<div class="row">
					<div class="col-sm-6 offset-3">
						<button type="submit" class="btn btn-primary align-content-end" class="saveData"><i class="fa fa-edit"></i> Save</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash"></i> To Cancel</button>
					</div>
				</div>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
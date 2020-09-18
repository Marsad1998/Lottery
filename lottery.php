<?php 
	include_once "includes/header.php";
	include_once "inc/code.php";
?>
<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class ="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Manage Tickets</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Manage Tickets</li>
                            </ol>
                        </div>
                    </div>
			<div class="col-sm-12">
				<div class="panel">
					<div class="panel-heading panel-heading-red" align="center"><h4>Manage Tickets</h4></div>
						<div class="panel-body">
							<form action="php_action/custom_action.php" method="POST" role="form" id="formData">
								<div class="msg"></div>
								<div class="row">	
									<div class="col-sm-6">
										<div class="form-group">
											<label for="">Ticket Name</label>
											<input type="text" class="form-control" id="ticket_name" name="ticket_name"> 
											<input type="text" class="form-control d-none" id="ticket_id" name="ticket_id"> 
										</div>
										<div class="form-group">
											<label for="">Ticket Number</label>
											<input type="text" class="form-control" id="ticket_number" name="ticket_number"> 
										</div>
									</div>
									<div class="col-sm-6">	
										<div class="form-group">
											<label for="">Ticket Type</label>
											<select class="form-control" name="ticket_type"  id="ticket_type" name="ticket_type"> 
												<option value="">~~SELECT~~</option>
												<option value="1">Borellete</option>
												<option value="2">Wedding</option>
												<option value="3">Loto 3</option>
												<option value="4">Loto 4</option>
												<option value="5">Loto 5</option>
											</select>
										</div>
										<div class="form-group">
											<label for="">Ticket Status</label>
											<select class="form-control" id="ticket_sts" name="ticket_sts"> 
												<option value="">~~SELECT~~</option>
												<option value="1">Active</option>
												<option value="0">Inactive</option>
											</select>
											<?php 
											$user = $_SESSION['userId'];
											$fetch_globeluser = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM users WHERE user_id = '$user'"));
											$globel_id = $fetch_globeluser['user_id'];
											?>
											<input type="text" class="form-control d-none" name="user_id" id="user_id" value="<?=$globel_id ?>">
										</div>
									</div><!-- 	col -->
								</div><!-- row -->
								<button type="submit" class="btn btn-primary" class="saveData">Save</button>
							</form>
							</div>
						</div>
					</div>


<div class="col-sm-12">
		<div class="panel">
	<div class="panel-heading cyan-bgcolor" align="center"><h4>Tickets Details</h4></div>
	<div class="panel-body">
			<table class="table" id="tickets">
				<thead>
				<tr>	
					<th>ID</th>
					<th>Ticket Name</th>
					<th>Ticket Number</th>
					<th>Ticket Type</th>
					<th>Seller Status</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
				
				</tbody>			
			</table>
	</div>
</div>

</div>
	</div></div>
<?php
include_once "includes/footer.php";
?>
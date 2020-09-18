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
                    <div class="page-title">Limit Management per Ball<a href="#modal-1" class="btn btn-sm btn-primary ml-5" data-toggle="modal" href='#modal-id'><i class="fa fa-pencil"></i> Add New</a></div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">List of Limitation</li>
                </ol>
            </div>
        </div>
		<div class="panel">
			<div class="panel-heading text-white cyan-bgcolor"><h4>List of Limitation</h4></div>
				<div class="panel-body">
					<form action="" method="POST" role="form">
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
									<div class="row">
										<div class="col-sm-3">
											<label for="">Lottery</label>
										</div><!-- inner col -->
										<div class="col-sm-9">
											<select style="width: 100%" name="lottery_for_search" id="lottery_for_search" class="form-control-sm limit_per_ball" required="required">
												<option value=""></option>
												<option class="text-uppercase" value="new york">new york</option>
												<option class="text-uppercase" value="florida">florida</option>
												<option class="text-uppercase" value="st-domingue">st-domingue</option>
											</select>
										</div><!-- inner col -->
									</div><!-- inner row -->
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-3">
											<label for="seller_id" class="mr-2">Seller</label>
										</div><!-- cil -->
										<div class="col-sm-9">
											<select style="width: 100%" name="seller_id" id="seller_id" class="form-control-sm limit_per_ball" required="required">
												<option value=""></option>
												<?php $q = get($dbc,"seller WHERE seller_sts = 1");
												while ($r = mysqli_fetch_assoc($q)):?>
													<option value="<?=$r['seller_id']?>"><?=$r['seller_name']?></option>
												<?php endwhile ?>
											</select>
										</div><!-- cil -->
									</div><!-- inner row -->
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-3">
											<label for="ball_number" class="mr-2">Ball</label>
										</div><!-- cil -->
										<div class="col-sm-9">
											<input type="text" class="form-control-sm limit_per_ball" id="ball_number" name="ball_number">
										</div><!-- cil -->
									</div><!-- inner row -->
								</div>
							</div><!-- col -->
							<div class="col-sm-4">
								<div class="form-group">
									<div class="row">
										<div class="col-sm-4">
											<label for="">Game Type</label>
										</div><!-- cil -->
										<div class="col-sm-8">
											<select style="width: 100%" name="game_type" id="game_type" class="form-control-sm limit_per_ball" required="required">
												<option value=""></option>
												<option class="text-uppercase" value="borellete">borellete</option>
												<option class="text-uppercase" value="marriage_gratis">Marriage_GRATIS</option>
												<option class="text-uppercase" value="wedding">wedding</option>
												<option class="text-uppercase" value="loto 3">loto 3</option>
												<option class="text-uppercase" value="loto 4">loto 4</option>
												<option class="text-uppercase" value="loto 5">loto 5</option>
											</select>
										</div><!-- cil -->
									</div><!-- inner row -->
								</div>
							</div><!-- col -->
						</div><!-- row -->
					</form>
					<table class="table" id="limit_per_ball">
						<thead>
							<tr>	
								<th>ID</th>
								<th>Lottery</th>
								<th>Game Type</th>
								<th>User</th>
								<th>Ball</th>
								<th>Limit</th>
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
<div class="modal fade" id="modal-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add New Limit</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="php_action/custom_action.php" method="POST" role="form" id="formData">
				<div class="msg"></div>
				<div class="form-group">
					<label for="lottery">Lottery *</label>
					<select name="lottery" id="lottery" class="form-control" required="required">
						<!-- <option value="">~~SELECT~~</option> -->
						<option selected value="new york">New York</option>
						<option value="Florida">Florida</option>
						<option value="st-domingue">St-Domingue</option>
					</select>
					<input type="text" class="form-control d-none" id="limit_per_game_id" name="limit_per_game_id"> 
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="game_type">Game Type *</label>
							<select name="game_type" id="game_type" class="form-control" required="required">
								<option value="">~~SELECT~~</option>
								<option value="borellete">Borellete</option>
								<option value="wedding">Wedding</option>
								<option value="loto 3">Loto 3</option>
								<option value="loto 4">Loto 4</option>
								<option value="loto 5">Loto 5</option>
							</select>
						</div>
					</div><!-- col -->
					<div class="col-sm-4">
						<div class="form-group">
							<label for="limits">Ball *</label>
							<input type="text" class="form-control" id="ball_number" name="ball_number" required=""> 
						</div>
					</div><!-- col -->
					<div class="col-sm-4">
						<div class="form-group">
							<label for="limits">Limit *</label>
							<input type="text" class="form-control" id="limits" name="limits"> 
						</div>
					</div>
				</div><!-- row -->
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="seller_id">Seller</label>
							<select name="seller_id" id="seller_id" class="form-control" required="required">
								<option value="">~~SELECT~~</option>
								<?php $q = mysqli_query($dbc,"SELECT * FROM seller WHERE seller_sts = 1");
								while ($r = mysqli_fetch_assoc($q)):?>
									<option value="<?=$r['seller_id']?>"><?=$r['seller_name']?></option>
								<?php endwhile ?>
							</select>
						</div>
					</div><!-- col -->
					<div class="col-sm-6">	
						<div class="form-group">
							<label for="status">Status *</label>
							<select name="status" id="status" class="form-control">
								<option value="">~~SELECT~~</option>
								<option value="1">Active</option>
								<option value="0">Inactive</option>
							</select>
						</div>
					</div><!-- col -->
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
</div><!-- /.modal <-->

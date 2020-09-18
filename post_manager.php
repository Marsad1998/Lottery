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
                    <div class="page-title">Post Manager <a href="#modal-1" class="btn btn-sm btn-primary ml-5" data-toggle="modal" href='#modal-id'><i class="fa fa-pencil"></i> Add New</a></div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Post Manager</li>
                </ol>
            </div>
        </div>
		<div class="panel">
			<div class="panel-heading text-white cyan-bgcolor"><h4>List of Responsible</h4></div>
				<div class="panel-body">
					<table class="table" id="post_manager">
						<thead>
							<tr>	
								<th>ID</th>
								<th>User</th>
								<th>Description</th>
								<th>Zone</th>
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
				<div class="form-group">
					<label for="seller_id">User *</label>
					<select name="seller_id" id="seller_id" class="form-control" required="required">
						<option value="">~~SELECT~~</option>
						<?php $q = get($dbc,"seller WHERE seller_sts = 1");
						while ($r = mysqli_fetch_assoc($q)):?>
							<option value="<?=$r['seller_id']?>"><?=$r['seller_name']?></option>
						<?php endwhile ?>
					</select>
					<input type="text" class="form-control d-none" id="post_manager_id" name="post_manager_id"> 
				</div>
				<div class="form-group">
					<label for="description">Description *</label>
					<textarea name="description" id="description" class="form-control" rows="5" required="required"></textarea>
				</div>
				<div class="form-group">
					<label for="zone">Zone *</label>
					<textarea name="zone" id="zone" class="form-control" rows="5" required="required"></textarea>
				</div>
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
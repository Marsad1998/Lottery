<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>
<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading panel-heading-green">
				<div class="page-heading"> <i class="fa fa-edit"></i> Manage Ingrediants</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">
				<form class="form-horizontal" id="formData" action="php_action/custom_action.php" method="POST" enctype="multipart/form-data">
			      	<div class="msg"></div>     	           	       
			        <div class="form-group">
			        	<label for="ingrediant_name">Ingrediant Name: </label>
						<input type="text" class="form-control" id="ingrediant_name" placeholder="Ingrediants Name" name="ingrediant_name" autocomplete="off">
						<input type="text" class="form-control d-none" id="ingrediant_id" placeholder="Ingrediants id" name="ingrediant_id" autocomplete="off">
			        </div> <!-- /form-group-->	           	       
			        <div class="form-group">
			        	<label for="ingrediant_price">Unit Price: </label>
						<input type="text" class="form-control" id="ingrediant_price" placeholder="Ingrediants Price" name="ingrediant_price" autocomplete="off">
			        </div> <!-- /form-group-->	   
			        <div class="form-group">
			        	<label for="ingrediant_sts">Ingrediant Sts: </label>
						<select type="text" class="form-control" id="ingrediant_sts" placeholder="Product Name" name="ingrediant_sts" >
							<option value="">~~SELECT~~</option>
						    <option value="1">Active</option>
						    <option value="0">Inactive</option>
						</select>
			        </div> <!-- /form-group row-->      	        
			        <button type="submit" class="btn btn-primary" id="saveData" data-loading-text="Loading..." autocomplete="off"> <i class="fa fa-check-circle"></i> Save Changes</button>	      
		     	</form> <!-- /.form -->	
			</div> <!-- /panel-body -->
		</div> <!-- /panel -->	

		<div class="panel">
			<div class="panel-heading panel-heading-green">
				<div class="page-heading"> <i class="fa fa-edit"></i> Manage Ingrediants</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">
				<div class="msg"></div>
				<table class="table" id="ingrediantsTable">
					<thead>
						<tr>
							<th style="width:10%;">Sr.</th>
							<th>Ingrediants Name</th>
							<th>Price</th>
							<th>Status</th>							
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->
			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->

</div>
</div>

<?php require_once 'includes/footer.php'; ?>
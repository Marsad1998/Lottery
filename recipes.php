<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>
<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading panel-heading-purple">
				<div class="page-heading"> <i class="fa fa-edit"></i> Add Recipes</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">
				<form class="form-horizontal" id="formData" action="php_action/custom_action.php" method="POST" enctype="multipart/form-data">
			      	<div class="msg"></div>
			      	<div class="row">
			      		<div class="col-sm-4">
					        <div class="form-group">
					        	<label for="product_id">Product Name: </label>
				     		    <select type="text" class="form-control" id="product_id" name="product_id" >
								  	<option value="">~~SELECT~~</option>
								  	<?php 
								   		$q = getWhere($dbc,"product","status", 1);
								   		while ($r = mysqli_fetch_assoc($q)):?>
								   			<option <?= $_GET['product_id'] != $r['product_id']? "" : "selected" ?> value="<?=$r['product_id']?>"><?=$r['product_name']?></option>
								   	<?php endwhile ?>
								</select>
								<input type="text" class="form-control d-none" id="recipe_id" name="recipe_id" autocomplete="off">
					        </div> <!-- /form-group-->	   
			      		</div><!-- col -->
			      		<div class="col-sm-4">
					        <div class="form-group">
					        	<label for="ingrediant_id">Ingrediant Name: </label>
								<select type="text" class="form-control" autofocus="true" id="ingrediant_id" name="ingrediant_id" >
							     	<option value="">~~SELECT~~</option>
							      	<?php 
							      		$q = getWhere($dbc,"ingrediants","ingrediant_sts", 1);
							      		while ($r = mysqli_fetch_assoc($q)):?>
							      			<option value="<?=$r['ingrediant_id']?>"><?=$r['ingrediant_name']?></option>
								      	<?php endwhile ?>
						        </select>
					        </div> <!-- /form-group-->
			      			
			      		</div><!-- col -->
			      		<div class="col-sm-4">
					        <div class="form-group">
					        	<label for="recipe_weight">Qty / Weight: </label>
								<input type="text" class="form-control" id="recipe_weight" name="recipe_weight" autocomplete="off">
					        </div> <!-- /form-group-->	   
			      		</div><!-- col -->
			      	</div><!-- row -->
			        <button type="submit" class="btn btn-primary" id="saveData" data-loading-text="Loading..." autocomplete="off"> <i class="fa fa-check-circle"></i> Save Changes</button>	      
		     	</form> <!-- /.form -->
			</div> <!-- /panel-body -->
		</div> <!-- /panel -->

		<div class="panel">
			<div class="panel-heading panel-heading-purple">
				<div class="page-heading"> <i class="fa fa-edit"></i> Manage Recipes</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">
				<div class="msg"></div>
				<?php 
					@$product_id =$_GET['product_id'];
					if ($product_id != "") {?>
				<input type="text" class="form-control d-none" value="<?=$product_id?>" id="product_id" name="product_id" autocomplete="off">
				<?php
					}
				?>
				<table class="table" id="recipeTable">
					<thead>
						<tr>
							<th>ID</th>
							<th>Product Name</th>
							<th>Ingrediant Name</th>
							<th>Weight / Qty</th>
							<th>Options</th>
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
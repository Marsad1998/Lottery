<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>
<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
<div class="row">
	<div class="col-md-12">

		<div class="panel">
			<div class="panel-heading panel-heading-red">
				<div class="page-heading"> <i class="fa fa-edit"></i> Add Product</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">
				<div class="msg"></div>
				<form id="formData" action="php_action/custom_action.php" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-6">
					      	<div class="form-group">
					        	<label for="productImage">Product Image: </label>				        
						        <input type="file" class="form-control" id="productImage" name="productImage">
					        </div> <!-- /form-group-->	     	           	       
					        <div class="form-group">
					        	<label for="productName">Product Name: </label>
								<input type="text" class="form-control" id="productName" placeholder="Product Name" name="productName" autocomplete="off">
								<input type="text" class="form-control d-none" id="product_id" placeholder="Product Name" name="product_id" autocomplete="off">
					        </div> <!-- /form-group-->	           
					        <div class="form-group">
					        	<label for="rate">Sale Rate </label>
								<input type="text" class="form-control" id="rate" placeholder="Sale Rate:" name="rate" autocomplete="off">
					        </div> <!-- /form-group-->	   
						</div><!-- col -->
						<div class="col-sm-6">
					        <div class="form-group">
					        	<label for="categoryName">Category Name: </label>
								<select type="text" class="form-control" id="categoryName" placeholder="Product Name" name="categoryName" >
								  	<option value="">~~SELECT~~</option>
								  	<?php 
								    	$sql = "SELECT categories_id, categories_name, categories_active, categories_status FROM categories WHERE categories_status = 1 AND categories_active = 1 ORDER BY categories_name ASC";
											$result = $connect->query($sql);
											while($row = $result->fetch_array()) {
												echo "<option value='".$row[0]."'>".$row[1]."</option>";
											} // while
									?>
						        </select>
					        </div> <!-- /form-group-->		
					        <div class="form-group">
					        	<label for="productStatus">Status: </label>
			     			    <select class="form-control" id="productStatus" name="productStatus">  	
									<option value="1">Available</option>
								    <option value="0">Not Available</option>
								</select>
					        </div> <!-- /form-group row-->	         	        
					        <button type="submit" class="btn btn-primary float-right" id="saveData" data-loading-text="Loading..." autocomplete="off"> <i class="fa fa-check-circle"></i> Save Changes</button>      
						</div><!-- col -->
					</div><!-- row -->
			 	</form> <!-- /.form -->
			</div> <!-- /panel-body -->
		</div> <!-- /panel -->

		<div class="panel">
			<div class="panel-heading panel-heading-red">
				<div class="page-heading"> <i class="fa fa-edit"></i> Manage Product</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">
				<div class="msg"></div>
				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addProductModalBtn" data-target="#addProductModal"> <i class="fa fa-plus-sign"></i> Add Product </button>
				</div> <!-- /div-action -->				
				<br><br>
				<table class="table" id="menuTable">
					<thead>
						<tr>
							<th style="width:10%;">Photo</th>
							<th>Product Name</th>
							<th>Sale rate</th>
							<th>Category</th>
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
<script src="custom/js/product.js"></script>

<?php require_once 'includes/footer.php'; ?>
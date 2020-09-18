<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>
<!-- start page content -->
<script>
	$(document).ready(function () {
		$('body').addClass('sidemenu-closed');
	});
</script>
<style>
	.customCate{
		background: lightgrey;
		cursor: pointer;
	}
	.customProduct{
		cursor: pointer;
		background-color: lightgreen;
	}

</style>
<div class="page-content-wrapper">
	<div class="page-content">
		<form id="formData" action="php_action/custom_action.php" method="POST" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-8">
				<div class="panel">
					<div class="panel-heading panel-heading-blue">
						<div class="page-heading"> <i class="fa fa-edit"></i> Manage Ingrediants</div>
					</div> <!-- /panel-heading -->
					<div class="panel-body">
					      	<div class="msg"></div>
					      	<div class="row">
					      		<div class="col-sm-2">
					      			<div class="text-center rounded-left rounded-right border-danger" id="homeDelivery" style="border: 1px solid red; padding: 10px; width: 120px; cursor: pointer;">
						      			<img src="img/backend/download.png" style="width: 50px;" alt="">
						      			<br>Home Delivery
					      			</div>
					      		</div><!-- col -->
					      		<div class="col-sm-2">
					      			<div class="text-center rounded-left rounded-right" id="dineIn" style="border: 1px solid red; padding: 10px; width: 120px; cursor: pointer;">
						      			<img src="img/backend/dine.png" style="width: 50px;" alt="">
						      			<br>Dine <br>In
					      			</div>
					      		</div><!-- col -->
					      		<div class="col-sm-2">
					      			<div class="text-center rounded-left rounded-right" id="takeAway" style="border: 1px solid red; padding: 10px; width: 120px; cursor: pointer;">
						      			<img src="img/backend/user.png" style="width: 50px;" alt="">
						      			<br>Take <br>Away
					      			</div>
					      		</div><!-- col -->
					      		<div class="col-sm-6">
					      			<div class="alert alert-success">
					      				<strong><i class="fa fa-bookmark"></i> Grand Total : </strong> <span class="gtotal"></span>
					      				<input type="hidden" class="gtotal" name="invoice_grand_total">
					      			</div>
					      			<div class="alert alert-light text-dark">
					      				<strong><i class="fa fa-clipboard"></i> Discount : </strong> <span><input name="order_disc" type="number" class="border-0" style="width: 40px" onkeyup="calDisc()" id="discount"> %</span>
					      			</div>
					      		</div> <!-- col -->
					      	</div><!-- row -->
					      	<div class="row">
					      		<div class="col-sm-4">
							      	<div class="form-group all">
							      		<label for="">Customer Name</label>
					      				<div class="input-group" id="ifNotsame">
					      					<input type="text" class="form-control" name="customer_name2" id="customer_name2" placeholder="Search for...">
					      					<span class="input-group-btn">
					      						<button class="btn btn-warning" id="showDatalist" type="button"><i class="fa fa-refresh"></i></button>
					      					</span>
					      				</div>
							      		<input list="customer_name1" name="customer_name" id="customer_name" class="form-control">
										<datalist id="customer_name1">
											<option value="">~~SELECT~~</option>
											<?php $q = get($dbc,"customers WHERE customer_active = '1'");
											while($r = mysqli_fetch_assoc($q)): ?>
												<option value="<?=$r['customer_id']?>"><?=$r['customer_name']?> <?=$r['customer_phone']?></option>
													<?php endwhile ?>
										</datalist>		
							      	</div>
					      		</div><!-- col -->
					      		<div class="col-sm-4">
							      	<div class="form-group all">
							      		<label for="">Phone #</label>
							      		<input type="text" class="form-control" id="customer_phone" name="customer_phone">
							      	</div>
					      		</div><!-- col -->
					      		<div class="col-sm-4">
							      	<div class="form-group common">
							      		<label for="">Address</label>
							      		<input type="text" class="form-control" id="customer_address" name="customer_address">
							      	</div>
							      	<div class="form-group unique">
							      		<label for="">Table #</label>
							      		<input type="text" class="form-control" id="customer_tableno" name="customer_tableno">
							      	</div>
					      		</div><!-- col -->
					      	</div><!-- row -->
					      	<br>
					      	<div class="row">
					      		<div class="col-sm-12">
						      		<ul class="nav nav-pills cateID">
					      			<?php 
						      			$q = get($dbc, "categories WHERE categories_status = 1");
						      			$i = 1;
						      			foreach ($q as $x => $value):?>
		  							    <li class="nav-item text-capitalize">
											<span id="active<?=$value['categories_id']?>" onclick="loadProducts(<?=$value['categories_id']?>)" class="nav-link ml-2 customCate customCate1">
											<?=$value['categories_name'].' ('.countWhen($dbc,"product","categories_id",$value['categories_id']).')'?>
											</span>
										</li>
										<?php 
							      			if ($i%8 == 0) {
							      				echo '</ul><br><ul class="nav nav-pills cateID">';
							      			}else{
							      				// echo 'No';
							      			}
							      			$i++;
								      		endforeach; 
							      		?>
									</ul>
					      		</div>
					      	</div>
					      	<hr>
					      	<div class="row">
					      		<div class="col-sm-12">	
						      		<div class="products">
						      			
						      		</div>
					      		</div> 
					      	</div><!-- row -->
					</div> <!-- /panel-body -->
				</div> <!-- /panel -->		
			</div> <!-- /col-md-9 -->
			<div class="col-sm-4">
				<div class="panel">
					<div class="panel-heading panel-heading-purple">
						<div class="page-heading"> <i class="fa fa-edit"></i> Calculations</div>
					</div> <!-- /panel-heading -->
					<div class="panel-body">
						<table class="table table-hover table-inverse">
							<thead>
								<tr>
									<th>Product Name</th>
									<th>Qty</th>
									<th>Total</th>
									<th>..</th>
								</tr>
							</thead>
							<tbody id="cartTable">
							</tbody>
						</table>
					      	<br>
					        <button type="submit" class="btn btn-primary" id="saveOrder" data-loading-text="Loading..." autocomplete="off"> <i class="fa fa-check-circle"></i> Save Order</button>
					</div>
				</div>
			</div><!-- col -->
		</div> <!-- /row -->
			</form>
	</div><!-- page content -->
</div><!-- main wrapper -->

<?php require_once 'includes/footer.php'; ?>
<?php 
	require_once 'includes/header.php'; 
	require_once 'php_action/core.php';

?>
<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
<div class="row">
	<div class="col-md-12">

		<div class="panel">
			<div class="panel-heading panel-heading-blue">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Orders</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>				
				<table class="table" id="example4" style="width: 100%">
					<thead>
						<tr>				
							<th>Order No#</th>
							<th>Order Date</th>
							<th>Client Name</th>
							<th>Contact</th>						
							<th>Total Order Item</th>
							<th>Order Status</th>
							<th>Option</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$user = $_SESSION['userId'];
						$q = mysqli_query($dbc,"SELECT order_id, order_date, client_name, client_contact, payment_status FROM orders WHERE order_status = 1 AnD user_id = '$user' ORDER BY order_id DESC");
						while ($r = mysqli_fetch_assoc($q)):?>
						<tr>
							<td><?=$r['order_id'];?></td>
							<td><?=$r['order_date'];?></td>
							<td><?=fetchRecord($dbc, "customers", "customer_id",$r['client_name'])['customer_name']?></td>
							<td><?=fetchRecord($dbc, "customers", "customer_id",$r['client_name'])['customer_phone']?></td>
							<td><?=countWhen($dbc,"order_item","order_id",$r['order_id'])?></td>
							<td><?=fetchRecord($dbc, "order_item", "order_id",$r['order_id'])['order_item_status']?></td>
							<td>
								<div class="btn-group">
								  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    Action <span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu">
								    <li><a href="orders.php?o=editOrd&i=<?=$r['order_id']?>" id="editOrderModalBtn"> <i class="fa fa-edit"></i> Edit</a></li>

								    <li><a type="button" onclick=" pprintOrder(<?=$r['order_id']?>)"
								     targe="_blank"> <i class="fa fa-print"></i> Print </a></li>
								    
								    <li><a type="button" data-toggle="modal" data-target="#removeOrderModal" id="removeOrderModalBtn" onclick="removeOrder(<?=$r['order_id']?>)"> <i class="fa fa-trash"></i> Remove</a></li>       
								  </ul>
								</div>				
							</td>
						</tr>
						<?php endwhile ?>
					</tbody>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->

<div class="modal fade" id="addBrandModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="submitBrandForm" action="php_action/createBrand.php" method="POST">
	      <div class="modal-header bg-primary">
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Brand</h4>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      </div>
	      <div class="modal-body">

	      	<div id="add-brand-messages"></div>

	        <div class="form-group">
	        	<div class="row">
	        		
	        	<label for="brandName" class="col-sm-3 control-label">Brand Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="brandName" placeholder="Brand Name" name="brandName" autocomplete="off">
				    </div>
	        	</div>
	        </div> <!-- /form-group-->	         	        
	        <div class="form-group">
	        	<div class="row">
	        		
	        	<label for="brandStatus" class="col-sm-3 control-label">Status: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="brandStatus" name="brandStatus">
				      	<option value="">~~SELECT~~</option>
				      	<option value="1">Available</option>
				      	<option value="2">Not Available</option>
				      </select>
				    </div>
	        	</div>
	        </div> <!-- /form-group-->	         	        

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        
	        <button type="submit" class="btn btn-primary" id="createBrandBtn" data-loading-text="Loading..." autocomplete="off">Save Changes</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->


<!-- remove order -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeOrderModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h4 class="modal-title"><i class="fa fa-trash"></i> Remove Order</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

      	<div class="removeOrderMessages"></div>

        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-trash"></i> Close</button>
        <button type="button" class="btn btn-danger" id="removeOrderBtn" data-loading-text="Loading..."> <i class="fa fa-check-circle"></i> Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove order-->
</div>


</div>
</div>
<!-- <script src="custom/js/brand.js"></script> -->

<script src="custom/js/order.js"></script>
<?php require_once 'includes/footer.php'; ?>
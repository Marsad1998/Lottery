<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="../assets/jquery/jquery.min.js" ></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js" ></script>
<?php

$order_id = $_GET['var'];
include_once "db_connect.php";
   $sql = "SELECT * FROM company ORDER BY id ASC LIMIT 1";

                    $result = $connect->query($sql);

                    while($row = $result->fetch_array()) {
                     
                 
     $logo = $row['logo'];
     $name= $row['name'];
   $company_phone= $row['company_phone'];
	$personal_phone=$row['personal_phone'];
	$address=$row['address'];

 } 

   $sql_order = "SELECT * FROM relayorder WHERE r_order_id = '$order_id' ";

                    $result_order = $connect->query($sql_order);

                    while($roworder = $result_order->fetch_array()) {
                    	$relayorder = $roworder['r_order_id'];

$r_order_date = $roworder['r_order_date'];
 $r_order_client =  $roworder['r_order_client'];
 $r_order_segment =  $roworder['r_order_segment'];
 $r_order_marketier =  $roworder['r_order_marketier'];
  $r_order_period =   $roworder['r_order_period'];
   $r_order_days =    $roworder['r_order_days'];
    $r_order_month =     $roworder['r_order_month'];
     $r_order_numberclip =      $roworder['r_order_numberclip'];
      $r_order_duration =       $roworder['r_order_duration'];
       $r_order_startdate =        $roworder['r_order_startdate'];
       $r_order_enddate =        $roworder['r_order_enddate'];
        $r_order_stoporder =         $roworder['r_order_stoporder'];
         $r_order_onair =          $roworder['r_order_onair'];
          $r_order_note =           $roworder['r_order_note'];
           $account_branch =            $roworder['account_branch'];
            $r_order_cooffice =             $roworder['r_order_cooffice'];
             $grand_total =              $roworder['grand_total'];
             $paid =              $roworder['paid'];
             $due =              $roworder['due'];

$fetchCustomer =mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM customers WHERE customer_id='$r_order_client'"));

$fetchmarkiter =mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM customers WHERE customer_id='$r_order_marketier'"));




                    }
    ?>



<!DOCTYPE html>
<html>
<head>
	<title>Print Order</title>

</head>
<body>
	<div class="container">
		<div class="form-group">
			<div class="row" style="font-size: 18px;">
					<div class="col-sm-12 "  >
						<center><img src="../img/uploads/<?=$logo?> " class="img img-responsive"  ></center>
						<p class="pull pull-right" style="float:right;margin-top: -70px;margin-right: 30px;  ">No:<?=$order_id;?></p>
						<p style="float: right;margin-right: 50px" ><u>Date:<?=$r_order_date?></u></p>
					</div>
				<label class="col-sm-2"><b>CLIENT:</b></label>
				<div class="col-sm-9 underline "  > 
					<p><?=strtoupper($fetchCustomer['customer_name'])?>
					<span style="padding-left:360px; " >(<?=strtoupper($fetchCustomer['customer_phone'])?>)</span>
					</p>
					
				</div>	

				</div><!-- Row -->
		</div>		

				 <div class="form-group">
			  	<div class="row">
			  		
			    <label for="clientContact" class="col-sm-2 control-label"><b>Segment:</b></label>
			    <div class="col-sm-4 underline">
			       <?=$r_order_segment ?>
			    </div>
			    <label for="clientContact" class="col-sm-2 control-label"><b>Marketier:</b> </label>
			    <div class="col-sm-4 underline">
					 <?=$fetchmarkiter['customer_name']?>
			    </div>
			   
			  	</div>
			  </div> <!--/form-group-->	

			   <div class="form-group">
			  	<div class="row">
			  		
			    <label for="clientContact" class="col-sm-2 control-label"><b>Period Of Contract:</b></label>
			    <div class="col-sm-2 underline">
			     <?=$r_order_period?>
			    </div>
			    <label for="clientContact" class="col-sm-2 control-label"><b>Days:</b> </label>
			    <div class="col-sm-2 underline">
			    	<?=$r_order_days?>
					
			    </div>

			     <label for="clientContact" class="col-sm-2 control-label"><b>Month:</b> </label>
			    <div class="col-sm-2 underline">
			    	<?=$r_order_month?>
					
			    </div>
			   
			  	</div>
			  </div> <!--/form-group-->	

			   <div class="form-group">
			  	<div class="row">
			  		
			    <label for="clientContact" class="col-sm-4 control-label"><strong>Number of clips (Details):</strong></label>
			    <div class="col-sm-8 underline">
			      <?=$r_order_numberclip?>
			    </div>
			    
			   
			  	</div>
			  </div> <!--/form-group-->	
			   <div class="form-group">
			  	<div class="row">
			  		
			    <label for="clientContact" class="col-sm-2 control-label"><strong>Duration of Ad</strong></label>
			    <div class="col-sm-10 underline">
			     <?=$r_order_duration?>
			    </div>
			    
			   
			  	</div>
			  </div> <!--/form-group-->	

			  <div class="form-group">
			  	<div class="row">
			  		
			     <label for="subTotal" class="col-sm-2 control-label"><strong>Start Date:</strong></label>
			   
			    <div class="col-sm-4 underline">
				  <?= $r_order_startdate?>
			    </div>

			    <label for="subTotal" class="col-sm-2 control-label"><strong>End Date:</strong></label>
			   
			    <div class="col-sm-4 underline">
				  <?=$r_order_enddate ?>
			    </div>
			    
			   
			  	</div>
			  </div> <!--/form-group-->	

			  <div class="form-group">
			  	<div class="row">
			  		
			     <label for="subTotal" class="col-sm-3 control-label"><strong>Stop Order No:</strong></label>
			   
			    <div class="col-sm-5 underline">
				   <?= $r_order_stoporder?>
			    </div>

			    <label for="subTotal" class="col-sm-2 control-label"><strong>Days or air:</strong></label>
			   
			    <div class="col-sm-2 underline">
				   <?=$r_order_onair?>
			    </div>
			    
			   
			  	</div>
			  </div> <!--/form-group-->	

			   <div class="form-group">
			  	<div class="row">
			  		
			     <label for="subTotal" class="col-sm-3 control-label"><strong>Note</strong></label>
			   
			    <div class="col-sm-9 underline">
				   <?=$r_order_note?>
			    </div>

			    
			    
			   
			  	</div>
			  </div> <!--/form-group-->	


			  <div class="form-group">
			  	<div class="row">
			  		
			     <label for="subTotal" class="col-sm-2 control-label"><strong>Account branch</strong></label>
			   
			    <div class="col-sm-4 underline">
				   <?= $account_branch?>
			    </div>

				 <label for="subTotal" class="col-sm-2 control-label"><strong>Co-Ordinator Office</strong> </label>
			   
			    <div class="col-sm-4 underline">
				   <?=$r_order_cooffice?>
			    </div>
			    
			    
			   
			  	</div>
			  </div> <!--/form-group-->	

			  <div class="form-group">
			  	<div class="row">
			  		<div class="col-sm-12 ">
			  			<table class="table tabel-responsive table-bordered">
			  				<thead>
			  					<tr>
			  						<th>Sr#</th>
			  						<th>Channel Name</th>
			  						<th>Channel Onairing details</th>
			  						<th>Duration</th>
			  						
			  						<th>Amount</th>
			  					</tr>
			  					
			  				</thead>

			  				<tbody>
			  				<?php
			  $sql_orderitem = "SELECT * FROM relayorder_item WHERE relayorder = '$relayorder' ";

                    $result_item = $connect->query($sql_orderitem);
                    	$x= 1;
                    while($item = $result_item->fetch_array()) :

                    $fetchChanel =mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM channels WHERE channel_id='$item[channel_id]'"));				
			  				?>

			  					<tr>
			  						<td><?=$x?></td>
			  						<td><?=$fetchChanel['channel_name']?></td>
			  						<td><?=$item['airing']?></td>
			  						<td><?=$item['duration']?></td>
			  						<td><?=$item['total']?></td>
			  					</tr>
			  	<?php
			  	$x++;
endwhile;
			  	?>	

			  	<tr class="pull-right">
			  						<td></td>
			  						<td></td>
			  						<td></td>
			  						<td ><strong>Total:</strong></td>
			  						<td><?= $grand_total?></td>
			  					</tr>	
			  	<tr class="pull-right">
			  						<td></td>
			  						<td></td>
			  						<td></td>
			  						<td ><strong>Paid:</strong></td>
			  						<td><?= $paid?></td>
			  					</tr>	
			  					
			  	<tr class="pull-right">
			  						<td></td>
			  						<td></td>
			  						<td></td>
			  						<td ><strong>Due:</strong></td>
			  						<td><?= $due?></td>
			  					</tr>											
			  				</tbody>
			  				
			  			</table>
			  		</div>
			  		
			  		
			   
			  	</div>
			  </div> <!--/form-group-->	


			  <div class="form-group">
			  	<div class="row">
			  		<div class="col-sm-9 ">
			  		</div>
			  		
			  		<div class="col-sm-3  float-right" align="right">
			    	<p class="" ><strong>GENERAL MANAGER</strong></p>
			    	</div>
			    
			   
			  	</div>
			  </div> <!--/form-group-->			

	</div>			

</body>
</html>

<style type="text/css">
	.underline {
   border-bottom: 1px solid #000;
   width:100%;
   text-align: center;
}

</style>